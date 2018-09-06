@extends('layouts.app')

@section('title', $heading_title)

@section('content')
<div class="">
    <div class="row">
        <div class="col-md-12">
            @php
                $panel = [
                    'title' => $heading_title,
                    'icon' => 'code',
                    'btns'=> [
                        'save' => $action,
                        'cancel' => route('user.list'),
                    ]
                ];
            @endphp
            @panel($panel)
            <form class="form-horizontal" role="form" method="POST" id="form_role" action="{{ $action }}">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="{{ $method }}">
                <div class="form-group{{ $errors->has('user_group') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-4 control-label">User Role</label>

                    <div class="col-md-6">
                        <select id="name" type="text" class="form-control" name="role" required>
                            <option value="">Select Role</option>
                            @foreach ($roles as $role)
                                @php($selected = ($role->id ==  $row->role_id ? "selected='selected'" : ''))
                                <option value="{{ $role->id }}" {!! $selected !!}>{{ $role->name }}</option>
                            @endforeach
                        </select>

                        @if ($errors->has('role'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('role') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-4 control-label">Name</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="name" value="{{$row->name or  old('name') }}" required autofocus>

                        @if ($errors->has('name'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control" name="email" value="{{$row->email or  old('email') }}" required>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="col-md-4 control-label">Password</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control" name="password">

                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Save
                        </button>
                        <a class="btn btn-white" href="{{ route('user.list') }}"> Cancel</a>
                    </div>
                </div>
            </form>
            @endPanel
        </div>
    </div>
</div>
@endsection
