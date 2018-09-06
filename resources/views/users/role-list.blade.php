@extends('layouts.app')

@section('title', 'Role List')

@section('content')
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">Home</a></li>
        <li class="active">Role List</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Role <small> list</small></h1>
    <!-- end page-header -->

    <div class="">
        <div class="row">
            <div class="col-xs-12">
                @php
                    $panel = [
                        'title' => 'Role List',
                        'icon' => 'list',
                        'btns'=> [
                            'add' => route('role.create'),
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
                        <td>Description</td>
                        <td>Action</td>
                        <td>Actions</td>
                    </tr>
                    </thead>
                    <tbody>
                    @php ($i = 1)
                    @foreach ($rows as $row)
                        <tr>
                            <td>{{ str_pad($i++,2, "0", STR_PAD_LEFT) }}</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->description }}</td>
                            <td>{{ $row->status ? 'Active' : 'Disabled' }}</td>
                            <td><a href="{{ route('role.edit', $row->id) }}"class="btn btn-xs btn-info"><i class="fa fa-edit"></i></a> <a href="{{ route('role.destroy', $row->id) }}" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @endPanel
            </div>
        </div>
    </div>
@endsection
