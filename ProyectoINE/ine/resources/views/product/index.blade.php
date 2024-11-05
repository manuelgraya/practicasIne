<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Internet y Negocio Electrónico - Tienda Virtual</title>
    <link rel="stylesheet" href="/css/ine.css">
</head>
<body>
    <header>
        <img src="/img/logo-ine.png" title="logotipo" alt="logotipo" class="logo" />
        <form name="search" class="form-search" action="{{ Route('product.index') }}">
            <input id="text" name="text" type="text" placeholder="Buscar...">
            <button>Buscar</button>
        </form>
        <div class="button-links">
        @if(Auth::check())
            <a href="{{ route('profile.edit') }}">{{Auth::user()->name}}</a>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @else
            <a href="{{ route('login')}}">Login</a>
            <a href="{{ route('register')}}">Registro</a>
        @endif
            <a href="#"><img class="cart-ico" src="/img/cart.png" title="carrito" alt="carrito" /></a>
        
        </div>
    </header>


    <main>

    <div class="ordering">
                <span>name</span>
                <a href="{{ route('product.index', array_merge(request()->query(), ['variable' => 'name', 'order' => 'desc'])) }}">
                <img src="/img/order-up.png">
                </a>
                <a href="{{ route('product.index', array_merge(request()->query(), ['variable' => 'name', 'order' => 'asc'])) }}">
                <img src="/img/order-down.png">
                </a>
                <span>price</span>
                <a href="{{ route('product.index', array_merge(request()->query(), ['variable' => 'price', 'order' => 'desc'])) }}">
                <img src="/img/order-up.png">
                </a>
                <a href="{{ route('product.index', array_merge(request()->query(), ['variable' => 'price', 'order' => 'asc'])) }}">
                <img src="/img/order-down.png">
                </a>

            </div>
            <div class="ordering">
                <a href="{{ route('product.create') }}">
                    <button>Nuevo Producto</button>
                </a>
                </div>


    <section class="product-list">
        @foreach ($aProduct as $product)
        <article class="product">
            <x-product :product="$product" /> 
            <a href="{{ route('product.show', ['product' => $product->id]) }}">
                <button>Ver Detalle</button>
            </a>
        </article>
                
                

        @endforeach
        </section>
        <form method="GET" action="{{ route('product.index') }}">
            <input type="hidden" name="variable" value="{{ request()->query('variable', 'name') }}">
            <input type="hidden" name="order" value="{{ request()->query('order', 'asc') }}">

       </form>
    </main>

    <footer>
        <p>&copy; 2024 Tienda Virtual. Todos los derechos reservados.</p>
    </footer>
</body>
</html>

{{$aProduct->links('layouts.pagination')}}