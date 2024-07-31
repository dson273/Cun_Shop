<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Mail\OrderInvoice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class InvoiceController extends Controller
{
    public function index()
    {
        $orders = Order::with('Order_items')->get();
        return view('admin.invoices.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::with('Order_items')->findOrFail($id);
        return view('admin.invoices.show', compact('order'));
    }
    public function sendEmail($id)
    {
        $order = Order::with('Order_items')->findOrFail($id);
        Mail::to($order->email)->send(new OrderInvoice($order));

        return redirect()->route('admin.invoices.index')->with('success', 'Hóa đơn đã được gửi đến khách hàng!');
    }
}
