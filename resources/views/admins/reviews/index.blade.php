@extends('admins.layouts.main')

@section('review-active','active')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-sm-4">
                <h3 class="fw-bold mb-3">Reviews</h3>
                <h6 class="op-7 mb-2">Total - {{$reviews->total()}}</h6>
            </div>

            <div class="col-sm-4 offset-sm-4">
               <div class="float-end">
                    {{-- <a href="{{route('admin.reviews.create')}}"><button type="button" class="btn btn-md btn-info mb-2">Create</button></a> --}}
               </div>
                <form action="{{route('admin.reviews.index')}}" method="GET">
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
                            <th>Date</th>
                            <th>Customer</th>
                            <th>Product</th>
                            <th>Rating</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($reviews as $review)
                            <tr>
                                <td>{{date('j-M-Y',strtotime($review->created_at))}}</td>
                                <td>{{$review->customer != null ? $review->customer->name : ''}}</td>
                                <td>{{$review->product != null ? $review->product->name : ''}}</td>
                                <td>{{$review->rating}}</td>
                                <td class="d-flex justify-content-start">

                                    <form action="{{route('admin.reviews.destroy',$review->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>


            </div>

            <div>
                {{$reviews->links()}}
            </div>
        </div>


      </div>


    </div>
  </div>
@endsection
