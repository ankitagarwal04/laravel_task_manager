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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   /*this render the path to the view/tasks.index directory*/
        $userId = Auth::id();
        $tasks = Task::where('user_id', $userId)->get();
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   /*this render the path to the view/tasks.create directory*/
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   /*through request values are fetched and this function is storing those values into the database*/
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
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   /*this render the path to the view/tasks.edit directory*/
        $task = Task::find($id);
        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   /*through request values are fetched and this function is updating those values into the database*/
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
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   /*it is deleting the tasks with id as $id*/
        Task::destroy($id);
        return redirect('tasks');
    }
}
