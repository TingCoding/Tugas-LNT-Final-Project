<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StockController extends Controller
{
    function createStock(){
        $categories = Category::all();
        return view('addProduct', compact('categories'));
    }

    function createStock1(Request $request){
        $request->validate([
            'Category' => ['required', 'string'],
            'Name' => ['required', 'string', 'min:5', 'max:80'],
            'Price' => ['required', 'integer'],
            'Quantity' => ['required', 'integer'],
            'Photo' => ['required', 'image'],
            'CategoryId' => ['required', 'string']
        ]);

        $now = now()->format('Y-m-d_H.i.s');
        $filename = $now.'_'.$request->file('Photo')->getClientOriginalName();
        $request->file('Photo')->storeAs('/public'.'/'.$filename);

        Stock::create([
            'Category' => $request->Category,
            'Name' => $request->Name,
            'Price' => $request->Price,
            'Quantity' => $request->Quantity,
            'Photo' => $filename,
            'CategoryId' => $request->CategoryId
        ]);

        return redirect('/product');
    }

    public function viewStock(){
        $stocks = Stock::all();
        $categories = Category::all();
        return view('product', compact('stocks', 'categories'));
    }

    public function editStock($id){
        $stock = Stock::findOrFail($id);
        $categories = Category::all();
        return view('edit', compact('stock', 'categories'));
    }

    public function updateStock(Request $request, $id){
        $request->validate([
            'Category' => ['required', 'string'],
            'Name' => ['required', 'string', 'min:5', 'max:80'],
            'Price' => ['required', 'integer'],
            'Quantity' => ['required', 'integer'],
            'Photo' => ['required', 'image'],
            "CategoryId" => ['required', 'string']
        ]);

        Storage::delete('/public'.'/'.Stock::find($id)->Photo);
        $now = now()->format('Y-m-d_H.i.s');
        $filename = $now.'_'.$request->file('Photo')->getClientOriginalName();
        $request->file('Photo')->storeAs('/public'.'/'.$filename);

        Stock::find($id)->update([
            'Category' => $request->Category,
            'Name' => $request->Name,
            'Price' => $request->Price,
            'Quantity' => $request->Quantity,
            'Photo' => $filename,
            'CategoryId' => $request->CategoryId
        ]);

        return redirect('/product');
    }

    public function deleteStock($id){
        $stock = Stock::find($id);
        Stock::destroy($id);
        Storage::delete('/public'.'/'.$stock->Photo);
        return redirect('/product');
    }
}
