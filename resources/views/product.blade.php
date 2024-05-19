<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Pendataan Barang</title>
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/product.css') }}">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <nav>
        <div class="left">
            <a href=""><img src="https://img.freepik.com/premium-vector/shoes-shop-logo-template-design_316488-452.jpg" alt="Shoe Store Logo"></a>
        </div>
        <div class="right">
            <a href="/home" class="login">Home</a>
            <a href="#" class="login2">Product</a>
            <a href="/login" class="login">Login</a>
            {{-- <a href="/register" class="login2">Register</a> --}}
        </div>
    </nav>
    
    <div class="product">
        @if (Auth::user() && Auth::user()->role == 'admin')
            <div class="design">
                <a href="/add-product">Add Stock</a>
                <a href="/add-category">Add Category</a>
                <a href="/add-shipment">Add Shipment</a>
            </div>
        @endif

        <br><br>
        
        @forelse ($categories as $c)
            <h1>{{ $c->Category }}</h1>
                
            <div class="manShoes">
                @forelse ($stocks as $s)
                    @if ($c->id != $s->CategoryId)
                        @continue
                    @endif

                    <div>
                        <img src="{{ asset('storage/'.$s->Photo) }}" alt="{{ $s->Photo }}">
                        <h2>Category: {{ $s->Category }}</h2>
                        <h2>Name: {{ $s->Name }}</h2>
                        <h2>Price: Rp. {{ $s->Price }}</h2>
                        <h2>Quantity: {{ $s->Quantity }}</h2>
                        
                        <div class="tombol">
                            <button class="btn btn-success">
                                <a href="/edit-product/{{ $s->id }}">Edit</a>
                            </button>

                            <form action="/delete-product/{{ $s->id }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" type="submit">
                                    Delete
                                </button>
                            </form>
                            {{-- <br> --}}
                            <a href="/add-order/{{ $s->id }}"><button class="btn btn-warning">Order</button></a>

                            <a href="/add-faktur/{{ $s->id }}"><button class="btn btn-info">Add to keranjang</button></a>
                        </div>
                    </div>
                @empty
                    <p>{{ "Stocks habis. Silakan ditunggu hingga barang di-restock ulang" }}</p>
                @endforelse
            </div>
        @empty
            <p>No category added.</p>
        @endforelse
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>