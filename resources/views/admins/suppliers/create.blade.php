@extends('admins.layouts.main')

@section('supplier-active','active')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-sm-4">
                <h3 class="fw-bold mb-3">ကုန်ပစ္စည်းတင်သွင်းသူ</h3>
                <h6 class="op-7 mb-2"></h6>
            </div>

            <div class="col-sm-4 offset-sm-4 text-end">
                <a href="{{route('admin.suppliers.index')}}"><button type="button" class="btn btn-md btn-danger">Back</button></a>
            </div>

        </div>

      <div class="row">

        <div class="col-sm-12">
            @include('admins.layouts.flash_message')
            <div class="card">
                {{-- <div class="card-header">
                    Create
                </div> --}}
                <div class="card-body">
                    <form action="{{route('admin.suppliers.store')}}" method="POST">
                        @csrf

                        <div>
                            <label for="name">ကုမ္ပဏီအမည်</label>

                            <input type="text" name="name" id="name" class="form-control">

                            @error("name")
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mt-2">
                            <label for="contact_person">တင်သွင်းသူအမည်</label>

                            <input type="text" name="contact_person" id="contact_person" class="form-control">
                        </div>

                        <div class="mt-2">
                            <label for="email">အီးမေးလ်</label>

                            <input type="email" name="email" id="email" class="form-control">
                        </div>

                        <div class="mt-2">
                            <label for="phone">ဖုန်း</label>

                            <input type="text" name="phone" id="phone" class="form-control">
                        </div>

                        <div class="mt-2">
                            <label for="contact_person">လိပ်စာ</label>

                            <input type="text" name="address" id="address" class="form-control">
                        </div>


                        <button type="submit" class="btn btn-md btn-success mt-2 w-100">အတည်ပြုမည်</button>
                    </form>
                </div>
            </div>
        </div>

      </div>


    </div>
  </div>
@endsection

@section('script')

@endsection
