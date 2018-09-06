@extends('layouts.app')

@section('title', $title)

@section('content')
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:void (0);">Home</a></li>
        <li class="active">{{ $heading_title }}</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Role <small> Form</small></h1>
    <!-- end page-header -->
<div class="">
    <div class="row">
        <div class="col-md-12">
            @php
                $panel = [
                    'title' => $heading_title,
                    'icon' => 'code',
                    'btns'=> [
                        'save' => $action,
                        'cancel' => route('role.list'),
                    ]
                ];
            @endphp
            @panel($panel)
            <form class="form-horizontal" role="form" method="POST" action="{{ $action }}">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="{{ $method }}">
                <div class="col-md-6{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="control-label">Name</label>

                    <div class="">
                        <input id="name" type="text" class="form-control" name="name" value="{{ $row->name or old('name') }}" required>

                        @if ($errors->has('name'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="col-md-6{{ $errors->has('description') ? ' has-error' : '' }}">
                    <label for="name" class="control-label">Description</label>

                    <div class="">
                        <input id="name" type="text" class="form-control" name="description" value="{{ $row->description or old('description') }}" required>

                        @if ($errors->has('description'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="col-md-12{{ $errors->has('permission') ? ' has-error' : '' }}">
                    <label for="name" class="control-label">Permission</label>

                    <div class="">
                        @php($permissions = $row->permission ? (array)$row->permission : [])
                        @foreach(routeslist() as $module=>$sub)
                            <div class="panel panel-white">
                                <div class="panel-heading">
                                    <div class="pull-right">

                                    </div>
                                    <div class="panel-title"><i class="fa fa-inbox"></i> {{ $module }}</div>
                                </div>
                                <div class="panel-body">
                                @foreach($sub as $s=>$routes)

                                        <div class="panel panel-white">

                                        <div class="panel-heading">
                                            <div class="panel-title">{{ $s }}</div>
                                        </div>
                                            <div class="panel-body">
                                        @php( $permission = !empty($permissions[$s]) ? (array)$permissions[$s] : [] )
                                                <div class="row">
                                                    @foreach($routes as $r=>$route)
                                                        <div class="col-md-3 col-sm-6">
                                                        <div class="checkbox">
                                                            <label>
                                                                <input value="{{ $route }}" {{ in_array($route, $permission) ? "checked='checked'" : "" }} name="permission[{{ $s }}][{{ $route }}]" type="checkbox">
                                                                {{ $route }}
                                                            </label>
                                                        </div>
                                                        </div>
                                                    @endforeach
                                                </div>

                                            </div>
                                    </div>
                                @endforeach

                                </div>
                            </div>
                        @endforeach
                        @if ($errors->has('permission'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('permission') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary"> Save</button>
                        <a href="{{ route('role.list') }}" class="btn btn-white"> Cancel</a>
                    </div>
                </div>
            </form>
            @endPanel

        </div>
    </div>
</div>
@endsection
