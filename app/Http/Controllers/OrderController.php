<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Shipment;
use App\Models\Stock;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    function add($id) {
        $s = Stock::find($id);
        $shipments = Shipment::all();
        return view('addOrder', compact('s', 'shipments'));
    }

    function add1(Request $request, $id) {
        $s = Stock::find($id);


        $request->validate([
            'StockId' => ['required'],
            'ShipmentId'=> ['required'],
            'CustomerName' => ['required'],
            'Estimation' => ['required'],
            'Quantity' => ['required']
        ]);

        $shipment = Shipment::find($request->ShipmentId);
        
        $shipmentRemain = $request->Quantity % $shipment->MaxQuantity;
        $shipmentDivide = $request->Quantity / $shipment->MaxQuantity;

        $shipmentCost = $shipmentDivide * $shipment->Cost;
        if($shipmentRemain > 0) {
            $shipmentCost += $shipment->Cost;
        }

        Order::create([
            'StockId' => $request->StockId,
            'ShipmentId' => $request->ShipmentId,
            'CustomerName' => $request->CustomerName,
            'Estimation' => $request->Estimation,
            'Quantity' => $request->Quantity,
            'TotalPrice' => $request->Quantity * $s->Price + $shipmentCost
        ]);

        return redirect('/product');
    }
}
