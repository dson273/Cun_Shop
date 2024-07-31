<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Order_item;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function viewCart()
    {
        $cart = session()->get('cart');
        return view('users.cart.index', compact('cart'));
    }

    public function addToCart(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);
        $quantity = $request->input('quantity', 1);
        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $quantity;
        } else {
            $cart[$productId] = [
                "name" => $product->name,
                "quantity" => $quantity,
                "price" => $product->price,
                "price_sale" => $product->price_sale,
                "image" => $product->image
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Sản phẩm đã được thêm vào giỏ hàng!');
    }

    public function removeFromCart($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.view');
    }

    public function updateQuantity(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.view');
    }

    public function showCheckout()
    {
        return view('users.cart.checkout');
    }

    public function placeOrder(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric',
            'email' => 'required|email',
            'address' => 'required|string|max:255',
            'payment_method' => 'required|string|in:cash,online',
        ]);

        $order = Order::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'note' => $request->note,
            'payment_method' => $request->payment_method,
            'status' => 'pending',
            'total' => array_sum(array_map(function ($item) {
                return $item['price_sale'] ? $item['price_sale'] * $item['quantity'] : $item['price'] * $item['quantity'];
            }, session('cart', []))),
        ]);

        foreach (session('cart', []) as $id => $details) {
            Order_item::create([
                'order_id' => $order->id,
                'product_id' => $id,
                'name' => $details['name'],
                'price' => $details['price_sale'] ?: $details['price'],
                'quantity' => $details['quantity'],
                'total' => ($details['price_sale'] ?: $details['price']) * $details['quantity'],
            ]);
        }

        session()->forget('cart');
        return redirect()->route('checkout.thankyou');
    }
    public function thankYou()
    {
        return view('users.cart.thankyou');
    }
}
