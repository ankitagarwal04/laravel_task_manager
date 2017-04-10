	@extends('layouts.app')

	@section('content')
		<div class="container">
		<div class="row">
		    <div class="col-md-8 col-md-offset-2">

		 <a href="/tasks/create">Create New One</a>   	
		<div class="table-responsive">
		<table class="table table-striped table-bordered table-hover">
		<thead>
		  <tr>
		    <th>#</th>
		    <th>Task</th>
		    <th>Status</th>
		    <th colspan="2">Action</th>
		  </tr>
		</thead>
		<tbody>
		        @foreach($tasks as $task)
			         <tr>
			         	<td>{{$loop->index + 1}}</td>
			         	<td>{{$task['content'] }}</td>
			         	<td>
			         	@if ($task['pending'])
							    Pending
							@elseif ($task['completed'])
							    Completed
							@else
							   Outgoing
							@endif
							
			         	</td>
			         	<td>
			         		<a href="tasks/{{$task->id}}/edit">Edit</a> /
			         		<a href="tasks/{{$task->id}}/destroy" onclick="alert('Delete Successfull')">Delete
			         		</a>
			         	</td>
			         </tr>
		         
		        @endforeach
		</tbody>
		</table>
		</div>

		    </div>
		</div>
		</div>
	@endsection
