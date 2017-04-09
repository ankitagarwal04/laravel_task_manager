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
                          <input type="text" name="content" value="{{$task->content}}">
                          <input type="submit" value="Edit Task" class="ui submit button">
                    </form>         

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

