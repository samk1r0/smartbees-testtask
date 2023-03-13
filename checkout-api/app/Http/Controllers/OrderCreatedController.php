<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\User;
use App\Models\Promocode;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class OrderCreatedController extends Controller
{
    public function __invoke(Request $request){

        $validated = $request->validate([ // weryfikacja wymaganych pól zamówienia
            'email' => 'required|email',
            'delivery_method' => 'required|max:21',
            'payment_method' => 'required',
            'address' => 'required',
            'country' => 'required',
            'name' => 'required',
            'surname' => 'required',
            'postal_index' => 'required',
            'city' => 'required',
            'phone' => 'required|max:18',
            'summary' => 'required|numeric',
            'terms_and_services_agreement' => 'accepted'
        ]);

        if($request->password){ // Jeżeli end-user chce stwórzyć konto - robi się weryfikacja haseł i w przypadku udanej weryfikacji tworzy się konto.
            $validated = $request->validate([
                'password' => 'same:password_confirmation'
            ]);
            $user = new User;
            $user->email = $request->email;
            $user->name = $request->name;
            $user->password = Hash::make($request->password);
            $user->save();
        }


        $order = new Order;
        
        $order->email = $request->email;
        $order->delivery_method = $request->delivery_method;
        $order->payment_method = $request->payment_method;
        $order->address = $request->address;
        $order->country = $request->country;
        $order->name = $request->name;
        $order->surname = $request->surname;
        $order->postal_index = $request->postal_index;
        $order->customer_order_id = Str::uuid();
        $order->city = $request->city;
        $order->phone = $request->phone;
        $order->summary = $request->summary;
        $order->newsletter_subscribe = $request->newsletter_agreement;
        $order->additional_address = $request->additional_address;
        $order->additional_postal_code = $request->additional_postal_code;
        $order->additional_city = $request->additional_city;
        $order->additional_country = $request->additional_country;
        $order->comment = $request->comment;

        $order->save();

        DB::table('orders_products')->insert([
            'product_id' => $request->product_id,
            'order_id' => $order->id,
            'amount' => 115
        ]);


        return $order->customer_order_id;
    }
}
