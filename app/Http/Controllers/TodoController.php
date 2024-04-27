<?php

namespace App\Http\Controllers;

use App\Models\ToDo;
use Illuminate\Http\Request;

class TodoController extends Controller
{


   protected $task;

    public function __construct()
    {
        $this->task = new ToDo();

    }

    public function index(){
        $response['tasks']=$this->task->all();
        return view('pages.todo.index')->with($response);
    }

    public function store(Request $request){

        $this->task->create($request->all());
        return redirect()->back();
    }

    public function delete($task_id)
    {
        $task= $this->task->find($task_id);
        $task->delete();
        return redirect()->back();
    }

    public function status($task_id){
        $task= $this->task->find($task_id);
        $task->status=1;
        $task->update();
        return redirect()->back();
    }
}
