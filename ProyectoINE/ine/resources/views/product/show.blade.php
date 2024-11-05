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
        <breadcrumb>
            <a href="{{ route('product.index') }}">Inicio</a> > <a href="{{ route('product.show', $product->id) }}">{{ $product->name }}</a>
        </breadcrumb>
    </header>

    <main class="product">

        <x-product :product="$product" />

        @if (session('error'))
        <div class="fielderror">{{ session('error') }}</div>
        @endif
       <article class="product">
            <h2>{{ $product->name }}</h2>
                <p class='company'>{{ $product->company->name }}</p>
            <p>{{ $product->description }}</p>
            @if ($product->image!=NULL)
            <img src="/img/product/{{ $product->image }}" title="{{ $product->name }}" alt="{{ $product->name }}">
            @endif
            <p>Precio: {{ $product->price }} €</p>
            
            <a href="{{ route('product.index') }}">
        <button>Volver</button>
       </a>
         @if(Auth::check() && Auth::user()->isAdmin)
       <a href="{{ route('product.edit', ['product' => $product->id]) }}">
        <button>Editar</button>
       </a>
       @endif
        </article>
    

    </main>

    <footer>
        <p>&copy; 2024 Tienda Virtual. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
