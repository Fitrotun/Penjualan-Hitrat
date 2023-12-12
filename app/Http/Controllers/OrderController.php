<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    const MENUNGGU_PEMBAYARAN = 'menunggu pembayaran';
    const VERIFIKASI_PEMBAYARAN = 'verifikasi pembayaran';
    const DIPROSES = 'diproses';
    const DIKIRIM = 'dikirim';
    const SUKSES = 'sukses';
    const GAGAL = 'gagal';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::where(['id_user' => session('id')])->get();

        $data = [
            'orders' => $orders,
        ];

        return view('frontend.pages.order-list', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'id_user' => ['required'],
            'products' => ['required'], // array of id_product, price, and quantity
        ]);

        $order = Order::create([
            'id_user' => $validated['id_user'],
            'order_date' => now(),
            'status' => OrderController::MENUNGGU_PEMBAYARAN,
        ]);

        $products = json_decode($validated['products'] );
        $product_data = [];
        foreach ($products as $product) {
            $p = [
                'id_order' => $order->id,
                'id_product' => $product->id_product,
                'quantity' => $product->quantity,
                'unit_price' => $product->total_price,
                'created_at' => now(),
                'updated_at' => now(),
            ];

            $remove_from_cart = CartItem::where(['id_product' => $product->id_product])->delete();
            array_push($product_data, $p);
        }

        $orderItem = OrderItem::insert($product_data);

        return redirect(route('order.show', $order->id));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        if(session('id') != null){
            $order = Order::where(['id' => $id])->first();
            if($order == null) {
                return redirect(route('cart.show'));
            }
            else {
                $orderItems = OrderItem::where(['id_order' => $id])->get();
                $data =[
                    'order' => $order,
                    'orderItems' => $orderItems,
                ];
                return view('frontend.pages.order', $data);
            }
        }
        else {
            return redirect("/");
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $item = Order::destroy($id);
        return redirect(route('order.index'));
    }
}
