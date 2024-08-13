<?php

namespace App\Http\Controllers\Admins;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->search){
            $customers = Customer::where('username','LIKE',$request->search.'%')
                                    ->latest('id')
                                    ->paginate(10);
        }else{
            $customers = Customer::latest('id')->paginate(10);
        }

        return view('admins.customers.index',compact('customers'));
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
        //
    }




    public function edit(string $id)
    {
        $customer = Customer::find($id);
        return view('admins.customers.edit',compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $customer = Customer::find($id);
        $customer->username = $request->username;
        $customer->phone = $request->phone;
        $customer->address = $request->address;

        $customer->save();

        return redirect()->route('admin.customers.index')->with('success','ပြင်ဆင်ခြင်း အောင်မြင်ပါသည် !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Customer::where('id',$id)->delete();
        return back()->with('success','ပယ်ဖျက်ခြင်း အောင်မြင်ပါသည် !');
    }
}
