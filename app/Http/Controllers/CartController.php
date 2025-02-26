<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Item;
use App\Models\Package;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function index()
    {
        $carts = Cart::where('user_id', auth()->id())->get();
        foreach($carts as $cart)
        {
            $cart->allitems = explode(',', $cart->items);
            $itemprice = 0;
            $items = [];
            foreach($cart->allitems as $item)
            {
                $a = Item::find($item);
                $itemprice += $a->rate;
                array_push($items, $a->name);
            }
            $cart->itemprice = $itemprice;
            $cart->items = $items;
        }
        return view('cart', compact('carts'));
    }

    public function store(Request $request)
    {
        $message = [
            'items.required' => 'Please select at least one item',
        ];
        $package = Package::find($request->package_id);
        $minpeople = $package->capacity * 0.2;
        $maxpeople = $package->capacity;
        $data = $request->validate([
            'package_id' => 'required',
            'no_of_people' => "required|numeric|min:$minpeople|max:$maxpeople",
            'items' => 'required',
            'booking_date' => 'required',
        ],$message);
        // $data['user_id'] = auth()->user()->id;
        $data['user_id'] = auth()->id();
        $data['status'] = 'Pending';
        $data['items'] = implode(',', $data['items']);
        Cart::create($data);

        return redirect()->route('cart.index')->with('success', 'Item added to cart');


    }

    public function delete($id)
    {
        Cart::find($id)->delete();
        return redirect()->route('cart.index')->with('success', 'Item removed from cart');
    }

    public function checkout($cartid)
    {
        $cart = Cart::find($cartid);
        $allitems = explode(',', $cart->items);
        $itemprice = 0;
        foreach($allitems as $item)
        {
            $a = Item::find($item);
            $itemprice += $a->rate;
        }
        $totalprice = $cart->package->price + $itemprice * $cart->no_of_people;
        return view('checkout', compact('cart','totalprice'));
    }
}
