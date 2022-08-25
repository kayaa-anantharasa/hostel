<?php
namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
class ProductController extends Controller
{
  public function index(){
    $products=Product::all();
    return view('productsf.index',compact('products'));
         }
    public function create()
    {
        return view('productsf.create');
    }
    public function showToOrder(Product $product)
    {
        echo $product;
        $employees = User::all()->where('role','employee');
        return view('ordersf.create', compact('product','employees'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
        $products = new Product();
        if ($image = $request->file('image')) {
            $destinationPath = 'public/images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
        $products->name= $request->get('name');
        $products->detail= $request->get('detail');
        $products->price= $request->get('price');
        $products->image= "$profileImage";
     
        $products->save();
        return redirect()->route('products.index')->with('success','Product created Successfully!');
    }
    public function show(Product $product)
    {
        echo $product;
        return view('productsf.show', compact('product'));
    }
    public function edit(Product $product)
    {
        return view('productsf.edit', compact('product'));
    }
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
            'price' => 'required',
        ]);
        $product->update($request->all());
        return redirect()->route('products.index')->with('success', 'Product updated successfully!');
    }
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted Successfully!');
    }
}
