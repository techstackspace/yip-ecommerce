<form method="POST" action="{{ route('cart.add') }}">
    @csrf
    <input type="hidden" name="product_id" value="{{ $product->id }}">
    <button class="bg-blue-600 text-white px-4 py-2 mt-2 rounded">Add to Cart</button>
</form>
