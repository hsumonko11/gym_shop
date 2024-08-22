@extends('fronts.layouts.main')

@section('shop-active','active-menu')

@section('content')
     <!-- Cart -->
     <div class="wrap-header-cart js-panel-cart">
          <div class="s-full js-hide-cart"></div>

          <div class="header-cart flex-col-l p-l-65 p-r-25">
               <div class="header-cart-title flex-w flex-sb-m p-b-8">
                    <span class="mtext-103 cl2">
                         Your Cart
                    </span>

                    <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
                         <i class="zmdi zmdi-close"></i>
                    </div>
               </div>

               <div class="header-cart-content flex-w js-pscroll">
                    <ul class="header-cart-wrapitem w-full">
                         <li class="header-cart-item flex-w flex-t m-b-12">
                              <div class="header-cart-item-img">
                                   <img src="images/item-cart-01.jpg" alt="IMG">
                              </div>

                              <div class="header-cart-item-txt p-t-8">
                                   <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                                        White Shirt Pleat
                                   </a>

                                   <span class="header-cart-item-info">
                                        1 x $19.00
                                   </span>
                              </div>
                         </li>

                         <li class="header-cart-item flex-w flex-t m-b-12">
                              <div class="header-cart-item-img">
                                   <img src="images/item-cart-02.jpg" alt="IMG">
                              </div>

                              <div class="header-cart-item-txt p-t-8">
                                   <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                                        Converse All Star
                                   </a>

                                   <span class="header-cart-item-info">
                                        1 x $39.00
                                   </span>
                              </div>
                         </li>

                         <li class="header-cart-item flex-w flex-t m-b-12">
                              <div class="header-cart-item-img">
                                   <img src="images/item-cart-03.jpg" alt="IMG">
                              </div>

                              <div class="header-cart-item-txt p-t-8">
                                   <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                                        Nixon Porter Leather
                                   </a>

                                   <span class="header-cart-item-info">
                                        1 x $17.00
                                   </span>
                              </div>
                         </li>
                    </ul>

                    <div class="w-full">
                         <div class="header-cart-total w-full p-tb-40">
                              Total: $75.00
                         </div>

                         <div class="header-cart-buttons flex-w w-full">
                              <a href="shoping-cart.html" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
                                   View Cart
                              </a>

                              <a href="shoping-cart.html" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
                                   Check Out
                              </a>
                         </div>
                    </div>
               </div>
          </div>
     </div>

     <!-- breadcrumb -->
     <div class="container p-t-75">
          <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
               <a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
                    Home
                    <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
               </a>

               <span class="stext-109 cl4">
                    Shoping Cart
               </span>
          </div>
     </div>

     <!-- Shoping Cart Form -->
     <form class="bg0 p-t-25 p-b-85">
          <div class="container">
               <div class="row">
                    <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                         <div class="m-l-25 m-r--38 m-lr-0-xl">
                              <div class="wrap-table-shopping-cart card-shadow">
                                   <table class="table-shopping-cart">
                                        <thead>
                                            <tr class="table_head">
                                                <th class="column-1" style="font-size: 20px;">ကုန်ပစ္စည်း</th>
                                                <th class="column-2" style="font-size: 20px;"></th>
                                                <th class="column-3" style="font-size: 20px;">ဈေးနှုန်း</th>
                                                <th class="column-4" style="font-size: 20px;">အရေအတွက်</th>
                                                <th class="column-5" style="font-size: 20px;">ကျသင့်ငွေ</th>
                                                <th class="p-2" style="font-size: 20px;">လုပ်ဆောင်ချက်</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($carts as $cart)
                                            <tr class="table_row">
                                                <td class="column-1">
                                                    <img src="{{asset('storage/products/'.$cart->product->image)}}" alt="IMG" style="width:100px;height:100px;">
                                                </td>
                                                <td class="column-2">{{$cart->product->name}}</td>
                                                <td class="column-3 price">{{$cart->product->price}} MMK</td>
                                                <td class="column-4 quantity">{{$cart->quantity}}</td>
                                                <td class="column-5 total">{{$cart->product->price * $cart->quantity}}</td>
                                                <td>
                                                    <button type="button" class="btn btn-md btn-outline-danger remove-cart" data-route="{{route('remove_cart', $cart->id)}}"><i class="fa fa-trash"></i></button>
                                                    <input type="hidden" name="cart_id" class="cart-id" value="{{$cart->id}}">
                                                    <input type="hidden" name="quantity" class="cart-quantity" value="{{$cart->quantity}}">
                                                    <input type="hidden" name="product_id" class="product-id" value="{{$cart->product_id}}">
                                                    <input type="hidden" name="user_id" class="user-id" value="{{auth()->user()->id}}">
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                   </table>
                              </div>
                         </div>
                    </div>

                    <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                         <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm card-shadow">
                              <h4 class="mtext-109 cl2 p-b-30">
                                <p class="stext-110 cl2" style="font-size: 20px;">
                                    ဂိတ်ချခ = 1000mmk <br> စုစုပေါင်းကျသင့်ငွေ = <span class="mtext-110 cl2 grand-total">

                                    </span>

                                </p>
                              </h4>

                              <div class="flex-w flex-t bor12 p-b-13">
                                   {{-- <div class="size-208">



                                    <p class="stext-110 cl2" style="font-size: 15px;">
                                        ဂိတ်ချခ = 1000 <br> စုစုပေါင်းကျသင့်ငွေ = <span class="mtext-110 cl2 grand-total">

                                        </span>

                                    </p>
                                    <div class="size-209">
                                        <span class="mtext-110 cl2 grand-total">

                                        </span>
                                   </div>

                                   </div> --}}
                                   {{-- <div class="size-209">
                                        <span class="mtext-110 cl2 grand-total">

                                        </span>
                                   </div> --}}
                              </div>

                              <button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer checkout">
                                   မှာယူမည်
                              </button>
                         </div>
                    </div>
               </div>
          </div>
     </form>

     <!-- Back to top -->
     <div class="btn-back-to-top" id="myBtn">
          <span class="symbol-btn-back-to-top">
               <i class="zmdi zmdi-chevron-up"></i>
          </span>
     </div>

