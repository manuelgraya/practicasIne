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
            <a href="{{ route('product.index') }}">Productos</a> > {{ $product == null ? "Crear" : $product->name . ' > edición' }}</a>
        </breadcrumb>
    </header>

    <main>
        
        @if (session('sState'))
        <div class="status">{{ session('sState') }}</div>
        @endif


<form id="edit-form" name="edit-form" method="post"
      action="{{ $product == null ? route('product.store') : route('product.update', ['product' => $product]) }}">
    @method($product == null ? 'POST' : 'PATCH')
    @csrf

    <div class="input">
        <label for="name">Nombre</label>
        <input type="text" id="name" name="name" autocomplete="off"
               value="{{ old('name') }}" />
               @error('name')
               <div class="fielderror">{{ $message }}</div>
               @enderror
    </div>
    <div class="input">
        <label for="description">Descripción</label>
        <input type="text" name="description" autocomplete="off"
               value="{{ old('description',  $product == null ? '' : $product->description) }}" />
               @error('description')
               <div class="fielderror">{{ $message }}</div>
               @enderror
    </div>
    <div class="input">
        <label for="price">Precio</label>
        <input type="number" name="price" autocomplete="off"
               value="{{ old('price', $product == null ? '' : $product->price) }}" />
               @error('price')
               <div class="fielderror">{{ $message }}</div>
               @enderror
    </div>
    <div class="input">
        <label for="company">Empresa</label>
        <select id="company" name="company_id">
            @foreach(App\Models\Company::orderBy('name')->get() as $company)
                <option value="{{ $company->id }}" {{ old('company_id', $product ? $product->company_id : null) == $company->id ? 'selected' : '' }}>{{ $company->name }}
                </option>
            @endforeach
        </select>
    </div>
    <button class="button" type="submit">Guardar</button>
</form>


</main>

    <footer>
        <p>&copy; 2024 Tienda Virtual. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
