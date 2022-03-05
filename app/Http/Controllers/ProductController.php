<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
  public function index() {
    return view('products/index');
  }
  public function create(){
    return 'this is the form to create a product';
  }
  // public function store(){
  //   //
  // }
  public function show($product){
    return view('products.show');
  }
  public function edit($product){
    return "showing the form to edit the product with the id {$product}";
  }
  // public function update(){
  //   //
  // }
  // public function destroy(){
  //   //
  // }
}
