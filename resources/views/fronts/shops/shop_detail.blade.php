@extends('fronts.layouts.main')

@section('shop-active','active-menu')

@section('content')
<div class="bg0 m-t-80 p-b-140">
    <div class="container">
        <div class="flex-w flex-sb-m p-b-52">
            <div class="flex-w flex-l-m filter-tope-group m-tb-10">

            </div>

            <div class="flex-w flex-c-m m-tb-10">

                <a href="{{route('shop')}}">
                    <div class="flex-c-m stext-106 cl6 size-105 bor4 pointer m-tb-4 btn-danger text-white">
                        <i class="fa fa-hand-o-left" aria-hidden="true"></i>
                    </div>
                </a>
            </div>

        </div>

        <div class="row">
            <div class="col-sm-6">
            <div class="card card-shadow">
                <div class="card-body text-center my-5 shop-photo">

                    <img src="{{asset('storage/products/'.$product->image)}}" alt="IMG-PRODUCT" style="width: 200px;height:200px;margin:10px;">

                </div>
            </div>
        </div>


        <div class="col-sm-6 ">

                {{-- @include('admins.layouts.flash_message') --}}

            <form action="{{route('cart')}}" method="POST" style="font-size: 18px">
                @csrf

                <h4><b >{{$product->name}}</b></h4>

                <h5 class="mt-3"><i class="fa fa-gg mr-2" aria-hidden="true"></i>ကုန်ပစ္စည်းအမျိုးအစား - {{$product->category != null ? $product->category->name : ''}}</h5>

                <h5 class="mt-3"><i class="fa fa-gg mr-2" aria-hidden="true"></i>ဈေးနှုန်း - {{$product->price}}mmk</h5>

                <div class="flex-w flex-r-m p-b-10 mt-3">
                    <div class="size-204 flex-w flex-m respon6-next">
                        <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                            <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                <i class="fs-16 zmdi zmdi-minus"></i>
                            </div>

                            <input class="mtext-104 cl3 txt-center num-product" type="number" name="quantity" value="1" min="1">

                            <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                <i class="fs-16 zmdi zmdi-plus"></i>
                            </div>

                            <input type="hidden" name="product_id" value="{{$product->id}}">
                        </div>

                        <button type="submit" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
                            ဈေးခြင်းထဲထည့်ရန်
                        </button>
                    </div>
                </div>

                <h5 class="mt-3 lheight"><i class="fa fa-gg mr-2" aria-hidden="true"></i>ဖော်ပြချက် - {{$product->description}}</h5>
            </form>
        </div>
            {{-- @foreach($products as $product)
            <div class="card col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women m-3">

                <div class="block2">
                    <div class="block2-pic hov-img0">
                        <img src="{{asset('storage/products/'.$product->image)}}" alt="IMG-PRODUCT" style="width: 200px;height:200px;margin:10px;">

                    </div>

                    <div class="card-footer block2-txt flex-w flex-t p-t-14">
                        <div class="block2-txt-child1 flex-col-l ">
                            <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                {{$product->name}}
                            </a>

                            <span class="stext-105 cl3">
                                {{$product->price}} MMK
                            </span>
                        </div>

                        <div class="block2-txt-child2 flex-r p-t-3">
                            <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                <button type="button" class="btn btn-sm btn-primary">Detail</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach --}}


        </div>

        <!-- Load more -->
        {{-- <div class="flex-c-m flex-w w-full p-t-45">
            <a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
                {{$products->links()}}
            </a>
        </div> --}}
    </div>
</div>
@endsection
