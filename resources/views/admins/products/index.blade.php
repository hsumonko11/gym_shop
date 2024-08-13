@extends('admins.layouts.main')

@section('product-active','active')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-sm-4">
                <h3 class="fw-bold mb-3">ကုန်ပစ္စည်းများ</h3>
                <h6 class="op-7 mb-2" style=" font-size: 20px">ကုန်ပစ္စည်းစုစု‌ပေါင်း - {{$products->total()}}</h6>
            </div>

            <div class="col-sm-4 offset-sm-4">
               <div class="float-end">
                    <a href="{{route('admin.products.create')}}"><button type="button" class="btn btn-md btn-info mb-2">အသစ်ထည့်မည်</button></a>
               </div>
                <form action="{{route('admin.products.index')}}" method="GET">
                    @csrf

                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="search" value="{{request()->search}}" placeholder="Search Name..." aria-label="Recipient's username" aria-describedby="basic-addon2">
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
                            <th>ကုန်ပစ္စည်းအမည်</th>
                            <th>အမျိုးအစား</th>
                            <th>ဈေးနှုန်း</th>
                            <th>အရေအတွက်</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{$product->name}}</td>
                                <td>{{$product->category != null ? $product->category->name : ''}}</td>
                                <td>{{$product->price}}</td>
                                <td>{{$product->quantity}}</td>
                                <td>
                                    <a href="{{route('admin.products.show',$product->id)}}"><button type="button" class="btn btn-sm btn-info" style="float: left;margin-right: 2px;">အသေးစိတ်</button></a>

                                    <a href="{{route('admin.products.edit',$product->id)}}"><button type="button" class="btn btn-sm btn-warning" style="float: left;margin-right: 2px;">ပြင်ဆင်မည်</button></a>

                                    <form action="{{route('admin.products.destroy',$product->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-sm btn-danger">ပယ်ဖျက်မည်</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>


            </div>

            <div>
                {{$products->links()}}
            </div>
        </div>


      </div>


    </div>
  </div>
@endsection
