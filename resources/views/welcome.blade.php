
@extends('layouts.master')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <form action="" method="GET" class="form-inline">

                            <input type="text" name="query" placeholder="search here..." class="form-control" />
                            <input type="submit" class="btn btn-sm btn-primary form-control" value="Search" />
                        </form>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('product.add') }}" class="btn btn-danger">Add Product</a>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                @foreach($products as $product)
                <div class="card">
                    @php
                        $images = json_decode($product->image);

                   // print_r($images);

                    @endphp

                    @foreach($images as $image)
                    <img src="{{ asset('assets/images/product') }}/{{ $image }}" style="width: 100px; height: 70px;" alt="">
                    @endforeach
                    <div class="card-body">
                        <h3>{{ $product->name }}</h3>
                        <p>{{ $product->description }}</p>

                        <a href="{{ route('product.edit',['id'=> $product->id ]) }}" class="btn btn-primary">Edit</a>

                        <form class="d-inline ml-3" action="{{ route('product.delete',['id'=> $product->id ]) }}" method="post">
                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>

                @endforeach
            </div>
        </div>
    </div>




@endsection
