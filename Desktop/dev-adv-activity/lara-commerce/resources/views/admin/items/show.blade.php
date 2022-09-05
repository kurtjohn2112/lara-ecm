@extends('layouts.app')

@section('admin-content')
    <div class="container">
        <div class="row">
            <div class="col ">
                <form action="{{ route('image.upload', $item->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="image" id="" class="form-control mt-5">
                    <button type="submit" class="btn btn-success px-5 mt-3">Upload</button>

                </form>
            </div>
            <div class="col-8 m-0">
                <div class="card border mt-5">
                    <div class="card-body">
                        <table class="table table-sm table-bordered">
                            <thead>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Description</th>
                                <th>total price</th>

                            </thead>
                            <tbody>
                                <td>{{ $item->name }}</td>
                                <td>{{ number_format($item->price) }}</td>
                                <td>{{ $item->stock }}</td>
                                <td><p class="text-truncate" style="max-width: 150px;">{{ $item->description }}</p></td>
                                <td>$ {{ number_format($item->price * $item->stock) }}</td>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            @foreach ($item->images as $image)
                <div class="col-2 my-2">
                    <img src="{{  asset('/storage/images/'.$image->image) }}" style="height: 150px; width:150px" class="img-thumbnail" alt="">
                </div>
            @endforeach
        </div>
    </div>
@endsection
