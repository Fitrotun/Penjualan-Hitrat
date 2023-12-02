<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use Carbon\Carbon;
use App\Models\Comment;
use App\Models\History;
use App\Models\Transaction;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Barryvdh\DomPDF\Facade\Pdf;

class PenggunaController extends Controller
{
    // public function __construct()
    // {
    //     return $this->middleware('user') && $this->middleware('login');
    // }



    // detail cart
    public function dcart($id){
        $data['products'] = Product::find($id);

        return view('frontend.pages.detail_produk', $data);
    }

     // pesan
        
    public function pesan(Request $request, $id){
        // dd($request);
    	$product = Product::where('id', $id)->first();
        $tanggal = Carbon::now();

    	//cek validasi
    	$cek_cart = Cart::where('id_user', session('id'))->where('status',0)->first();

		if($request->jumlah_pesan > $product->stok)
    	{
    		return redirect('pesan/'.$id);
    	}
    	//simpan ke database cart
    	if(empty($cek_cart))
    	{
    		$cart = new Cart;
	    	$cart->id_user = session('id');
	    	$cart->tanggal = $tanggal;
	    	$cart->status = 0;
	    	$cart->jumlah_harga = 0;
            $cart->kode = mt_rand(100, 999);
	    	$cart->save();
    	}

    	//simpan ke database cart detail
    	$cart_baru = Cart::where('id_user', session('id'))->where('status',0)->first();

    	//cek cart detail
    	$cek_transaksi = Transaction::where('id_product', $product->id)->where('id_cart', $cart_baru->id)->first();
    	if(empty($cek_transaksi))
    	{
    		$transaction = new Transaction();
	    	$transaction->id_product = $product->id;
	    	$transaction->id_cart = $cart_baru->id;
	    	$transaction->jumlah = $request->jumlah_pesan;
			$transaction->image = "aaa";
	    	$transaction->jumlah_harga = $product->price*$request->jumlah_pesan;
	    	$transaction->save();
    	}else 
    	{
    		$transaction = Transaction::where('id_product', $product->id)->where('id_cart', $cart_baru->id)->first();

    		$transaction->jumlah = $transaction->jumlah+$request->jumlah_pesan;

    		//harga sekarang
    		$harga_transaksi_baru = $product->price*$request->jumlah_pesan;
	    	$transaction->jumlah_harga = $transaction->jumlah_harga+$harga_transaksi_baru;
	    	$transaction->update();
    	}

    	//jumlah total
    	$cart = Cart::where('id_user', session('id'))->where('status',0)->first();
    	$cart->jumlah_harga = $cart->jumlah_harga+$product->price*$request->jumlah_pesan;
    	$cart->update();
    	
    	return redirect('/check-out');  
    }


}

	
