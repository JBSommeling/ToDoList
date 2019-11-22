@extends('layouts.app')

@section('content')
    <div id="screen"></div>
    <div class="row">
        <div id="taskListsList" class="col-sm-10 offset-sm-1 col-md-4 offset-md-1 d-inline-block"></div>
        <div id="menu" class="col-md-4 offset-md-2 d-none d-md-inline-block">
            <i class="fas fa-plus-circle hover"></i>
        </div>
    </div>
    <div class="row">
        <div id="hiddenMenu" class="col-6 col-sm-4 d-sm-inline-block d-md-none hiddenMenu">
            <i class="fas fa-times-circle hover" onclick="hideMenu()"></i>
            <div class="buttonsHiddenMenu">
                <i class="fas fa-plus-circle col-12 hover buttonHiddenMenu"></i>
                <i class="fas fa-minus-circle col-12 hover buttonHiddenMenu"></i>
            </div>
        </div>
    </div>
    <div class="row">
        <i class="fas fa-chevron-right hover d-inline-block d-md-none" onclick="showMenu()"></i>
    </div>
@endsection
