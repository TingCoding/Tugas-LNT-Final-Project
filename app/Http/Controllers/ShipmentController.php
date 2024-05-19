<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use Illuminate\Http\Request;

class ShipmentController extends Controller
{
    function add() {
        return view('addShipment');
    }

    function add1(Request $request) {
        $request->validate([
            'ShipmentType' => ['required', 'string'],
            'Estimation' => ['required', 'integer'],
            'Cost' => ['required', 'integer'],
            'MaxQuantity' => ['required', 'integer']
        ]);

        Shipment::create([
            'ShipmentType' => $request->ShipmentType,
            'Estimation' => $request->Estimation,
            'Cost' => $request->Cost,
            'MaxQuantity' => $request->MaxQuantity
        ]);

        return redirect('/product');
    }
}
