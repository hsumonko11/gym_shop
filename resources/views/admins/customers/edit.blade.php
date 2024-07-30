@extends('admins.layouts.main')

@section('customer-active','active')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-sm-4">
                <h3 class="fw-bold mb-3">Edit Customer</h3>
                <h6 class="op-7 mb-2"></h6>
            </div>

            <div class="col-sm-4 offset-sm-4 text-end">
                <a href="{{route('admin.customers.index')}}"><button type="button" class="btn btn-md btn-danger">Back</button></a>
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
                    <form action="{{route('admin.customers.update',$customer->id)}}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="">Name</label>

                            <input type="text" name="username" class="form-control" placeholder="Enter customer name..." required value="{{$customer->username}}">

                            @error("username")
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Phone</label>

                            <input type="text" name="phone" class="form-control" value="{{$customer->phone}}" placeholder="Enter phone no..." required>

                            @error("phone")
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Address</label>

                            <textarea name="address" id="address" cols="30" rows="1" class="form-control" placeholder="Ender address..." required>{{$customer->address}}</textarea>

                            @error("address")
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-md btn-success w-100">Update</button>
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
