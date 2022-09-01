@extends('layouts.app')

@section('content')

    <!-- content -->
    <div class="container">

        <!-- message -->
        <div class="row">
            <div class="col-sm-12">
                @if (session('status'))
                    <div class="alert alert-info">
                        {{session('status')}}
                    </div>
            @endif
            </div>
        </div>
        <!-- /message -->

        <!-- product list table -->
        <div class="row">
            <div class="col-sm-12">
                <h3>Product List
                    <button type="button" class="btn btn-primary float-end" data-toggle="modal" data-target="#add">Add New</button>
                </h3>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>S/L</th>
                            <th>Product Name</th>
                            <th>Brand</th>
                            <th>Model</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $key=>$product)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td hidden class="ids">{{$product->id}}</td>
                                <td class="name">{{$product->name}}</td>
                                <td class="brand">{{$product->brand}}</td>
                                <td class="model">{{$product->model}}</td>
                                <td class="price">{{$product->price}}</td>
                                <td>
                                    <a href="{{url('/products/edit')}}/{{$product->id}}" class="edit"><button class="btn btn-warning">Edit</button></a>
                                    <a class="Delete" href="{{url('/products/delete')}}/{{$product->id}}}"><button class="btn btn-danger">Delete</button></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
        <!-- /product list table -->

    </div>
    <!-- /content -->

    <!-- product add modal -->
    <div class="modal" id="add">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Add New Product</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form method="post" action="{{route('products.save')}}">
                        @csrf
                        <label>Product Name <span class="text-danger">*</span></label>
                        <input name="name" type="text" class="form-control" required />
                        <label>Brand <span class="text-danger">*</span></label>
                        <input name="brand" type="text" class="form-control" required />
                        <label>Model <span class="text-danger">*</span></label>
                        <input name="model" type="text" class="form-control" required />
                        <label>Price <span class="text-danger">*</span></label>
                        <input name="price" type="number" class="form-control" required />
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Add Now</button>
                </div>
                </form>

            </div>
        </div>
    </div>
    <!-- /product add modal -->

@endsection
@section('script')

@endsection