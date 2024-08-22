<?php

namespace App\Http\Controllers\Admins;

use PDF;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index(Request $request)
    {
        if($request->search){
            $products = Product::where('name','LIKE',$request->search.'%')
                                    ->latest('id')
                                    ->paginate(10);
        }else{
            $products = Product::latest('id')->paginate(10);
        }

        return view('admins.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();
        return view('admins.products.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $product = new Product;

        if($request->hasFile('image')){
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $image_unique = time().'-'.$image_name;
            $image->storeAs('public/products',$image_unique);

            $product->image = $image_unique;
        }
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        // $product->price = $request->price;
        // $product->quantity = $request->quantity;
        $product->save();

        return redirect()->route('admin.products.index')->with('success','ကုန်ပစ္စည်းအသစ်ထည့်ခြင်း အောင်မြင်ပါသည်');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        return view('admins.products.detail',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::get();
        return view('admins.products.edit',compact('product','categories'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);

        if($product->image && $request->hasFile('image')){
            Storage::delete('public/products/'.$product->image);
        }

        if($request->hasFile('image')){
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $image_unique = time().'-'.$image_name;
            $image->storeAs('public/products',$image_unique);

            $product->image = $image_unique;
        }
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        // $product->price = $request->price;
        // $product->quantity = $request->quantity;
        $product->save();

        return redirect()->route('admin.products.index')->with('success','ပြင်ဆင်ခြင်း အောင်မြင်ပါသည်');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::where('id',$id)->first();

        if($product->image){
            Storage::delete('public/products/'.$product->image);
        }

        $product->delete();

        return back()->with('success','ပယ်ဖျက်ခြင်း အောင်မြင်ပါသည်');
    }

    // public function pdfview(Request $request)
    // {

    //     $orders = Order::latest('id')->get();
    //     view()->share('orders',$orders);

    //     if($request->has('download')){
    //         $pdf = PDF::loadView('admins.orders.pdf');
    //         return $pdf->download('orders .pdf');
    //     }

    //     return redirect()->route('admin.orders.index');
    // }

    public function pdfView(Request $request)
{
    $query = Order::query();

    if ($request->has('from') && $request->has('to')) {
        $query->whereBetween('created_at', [$request->from, $request->to]);
    }

    $orders = $query->get();

    // Pass $orders to your PDF generation logic here.
    $pdf = PDF::loadView('admins.orders.pdf', compact('orders'));

    return $pdf->download('orders.pdf');
}

}

