@extends('layouts.auth')

@section('title', 'Reset Password')

@section('content')
    <div class="container-fluid">
        <div class="row row-space-30">&nbsp;<br><br><br><br><br><br><br></div>
        <div class="row">
            <div class="col-sm-offset-4 col-sm-4">
                <div class="panel panel-default panel-info">
                    <div class="panel-heading">
                        <h1 class="panel-title"><i class="fa fa-repeat"></i> Forgot Your Password?</h1>
                    </div>
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form action="{{ route('password.email') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="input-email">E-Mail Address</label>
                                <div class="input-group {{ $errors->has('email') ? ' is-invalid' : '' }}"><span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <input name="email" value="{{ old('email') }}" placeholder="E-Mail Address" id="email" class="form-control" type="email">
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i>  Send Password Reset Link</button>
                                <a href="{{ route('login') }}" data-toggle="tooltip" title="Cancel" class="btn btn-default"><i class="fa fa-reply"></i></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
