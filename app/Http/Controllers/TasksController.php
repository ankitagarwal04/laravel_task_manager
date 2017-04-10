<?php

namespace App\Http\Controllers;

use App\Task as Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Http\Requests;


class TasksController extends Controller
{

        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return view('tasks.index')
     */
    public function index()
    {   
        $userId = Auth::id();
        $tasks = Task::where('user_id', $userId)->get();
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return view('tasks.create')
     */
    public function create()
    {   
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return redirect('/tasks')
     */
    public function store(Request $request)
    {   
        $content = $request->input('content');
        $cStatus = 0;
        $pStatus = 0;
        $oStatus = 0;
        $taskStatus = $request->input('taskStatus');
        if ($taskStatus == "completed") {
            $cStatus = 1;
        } elseif ($taskStatus == "pending") {
            $pStatus = 1;
        } else {
            $oStatus = 1;
        }
        
        $userId = Auth::id();
        $task = new Task;
        $task->content = $content;
        $task->user_id = $userId;
        $task->ongoing = $oStatus;
        $task->pending = $pStatus;
        $task->completed = $cStatus;
        $task->save();
        return redirect('/tasks');

    }

  
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $id
     * @return view('tasks.edit')
     */
    public function edit($id)
    {   
        $task = Task::find($id);
        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $id
     * @return redirect('tasks')
     */
    public function update(Request $request, $id)
    {   
        $content = $request->input('content');
        $cStatus = 0;
        $pStatus = 0;
        $oStatus = 0;
        $taskStatus = $request->input('taskStatus');
        if ($taskStatus == "completed") {
            $cStatus = 1;
        } elseif ($taskStatus == "pending") {
            $pStatus = 1;
        } else {
            $oStatus = 1;
        }
        

        $task = Task::find($id);
        $task->content = $content;
        $task->ongoing = $oStatus;
        $task->pending = $pStatus;
        $task->completed = $cStatus;

        $task->save();
        return redirect('tasks')->with('message', "successfully updated");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $id
     * @return redirect('tasks')
     */
    public function destroy($id)
    {   
        Task::destroy($id);
        return redirect('tasks');
    }
}
