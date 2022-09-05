@extends('layouts.app')

@section('admin-content')
    <div class="card mx-auto shadow bg-white w-75">
        <div class="card-body">
            <form action="{{ route('items.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label text-muted small">Item name</label>
                    <input type="text" name="name" placeholder="Item name" id="" class="form-control">
                    <div class="form-text"></div>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label text-muted small">Item price</label>
                    <input type="text" name="price" placeholder="Item price" id="" class="form-control">
                    <div class="form-text"></div>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label text-muted small">Item Description</label>
                    <textarea name="description" id=""  rows="3" class="form-control" placeholder="Item description"></textarea>
                    <div class="form-text"></div>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label text-muted small">Item stock</label>
                    <input type="number" name="stock" placeholder="Item stock" id="" class="form-control">
                    <div class="form-text"></div>
                </div>

                <button type="submit" class="px-5 btn btn-success">Save item</button>
            </form>
        </div>
    </div>
@endsection
