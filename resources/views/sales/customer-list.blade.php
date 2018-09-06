@extends('layouts.app')

@section('title', 'Customer List')

@section('content')
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">Home</a></li>
        <li class="active">Customer List</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Customer <small> list</small></h1>
    <!-- end page-header -->

    <div class="row">
        <div class="col-xs-12">
            @php
                $panel = [
                    'title' => 'Customer List',
                    'icon' => 'list',
                    'btns'=> [
                        'add' => route('customer.create'),
                        'delete' => false,
                        'expand' => true,
                    ]
                ];
            @endphp
            @panel($panel)
            <table class="table table-bordered table-responsive table-list">
                <thead>
                <tr>
                    <td>#</td>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Phone</td>
                    <td>Address</td>
                    <td>Actions</td>
                </tr>
                </thead>
                <tbody>
                @php ($i = 1)
                @foreach ($rows as $row)
                    <tr>
                        <td>{{ str_pad($i++,2, "0", STR_PAD_LEFT) }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->email }}</td>
                        <td>{{ $row->phone }}</td>
                        <td>{{ $row->address }}</td>
                        <td>
                            {!! edit(route('customer.edit', $row->id)) !!}
                            {!! delete(route('customer.destroy', $row->id)) !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
                {{ $rows->links() }}
            @endPanel
        </div>
    </div>
@endsection