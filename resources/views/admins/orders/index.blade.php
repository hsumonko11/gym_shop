@extends('admins.layouts.main')

@section('order-active','active')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-sm-1">
                <h3 class="fw-bold mb-3">Orders</h3>
                <h6 class="op-7 mb-2">Total - {{$orders->total()}}</h6>
            </div>

            <div class="col-sm-6">
              
                <form action="{{route('admin.orders.index')}}" method="GET">
                    @csrf

                    <div class="input-group mb-3">
                        <span class="input-group-text">From</span>
                        <input type="date" class="form-control" name="from" value="{{request()->from}}" aria-label="Recipient's username" aria-describedby="basic-addon2">

                        <span class="input-group-text">To</span>
                        <input type="date" class="form-control" name="to" value="{{request()->to}}" aria-label="Recipient's username" aria-describedby="basic-addon2">

                        <div class="input-group-append">
                          <button type="submit" class="btn btn-md btn-success input-group-text" id="basic-addon2">Search</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-sm-3">
                <form action="{{route('admin.orders.index')}}" method="GET">
                    @csrf

                    <div class="input-group mb-3">
                        <input type="date" class="form-control" name="search" value="{{request()->search}}" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                          <button type="submit" class="btn btn-md btn-success input-group-text" id="basic-addon2">Search</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-sm-1">
            <a href="{{ route('admin.pdfview',['download'=>'pdf']) }}"><button type="button" class="btn btn-md btn-info mb-2">Download</button></a>  
            </div>

        </div>

      <div class="row">
        <div class="col-sm-12">
            @include('admins.layouts.flash_message')
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>Date</th>
                            <th>Voucher Code</th>
                            <th>Customer</th>
                            <th>Total Amount</th>
                            <th>Status</th>
                            <th>Action</th>
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
                                        <span class="badge badge-warning">Pending</span>
                                    @elseif($order->status == "Shipped")
                                        <span class="badge badge-info">Shipped</span>
                                    @elseif($order->status == "Delivered")
                                        <span class="badge badge-success">Delivered</span>
                                    @elseif($order->status == "Cancelled")
                                        <span class="badge badge-danger">Cancelled</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('admin.orders.show',$order->id)}}"><button type="button" class="btn btn-sm btn-info">Order Detail</button></a>
                                </td>

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
  </div>
@endsection
