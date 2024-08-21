@extends('fronts.layouts.main')

@section('bmi-active','active-menu')

@section('content')
<section class="bg-img1 txt-center" style="background-image: url('fronts/photos/math.jpg');width:100%;height:700px;">

    <div class="container" style="opacity: 0.9">
        <div class="d-flex justify-content-center my-5">
            <div class="col-sm-6 mt-5">
                <div class="card mt-3">
                    <div class="card-header" style="background-color: #add8e6; padding: 10px; border-radius: 10px 10px 0 0;">
                        <h2 style="font-size: 22px; margin: 0; color: #333;">BMI (Body Mass Index)</h2>
                    </div>
                    <div class="card-body" style="padding: 15px;">
                        <p style="font-size: 18px; color: #333;">
                            <strong>BMI (Body Mass Index) ဆိုတာ ကိုယ်ခန္ဓာ ထုထည် ညွှန်းကိန်း ဖြစ်ပါတယ်။</strong><br>
                            <strong>အရွယ်ရောက်ပြီးလူတစ်ဦးရဲ့ ကိုယ်အလေးချိန်နှင့် အရပ်အမြင့်ပေါ်မူတည်ပြီး ခန္ဓာကိုယ်ထုထည်ပမာဏ ကို တွက်ချက်တာပါ BMI တန်ဖိုး</strong>
                        </p>
                        <ul style="font-size: 18px; color: #333; line-height: 1.6;">
                            <li><strong>၁၈.၅ အောက်</strong> - ပိန်သော ကိုယ်အလေးချိန် (Underweight)</li>
                            <li><strong>၁၈.၅ နှင့် ၂၄.၉ ကြား</strong> - ပုံမှန်ကိုယ်အလေးချိန် (Normal weight)</li>
                            <li><strong>၂၅ နှင့် ၂၉.၉ ကြား</strong> - ပုံမှန်ထက် ပိုနေသော ကိုယ်အလေးချိန် (Overweight)</li>
                            <li><strong>၃၀ နှင့် အထက်</strong> - အဝလွန်နေသော ကိုယ်အလေးချိန် (Obesity)</li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <p style="font-size: 18px; color: blue; font-weight: bold;">မိမိရဲ့ BMI ကို တွက်ကြည့်ရအောင် !</p>

                        <div class="mt-4">
                            <input type="number" name="weight" style="font-size: 18px" id="weight" class="form-control" min="0" required placeholder="အလေးချိန် ( ပေါင် ) ...">
                        </div>
                        <div class="mt-4">
                            <div class="d-flex">
                                <input type="number" name="feet" style="font-size: 18px" id="feet" class="form-control me-2" min="0" required placeholder="အရပ် ( ပေ )...">
                                <input type="number" name="inches" style="font-size: 18px" id="inches" class="form-control" min="0" required placeholder="အရပ် ( လက်မ )...">
                            </div>
                        </div>

                        <div class="mt-4">
                            <button type="button" class="btn btn-md btn-primary calculate w-100" style="font-size: 18px">တွက်ချက်မည်</button>
                        </div>
                    </div>

                    <div class="card-footer my-3">
                        <h4 id="result" class="text-primary font-weight-bold"><b></b></h4>

                        <h4 id="underweight" class="text-danger font-weight-bold"></h4>
                        <h4 id="normal" class="text-success font-weight-bold"></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $('.calculate').on('click',function(){
                var weight = $('#weight').val();
                var feet = $('#feet').val();
                var inches = $('#inches').val();

                var totalHeightInches = (Number(feet) * 12) + Number(inches); // Convert feet to inches and add inches
                var bmi = (Number(weight) * 703) / (totalHeightInches * totalHeightInches);

                $('#result').text(bmi.toFixed(2));

                if(bmi < 18.5){
                    $('#normal').text("");
                    $('#underweight').text("ပိန်သော ကိုယ်အလေးချိန်");
                }else if(bmi >= 18.5 && bmi < 24.9){
                    $('#underweight').text("");
                    $('#normal').text("ပုံမှန်ကိုယ်အလေးချိန် ");
                }else if(bmi >= 25 && bmi < 29.9){
                    $('#normal').text("");
                    $('#underweight').text("ပုံမှန်ထက် ပိုနေသော ကိုယ်အလေးချိန် ");
                }else{
                    $('#normal').text("");
                    $('#underweight').text(" အဝလွန်နေသော ကိုယ်အလေးချိန်");
                }
            });
        });
    </script>
@endsection
