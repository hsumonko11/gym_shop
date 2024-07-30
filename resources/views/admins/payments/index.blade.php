@extends('admins.layouts.main')

@section('payment-active','active')

@section('content')
{{-- <div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-sm-4">
                <h3 class="fw-bold mb-3">Payments</h3>
                <h6 class="op-7 mb-2">Total - {{$payments->total()}}</h6>
            </div>

            <div class="col-sm-4 offset-sm-4">
               <div class="float-end">

               </div>
                <form action="{{route('admin.payments.index')}}" method="GET">
                    @csrf

                    <div class="input-group mb-3">
                        <input type="date" class="form-control" name="search" value="{{request()->search}}" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                          <button type="submit" class="btn btn-md btn-success input-group-text" id="basic-addon2">Search</button>
                        </div>
                    </div>
                </form>
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
                            <th>Order</th>
                            <th>Amount</th>
                            <th>Payment Method</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($payments as $payment)
                            <tr>
                                <td>{{date('j-M-Y',strtotime($payment->created_at))}}</td>
                                <td>{{$payment->order_id}}</td>
                                <td>{{$payment->amount}}</td>
                                <td>{{$payment->payment_method}}</td>
                                <td>{{$payment->status}}</td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>


            </div>

            <div>
                {{$payments->links()}}
            </div>
        </div>


      </div>


    </div>
</div> --}}
<div class="container">
    <div class="row">
        <div class="col-sm-12" style="display: flex;height:70vh;align-items:center;justify-content: center;">
           <h1>Coming Soon!</h1>
        </div>
    </div>
</div>
@endsection
