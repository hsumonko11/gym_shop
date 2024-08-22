<?php

namespace App\Http\Controllers\Admins;

use Carbon\Carbon;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Models\SupplierProduct;
use App\Http\Controllers\Controller;

class SupplierProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->search) {
            $date = Carbon::parse($request->search);
            $supplier_products = SupplierProduct::whereDate('last_supplied_date', $date)
                                    ->latest('id')
                                    ->paginate(10);
        } else {
            $supplier_products = SupplierProduct::latest('id')->paginate(10);
        }

        return view('admins.supplier_products.index', compact('supplier_products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $suppliers = Supplier::get();
        $products = Product::get();
        return view('admins.supplier_products.create', compact('suppliers', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $supplier_product = new SupplierProduct;
        $supplier_product->supplier_id = $request->supplier_id;
        $supplier_product->product_id = $request->product_id;
        $supplier_product->quantity = $request->quantity;
        $supplier_product->original_price = $request->price;
        $supplier_product->last_supplied_date = $request->last_supplied_date;
        $supplier_product->save();

        if ($request->product_id) {
            $product = Product::where('id', $request->product_id)->first();
            $product->quantity += $request->quantity;
            $product->price = $supplier_product->original_price * 1.1; // Adding 10% to the original price
            $product->save();
        }

        return redirect()->route('admin.supplier_products.index')->with('success', 'အသစ်ထည့်ခြင်း အောင်မြင်ပါသည်!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $suppliers = Supplier::get();
        $products = Product::get();

        $supplier_product = SupplierProduct::find($id);

        return view('admins.supplier_products.edit', compact('suppliers', 'products', 'supplier_product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $supplier_product = SupplierProduct::find($id);
        $supplier_product->supplier_id = $request->supplier_id;
        $supplier_product->product_id = $request->product_id;
        $supplier_product->original_price = $request->price;
        $supplier_product->last_supplied_date = $request->last_supplied_date;
        $supplier_product->save();

        if ($request->product_id) {
            $product = Product::where('id', $request->product_id)->first();
            $product->price = $supplier_product->original_price * 1.1; // Adding 10% to the original price
            $product->save();
        }

        return redirect()->route('admin.supplier_products.index')->with('success', 'ပြင်ဆင်ခြင်း အောင်မြင်ပါသည်!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        SupplierProduct::where('id', $id)->delete();

        return back()->with('success', 'ပယ်ဖျက်ခြင်း အောင်မြင်ပါသည်!');
    }
}
