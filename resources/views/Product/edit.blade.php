@extends('layouts.app')

@section('content')

    <!-- content -->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <!-- message -->
                @if (session('status'))
                    <div class="alert alert-info">
                        {{session('status')}}
                    </div>
            @endif
            <!-- /message -->
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h3>
                    Update Product Info
                    <button type="button" class="btn btn-light float-end"><a href="{{route('products.show')}}">All Products</a></button>
                </h3>
                <form method="post" action="{{route('products.update')}}">
                    @csrf
                    <input hidden name="id" type="text" value="{{$product->id}}" class="form-control" required />
                    <label>Product Name <span class="text-danger">*</span></label>
                    <input name="name" type="text" value="{{$product->name}}" class="form-control" required />
                    <label>Brand <span class="text-danger">*</span></label>
                    <input name="brand" type="text" value="{{$product->brand}}" class="form-control" required />
                    <label>Model <span class="text-danger">*</span></label>
                    <input name="model" type="text" value="{{$product->model}}" class="form-control" required />
                    <label>Price <span class="text-danger">*</span></label>
                    <input name="price" type="number" value="{{$product->price}}" class="form-control" required />

                    <button type="submit" class="btn btn-success mt-3">Update Now</button>
                </form>
            </div>
        </div>
    </div>
    <!-- /content -->
@endsection