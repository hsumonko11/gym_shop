@extends('fronts.layouts.main')

@section('contact-active','active-menu')

@section('content')
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('fronts/photos/gym11.jpg');">
    <h2 class="ltext-105 cl0 txt-center">
        Contact
    </h2>
</section>


<!-- Content page -->
<section class="bg0 p-t-104 p-b-116">
    <div class="container">
        @include('admins.layouts.flash_message')
        <div class="flex-w flex-tr">


            <div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
                <form action="{{route('contact.store')}}" method="POST">
                    @csrf
                    <h4 class="mtext-105 cl2 txt-center p-b-30">
                        အကြံပြုစာပေးပို့ရန်
                    </h4>

                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" style="font-size: 15px" type="text" name="email" placeholder="သင့်အား ဆက်သွယ်လိုသော အီးမေးလ်ကိုသာ ထည့်သွင်းပေးပါရှင်">
                        <img class="how-pos4 pointer-none" src="{{asset('fronts/images/icons/icon-email.png')}}" alt="ICON">
                    </div>

                    <div class="bor8 m-b-30">
                        <textarea class="stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25" style="font-size: 18px" name="note" placeholder="အကြောင်းအရာ . . .?"></textarea>
                    </div>

                    <button type="submit" style="font-size: 18px" class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
                        ပေးပို့ရန်
                    </button>
                </form>
            </div>

            <div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
                <div class="flex-w w-full p-b-42">
                    <span class="fs-18 cl5 txt-center size-211">
                        <span class="lnr lnr-map-marker"></span>
                    </span>

                    <div class="size-212 p-t-2" style="font-size: 18px">
                        <span class="mtext-110 cl2" style="font-size: 18px">
                            ဆိုင်လိပ်စာ
                        </span>

                        <p class="stext-115 cl6 size-213 p-t-18" style="font-size: 18px">
                            Gym Accessories Shop <br>
                            အမှတ်(112) ၊ ဦးရွှေဒွေးလမ်း<br>
                            ရုံးကြီးရပ်ကွက်၊ ဟင်္သာတမြို့နယ်

                        </p>
                    </div>
                </div>

                <div class="flex-w w-full p-b-42" style="font-size: 18px">
                    <span class="fs-18 cl5 txt-center size-211">
                        <span class="lnr lnr-phone-handset"></span>
                    </span>

                    <div class="size-212 p-t-2">
                        <span class="mtext-110 cl2">
                            ဖုန်းဖြင့်ဆက်သွယ်လိုပါက
                        </span>

                        <p class="stext-115 cl1 size-213 p-t-18">
                            +959 785 966 572
                        </p>
                    </div>
                </div>

                <div class="flex-w w-full">
                    <span class="fs-18 cl5 txt-center size-211">
                        <span class="lnr lnr-envelope"></span>
                    </span>

                    <div class="size-212 p-t-2" style="font-size: 18px">
                        <span class="mtext-110 cl2" >
                            အီးမေးလ်
                        </span>

                        <p class="stext-115 cl1 size-213 p-t-18">
                            gymaccessoriesshop@gmail.com
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Map -->
<div class="map">
    <div class="size-303" id="google_map" data-map-x="40.691446" data-map-y="-73.886787" data-pin="images/icons/pin.png" data-scrollwhell="0" data-draggable="1" data-zoom="11"></div>
</div>
@endsection
