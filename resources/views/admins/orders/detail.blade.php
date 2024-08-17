@extends('admins.layouts.main')

@section('order-active','active')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-sm-4">
                <h3 class="fw-bold mb-3">မှာယူမှုအသေးစိတ်</h3>
                <h6 class="op-7 mb-2" style=" font-size: 20px">မှာယူသော အရေအတွက် - {{count($order_details)}}</h6>
            </div>

            <div class="col-sm-4 offset-sm-4">
               <div class="float-end">
                    <a href="{{route('admin.orders.index')}}"><button type="button" class="btn btn-md btn-info mb-2">Back</button></a>
               </div>

            </div>

        </div>

      <div class="row">
        <div class="col-sm-8">
            @include('admins.layouts.flash_message')
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>ကုန်ပစ္စည်း</th>
                            <th>အရေအတွက်</th>
                            <th>ဈေးနှုန်း</th>
                            {{-- <th>Action</th> --}}
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($order_details as $order_detail)
                            <tr>
                                <td>{{$order_detail->product != null ? $order_detail->product->name : ''}}</td>
                                <td>{{$order_detail->quantity}}</td>
                                <td>{{$order_detail->price}} MMK</td>
                               {{-- <td>
                                    <a href="{{route('admin.orders.show',$order->id)}}"><button type="button" class="btn btn-sm btn-info">Order Detail</button></a>
                               </td> --}}

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>

        <div class="col-sm-4">
            <div class="card">
                <div class="card-header">
                    <!-- <p class="m-0"  style=" font-size: 16px" ><i class="fab fa-gg"></i> ဝယ်ယူသူအမည် - {{$order->user != null ? $order->user->name : ''}}</p>
                    <p class="m-0" style=" font-size: 16px"><i class="fab fa-gg"></i> ဖုန်းနံပါတ် - {{$order->customer != null ? $order->customer->phone : ''}}</p>
                    <p class="m-0" style=" font-size: 16px"><i class="fab fa-gg"></i> လိပ်စာ - {{$order->customer != null ? $order->customer->address : ''}}</p> -->

                    <p class="m-0"  style=" font-size: 16px" ><i class="fab fa-gg"></i> ဝယ်ယူသူအမည် - {{$customer->name}}</p>
                    <p class="m-0" style=" font-size: 16px"><i class="fab fa-gg"></i> ဖုန်းနံပါတ် - {{$customer->phone}}</p>
                    <p class="m-0" style=" font-size: 16px"><i class="fab fa-gg"></i> လိပ်စာ - {{$customer->address}}</p>
                    <p class="m-0" style=" font-size: 16px"><i class="fab fa-gg"></i>  ငွေပေးချေမှု - {{$order->payment_status}}
                        @if($order->payment_status == "Paid")
                        <button type="button" class="btn btn-default text-primary" style=" font-size: 16px" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            ငွေလွှဲပြေစာ
                        </button>
                        @endif
                    </p>

                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <img src="{{asset('storage/payment_screenshots/'.$order->payment_screenshot)}}" alt="" class="w-100 h-75">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body text-center">
                    <h5 class="text-primary"><b>မှာယူမှုအခြေအနေ</b></h5>
                    <form action="{{route('admin.orders.update',$order->id)}}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <input type="radio" name="status" id="pending" value="Pending" @if("Pending" == $order->status) checked @endif>
                            <label for="pending">ဆိုင်းငံ့ထားသည်</label>
                        </div>

                        <div class="form-group">
                            <input type="radio" name="status" id="shipped" value="Shipped" @if("Shipped" == $order->status) checked @endif>
                            <label for="shipped">ပေးပို့နေသည်</label>
                        </div>

                        <div class="form-group">
                            <input type="radio" name="status" id="delivered" value="Delivered" @if("Delivered" == $order->status) checked @endif>
                            <label for="delivered"> ပေးပို့ပြီး</label>
                        </div>

                        <div class="form-group">
                            <input type="radio" name="status" id="cancelled" value="Cancelled" @if("Cancelled" == $order->status) checked @endif>
                            <label for="cancelled">ပယ်ဖျက်လိုက်သည်</label>
                        </div>

                        <button type="submit" class="btn btn-md btn-outline-success w-100">Change</button>

                    </form>
                </div>

            </div>
        </div>


      </div>


    </div>
  </div>
@endsection
