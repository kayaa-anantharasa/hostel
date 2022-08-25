<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Models\Product;
use Auth;
use Illuminate\Support\Facades\DB;
class OrderController extends Controller
{
    public function index()
    {
        $products= Product::all();
        return view('ordersf.placeorder', compact('products'));
    }
    function cancelorder(Order $order){
        $order->update([
            'status'=>'Cancelled'
        ]);
        return redirect()->route('ordercancelx',$order->id);}
    function viewOrder(Order $order){
        $data = DB::table('orders')
        ->join('users', 'orders.employee_id', '=', 'users.id')
        ->join('products', 'products.id', '=', 'orders.product_id')
         ->select('orders.id','users.name',  'products.name as prod_name', 'products.detail','products.price','orders.status')->where('orders.customer_id', Auth::user()->id)
            ->get();
         return view('ordersf.cancel', compact('data'));
    }
    function showEmployeeOrder() {
        $data = DB::table('orders')
        ->join('users', 'orders.employee_id', '=', 'users.id')
        ->join('products', 'products.id', '=', 'orders.product_id')
         ->select('users.name','orders.id','orders.status','users.address', 'users.mobilenumber', 'products.name as prod_name', 'products.detail','products.price','products.created_at')->where('orders.employee_id', Auth::user()->id)
            ->get();
         return view('ordersf.show', compact('data'));
    }

    function deliverorder(Order $order){
        $order->update([
            'status'=>'Delivered'
        ]);
        return redirect()->route('deliver',$order->id);
        }
       function delivervieworder(Order $order){
        $data = DB::table('orders')
        ->join('users', 'orders.employee_id', '=', 'users.id')
        ->join('products', 'products.id', '=', 'orders.product_id')
         ->select('orders.id','users.name', 'users.address', 'users.mobilenumber', 'products.name as prod_name', 'products.detail','products.price' ,'orders.created_at','orders.status')->where('orders.employee_id', Auth::user()->id)
            ->get();
         return view('ordersf.deliver', compact('data'));
       }
    public function store(Request $request)
    {
        Order::create($request->all());
        return redirect()->route('orders.index');
    }
    function showCustomerOrder(){
        $data = DB::table('orders')
        ->join('users', 'orders.employee_id', '=', 'users.id')
        ->join('products', 'products.id', '=', 'orders.product_id')
         ->select('orders.id','users.name',  'products.name as prod_name', 'products.detail','products.price','orders.status')->where('orders.customer_id', Auth::user()->id)
            ->get();
         return view('ordersf.customerorder', compact('data'));
    }
}
