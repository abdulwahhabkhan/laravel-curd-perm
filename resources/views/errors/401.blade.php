@extends('layouts.app')

@section('title', '401 Error ')

@section('content')
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">Home</a></li>
        <li class="active">401 Error</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">401<small> Permission Denied! </small></h1>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h4 class="panel-title"><i class="fa fa-warning"></i> Permission Denied!</h4>
                </div>
                <div class="panel-body">
                    <p class="text-center">You do not have permission to access this page, please refer to your system administrator.</p>
                </div>
            </div>
        </div>
    </div>
@endsection