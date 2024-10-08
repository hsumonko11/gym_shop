@extends('admins.layouts.main')

@section('customer-active','active')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-sm-4">
                <h3 class="fw-bold mb-3">ဈေးဝယ်သူများ
                </h3>
                <h6 class="op-7 mb-2"style="font-size: 20px">ဈေးဝယ်သူ စုစုပေါင်း- {{$customers->total()}}</h6>
            </div>

            <div class="col-sm-4 offset-sm-4">
               <div class="float-end">
                    {{-- <a href="{{route('admin.customers.create')}}"><button type="button" class="btn btn-md btn-info mb-2">Create</button></a> --}}
               </div>
                <form action="{{route('admin.customers.index')}}" method="GET">
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
                            <th>အမည်</th>
                            <th>အီးမေးလ်</th>
                            <th>ဖုန်း</th>
                            <th>လိပ်စာ</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($customers as $customer)
                            <tr>
                                <td>{{$customer->username}}</td>
                                <td>{{$customer->user != null ? $customer->user->email : ''}}</td>
                                <td>{{$customer->phone}}</td>
                                <td>{{$customer->address}}</td>
                                <td class="d-flex justify-content-start">

                                    <a href="{{route('admin.customers.edit',$customer->id)}}"><button type="button" class="btn btn-sm btn-warning" style="margin-right:2px;">ပြင်ဆင်မည်</button></a>

                                    <form action="{{route('admin.customers.destroy',$customer->id)}}" method="POST">
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
                {{$customers->links()}}
            </div>
        </div>


      </div>


    </div>
  </div>
@endsection
