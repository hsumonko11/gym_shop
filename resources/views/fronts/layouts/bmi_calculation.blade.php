@extends('fronts.layouts.main')

@section('bmi-active','active-menu')

@section('content')
<section class="bg-img1 txt-center" style="background-image: url('fronts/photos/math.jpg');width:100%;height:700px;">

    <div class="container" style="opacity: 0.9">
        <div class="d-flex justify-content-center my-5">
            <div class="col-sm-6 mt-5">
                <div class="card mt-3">
                    <div class="card-header"  style="font-size: 20px" >မိမိရဲ့ BMI ကို တွက်ကြည့်ရအောင် !
                    </div>
                    <div class="card-body">
                        <div class="mt-4">
                            <label for="">Weight (lb)</label>
                            <input type="number" name="weight" id="weight" class="form-control" min="0" required placeholder="အလေးချိန် ( ပေါင် ) ...">
                        </div>
                        <div class="mt-4">
                            <label for="">Height (inch)</label>
                            <input type="number" name="height" id="height" class="form-control" min="0" required placeholder="အရပ် ( လက်မ )...">
                        </div>

                        <div class="mt-4">
                            <button type="button" class="btn btn-md btn-primary calculate w-100">တွက်ချက်မည်</button>
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

{{-- <div class="container">
    <div class="d-flex justify-content-center my-5">
        <div class="col-sm-6">
            <div class="card card-shadow">
                <div class="card-body">
                    <div class="mt-4">
                        <label for="">Weight (lb)</label>
                        <input type="number" name="weight" id="weight" class="form-control" placeholder="Enter Weight(lb)...">
                    </div>
                    <div class="mt-4">
                        <label for="">Height (inch)</label>
                        <input type="number" name="height" id="height" class="form-control" placeholder="Enter Height(inch)...">
                    </div>

                    <div class="mt-4">
                        <button type="button" class="btn btn-md btn-success calculate w-100">Calculate</button>
                    </div>
                </div>

                <div class="card-footer my-3">
                    Result : <p id="result"><b></b></p>
                </div>
            </div>
        </div>
    </div>
</div> --}}

@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $('.calculate').on('click',function(){
                var weight = $('#weight').val();
                var height = $('#height').val();

                var bmi = (Number(weight)*703) / (Number(height) * Number(height));

                $('#result').text(bmi.toFixed(2));

                if(bmi < 18.5){
                    $('#normal').text("");
                    $('#underweight').text("ရှိသင့်သောကိုယ်အလေးချိန်အောက် လျော့နည်းနေပါတယ်");
                }else if(bmi >= 18.5 && bmi < 24.9){
                    $('#underweight').text("");
                    $('#normal').text("ပုံမှန်ကိုယ်အလေးချိန်ရှိသူဖြစ်ပါတယ်");
                }else if(bmi >= 25 && bmi < 29.9){
                    $('#normal').text("");
                    $('#underweight').text("ရှိသင့်သော ကိုယ်အလေးချိန်ထက် များနေပါတယ်");
                }else{
                    $('#normal').text("");
                    $('#underweight').text("ရှိသင့်သည်ထက်ပို၍ဝနေသောသူဖြစ်ပါတယ်");
                }




            })
        })

    </script>
@endsection
