@extends('admins.layouts.main')

@section('product-active','active')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-sm-4">
                <h3 class="fw-bold mb-3">Edit Product</h3>
                <h6 class="op-7 mb-2"></h6>
            </div>

            <div class="col-sm-4 offset-sm-4 text-end">
                <a href="{{route('admin.products.index')}}"><button type="button" class="btn btn-md btn-danger">Back</button></a>
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
                    <form action="{{route('admin.products.update',$product->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div>
                            <label for="name">Name</label>

                            <input type="text" name="name" id="name" class="form-control" value="{{$product->name}}">

                            @error("name")
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mt-2">
                            <label for="category">Category</label>

                            <select name="category_id" id="category_id" class="form-control">
                                    <option>Select Category...</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}" @if($category->id == $product->category_id) selected @endif>{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mt-2">
                            <label for="price">Price</label>

                            <input type="number" name="price" id="price" step="any" class="form-control" value="{{$product->price}}">
                        </div>

                        <div class="mt-2">
                            <label for="description">Description</label>

                            <textarea name="description" id="description" cols="30" rows="1" class="form-control">{{$product->description}}</textarea>
                        </div>

                        <div class="mt-2">
                            <label for="image">Image</label>

                            <input type="file" name="image" id="image" class="form-control">
                        </div>

                        <div class="preview-image mt-2">
                            <img src="{{asset('storage/products/'.$product->image)}}" style="width:70px;height:70px;" alt="">
                        </div>

                        <button type="submit" class="btn btn-md btn-success mt-2 w-100">Update</button>
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
