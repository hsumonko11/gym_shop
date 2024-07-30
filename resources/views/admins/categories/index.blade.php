@extends('admins.layouts.main')

@section('category-active','active')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-sm-4">
                <h3 class="fw-bold mb-3">Category</h3>
                <h6 class="op-7 mb-2">Total - {{$categories->total()}}</h6>
            </div>

            <div class="col-sm-4">
                <form action="{{route('admin.categories.index')}}" method="GET">
                    @csrf

                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="search" value="{{request()->search}}" placeholder="Search Name..." aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                          <button type="submit" class="btn btn-md btn-success input-group-text" id="basic-addon2">Search</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-sm-4">
               @include('admins.layouts.flash_message')
            </div>
        </div>

      <div class="row">
        <div class="col-sm-8">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{$category->name}}</td>
                                <td>{{$category->description}}</td>
                                <td>
                                    {{-- <a href="{{route('admin.categories.edit',$category->id)}}"><button type="button" class="btn btn-sm btn-warning" style="float: left;margin-right: 2px;">Edit</button></a> --}}

                                    <form action="{{route('admin.categories.destroy',$category->id)}}" method="POST">
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
                {{$categories->links()}}
            </div>
        </div>

        <div class="col-sm-4">
            <div class="card">
                <div class="card-header">
                    Create
                </div>
                <div class="card-body">
                    <form action="{{route('admin.categories.store')}}" method="POST">
                        @csrf

                        <label for="name">Name</label>

                        <input type="text" name="name" id="name" class="form-control">

                        @error("name")
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                        <label for="description" class="mt-2">Description</label>

                        <textarea name="description" id="description" cols="30" rows="1" class="form-control"></textarea>

                        <button type="submit" class="btn btn-md btn-success mt-2 w-100">Submit</button>
                    </form>
                </div>
            </div>
        </div>

      </div>


    </div>
  </div>
@endsection
