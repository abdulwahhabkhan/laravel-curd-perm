@extends('layouts.app')

@section('title', 'Sale List')

@section('content')
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">Home</a></li>
        <li class="active">Sale List</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Sale <small> list</small></h1>
    <!-- end page-header -->

    <div class="row">
        <div class="col-xs-12">
            @php
                $panel = [
                    'title' => 'Sale List',
                    'icon' => 'list',
                    'btns'=> [
                        'add' => route('sale.create'),
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
                    <td>Customer</td>
                    <td>Description</td>
                    <td>Date</td>
                    <td>Amount</td>
                    <td>Actions</td>
                </tr>
                </thead>
                <tbody>
                @php ($i = 1)
                @foreach ($rows as $row)
                    <tr>
                        <td>{{ str_pad($i++,2, "0", STR_PAD_LEFT) }}</td>
                        <td>{{ $row->customer->name }}</td>
                        <td>{{ $row->description }}</td>
                        <td>{{ $row->created_at }}</td>
                        <td class="text-right">{{ number_format($row->amount, 2) }}</td>
                        <td>
                            {!! edit(route('sale.edit', $row->id)) !!}
                            {!! delete(route('sale.destroy', $row->id)) !!}
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