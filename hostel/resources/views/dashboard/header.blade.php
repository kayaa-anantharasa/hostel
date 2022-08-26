@if(Auth::user()->role == 'warden')
    <div style="background-color:pink; color:white">HMS</div>
    <div>{{Auth::user()->name}}</a><a href="{{route('users.index')}}">Subwarden</a><a href="{{url('studentsindex')}}">Student</a> <a href="{{url('/logout')}}">logout</a></div>

 @elseif(Auth::user()->role == 'subwarden')
    <div style="background-color:pink; color:white">HMS</div>
    <div>{{Auth::user()->name}}  <a href="#">Reset Password</a></a><a href="{{url('/logout')}}">logout</a></div>

    @elseif(Auth::user()->role == 'student')
   <div style="background-color:pink; color:white">Student Dashboard</div>
    <div>{{Auth::user()->name}}<a href="{{url('logout')}}">logout</a></div> 
@endif
@yield('content')