@extends('fronts.layouts.main')

@section('shop-active','active-menu')

@section('content')

	<div class="container p-t-75">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Shoping Cart

                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>

                Checkout
			</span>
		</div>
	</div>


	<!-- Shoping Cart -->

		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart card-shadow">
							<table class="table-shopping-cart">
								<thead>
                                    <tr class="table_head">
                                        <th class="column-1">Product</th>
                                        <th class="column-2"></th>
                                        <th class="column-3">Price</th>
                                        <th class="column-4">Quantity</th>
                                        <th class="column-5">Total</th>
                                    </tr>
                                </thead>


								<tbody>
                                    @foreach($order_details as $order_detail)
                                    <tr class="table_row">
                                        <td class="column-1">
                                            <img src="{{asset('storage/products/'.$order_detail->product->image)}}" alt="IMG" style="widht:100px;height:100px;">
                                        </td>
                                        <td class="column-2">{{$order_detail->product->name}}</td>
                                        <td class="column-3 price">{{$order_detail->product->price}} MMK</td>
                                        <td class="column-4">
                                            <span class="badge badge-secondary p-2">{{$order_detail->quantity}}</span>
                                        </td>
                                        <td class="column-5 total">{{$order_detail->price}} MMK</td>
                                    </tr>
                                    @endforeach

                                    <tr>
                                        <td colspan="4" class="text-right py-3">Grand Total :</td>
                                        <td class="text-center">{{$order->total_amount}} MMK</td>
                                    </tr>
                                </tbody>

							</table>
						</div>

					</div>
				</div>

				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm card-shadow">
						<p class="text-info mb-2"><b>Please, fill the customer information.</b></p>

                        <p class="d-inline">Voucher No : </p><span class="text-primary mb-2"><b>{{$order->voucher_no}}</b></span>

						<form action="{{route('customer_information')}}" method="POST">
                            @csrf

                            <input type="hidden" name="user_id" value="{{auth()->user()->id}}">

                            <input type="hidden" name="order_id" value="{{$order->id}}">

                            <div class="form-group">
                                <label for="">Name</label>

                                <input type="text" name="username" class="form-control" placeholder="Enter customer name..." required>

                                @error("username")
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Phone</label>

                                <input type="text" name="phone" class="form-control" placeholder="Enter phone no..." required>

                                @error("phone")
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Address</label>

                                <textarea name="address" id="address" cols="30" rows="1" class="form-control" placeholder="Ender address..." required></textarea>

                                @error("address")
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-success w-100">Order</button>

                        </form>
					</div>
				</div>
			</div>
		</div>



	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>

@endsection

@section('script')
    <script>
        $(document).ready(function(){

        })
    </script>
@endsection
