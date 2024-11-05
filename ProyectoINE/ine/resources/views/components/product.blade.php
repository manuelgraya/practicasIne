@if($bIndexOrShow)
    <h2>{{ $product->name }}</h2>
    <p class = 'company'>{{ $product->company->name }}</p>
    @if ($product->image!=NULL)
    <img src="/img/product/{{ $product->image }}" title="{{ $product->name }}" alt="{{ $product->name }}">
    <p>Precio: {{ $product->price }} €</p>
    @else 
    <p>{{ $product->description }}</p>
    @endif
@else
    <h2>{{ $product->name }}</h2>
    <p class = 'company'>{{ $product->company->name }}</p>
    <p>{{ $product->description }}</p>
    @if ($product->image!=NULL)
    <img src="/img/product/{{ $product->image }}" title="{{ $product->name }}" alt="{{ $product->name }}">
    <p>Precio: {{ $product->price }} €</p>
    @endif
