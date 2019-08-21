<template>


	<div class="row my-5">
		<div class="col-md-6 offset-md-3">
			<div class="card">
				<div class="card-body">
					<h3 class="text-center my-4">Login</h3>

					<div class="form-group">
						<input v-bind:class="{ 'is-invalid': errors.email }" v-model="email" type="text" placeholder="Email" class="form-control">
						<small v-if="errors.email" class="text-danger" :key="error" v-for="error in errors.email"> {{ error }} </small>						
					</div>

					<div class="form-group">						

						<input v-model="password" type="password" placeholder="password" class="form-control">
					</div>


					<div class="form-group text-center">
					<button :disabled="loading" @click="loginUser()" class="form-control btn btn-success">						
							<i v-if="loading" class="fas fa-spin fa-spinner"></i>
							{{ loading ? '' : 'Login' }}
						</button>
					</div>

					

				</div>
			</div>
		</div>
	</div>
</template>





<script>
	import Axios from 'axios';

	export default {

		data() {
			return {
				email: '',
				password: '',
				errors: {},
				loading: false,

			}
		},
		
		methods: {			

			loginUser() {
			this.loading = true;

			Axios.post('login', {
				email: this.email,
				password: this.password
			})
			.then(response => {
                    // console.log(response.data);
                    if(response.data.code == 200){
                    	// console.log('200');
                    	this.loading = false;
                    	window.location.href = '/';
                    }
                    else if(response.data.code == 401){
                    	this.loading = false;
                    	this.errors ={
						email: ["These credentials do not match our record."]
					};
                    }
                })
			.catch(function (error) {

                });

		}

		}
	}
</script>