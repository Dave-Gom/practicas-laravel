@extends('layouts.app')


@section('content')
  <h1>Edit a Product</h1>
   <form action="{{ route( 'products.update', ['product'=> $product->id ]) }}" method="POST">
      @method('PUT')
      @csrf
      <div class="form-row">
          <div class="form-row">
            <label for="title">Title</label>
            <input type="text" name="title" id="title"  class="form-control"
            value="{{ old('title') ?? $product->title}}">
          
          </div>
          <div class="form-row">
            <label for="description">Description</label>
            <input type="text" name="description" id="description"  class="form-control"
            value="{{ old('description') ?? $product->description}}">

          </div>
          <div class="form-row">
            <label for="price">Price</label>
            <input type="number" min="1.00" step="0.01" name="price" id="price"  
            value="{{ old('price') ?? $product->price}}" class="form-control">

          </div>
          <div class="form-row">
            <label for="stock">Stock</label>
            <input type="number" min="0" step="0.01" name="stock" id="stock"  
            value="{{ old('stock') ?? $product->stock}}" class="form-control">
          </div>

          <div class="form-row">
            <label for="status">Status</label>
            <select name="status" id="status" >
             
              <option value="">Select...</option>
              <option 
                {{ old('status') == 'available' ? 
                  'selected': 
                  ($product->status == 'available'? 
                    'selected': 
                    '') }} 
                  value="available" >Avaliable</option>

              <option
                {{ old('status') == 'unavailable' ? 
                  'selected': 
                  ($product->status == 'unavailable'? 
                    'selected': 
                    '') }} 
                value="unavailable" > Unavailable</option>
            </select>
            
          </div>

          <div class="form-row">
            <button type="submit" class="btn btn-primary btn-lg">
              Edit Product
            </button>
          </div>
      </div>
   </form>
@endsection
