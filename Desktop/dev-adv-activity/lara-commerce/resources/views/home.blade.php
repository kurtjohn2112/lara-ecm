@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <div class="container mt-3">
        <div class="d-flex align-items-center justify-content-between py-4 ">
                @if (session('added-to-cart'))
                <div class="alert alert-success alert-dismissible fade show w-100" role="alert">
                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                     <strong>Done!</strong> {{ session('added-to-cart') }}
                   </div>



                @endif
        </div>
        <div class="row justify-content-center">
            @foreach ($items as $item)
                <div class="col-3">
                    <div class="card my-2 shadow" style="height:450px">
                        <div class="card-header border-0 p-0">
                            @empty($item->images->first()->image)
                                <div class=" text-center ">
                                    <p class="small text-muted"> No preview available yet</p>
                                    <a href="">
                                        <img src="{{ asset('/storage/images/placeholder.png') }}" style="height: 270px;" class="card-img-top"
                                            alt="">
                                    </a>
                                </div>
                            @else
                                <a href="">
                                    <img src="{{ asset('/storage/images/' . $item->images->first()->image) }}"
                                        class="card-img-top" style="height: 305px" alt="">
                                </a>
                            @endempty



                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-auto fw-bold fs-5">{{ $item->name }}</div>
                                <div class="col text-end">
                                    <form action="{{ route('cart.store') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                        <input type="hidden" name="quantity" value="1">

                                        <button type="submit" class="btn">
                                            <i class="fas fa-cart-plus icon"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-auto">
                                    $ {{ $item->price }}
                                </div>
                                <div class="col text-end text-muted">
                                    {{ $item->stock }} pcs left
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endsection
