@extends('layouts.app')

@section('title', $title)

@section('content')
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:void (0);">Home</a></li>
        <li class="active">{{ $heading_title }}</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Customer <small> Form</small></h1>
    <div class="row">
        <div class="col-md-12">
            @php
                $panel = [
                    'title' => $heading_title,
                    'icon' => 'code',
                    'btns'=> [
                        'save' => $action,
                        'cancel' => route('customer.list'),
                    ]
                ];
            @endphp
            @panel($panel)
            <form class="form-horizontal" role="form" method="POST" action="{{ $action }}">
                <div class="row">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="{{ $method }}">
                    <div class="col-md-6{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="control-label">Name</label>
                        <div class="">
                            <input id="name" type="text" class="form-control" name="name" value="{{ $row->name or old('name') }}" >
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="control-label">Email</label>
                        <div class="">
                            <input id="email" type="text" class="form-control" name="email" value="{{ $row->email or old('email') }}" >
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6{{ $errors->has('address') ? ' has-error' : '' }}">
                        <label for="address" class="control-label">Address</label>
                        <div class="">
                            <input id="address" type="text" class="form-control" name="address" value="{{ $row->address or old('address') }}" >
                            @if ($errors->has('address'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6{{ $errors->has('phone') ? ' has-error' : '' }}">
                        <label for="phone" class="control-label">Phone</label>
                        <div class="">
                            <input id="phone" type="text" class="form-control" name="phone" value="{{ $row->phone or old('phone') }}" >
                            @if ($errors->has('phone'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">

                    </div>
                    <div class="col-md-6 col-md-offset-3 text-center">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"> Save</button>
                            <a href="{{ route('customer.list') }}" class="btn btn-white"> Cancel</a>
                        </div>
                    </div>
                </div>

            </form>
            @endPanel

        </div>
    </div>

@endsection