@endsection

@section('script')
    <script>
        $(document).ready(function() {
            grandTotal();

            $('.quantity-sign').on("click", function(e) {
                e.preventDefault();

                var trparent = $(this).parents('tr');
                var price = Number(trparent.find('.price').text().replace("MMK", ""));
                var quantity = Number(trparent.find('.quantity').val());
                var total = price * quantity;

                trparent.find('.total').text(total);
                grandTotal();
            });

            $('.remove-cart').on("click", function(e) {
                e.preventDefault();

                var trparent = $(this).parents('tr');
                var cart_id = trparent.find('.cart-id').val();

                $.ajax({
                    url: $(this).data('route'),
                    data: {
                        id: cart_id,
                        _token: $('meta[name="csrf-token"]').attr('content'),
                    },
                    method: "DELETE",
                    success: function(response) {
                        if (response.message == 'success') {
                            swal("Done!", response.message, "success");
                            setTimeout(function() {
                                window.location.reload();
                            }, 2000);
                        }
                    }
                });
            });

            $('.checkout').on('click', function(e) {
                e.preventDefault();

                var orderList = [];
                var grandTotal = $('.grand-total').text().replace("MMK", "");
                var userId = $('.user-id').val();

                $('.table-shopping-cart tbody tr').each(function(index, row) {
                    var productId = $(row).find('.product-id').val();
                    var quantity = $(row).find('.cart-quantity').val();
                    var cartId = $(row).find('.cart-id').val();
                    var total = $(row).find('.total').text();
                    orderList.push({
                        'product_id': productId,
                        'cart_id': cartId,
                        'quantity': quantity,
                        'total': total,
                    });
                });

                $.ajax({
                    url: "{{route('order')}}",
                    method: 'POST',
                    data: {
                        'order_list': orderList,
                        'grand_total': grandTotal,
                        'user_id': userId,
                        _token: $('meta[name="csrf-token"]').attr('content'),
                    },
                    success: function(res) {
                        var orderId = res.order_id;
                        window.location.href = "{{url('checkout')}}/" + orderId;
                    }
                });
            });

            function grandTotal() {
                var grandTotal = 0;

                $('.table-shopping-cart tbody tr').each(function(index, row) {
                    var total = Number($(row).find('.total').text().replace("MMK", ""));
                    grandTotal += total;
                });

                // Add 1000 MMK to the calculated grand total
                grandTotal += 1000;

                $('.grand-total').text(grandTotal + " MMK");
            }
        });
    </script>
@endsection
