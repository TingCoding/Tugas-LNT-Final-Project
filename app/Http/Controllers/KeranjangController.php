<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Keranjang;
use App\Models\Order;
use App\Models\Shipment;
use App\Models\Stock;
use Illuminate\Http\Request;

class KeranjangController extends Controller
{
    function add($id) {
        $s = Stock::find($id);
        $c = Category::find($id);
        $sh = Shipment::find($id);
        $or = Order::find($id);

        return view('addFaktur', compact('s', 'c', 'sh', 'or'));
    }

    function add1(Request $request) {
        $request->validate([
            'NomorInvoice' => ['required'],
            'Address' => ['required', 'string', 'min:10', 'max:100'],
            'KodePos' => ['required', 'digits:5'],
            'items' => ['required', 'array'],
            'items.*.quantity' => ['required', 'integer', 'min:1'],
            'items.*.price' => ['required', 'numeric', 'min:0'],
            'items.*.subtotal' => ['required', 'numeric', 'min:0'],
        ]);

        $totalHargaSemua = 0;
        foreach ($request->items as $item) {
            $totalHargaSemua += $item['subtotal'];
        }

        $keranjang = Keranjang::create([
            'NomorInvoice' => $request->NomorInvoice,
            'Address' => $request->Address,
            'KodePos' => $request->KodePos,
            'SubTotal' => $totalHargaSemua,
            'TotalHargaSemua' => $totalHargaSemua,
        ]);

        // Logika untuk menyimpan item-item keranjang jika diperlukan

        return redirect('/product');
    }
}
