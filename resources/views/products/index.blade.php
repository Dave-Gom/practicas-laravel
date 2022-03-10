@extends('layouts.app')

@section('content')


  <h2>List of Products</h2>
  <a href="{{ route('products.create') }}" class="btn btn-success">Create</a>

  @if(empty($products))
    <div class="arlert alert-warnind">La lista de Productos esta vacia</div>

  @else
  <div class="table-responsive">
    <table class="table table-striped">
      <thead class="thead-light">
        <tr>
          <th>Id</th>
          <th>Title</th>
          <th>Description</th>
          <th>Precio</th>
          <th>Stock</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($products as $product)
          <tr>
            <td>{{ $product->id}}</td>
            <td>{{ $product->title}}</td>
            <td>{{ $product->description}}</td>
            <td>{{ $product->price}}</td>
            <td>{{ $product->stock}}</td>
            <td>{{ $product->status}}</td>
            <td>
              <a href="{{route('products.show', ['product'=> $product->id]) }}" class="btn btn-link">Show</a>
              <a href="{{route('products.edit', ['product'=> $product->id]) }}" class="btn btn-link">Edit</a>
              <form action="{{route('products.destroy', ['product'=> $product->id])}}" method="post" class="d-inline">
                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">Delete</button>
              </form>
            </td>
          </tr>
        @endforeach
    </table>
  </div>
  @endif
@endsection