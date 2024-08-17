<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Models\Customer;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        $products = Product::where('quantity', '!=',0)->latest('id')->take(16)->get();
        $category_one = Category::latest('id')->take(1)->first();
        $category_two = Category::latest('id')->skip(1)->take(1)->first();
        $category_three = Category::latest('id')->skip(2)->take(1)->first();
        return view('fronts.layouts.home',compact('products','category_one','category_two','category_three'));
    }

    public function shop(Request $request){
        if($request->category_id != null){
            $search = $request->category_id;
            if($search == 'all'){
                $products = Product::latest('id')->paginate(16);
            }else{
                $products = Product::where('quantity', '!=',0)
                                    ->where('category_id',$search)
                                    ->latest('id')->paginate(16);
            }

        }else{
            $products = Product::latest('id')->paginate(16);
        }


        $categories = Category::get();

        return view('fronts.shops.shop',compact('products','categories'));
    }

    public function shopWithCategory($category_id){

        $products = Product::where('category_id',$category_id)
                                ->latest('id')
                                ->paginate(16);

        $categories = Category::get();

        return view('fronts.shops.shop',compact('products','categories'));
    }

    public function shopDetailPage($id){
        $product = Product::find($id);

        return view('fronts.shops.shop_detail',compact('product'));
    }

    public function cart(Request $request){
        if(auth()->check()){
            $product = Product::where('id',$request->product_id)->first();
            if ($product->quantity >= $request->quantity)   {
            $cart = new Cart();
            $cart->product_id = $request->product_id;
            $cart->customer_id = auth()->user()->id;
            $cart->quantity = $request->quantity;
            $cart->save();

            return redirect()->route('shop')->with('success','ရွေးချယ်ထားသောပစ္စည်းအား ဈေးခြင်းထဲသို့ ထည့်ပြီးပါပြီ');
        }else{
            return back()->with('warning','ကုန်ပစ္စည်းလက်ကျန်မလုံလောက်ပါ ');
        }

        }else{
            return redirect()->route('customer_login_page')->with('warning','အကောင့်ထဲသို့ ဝင်ရောက်ပေးပါ');
        }
    }

    public function cartPage(){
        if(auth()->check()){
            $carts = Cart::where('customer_id',auth()->user()->id)->get();
            return view('fronts.shops.cart',compact('carts'));
        }else{
            return redirect()->route('customer_login_page')->with('warning','အကောင့်ထဲသို့ ဝင်ရောက်ပေးပါ');
        }
    }

    public function removeCart($id){
        Cart::where('id',$id)->delete();

        return response()->json([
            "message" => "success"
        ]);
    }

    public function voucherGenerate($start,$count,$digit){
        for($n = $start;$n < $start+$count; $n++){
            $number = str_pad($start,$digit,"0",STR_PAD_LEFT);
        }

        return $number;
    }

    public function order(Request $request){

        $order = new Order;
        $order->customer_id = $request->user_id;
        $order->total_amount = $request->grand_total;
        $order->save();

        if($order){
            $order = Order::where('id',$order->id)->first();
            $order->voucher_no = "GA".$this->voucherGenerate($order->id,1,7);
            $order->save();

            foreach($request->order_list as $order_list){
                $order_detail = new OrderDetail;
                $order_detail->order_id = $order->id;
                $order_detail->product_id = $order_list['product_id'];
                $order_detail->quantity = $order_list['quantity'];
                $order_detail->price = $order_list['total'];
                $order_detail->save();

                $product = Product::where('id',$order_list['product_id'])->first();
                $product->quantity -= (int)$order_list['quantity'];
                $product->save();

                Cart::where('id',$order_list['cart_id'])->delete();

            }
        }

        return response()->json([
            'message' => 'success',
            'order_id' => $order->id,
        ]);
    }

    public function checkout($id){
        $order = Order::where('id',$id)->first();

        $order_details = OrderDetail::where('order_id',$id)->get();

        return view('fronts.shops.checkout',compact('order','order_details'));
    }

    public function customerInformation(Request $request){

        $request->validate([
            "phone" => "required",
            "address" => "required",
        ]);

        // $user_id = Customer::where('user_id',$request->user_id)->first();
        // if(!$user_id){
            $customer = new Customer;
            $customer->user_id = $request->user_id;
            $customer->order_id = $request->order_id;
            $customer->username = auth()->user()->name;
            $customer->phone = $request->phone;
            $customer->address = $request->address;
            $customer->save();
        // }


        $order = Order::where('id',$request->order_id)->first();

        if($request->hasFile('payment_screenshot')){
            $image = $request->file('payment_screenshot');
            $image_name = $image->getClientOriginalName();
            $image_unique = time().'-'.$image_name;
            $image->storeAs('public/payment_screenshots',$image_unique);

            $order->payment_screenshot = $image_unique;
        }

        $order->payment_status = "Paid";

        $order->save();

        return redirect()->route('shop')->with('success','ပစ္စည်းမှာယူခြင်း ‌‌‌‌‌‌အောင်မြင်ပါသည်');
    }

    public function about(){
        return view('fronts.layouts.about');
    }

    public function bmiPage(){
        return view('fronts.layouts.bmi_calculation');
    }

    public function profilePage(){
        $orders = Order::where('customer_id',auth()->user()->id)->latest('id')->paginate(10);
        return view('fronts.auth.profile',compact('orders'));
    }

public function insertPaymentScreenshot($id,Request $request){
        $request->validate([
            "payment_screenshot" => "required",
        ]);

        $order = Order::find($id);

        if($request->hasFile('payment_screenshot')){
            $image = $request->file('payment_screenshot');
            $image_name = $image->getClientOriginalName();
            $image_unique = time().'-'.$image_name;
            $image->storeAs('public/payment_screenshots',$image_unique);

            $order->payment_screenshot = $image_unique;
        }

        $order->payment_status = $request->payment_status;

        $order->save();

        return back()->with('success','Adding Payment Screenshot is successful.');

    }

    public function category(Request $request){
        if($request->search){
            $categories = Category::where('name','LIKE',$request->search.'%')
                                    ->latest('id')
                                    ->paginate(16);
        }else{
            $categories = Category::latest('id')->paginate(16);
        }
        return view('fronts.categories.category',compact('categories'));
    }
}
