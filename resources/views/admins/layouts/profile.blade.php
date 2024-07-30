@extends('admins.layouts.main')

@section('product-active','active')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-sm-4">
                <h3 class="fw-bold mb-3">Profile</h3>
                <h6 class="op-7 mb-2"></h6>
            </div>

            <div class="col-sm-4 offset-sm-4 text-end">
                <a href="{{route('admin.dashboard')}}"><button type="button" class="btn btn-md btn-danger">Back</button></a>
            </div>

        </div>

        <div class="row">
            <div class="col-sm-4 offset-sm-1">
                <div class="card">
                    <div class="card-body text-center">

                        <div>
                            <img src="{{asset('assets/img/profile.png')}}" style="width:100px;height:100px;" alt="">
                        </div>

                        <div>

                            <span class="d-inline-block"><b>Name</b> </span> : {{auth()->user()->name}}
                        </div>
                        <div>
                            <span class="d-inline-block"><b>Email</b> </span> : {{auth()->user()->email}}
                        </div>


                    </div>
                </div>
            </div>

            <div class="col-sm-6" style="line-height: 50px;">
                <div class="card">
                    <div class="card-header">
                        @include('admins.layouts.flash_message')
                        Edit Profile
                    </div>
                    <div class="card-body">
                        <form action="{{route('admin.update_profile',$user->id)}}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control" value="{{auth()->user()->name}}" required>
                            </div>

                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" name="email" class="form-control" value="{{auth()->user()->email}}" required>
                            </div>

                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="password" class="form-control" required>

                                @error("password")
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-success w-100">Change</button>
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
