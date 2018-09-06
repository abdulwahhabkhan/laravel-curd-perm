@extends('layouts.app')

@section('title', 'Users List')

@section('content')
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">Home</a></li>
        <li class="active">User List</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Users <small> list</small></h1>
    <!-- end page-header -->
    <div class="">
        <div class="row">
            <div class="col-xs-12">
                @php
                $panel = [
                    'title' => 'User List',
                    'icon' => 'list',
                    'btns'=> [
                        'add' => route('user.create'),
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
                        <td>Role</td>
                        <td>Status</td>
                        <td>Actions</td>
                    </tr>
                    </thead>
                    <tbody>
                    @php ($i = 1)
                    @foreach ($rows as $row)
                        <?php  //pr($row); ?>
                        <tr>
                            <td>{{ str_pad($i++,2, "0", STR_PAD_LEFT) }}</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->email }}</td>
                            <td>{{ $row->role_name }}</td>
                            <td>{{ 1 == 1 ? 'Active':'Disabled' }}</td>
                            <td><a href="{{ route('user.edit', $row->id) }}" class="btn btn-xs btn-info"><i class="fa fa-edit"></i></a> <a href="{{ route('user.destroy', $row->id) }}" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                    {{ $rows->links() }}
                @endPanel

            </div>
        </div>
    </div>
@endsection
