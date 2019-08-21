	<template>
	<div>
		<h2> New Todo </h2>

		<form @submit.prevent="addTask" class="mb-3">
			<div class="form-goup">
				<input required="required" maxlength="50" type="text" class="form-control" placeholder="Todo name" v-model="body">
			</div>

			<button :disabled="loading" type="submit" class="btn btn-dark btn-block">						
				<i v-if="loading" class="fas fa-spin fa-spinner"></i>
				{{ loading ? '' : 'Save' }}
			</button>

		</form>

		<table class="table table-bordered table-hover mt-5">
		  <thead class="thead-light">
		    <tr>
		      <th scope="col">Todo Name</th>
		      <th scope="col">Action</th>
		    </tr>
		  </thead>
		  <tbody>

		    <tr v-for="task in tasks" v-bind:key="task.id">
		      <td>{{ task.body }}</td>

		      <td>
		      	<button @click="editTask(task)" type="button" class="btn btn-primary btn-sm">Edit</button>
		      	<button @click="deleteTask(task.id)" type="button" class="btn btn-danger btn-sm">Delete</button>
		      </td>
		    </tr>

		  </tbody>
		</table>


</div>
</template>







<script>
	import Axios from 'axios';
	import VueNoty from 'vuejs-noty';
	import 'vuejs-noty/dist/vuejs-noty.css';
	Vue.use(VueNoty, {
	  timeout: 700,
	  killer: true,
	  progressBar: false,
	  // layout: 'topCenter'
	});
	
	export default {

		props:['auth'],
		mounted() {
            // console.log(this.auth),
            this.getTasks();
        },
		data() {
			return {			
				body: '',
				task_id: '',
				loading: false,
				tasks: [],
				edit: false		
			}
		},
		methods: {
		getTasks(){			
			Axios.post('/api/tasks', {
					user_id: this.auth
				})
			.then(response => {
               // console.log(response.data);
               this.tasks = response.data;
            })
		.catch(function (error) {
            });
		},		
		addTask() {
				//ADD
				if(this.edit === false) {
					this.loading = true;
					Axios.post('/api/task', {
						body: this.body,
						user_id: this.auth
					})
					.then(response => {
	               // console.log(response.data);
	               this.$noty.show("Task added successfully!");
	               this.body = '';
	               this.loading = false;
	               this.getTasks();
	            })
					.catch(function (error) {
						this.loading = false;
			            });
			}else{
				this.loading = true;
					Axios.put('/api/task', {
						body: this.body,
						task_id: this.task_id
					})
					.then(response => {
	               // console.log(response.data);
	               this.$noty.show("Task updated successfully!");
	               this.body = '';
	               this.loading = false;
	               this.getTasks();
	            })
					.catch(function (error) {
						this.loading = false;
			            });
			}
		},

		editTask(task) {
				this.edit = true;
				this.body = task.body;
				this.task_id = task.id;
				// console.log(this.body);
				// console.log(this.task_id);
			},


		deleteTask(id) {
				if(confirm('Are You Sure?')) {
					fetch(`api/task/${id}`, {
						method: 'delete'
					})
					.then(res => res.json())
					.then(data => {
						// alert('Article Removed');
						this.getTasks();
					})
					.catch(err => console.log(err));
				}
			},

	  }
	}
</script>