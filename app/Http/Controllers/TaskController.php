<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use App\Task;

use App\Http\Resources\Task as TaskResource;

class TaskController extends Controller
{
    
    public function index(Request $request)
    {
        // Get articles
        $tasks = Task::orderBy('created_at','desc')->where('user_id', $request->user_id)->get();
        
        return $tasks;
    }


 
    public function store(Request $request)
    {
        // $task = $request->isMethod('put') ? Task::findOrFail($request->task_id) : new Task;

        // $task->id = $request->input('task_id');
        // $task->body = $request->input('body');

        // if($task->save()) {
        //     return new TaskResource($task);
        // }

        $this->validate($request, [
            'body' => 'required|max:50',
        ]);

        $task = Task::create([
                    'body' => $request->body,
                    'user_id' => $request->user_id,
                ]);        
    }


    public function edit(Request $request)
    {
        $task = Task::findOrFail($request->task_id);
        $task->update([
          'body' => $request->body
      ]);
   
    }


    public function destroy($id)
    {
        // Get article
        $task = Task::findOrFail($id);

        if($task->delete()) {
            return new TaskResource($task);
        }    
    }
}
