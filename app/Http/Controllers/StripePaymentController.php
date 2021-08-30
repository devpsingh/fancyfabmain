<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\ShippingInfo;
use App\Models\BillingInfo;
use App\Models\Product;
use App\Models\Order;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use Stripe;use Session;use Cart;
use App\Mail\OrderMail;
use Mail;

class StripePaymentController extends Controller
{
    public function index()
    {
       if(Cart::count() > 0)
       {
            return view('stripe');
       }
       else{
        return redirect()->route('showcart');
       }
        
    }

    public function process(Request $request)
    {
  		//check if product still available
          foreach(Cart::content() as $cartdata)
          {
              $product=Product::find($cartdata->id);
              if($product->qty < $cartdata->qty)
              {
                      Cart::update($cartdata->rowId, ['qty' => $product->qty]); //updating cart qty if stock is short
                      $cart_update[]='Only '.$product->qty.' quantity available of '.$product->product_name.'';
                  
              }
          }
          if(!empty($cart_update))
          {
              Session::put('error_msg','We have revised your Shopping cart as itme(s) have been sold just now');
                return ['product_short'=>$cart_update];
          }
          else
           {
            //updating product talbe before order
            foreach(Cart::content() as $cartdata)
            {
                $product=Product::find($cartdata->id);
                if($product->qty >= $cartdata->qty)
                {
                    $product->decrement('qty',$cartdata->qty);
                }
                $product=Product::find($cartdata->id);
                if($product->qty==0)
                {
                    $product->update(['available'=>0]);
                }
            }
        
            //strip payment
            \Log::info($request->all());
            $stripe = Stripe::charges()->create([
                'source' => $request->get('tokenId'),
                'currency' => 'GBP',
                'amount' => $request->get('amount') * 100
            ]);
            if($stripe['status']=='succeeded')
            {
                $order_id=random_int(11111111,99999999);
                $order_status=1;
                //update order table
                $shipping_info_id=Session::get('shipping_info_id');
                $billing_info_id=Session::get('billing_info_id');
                $place_order=Order::create([
                    'email'=>$request->email,
                    'shipping_info_id'=>$shipping_info_id,
                    'billing_info_id'=>$billing_info_id,
                    'product_info'=>Cart::content(),
                    'coupon_code'=>Session::get('code'),
                    'shipping_charges'=>Session::get('delivery_charge'),
                    'product_qty'=>Cart::count(),
                    'discount_value'=>Session::get('discount'),
                    'order_value'=>$request->amount,
                    'order_status'=>$order_status,
                    'order_id'=>$order_id,
                    'payment_mode'=>'stripe',
                    'stripe_id'=>$stripe['id'],

                ]);
                //send mail 
                $shipping=ShippingInfo::find($shipping_info_id);
                $billing=BillingInfo::find($billing_info_id);
                if(empty($billing))
                {
                    $billing=$shipping;
                }
                $shipping_country_obj=Country::find($shipping->country_id);
                $shipping_country_name=$shipping_country_obj->name;
                $shipping_state_obj=State::find($shipping->state_id);
                if(!empty($shipping_state_obj)){
                    $shipping_state_name=$shipping_state_obj->name;
                }else{
                    $shipping_state_name="N/A";
                }
                $shipping_city_obj=City::find($shipping->city_id);
                if(!empty($shipping_city_obj)){
                    $shipping_city_name=$shipping_city_obj->name;
                }else{
                    $shipping_city_name="N/A";
                }
                //billing info
                $billing_country_obj=Country::find($billing->country_id);
                $billing_country_name=$billing_country_obj->name;
                $billing_state_obj=State::find($billing->state_id);
                if(!empty($billing_state_obj)){
                    $billing_state_name=$billing_state_obj->name;
                }else{
                    $billing_state_name="N/A";
                }
                $billing_city_obj=City::find($billing->city_id);
                if(!empty($billing_city_obj)){
                    $billing_city_name=$billing_city_obj->name;
                }else{
                    $billing_city_name="N/A";
                }
                $order=Order::where('email',$request->email)->get()->last();
                
                $data = array(
                    'email'=>$request->email,
                    'shipping_first_name'=>$shipping->first_name,
                    'shipping_last_name'=>$shipping->last_name,
                    'shipping_address_1'=>$shipping->address_1,
                    'shipping_address_2'=>$shipping->address_1,
                    'shipping_address_3'=>$shipping->address_1,
                    'shipping_country'=>$shipping_country_name,
                    'shipping_state'=>$shipping_state_name,
                    'shipping_city'=>$shipping_city_name,
                    'shipping_zip'=>$shipping->postal_code,
                    'shipping_mobile'=>$shipping->mobile,
                    'billing_first_name'=>$billing->first_name,
                    'billing_last_name'=>$billing->last_name,
                    'billing_address_1'=>$billing->address_1,
                    'billing_address_2'=>$billing->address_1,
                    'billing_address_3'=>$billing->address_1,
                    'billing_country'=>$billing_country_name,
                    'billing_state'=>$billing_state_name,
                    'billing_city'=>$billing_city_name,
                    'billing_zip'=>$billing->postal_code,
                    'billing_mobile'=>$billing->mobile,
                    'invoice_id'=>$order->id,
                    'product_info'=>Cart::content(),
                    'coupon_code'=>Session::get('code'),
                    'shipping_charges'=>Session::get('delivery_charge'),
                    'product_qty'=>Cart::count(),
                    'discount_value'=>Session::get('discount'),
                    'order_value'=>$request->amount,
                    'order_status'=>$order_status,
                    'order_id'=>$order_id,
                    'stripe_id'=>$stripe['id'],
                );
        
                Mail::to(''.$request->email.'')->send(new OrderMail($data));

                $msg='success';
            }
            else{
                $msg='failed';
            }
            if(Session::get('error_msg'))
            {
                Session::forget('error_msg');
            }
            Session::forget('discount');
            Session::forget('code');
            Session::forget('delivery_charge');
            Session::forget('billing_info_id');
            Session::forget('shipping_info_id');
            Cart::destroy();
            
            return $msg;
        }
        
    }
}