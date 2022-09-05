@extends('layouts.app')

@section('admin-content')
    <table class="table table-sm table-bordered table-striped">
        <thead>
            <th>Unique ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Description</th>
            <th>Stock</th>
        </thead>
        <tbody>
            @foreach ($items as $item)
                <tr>
                    <td><a href="{{ route('items.show',$item) }}" class="text-decoration-none">{{ $item->uuid }} <i class="fas fa-search float-end me-2"></i> </a></td>
                    <td>{{ $item->name }}</td>
                    <td>$ {{number_format( $item->price) }}</td>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->stock }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
