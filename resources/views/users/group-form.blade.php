@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $heading_title }}</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ $action }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="{{ $method }}">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $row->name or old('name') }}" required>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Description</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="description" value="{{ $row->description or old('description') }}" required>

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('view_permission') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Access Permission</label>

                            <div class="col-md-6">
                                <div class="well-sm well" style="height: 150px; overflow: auto;">
                                    @foreach($routes as $route)
                                        @php($selected = in_array($route['route'], $row->view_permission) ? 'checked="checked"' : '')
                                    <div class="checkbox">
                                        <label><input name="view_permission[]" type="checkbox" {{ $selected }} value="{{ $route['route'] }}">{{ $route['route'] }}</label>
                                    </div>
                                    @endforeach
                                </div>
                                @if ($errors->has('view_permission'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('view_permission') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('update_permission') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Update Permission</label>

                            <div class="col-md-6">
                                <div class="well-sm well" style="height: 150px; overflow: auto;">
                                    @foreach($routes as $route)
                                        @php($selected = in_array($route['route'], $row->update_permission) ? 'checked="checked"' : '')
                                        <div class="checkbox">
                                            <label><input name="update_permission[]" type="checkbox" {{ $selected }} value="{{ $route['route'] }}">{{ $route['route'] }}</label>
                                        </div>
                                    @endforeach
                                </div>
                                @if ($errors->has('update_permission'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('update_permission') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary"> Save</button>
                                <a href="{{ route('group.list') }}" class="btn btn-white"> Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
