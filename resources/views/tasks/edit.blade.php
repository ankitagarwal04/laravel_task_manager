{{-- layout of the page is created --}} 
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit {{$task->id}}</div>

                <div class="panel-body">
                       <form action="/tasks/{{$task->id}}/update" method="post">
                          {{ csrf_field() }}
                          Task Name: <input type="text" name="content" value="{{$task->content}}">
                          <br>
                          Status: <select name="taskStatus">
                            <option value="ongoing">Ongoing</option>
                            <option value="pending">Pending</option>
                            <option value="completed">Completed</option>
                          </select>

                          <input type="submit" value="Edit Task" class="ui submit button">
                    </form>         

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

