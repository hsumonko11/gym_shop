<?php

namespace App\Http\Controllers\Admins;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Customer;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->search){
            $date = Carbon::parse($request->search);
            $orders = Order::whereDate('created_at',$date)
                                    ->latest('id')
                                    ->paginate(10);
        }elseif($request->from && $request->to){
            $from = $request->from;
            $to = $request->to;
            if($from == $to){
                $orders = Order::whereDate('created_at',$from)
                                    ->latest('id')
                                    ->paginate(10);
            }else{
                $orders = Order::whereBetween('created_at', [$from, $to])
                            ->latest('id')
                            ->paginate(10);
            }
            
        }else{
            $orders = Order::latest('id')->paginate(10);
        }

        return view('admins.orders.index',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = Order::find($id);
        $customer = Customer::where('order_id',$id)->first();
        $order_details = OrderDetail::where('order_id',$id)->get();

        return view('admins.orders.detail',compact('order','customer','order_details'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // $request->validate([
        //     'status' => "required",
        // ]);


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $order = Order::find($id);
            $order->status = $request->status;
            $order->save();

            return redirect()->route('admin.orders.index')->with('success','Changing status is successful.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
