<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use validator;
use Auth;
use Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class UserController extends Controller
{
    
    
    function index() {
        $subwardens=User::latest()->where('role','subwarden')->paginate(5);;
        return view('subwardenf.index',compact('subwardens'))->with('i',(request()->input('page',1) - 1)*5 );
    }
    function stuindex() {
        $students=User::latest()->where('role','student')->paginate(5);;
        return view('studentf.index',compact('students'))->with('i',(request()->input('page',1) - 1)*5 );
    }
    function createwarden() {
        return view("subwardenf.create");
    }
    function createstudent() {
        return view("studentf.create");
    }
   function checklogin(Request $request)
    {
     $this->validate($request, [
        'email' => 'required|email',
         'password' =>  ['required','string',],
        ]);
    $user_data = array(
         'email' => $request->get('email'),
         'password' => $request->get('password')
     );
     if(Auth::attempt( $user_data))
     {
         if(Auth::user()->role == 'warden')
            return view('dashboard.admin');
        else if(Auth::user()->role == 'subwarden')
            return view('dashboard.subwarden');
         else if(Auth::user()->role == 'student')
            return view('dashboard.student');   
     }
     else{
         
         return back()->with('error','Wrong Login Details');
         return redirect('/');

     }
    }
  public function create()
    {
      return view('register');
    }
    function logout(Request $request)
    {
        // Session::flush();
        // Auth::logout();
        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password' => 'required|string|min:6|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
        ]);
         $user = new User([
         'name' => $request->get('name'),
         'email' => $request->get('email'),
         'gender' => $request->get('gender'), 
         'address' => $request->get('address'),
         'mobilenumber' => $request->get('mobilenumber'),
         'role' => $request->get('role'),
         'password' => Hash::make( $request->get('password'))
         ]);
         $user->save();
         $user_data = array(
             'email' => $request->get('email'),
             'password' => $request->get('password')
         );
         if(Auth::attempt( $user_data))
         {
            
             if(Auth::user()->role == 'subwarden')
               return redirect()->route('users.index');
             else if(Auth::user()->role == 'student')
                return redirect('/');   
         }
    }
    public function show(User $user)
    {
        return view('employeef.show', compact('user'));
    }
    function edit(User $user) {
        return view('employeef.edit',compact('user'));
     }
    function update(Request $request, $id){
        $request->validate([
           'name'=>'required',
           'email'=>'required'
       ]);
        $users=User::find($id);
        $users->name = $request->get('name');
        $users->email = $request->get('email'); 
        $users->gender = $request->get('gender');
        $users->address = $request->get('address');
        $users->mobilenumber = $request->get('mobilenumber');
        
        $users->save();
       //return redirect('/emp')->with('success', 'Contact updated!');
     }  
     
}
