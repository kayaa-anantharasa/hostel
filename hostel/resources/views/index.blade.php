<!DOCTYPE html>
<html lang="en">
<head>
	<title>HMS</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        .body {
    background-color: #a8dadc;
    }

    .login-form {
        background-color: #ffffff;
        margin: 0px auto;
        font-family: Raleway;
        padding: 60px;
        border-radius: 10px;
        margin-top:170px;
        margin-left:300px;
        width:45%;

        }

    
    h2 {

        text-align: center;
        color: #959595;
    }

    input,label {

        padding: 10px;
        width: 100%;
        font-size: 17px;
        font-family: Raleway;
        border: 1px solid #aaaaaa;
        border-radius: 0px;
        -webkit-appearance: none;
    }



     input:focus{

    border:1px solid #6a1b9a !important;
    outline: none;
    }

    input.invalid {
    
        border:1px solid #e03a0666;
    }


    .login-btn{

        background-color: #006d77;
        color: #ffffff;
        border: none;
        border-radius: 5%;
        padding: 10px 20px;
        font-size: 17px;
        font-family: Raleway;
        cursor: pointer;
        width: 100%;
    }

    .login-btn:hover {
        opacity: 0.8
    }

    .login-btn:focus{

    outline: none !important;

    }

</style>
</head>
<body class="body">
@extends('base')
@section('main')

<main class="login-form">
                <h2>Login</h2>
                <br><br>
               
                @if ($message = Session::get('error'))
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br />
                    @endif
              
                <form method="post" action="{{ url('/checklogin') }}"> 
                    {{ csrf_field() }}
                        
       
              
                <input type="email"  name="email" value="Email"/>
                <br><br>
                <input type="password"  name="password" value="Password"/><br>
                <br><br>
                <button type="submit" class="login-btn">Login</button>
                </form>
    </main>   
    </body>    
    @endsection
    </html>