@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="pull-right">
                            <a href="{{ route('group.create') }}" class="btn btn-sm btn-success">Add Group</a>
                        </div>
                        <h3 class="panel-title">Group List</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered table-responsive">
                    <thead>
                    <tr>
                        <td>#</td>
                        <td>Name</td>
                        <td>Description</td>
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
                            <td><a href="{{ route('group.edit', $row->id) }}">Edit</a> | <a href="{{ route('group.destroy', $row->id) }}">Delete</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
