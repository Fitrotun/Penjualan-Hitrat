<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class AdminTransaksiController extends Controller
{
    public function index() {
        $orders = Order::get();

        $data = [
            'orders' => $orders
        ];

        return view('backend.pages.admin.transaksi.index', $data);
    }

    public function edit($id) {
        $order = Order::where('id', $id)->first();

        $data = [
            'order' => $order
        ];
        return view('backend.pages.admin.transaksi.edit', $data);

    }

    public function updateStatus($id, Request $request) {
        $valReq = $request->validate([
            'status' => ['required']
        ]);
        $order = Order::where('id', $id)->first();

        $prev_status = $order->status;
        // dd($prev_status);

        // UPDATE STATUS
        $order->status = $valReq['status'];
        $order->save();

        // UPDATE STOK
        if(($prev_status == 'menunggu pembayaran' || $prev_status == 'verifikasi pembayaran')  && ($order->status != 'menunggu pembayaran' || $order->status != 'verifikasi pembayaran' || $order->status != 'gagal')) {
            foreach ($order->orderitem as $item) {
                if($item->product->stok < $item->quantity) {
                    return back()->withErrors('Out of stock!!!');
                }else {
                $item->product->stok -= $item->quantity;
                $item->product->save();
                }
            }
        }

        return redirect(route('transaksi.index'));
    }

    public function printReport(){
        $orders = Order::get();

        $data = [
            'orders' => $orders
        ];

        return view('backend.pages.admin.transaksi.report', $data);
    }
}
