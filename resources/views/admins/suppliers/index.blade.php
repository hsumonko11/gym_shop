@extends('admins.layouts.main')

@section('supplier-active','active')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-sm-4">
                <h3 class="fw-bold mb-3">ကုန်ပစ္စည်းတင်သွင်းသူများ </h3>
                <h6 class="op-7 mb-2" style=" font-size: 20px">တင်သွင်းသူ စုစုပေါင်း - {{$suppliers->total()}}</h6>
            </div>

            <div class="col-sm-4 offset-sm-4">
               <div class="float-end">
                    <a href="{{route('admin.suppliers.create')}}"><button type="button" class="btn btn-md btn-info mb-2">Create</button></a>
               </div>
                <form action="{{route('admin.suppliers.index')}}" method="GET">
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
                            <th>ကုမ္ပဏီအမည်</th>
                            <th>တင်သွင်းသူအမည်</th>
                            <th> အီးမေးလ်</th>
                            <th>ဖုန်း</th>
                            <th>လိပ်စာ</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($suppliers as $supplier)
                            <tr>
                                <td>{{$supplier->name}}</td>
                                <td>{{$supplier->contact_person}}</td>
                                <td>{{$supplier->email}}</td>
                                <td>{{$supplier->phone}}</td>
                                <td>{{$supplier->address}}</td>
                                <td class="d-flex justify-content-start">

                                    <a href="{{route('admin.suppliers.edit',$supplier->id)}}"><button type="button" class="btn btn-sm btn-warning" style="margin-right:2px;">Edit</button></a>

                                    <form action="{{route('admin.suppliers.destroy',$supplier->id)}}" method="POST">
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
                {{$suppliers->links()}}
            </div>
        </div>


      </div>


    </div>
  </div>
@endsection
