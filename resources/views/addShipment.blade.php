<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Shipment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div style="margin: 200px">
        <h1>Add Shipment</h1>
        <form action="/add-shipment1" method="POST">
            @csrf
            <div class="mb-3">
                <label for="ShipmentType" class="form-label">Shipment Type</label>
                <input type="text" class="form-control" id="ShipmentType" aria-describedby="emailHelp" name="ShipmentType" value="{{ old('ShipmentType') }}">
                @error('ShipmentType')
                    <p style="color: red;">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="Estimation" class="form-label">Estimation</label>
                <input type="number" class="form-control" id="Estimation" aria-describedby="emailHelp" name="Estimation" value="{{ old('Estimation') }}">
                @error('Estimation')
                    <p style="color: red;">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="Cost" class="form-label">Cost</label>
                <input type="number" class="form-control" id="Cost" aria-describedby="emailHelp" name="Cost" value="{{ old('Cost') }}">
                @error('Cost')
                    <p style="color: red;">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="MaxQuantity" class="form-label">MaxQuantity</label>
                <input type="number" class="form-control" id="MaxQuantity" aria-describedby="emailHelp" name="MaxQuantity" value="{{ old('MaxQuantity') }}">
                @error('MaxQuantity')
                    <p style="color: red;">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>