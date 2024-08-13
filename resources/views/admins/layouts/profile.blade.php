@extends('admins.layouts.main')

@section('product-active','active')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-sm-4">
                <h3 class="fw-bold mb-3"> စီမံခန့်ခွဲသူ</h3>
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
                        </div><br>

                        <div>

                            <span class="d-inline-block"><b>အမည်</b> </span> : {{auth()->user()->name}}
                        </div><br>
                        <div>
                            <span class="d-inline-block"><b>အီးမေးလ်</b> </span> : {{auth()->user()->email}}
                        </div>


                    </div>
                </div>
            </div>

            <div class="col-sm-6" style="line-height: 50px;">
                <div class="card">
                    <div class="card-header" style="font-size: 20px">
                        @include('admins.layouts.flash_message')
                        ကိုယ်ရေးမှတ်တမ်း ပြောင်းလဲမည် ?
                    </div>
                    <div class="card-body">
                        <form action="{{route('admin.update_profile',$user->id)}}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="">အမည်</label>
                                <input type="text" name="name" class="form-control" value="{{auth()->user()->name}}" required>
                            </div>

                            <div class="form-group">
                                <label for="">အီးမေးလ်</label>
                                <input type="email" name="email" class="form-control" value="{{auth()->user()->email}}" required>
                            </div>

                            <div class="form-group">
                                <label for="">စကားဝှက်</label>
                                <input type="password" name="password" class="form-control" required>

                                @error("password")
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-success w-100">အတည်ပြုမည်</button>
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
