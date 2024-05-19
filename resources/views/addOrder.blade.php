<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Order</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div style="margin: 200px">
        <a href="/product" class="btn btn-primary"><i class="fa fa-arrow-left"></i>Kembali</a><br><br>

        <h1>Add Order</h1>

        <img src="{{ asset('storage/'.$s->Photo) }}" alt="{{ $s->Photo }}" style="width: 200px; height: 200px;">
        <h2>Category: {{ $s->Category }}</h2>
        <h2>Name: {{ $s->Name }}</h2>
        <h2>Price: Rp. {{ $s->Price }}</h2>
        <h2>Quantity: {{ $s->Quantity }}</h2>

        <form action="/add-order1/{{ $s->id }}" method="POST">
            @csrf
            <input type="number" name="StockId" value="{{ $s->id }}" style="visibility: hidden;">
            
            <div class="mb-3">
                <label for="">Shipment</label><br>
                
                @forelse ($shipments as $shipment)
                    <input type="radio" id="{{ $shipment->id }}" name="ShipmentId" value="{{ $shipment->id }}">
                    <label for="{{ $shipment->id }}">Type: {{ $shipment->ShipmentType }}, Estimation: {{ $shipment->Estimation }} days, Cost: Rp{{ $shipment->Cost }}, Max Quantity: {{ $shipment->MaxQuantity }}</label><br>
                @empty
                    <p>No shipment added.</p>
                @endforelse
                
                @error('ShipmentId')
                    <p style="color: red;">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="CustomerName" class="form-label">Customer Name</label>
                <input type="text" class="form-control" id="CustomerName" aria-describedby="emailHelp" name="CustomerName" value="{{ old('CustomerName') }}">
                @error('CustomerName')
                    <p style="color: red;">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="Estimation" class="form-label">Destination</label>
                <input type="text" class="form-control" id="Estimation" aria-describedby="emailHelp" name="Estimation" value="{{ old('Estimation') }}">
                @error('Estimation')
                    <p style="color: red;">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="Quantity" class="form-label">Quantity</label>
                <input type="number" class="form-control" id="Quantity" aria-describedby="emailHelp" name="Quantity" value="{{ old('Quantity') }}">
                @error('Quantity')
                    <p style="color: red;">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit atau lakukan '<b>add to keranjang</b>'</button>
        </form>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>