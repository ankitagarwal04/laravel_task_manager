{{-- layout of the page is created --}} 
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                {{-- after login message in body --}}
                <div class="panel-body">
                    You are logged in!<a href="tasks"> click here </a> to see your tasks
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
