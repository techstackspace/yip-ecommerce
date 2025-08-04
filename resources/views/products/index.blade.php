@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-6">
  <h2 class="text-2xl font-bold mb-4">Available Products</h2>

  @foreach($products as $product)
  <div class="p-4 border rounded mb-4">
    <img src="{{ asset($product->image) }}" width="100" class="mb-2">
    <h3 class="text-lg font-semibold">{{ $product->name }}</h3>
    <p class="text-gray-700">₦{{ number_format($product->price, 2) }}</p>

    <a href="{{ route('products.show', $product->id) }}" class="inline-block text-blue-600 underline mt-2">View</a>

    <form method="POST" action="{{ route('cart.add') }}" class="mt-2">
      @csrf
      <input type="hidden" name="product_id" value="{{ $product->id }}">
      <button class="bg-blue-600 text-white px-3 py-1 rounded">Add to Cart</button>
    </form>
  </div>
  @endforeach
</div>
@endsection