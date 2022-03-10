<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index() {
    $products = Product::all();
//    $products = DB::table('products')->get();
    //dd($products);
    // return $products;
    return view('products/index')->with(['products'=> $products]);
  }

  public function create(){
    return view('products.create');
  }

  public function store( ProductRequest $request){
    /* $product = Product::create([
      'title'=> request()->title,
      'description' => request()->description,
      'price' => request()->price,
      'stock' => request()->stock,
      'status' => request()->status
    ]);*/
/*     $rules = [
      'title' => ['required', 'max:255'],
      'description' => ['required', 'max:1000'],
      'price' => ['required', 'min:1'],
      'stock' => ['required', 'min:0'],
      'status' => ['required', 'in:available,unavailable'],
    ];
    
    request()->validate($rules); */

    /* if( $request()->status == 'available' && $request()->stock == 0){
      
      return redirect()->back()->withInput( $request()->all() )->withErrors("If Available, must have stock");
    }
    session()->forget('error');
     */
    $product = Product::create( $request()->validated());
    
    return redirect()->route('products.index')->withSuccess("The new product with id {$product->id} was created.");
  }

  public function show(Product $product){
    // $product = Product::findOrFail($product);
    //$product = DB::table('products')->find($product);
    //return($product);

    return view('products.show')->with(['product'=> $product, ]);
  }

  public function edit($product){
    return view('products.edit')->with(['product'=> Product::findOrFail($product)]);
  }

  public function update(Product $product, ProductRequest $request){
    /* $rules = [
      'title' => ['required', 'max:255'],
      'description' => ['required', 'max:1000'],
      'price' => ['required', 'min:1'],
      'stock' => ['required', 'min:0'],
      'status' => ['required', 'in:available,unavailable'],
    ];
    request()->validate($rules); */

    
    session()->forget('error');
    $product = Product::findOrFail($product);
    $product->update($request()->all());
    return ($product);
  }

  public function destroy($product){
    $product = Product::findOrFail($product);
    $product->delete();
    // return redirect()->back();
    // return redirect()->action([ProductController::class, 'index']); 
    return redirect()->route('products.index');
  }
}
