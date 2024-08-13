<?php

namespace App\Http\Controllers\Admins;

use App\Models\User;
use App\Models\Order;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Models\SupplierProduct;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function dashboard(){
        $products = Product::get();
        $categories = Category::get();
        $suppliers = Supplier::get();
        $supplier_products = SupplierProduct::get();
        $customers = Customer::get();
        $orders = Order::get();
        $incomes = Order::where('status','Delivered')->get();

        $total_orders = Order::where('status','Delivered')->select(DB::raw("SUM(total_amount) as total_amounts"), DB::raw("MONTHNAME(created_at) as month_name"))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(DB::raw("Month(created_at)"), DB::raw("MONTHNAME(created_at)"))
                    ->pluck('total_amounts', 'month_name');

        $labels = $total_orders->keys();
        $data = $total_orders->values();

        // dd($labels . $data);

        return view('admins.layouts.dashboard',compact('products','categories','suppliers','supplier_products','orders','customers','incomes','labels','data'));
    }

    public function profile(){
        $user = User::where('id',auth()->user()->id)->first();
        return view('admins.layouts.profile',compact('user'));
    }


    public function updateProfile($id,Request $request){
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return back()->with('success','ကိုယ်ရေးမှတ်တမ်းပြင်ဆင်ခြင်း အောင်မြင်ပါတယ်');
    }
    public function contactUs(Request $request){
        if($request->search){
            $date = Carbon::parse($request->search);
            $contacts = Contact::whereDate('created_at',$date)
                                    ->latest('id')
                                    ->paginate(10);
        }else{
            $contacts = Contact::latest('id')->paginate(10);
        }
        return view('admins.layouts.contact_us',compact('contacts'));
    }
    public function deleteContact($id){
        Contact::where('id',$id)->delete();

        return back()->with('success','ပယ်ဖျက်ခြင်းအောင်မြင်ပါသည်');
    }

}
