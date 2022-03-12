@extends('layouts.app')

@section('content')
    <div class="container">
      <div class="row">
        
          @foreach ($products as $product)
            <div class="col-md-3">
              @include('products/ProductCard')
              </div>
          @endforeach
        
      </div>
    </div>
@endsection