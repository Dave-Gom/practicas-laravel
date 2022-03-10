@extends('layouts.app')

@section('content')
  <h1>Create a Product</h1>
   <form action="{{ route('products.store')}}" method="POST">

     @csrf
     
     <div class="form-row">
        <div class="form-row">
          <label for="title">Title</label>
          <input type="text" name="title" id="title"   class="form-control" value="{{ old('title')}}">
        
        </div>
        <div class="form-row">
          <label for="description">Description</label>
          <input type="text" name="description" id="description"   class="form-control" value="{{ old('description')}}">

        </div>
        <div class="form-row">
          <label for="price">Price</label>
          <input type="number" min="1.00" step="0.01" name="price" id="price"   class="form-control" value="{{ old('price')}}">

        </div>
        <div class="form-row">
          <label for="stock">Stock</label>
          <input type="number" min="0.00" step="0.01" name="stock" id="stock"   class="form-control" value="{{ old('stock')}}">
        </div>

        <div class="form-row">
          <label for="status">Status</label>
          <select name="status" id="status"  >
            <option value="" selected>Select...</option>
            <option {{ old('status') == 'available' ? 'selected': ''}} value="available">Available</option>
            <option {{ old('status') == 'unavailable' ? 'selected': ''}} value="unavailable">Unavailable</option>
          </select>
        </div>
        <output>{{old('status')}}</output>
        <div class="form-row">
          <button type="submit" class="btn btn-primary btn-lg">
            Create Product
          </button>
        </div>
     </div>
   </form>
@endsection
