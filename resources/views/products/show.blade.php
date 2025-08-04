@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto p-6">
  <div class="p-4 border rounded">
    <img src="{{ asset($product->image) }}" width="150" class="mb-4">
    <h2 class="text-2xl font-bold mb-2">{{ $product->name }}</h2>
    <p class="text-gray-700 mb-2">{{ $product->description }}</p>
    <p class="text-gray-900 font-semibold mb-4">₦{{ number_format($product->price, 2) }}</p>

    <form method="POST" action="{{ route('cart.add') }}">
      @csrf
      <input type="hidden" name="product_id" value="{{ $product->id }}">
      <button class="bg-blue-600 text-white px-4 py-2 mt-2 rounded">Add to Cart</button>
    </form>
  </div>
</div>
@endsection
