<?php

namespace App\Http\Controllers\Employee;

use App\Employee;
use App\Http\Controllers\Controller;
use App\Notification;
use App\Task;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Util\Json;

class TaskController extends Controller
{
    public function index(){
        $user=Auth::id();
        $employee=Employee::where('user_id',$user)->first();
        $data = [
            'tasks' => Task::where('assignee',$employee->id)->with('employee')->get()
        ];

        return view('employee.tasks.index')->with($data);
    }

    public function viewTask($task_id) {
        $task = Task::findOrFail($task_id);
        $task->employeeList=Employee::all();
        $task->logged_in_user=Auth::id();

        return view('employee.tasks.view')->with('task', $task);
    }

    public function changeAssignee(Request $request) {
        $this->validate($request, [
            'task' => 'required',
            'assignee' => 'required',
            'user'=>'required'
        ]);
        //dd($request->assignee);
        $task = Task::find($request->task);
        $user = \App\User::find($request->user);
        $employee=Employee::find($request->assignee);
        $task->assignee=$employee->id;
        $response=false;
        if($task->save()){
            Notification::create([
                'subject'=>'Assignee changed on your task by '.$user->name,
                'body'=>url('/admin/task/view/'.$task->id),
                'notification_to'=>$task->created_by,
                'notification_by'=>$user->id
            ]);
            Notification::create([
                'subject'=>'Task assigned to you by '.$user->name,
                'body'=>url('/employee/task/view/'.$task->id),
                'notification_to'=>$task->assignee,
                'notification_by'=>$user->id
            ]);

            $response=true;
        }
        return response()->json([
            'response' => $response
        ]);
    }

    public function changeStatus(Request $request) {

        $this->validate($request, [
            'task' => 'required',
            'status' => 'required',
            'user'=>'required'
        ]);
        //dd($request->assignee);
        $task = Task::find($request->task);
        $user=\App\User::find($request->user);
        //dd($user->id);
        $task->status=$request->status;
        $response=false;
        if($task->save()){
            $notification=new Notification();
            $notification->subject='Task status changed by '.$user->name;
            $notification->body=url('/admin/task/view/'.$task->id);
            $notification->notification_to=$task->created_by;
            $notification->notification_by=$user->id;
            $notification->save();
            $response=true;
        }
        return response()->json([
            'response' => $response
        ]);
    }
}
