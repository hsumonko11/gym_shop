@extends('admins.layouts.main')

@section('contact-active','active')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-sm-4">
                <h3 class="fw-bold mb-3">ဝေဖန်အကြံပြုစာများ </h3>
                <h6 class="op-7 mb-2" style="font-size: 20px"> အကြံပြုစာ စုစုပေါင်း - {{$contacts->total()}}</h6>
            </div>

            <div class="col-sm-4 offset-sm-4">
               <div class="float-end">
                    {{-- အကြံပြုစာများ
အီးမေးလ်
အကြောင်းအရာ
အကြံပြုစာ စုစုပေါင်း
ဝေဖန်အကြံပြုစာများ <a href="{{route('admin.customers.create')}}"><button type="button" class="btn btn-md btn-info mb-2">Create</button></a> --}}
               </div>
                <form action="{{route('admin.contact')}}" method="GET">
                    @csrf

                    <div class="input-group mb-3">
                        <input type="date" class="form-control" name="search" value="{{request()->search}}" placeholder="Search Name..." aria-label="Recipient's username" aria-describedby="basic-addon2">
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
                            <th>အီးမေးလ်</th>
                            <th>အကြောင်းအရာ</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($contacts as $contact)
                            <tr>
                                <td>{{$contact->email}}</td>
                                <td>{{$contact->note}}</td>
                                <td>
                                    <form action="{{route('admin.contact_delete',$contact->id)}}" method="POST">
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
                {{$contacts->links()}}
            </div>
        </div>


      </div>


    </div>
  </div>
@endsection
