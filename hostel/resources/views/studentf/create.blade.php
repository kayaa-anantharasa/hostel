@extends('base')

@section('main')
<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-4">
                    <h3 class="card-header text-center ">Employee Registration</h3>
                    <div class="card-body">
    @if($errors->any())
      <div class="alert alert-danger">
      <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      
      </div>
      <br />
      
    <form method="post" action="{{route('users.store') }}">
        @csrf

       <div class="form-group"> 
           
           <label for="name">Name:</label>
           <input type="name" class="form-control" name="name"/>
       </div>                   
    <div class="form-group"> 

              <label for="email">email:</label>
              <input type="email" class="form-control" name="email"/>
          </div>
          <div class="form-group"> 
           
           <label for="gender">Gender:</label>
           <input type="ratio" class="form-control" name="gender"/>
       </div>
       <div class="form-group"> 
           
           <label for="address">Address:</label>
           <input type="address"  class="form-control"
           name="address"/>
       </div>
       <div class="form-group">
              <label for="mobilenumber">mobileNo:</label>
              <input type="tel" class="form-control" name="mobilenumber"/>
          </div>
          
          
          <div class="form-group">
              <label for="password">Password:</label>
              <input type="password" class="form-control" name="password"/>
          </div>
          <div class="form-group">
          <label for="role"></label>
          <input type="hidden" class="form-control" name="role" value="student">
            </div>
                            <div class="d-grid mx-auto">
                            <button type="submit" class="btn btn-primary">Enroll</button>

                           
                            
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection