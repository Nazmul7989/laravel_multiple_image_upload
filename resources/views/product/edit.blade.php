@extends('layouts.master')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-6">
                <div class="card shadow px-3 py-3 mt-4">
                    <h3 class="text-center my-4">Add Product</h3>
                    <form action="{{ route('product.update',['id'=> $product->id ]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="images">Image</label>
                                    <input type="file" name="images[]" value="{{ $product->image }}" id="images" class="form-control" multiple>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" value="{{ $product->name }}" id="name" class="form-control">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" name="description" id="description" cols="30" rows="5">
                                        {{ $product->description }}
                                    </textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Update">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
