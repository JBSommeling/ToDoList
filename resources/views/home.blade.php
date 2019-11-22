@extends('layouts.app')

@section('content')
    <div id="screen"></div>
    <div class="row">
        <div id="taskListsList" class="col-sm-10 offset-sm-1 col-md-4 offset-md-1 d-inline-block" ></div>
        <div id="menu" class="col-md-4 offset-md-2 d-inline-block d-sm-none d-md-inline-block"></div>
    </div>
    <div class="row">
        <div id="hiddenMenu" class="col-sm-4 d-sm-inline-block d-md-none"></div>
    </div>
@endsection
