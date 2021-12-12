@extends('layouts.master')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-6">
                <div class="card shadow px-3 py-3 mt-4">
                    <h3 class="text-center my-4">Add Product</h3>
                    <form action="{{ route('product.add') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="images">Image</label>
                                    <input type="file" name="images[]" id="images" class="form-control" multiple>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" class="form-control">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" name="description" id="description" cols="30" rows="5"></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Add">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
