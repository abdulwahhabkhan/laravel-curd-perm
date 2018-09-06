@extends('layouts.app')

@section('title', $title)

@section('content')
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:void (0);">Home</a></li>
        <li class="active">{{ $heading_title }}</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Sale <small> Form</small></h1>
    <div class="row">
        <div class="col-md-12">
            @php
                $panel = [
                    'title' => $heading_title,
                    'icon' => 'code',
                    'btns'=> [
                        'save' => $action,
                        'cancel' => route('sale.list'),
                    ]
                ];
            @endphp
            @panel($panel)
            <form class="form-horizontal" role="form" method="POST" action="{{ $action }}">
                <div id="wizard">
                    <ol>
                        <li>
                            Contact Information
                            <small>customer name, sale date, details</small>
                        </li>
                        <li>
                            Product Details
                            <small>products name and quantity.</small>
                        </li>
                    </ol>
                    <!-- begin wizard step-1 -->
                    <div>
                        <fieldset>
                            <legend class="pull-left width-full">Identification</legend>
                            <!-- begin row -->
                            <div class="row">
                                <!-- begin col-4 -->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input type="text" name="firstname" placeholder="John" class="form-control" />
                                    </div>
                                </div>
                                <!-- end col-4 -->
                                <!-- begin col-4 -->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Middle Initial</label>
                                        <input type="text" name="middle" placeholder="A" class="form-control" />
                                    </div>
                                </div>
                                <!-- end col-4 -->
                                <!-- begin col-4 -->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input type="text" name="lastname" placeholder="Smith" class="form-control" />
                                    </div>
                                </div>
                                <!-- end col-4 -->
                            </div>
                            <!-- end row -->
                        </fieldset>
                    </div>
                    <!-- end wizard step-1 -->
                    <!-- begin wizard step-2 -->
                    <div>
                        <fieldset>
                            <legend class="pull-left width-full">Product Details</legend>
                            <!-- begin row -->
                            <div class="row">
                                <!-- begin col-4 -->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input type="text" name="firstname" placeholder="John" class="form-control" />
                                    </div>
                                </div>
                                <!-- end col-4 -->
                                <!-- begin col-4 -->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Middle Initial</label>
                                        <input type="text" name="middle" placeholder="A" class="form-control" />
                                    </div>
                                </div>
                                <!-- end col-4 -->
                                <!-- begin col-4 -->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input type="text" name="lastname" placeholder="Smith" class="form-control" />
                                    </div>
                                </div>
                                <!-- end col-4 -->
                            </div>
                            <!-- end row -->
                        </fieldset>
                    </div>
                    <!-- end wizard step-2 -->
                </div>
                <div class="row">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="{{ $method }}">
                    <div class="col-md-8{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="customer_name" class="control-label">Customer</label>
                        <div class="">
                            <input id="customer_name" type="text" class="form-control" placeholder="type to select customer" name="name" value="{{ $row->name or old('name') }}" >
                            <input id="customer_id" type="hidden" class="form-control" name="customer_id" value="{{ $row->customer_id or old('customer_id') }}" >
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif

                        </div>
                    </div>

                    <div class="col-md-4{{ $errors->has('amount') ? ' has-error' : '' }}">
                        <label for="amount" class="control-label">Amount</label>
                        <div class="">
                            <input id="amount" type="text" class="form-control" name="amount" value="{{ $row->amount or old('amount') }}" >
                            @if ($errors->has('amount'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('amount') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-12{{ $errors->has('description') ? ' has-error' : '' }}">
                        <label for="description" class="control-label">Description</label>
                        <div class="">
                            <input id="description" type="text" class="form-control" name="description" value="{{ $row->description or old('description') }}" >
                            @if ($errors->has('description'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('description') }}</strong>
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

@push('css')
    <link href="{{ asset('js/jquery/ui/jquery-ui.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('js/bootstrap/wizard/bwizard.min.css') }}" rel="stylesheet" />
@endpush
@push('scripts')
    <script src="{{ asset('js/jquery/ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap/wizard/bwizard.min.js') }}"></script>
    <script type="text/javascript">
        var handleBootstrapWizards = function() {
            "use strict";
            $("#wizard").bwizard();
        };

        var FormWizard = function () {
            "use strict";
            return {
                //main function
                init: function () {
                    handleBootstrapWizards();
                }
            };
        }();

        FormWizard.init();

        $('#customer_name').autocomplete({
            autoFocus: true,
            minLength: 3,
            source: "{{ route('customer.autocomplete') }}",
            change: function (event, ui) {

            },
            select : function (event, ui) {
                console.log(ui);
                $("#customer_id").val(ui.item.id);
            }
        });

    </script>
@endpush