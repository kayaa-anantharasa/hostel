@extends('base')
@section('main')


<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit an Employee</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{route('users.index')}}"> Back</a>
            </div>
        </div>
    </div>
   
   <!-- error messages --> 
   @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
  
    <form action="{{route('users.update',$user->id)}}" method="post">
        @method('PUT')
        @csrf
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{$user->name}}" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email:</strong>
                    <input type="text" name="email" value="{{$user->email}}" class="form-control" placeholder="Email">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Gender:</strong>
                    <input type="text" name="gender" value="{{$user->gender}}" class="form-control" placeholder="Gender">
                </div>
            </div>
            <div class="form-group">
                    <strong>Address:</strong>
                    <input type="text" name="address" value="{{$user->address}}" class="form-control" placeholder="Address">
                </div>
            </div>
            <div class="form-group">
                    <strong>Mobile No:</strong>
                    <input type="text" name="address" value="{{$user->mobilenumber}}" class="form-control" placeholder="Mobilenumber">
                </div>
            </div>
          

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
   
    </form>


@endsection