@extends('admins.layouts.main')

@section('supplier-product-active','active')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-sm-4">
                <h3 class="fw-bold mb-3">ကုန်ပစ္စည်းတင်သွင်းမှုများ</h3>
                <h6 class="op-7 mb-2" style=" font-size: 20px" >တင်သွင်းထားသော ကုန်ပစ္စည်းစုစုပေါင်း- {{$supplier_products->total()}}</h6>
            </div>

            <div class="col-sm-4 offset-sm-4">
               <div class="float-end">
                    <a href="{{route('admin.supplier_products.create')}}"><button type="button" class="btn btn-md btn-info mb-2">Create</button></a>
               </div>
                <form action="{{route('admin.supplier_products.index')}}" method="GET">
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
                            <th>ကုမ္ပဏီအမည်</th>
                            <th>ကုန်ပစ္စည်း</th>
                            <th>အရေအတွက်</th>
                            <th>တင်သွင်းဈေးနှုန်း</th>
                            <th>ငွေသွင်းရမည့်နေ့</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($supplier_products as $product)
                            <tr>
                                <td>{{$product->supplier != null ? $product->supplier->name : ''}}</td>
                                <td>{{$product->product != null ? $product->product->name : ''}}</td>

                                <td>{{$product->quantity}}</td>
                                <td>{{$product->original_price}}</td>
                                <td>{{ date('j-M-Y',strtotime($product->last_supplied_date))}}</td>
                                <td class="d-flex justify-content-start">

                                    <a href="{{route('admin.supplier_products.edit',$product->id)}}"><button type="button" class="btn btn-sm btn-warning" style="float: left;margin-right: 2px;">Edit</button></a>

                                    <form action="{{route('admin.supplier_products.destroy',$product->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-sm btn-danger"> ပယ်ဖျက်မည်</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>


            </div>

            <div>
                {{$supplier_products->links()}}
            </div>
        </div>


      </div>


    </div>
  </div>
@endsection
