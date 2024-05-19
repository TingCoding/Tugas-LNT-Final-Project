<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Faktur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .item {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div style="margin: 200px">
        <h1>Faktur</h1>
        <img src="{{ asset('storage/'.$s->Photo) }}" alt="{{ $s->Photo }}" style="width: 200px; height:200px;">

        <br><br>

        <h2>Category: {{ $s->Category }}</h2>
        <h2>Name: {{ $s->Name }}</h2>
        <h2>Price: Rp. {{ $s->Price }}</h2>
        <h2>Quantity: {{ $or->Quantity }}</h2>

        <form action="/add-faktur1" method="POST">
            @csrf
            <input type="hidden" name="StockId" value="{{ $s->id }}">
            <input type="hidden" name="ShipmentId" value="{{ $s->id }}">

            <div class="mb-3">
                <label for="NomorInvoice" class="form-label"><h4>Nomor Invoice:</h4></label><br>
                <input type="text" name="NomorInvoice" id="NomorInvoice" value="{{ 'INV-' . time() }}" readonly required>
                @error('NomorInvoice')
                    <p style="color: red;">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="Address" class="form-label"><h4>Address:</h4></label><br>
                <input type="text" name="Address" id="Address" minlength="10" maxlength="100" required>
                @error('Address')
                    <p style="color: red;">{{ $message }}</p>
                @enderror
            </div>
                
            <div class="mb-3">
                <label for="KodePos" class="form-label"><h4>Kode Pos:</h4></label><br>
                <input type="text" name="KodePos" id="KodePos" pattern="\d{5}" required>
                @error('KodePos')
                    <p style="color: red;">{{ $message }}</p>
                @enderror
            </div>

            <div id="items">
                <div class="item">
                    {{-- <label for="category_1">Kategori Barang:</label>
                    <input type="text" name="items[0][category]" id="category_1" value="{{ $c->Category }}" readonly required>
                    <br><br>
                    
                    <label for="item_name_1">Nama Barang:</label>
                    <input type="text" name="items[0][item_name]" id="item_name_1" value="{{ $s->Name }}" readonly required>
                    <br><br> --}}
                    
                    <label for="quantity_1">Kuantitas:</label>
                    <input type="number" name="items[0][quantity]" id="quantity_1" class="quantity" value="{{ $or->Quantity }}" required>
                    <br><br>
                    
                    <label for="price_1">Harga:</label>
                    <input type="number" name="items[0][price]" id="price_1" class="price" value="{{ $s->Price }}" required>
                    <br><br>
                    
                    <label for="subtotal_1">Subtotal:</label>
                    <input type="number" name="items[0][subtotal]" id="subtotal_1" class="subtotal" value="{{ $s->Price * $or->Quantity }}" readonly required>
                    <br><br>
                </div>
            </div>
            <button type="button" class="btn btn-secondary" id="add-item">Add Item</button>

            <div class="mb-3">
                <label for="TotalHargaSemua">Total Harga Semua:</label>
                <input type="number" name="TotalHargaSemua" id="TotalHargaSemua" value="{{ $s->Price * $or->Quantity }}" readonly required>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script>
        document.getElementById('add-item').addEventListener('click', function () {
            const items = document.getElementById('items');
            const itemCount = items.getElementsByClassName('item').length;
            const newItem = document.createElement('div');
            newItem.classList.add('item');
            newItem.innerHTML = `
                <label for="quantity_${itemCount + 1}">Kuantitas:</label>
                <input type="number" name="items[${itemCount}][quantity]" id="quantity_${itemCount + 1}" class="quantity" required>
                <label for="price_${itemCount + 1}">Harga:</label>
                <input type="number" name="items[${itemCount}][price]" id="price_${itemCount + 1}" class="price" required>
                <label for="subtotal_${itemCount + 1}">Subtotal:</label>
                <input type="number" name="items[${itemCount}][subtotal]" id="subtotal_${itemCount + 1}" class="subtotal" readonly required>
            `;
            items.appendChild(newItem);

            newItem.querySelectorAll('.quantity, .price').forEach(input => {
                input.addEventListener('input', calculateSubtotalAndTotal);
            });
        });

        document.querySelectorAll('.quantity, .price').forEach(input => {
            input.addEventListener('input', calculateSubtotalAndTotal);
        });

        function calculateSubtotalAndTotal() {
            let total = 0;
            document.querySelectorAll('.item').forEach(item => {
                const quantity = parseFloat(item.querySelector('.quantity').value) || 0;
                const price = parseFloat(item.querySelector('.price').value) || 0;
                const subtotal = quantity * price;
                item.querySelector('.subtotal').value = subtotal.toFixed(2);
                total += subtotal;
            });
            document.getElementById('TotalHargaSemua').value = total.toFixed(2);
        }

        calculateSubtotalAndTotal();
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>
