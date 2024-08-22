@extends('admins.layouts.main')

@section('supplier-product-active','active')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-sm-4">
                <h3 class="fw-bold mb-3">ကုန်ပစ္စည်းတင်သွင်းမှု</h3>
                <h6 class="op-7 mb-2"></h6>
            </div>

            <div class="col-sm-4 offset-sm-4 text-end">
                <a href="{{route('admin.supplier_products.index')}}"><button type="button" class="btn btn-md btn-danger">Back</button></a>
            </div>

        </div>

      <div class="row">

        <div class="col-sm-12">
            @include('admins.layouts.flash_message')
            <div class="card">
                {{-- <div class="card-header">
                    Create
                </div> --}}
                <div class="card-body">
                    <form action="{{route('admin.supplier_products.update',$supplier_product->id)}}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mt-2">
                            <label for="supplier_id">ကုမ္ပဏီအမည်</label>

                            <select name="supplier_id" id="supplier_id" class="form-control">
                                    <option>Select Supplier...</option>
                                @foreach($suppliers as $supplier)
                                    <option value="{{$supplier->id}}" @if($supplier->id == $supplier_product->supplier_id) selected @endif>{{$supplier->name}}</option>
                                @endforeach
                            </select>

                            @error("supplier_id")
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mt-2">
                            <label for="product_id">ကုန်ပစ္စည်း</label>

                            <select name="product_id" id="product_id" class="form-control">
                                    <option>Select Product...</option>
                                @foreach($products as $product)
                                    <option value="{{$product->id}}" @if($product->id == $supplier_product->product_id) selected @endif>{{$product->name}}</option>
                                @endforeach
                            </select>

                            @error("product_id")
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- <div class="mt-2">
                            <label for="quantity">Quantity</label>

                            <input type="number" name="quantity" id="quantity" class="form-control" value="{{$supplier_product->quantity}}">
                        </div> --}}





                        <div class="mt-2">
                            <label for="price">price</label>

                            <input type="number" name="price" id="price" step="any" class="form-control" value="{{$supplier_product->original_price}}">
                        </div>

                        <div class="mt-2">
                            <label for="last_supplied_date">ငွေသွင်းရမည့်နေ့</label>

                            <input type="date" name="last_supplied_date" id="last_supplied_date" class="form-control" value="{{$supplier_product->last_supplied_date}}">
                        </div>

                        <button type="submit" class="btn btn-md btn-success mt-2 w-100" style=" font-size: 16px">ပြင်ဆင်မည်</button>
                    </form>
                </div>
            </div>
        </div>

      </div>


    </div>
  </div>
@endsection

@section('script')

@endsection
