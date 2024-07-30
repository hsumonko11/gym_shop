@extends('admins.layouts.main')

@section('supplier-product-active','active')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-sm-4">
                <h3 class="fw-bold mb-3">Create Supplier Product</h3>
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
                    <form action="{{route('admin.supplier_products.store')}}" method="POST">
                        @csrf

                        <div class="mt-2">
                            <label for="supplier_id">Supplier</label>

                            <select name="supplier_id" id="supplier_id" class="form-control">
                                    <option>Select Supplier...</option>
                                @foreach($suppliers as $supplier)
                                    <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                                @endforeach
                            </select>

                            @error("supplier_id")
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mt-2">
                            <label for="product_id">Product</label>

                            <select name="product_id" id="product_id" class="form-control">
                                    <option>Select Product...</option>
                                @foreach($products as $product)
                                    <option value="{{$product->id}}">{{$product->name}}</option>
                                @endforeach
                            </select>

                            @error("product_id")
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mt-2">
                            <label for="quantity">Quantity</label>

                            <input type="number" name="quantity" id="quantity" class="form-control">
                        </div>

                        <div class="mt-2">
                            <label for="price">Price</label>

                            <input type="number" name="price" id="price" step="any" class="form-control">
                        </div>

                        <div class="mt-2">
                            <label for="last_supplied_date">Last Supplied Date</label>

                            <input type="date" name="last_supplied_date" id="last_supplied_date" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-md btn-success mt-2 w-100">Submit</button>
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
