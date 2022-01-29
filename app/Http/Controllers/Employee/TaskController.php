<?php

namespace App\Http\Controllers\Employee;

use App\Employee;
use App\Http\Controllers\Controller;
use App\Task;
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
        return view('employee.tasks.view')->with('task', $task);
    }

    public function changeAssignee(Request $request) {
        $this->validate($request, [
            'task' => 'required',
            'assignee' => 'required',
        ]);
        //dd($request->assignee);
        $task = Task::find($request->task);
        $employee=Employee::find($request->assignee);
        $task->assignee=$employee->id;
        $response=false;
        if($task->save()){
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
        ]);
        //dd($request->assignee);
        $task = Task::find($request->task);
        $task->status=$request->status;
        $response=false;
        if($task->save()){
            $response=true;
        }
        return response()->json([
            'response' => $response
        ]);
    }
}
