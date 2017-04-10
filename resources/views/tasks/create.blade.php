@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create Task</div>

                <div class="panel-body">
                  <form class="form-horizontal" role="form" method="POST" action="/tasks">
                        {{ csrf_field() }}
                        <textarea rows="5" cols="40" name="content" placeholder="Enter your task">
                          
                        </textarea>
                        <br/>
                         Status: <select name="taskStatus">
                            <option value="ongoing">Ongoing</option>
                            <option value="pending">Pending</option>
                            <option value="completed">Completed</option>
                          </select>
                        <input type="submit">
                  </form>
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
