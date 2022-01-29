<?php

namespace App\Http\Controllers\Employee;

use App\Employee;
use App\Http\Controllers\Controller;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('employee.tasks.view')->with('task', $task);
    }
}
