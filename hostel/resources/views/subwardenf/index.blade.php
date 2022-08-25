

@extends('base')
@extends('dashboard.header')
@section('main')
<div class="row">
    <div class="col-sm-12">
       
      <div>
        <a style="margin: 19px;" href="{{ url('createwarden') }}" class="btn btn-primary">Entroll New Subwarden</a>
       </div>  
       <div class="col-sm-12">
        @if(session()->get('success'))
        <div class="alert alert-success">
        {{session()->get('success')}}
        </div> 
        @endif
      </div>

      <!-- table -->
      <table class="table table-striped">
            <thead>
                <tr>
                  <td>No</td>
                  <td>Name</td>
                  <td>Email</td>
                  <td>Mobile</td>
                  
             
                </tr>
            </thead>
            <tbody>
         
            @foreach($subwardens as $subwarden)
            
                <tr>
                 
                   <td>{{$subwarden->id}}</td>
                    <td> {{$subwarden->name}}</td>
                    <td>{{$subwarden->email}}</td>
                    <td>{{$subwarden->mobilenumber}}</td>
               
            
                  </tr>
                  
                @endforeach
                
            </tbody>
        </table>
 </div>
</div>
@endsection