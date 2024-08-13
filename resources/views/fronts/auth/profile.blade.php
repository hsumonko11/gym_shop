@extends('fronts.layouts.main')

@section('content')

<section class="bg0 p-t-62 p-b-60 mt-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-4">
                <div class="card card-shadow">
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

<div class="card card-shadow">
    <div class="card-header">
        ကိုယ်ရေးမှတ်တမ်း ပြောင်းလဲမည် ?
    </div>
    <div class="card-body">
        <form action="{{route('change_user_profile',auth()->user()->id)}}" method="POST">
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

            <div class="col-sm-8">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>ရက်စွဲ</th>
                                <th>ဘောင်ချာအမှတ်</th>
                                <th>အမည်</th>
                                <th>စုစုပေါင်းကျသင့်ငွေ</th>
                                <th>ကုန်ပစ္စည်းအခြေအနေ</th>
                                <!-- <th>Action</th> -->
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{date('j-M-Y',strtotime($order->created_at))}}</td>
                                    <td>{{$order->voucher_no}}</td>
                                    <td>{{$order->user != null ? $order->user->name : ''}}</td>
                                    <td>{{$order->total_amount}}</td>
                                    <td>
                                        @if($order->status == "Pending")
                                            <span class="badge badge-warning">ဆိုင်းငံ့ထားသည်</span>
                                        @elseif($order->status == "Shipped")
                                            <span class="badge badge-info">တင်ပို့ခဲ့သည်</span>
                                        @elseif($order->status == "Delivered")
                                            <span class="badge badge-success">ပေးပို့ခဲ့သည်</span>
                                        @elseif($order->status == "Cancelled")
                                            <span class="badge badge-danger">ပယ်ဖျက်ခဲ့သည်</span>
                                        @endif
                                    </td>
                                    <!-- <td>
                                        @if($order->payment_status == 'Unpaid')
                                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#unpaid{{$order->id}}">
                                            Unpaid
                                        </button>
                                        @else
                                            <span class="badge badge-success">Paid</span>
                                        @endif


                                        <div class="modal fade mt-5" id="unpaid{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="margin-top:150px !important;">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                        {{-- <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div> --}}
                                                        <div class="modal-body">
                                                            <form action="{{route('insert_payment_screenshot',$order->id)}}" method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('PUT')

                                                                <input type="hidden" name="payment_status" value="Paid" class="form-control">


                                                                <label for="">Insert Payment Screenshot</label>
                                                                <div class="form-group row">
                                                                    <div class="col-sm-6">
                                                                        <img src="{{asset('fronts/photos/qrcode.png')}}" alt="" class="w-100 h-100">
                                                                    </div>

                                                                    <div class="col-sm-6">
                                                                        <input type="file" name="payment_screenshot" class="form-control">
                                                                    </div>


                                                                </div>


                                                                <div class="float-right">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Paid</button>
                                                                </div>
                                                            </form>
                                                        </div>

                                                </div>
                                            </div>
                                        </div>
                                    </td> -->

                                </tr>
                            @endforeach
                        </tbody>
                    </table>


                </div>

                <div>
                    {{$orders->links()}}
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
