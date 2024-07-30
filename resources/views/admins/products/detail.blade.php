@extends('admins.layouts.main')

@section('product-active','active')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-sm-4">
                <h3 class="fw-bold mb-3">Detail Product</h3>
                <h6 class="op-7 mb-2"></h6>
            </div>

            <div class="col-sm-4 offset-sm-4 text-end">
                <a href="{{route('admin.products.index')}}"><button type="button" class="btn btn-md btn-danger">Back</button></a>
            </div>

        </div>


            <div class="card">
                <div class="card-body">
                    <div class="row">
                    <div class="col-sm-4 text-center">
                        <img src="{{asset('storage/products/'.$product->image)}}" style="width:100px;height:100px;" alt="">
                    </div>

                    <div class="col-sm-8" style="line-height: 50px;">
                        <div>
                            <span class="w-25 d-inline-block"><b>Name</b> </span> : {{$product->name}}
                        </div>
                        <div>
                            <span class="w-25 d-inline-block"><b>Category</b> </span> : {{$product->category != null ? $product->category->name : ''}}
                        </div>
                        <div>
                            <span class="w-25 d-inline-block"><b>Price</b> </span> : {{$product->price}}
                        </div>
                        <div>
                            <span class="w-25 d-inline-block"><b>Quantity</b> </span> : {{$product->quantity}}
                        </div>
                        <div>
                            <span class="w-25 d-inline-block"><b>Description</b> </span>
                            : <span>{{$product->description}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
  </div>
@endsection

@section('script')

@endsection
