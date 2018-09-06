@extends('layouts.auth')

@section('title', 'Register')

@section('content')
    <div class="container-fluid">
        <div class="row row-space-30">&nbsp;<br><br><br><br><br><br><br></div>
        <div class="row">
        <div class="col-sm-offset-4 col-sm-4">
            <div class="panel panel-default panel-info">
                <div class="panel-heading">
                    <h1 class="panel-title"><i class="fa fa-sign-in"></i> Register, become a member </h1>
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row m-b-15 {{ $errors->has('name') ? 'has-error': '' }}">
                            <label for="name" class="col-form-label">Name <span class="text-danger">*</span></label>

                            <div class="col-md-12">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row m-b-15 {{ $errors->has('email') ? 'has-error': '' }}">
                            <label class="col-form-label">Email <span class="text-danger">*</span></label>

                                <div class="col-md-12">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="email" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                        </div>

                        <div class="form-group row m-b-15 {{ $errors->has('password') ? 'has-error': '' }}">
                            <label for="password" class="col-form-label">Password <span class="text-danger">*</span></label>

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row m-b-15">
                            <label for="password-confirm" class="col-form-label">Confirm Password <span class="text-danger">*</span></label>

                            <div class="col-md-12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 text-right">
                                <button type="submit" class="btn btn-primary ">
                                    Register
                                </button>
                                <a href="{{ url('/') }}" class="btn btn-default" title="back"><i class="fa fa-reply"></i></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
