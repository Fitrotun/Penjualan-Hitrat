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

	// Tampil profile user
		public function __invoke(Request $request)
		{
			$data ['title'] = 'Profile User';
			$data ['user'] = User::where('id', session('id'))->first();

			return view('frontend.user.profile', $data);
		}
		// Update profil user
		public function update(Request $request)
		{
			 $this->validate($request, [
				'password'  => 'confirmed',
			]);
	
			$user = User::where('id', session('id'))->first();
			$user->name = $request->name;
			$user->email = $request->email;
			$user->noHp = $request->noHp;
			$user->alamat = $request->alamat;
			if(!empty($request->password))
			{
				$user->password = Hash::make($request->password);
			}
			
			$user->update();
	
			return redirect('/profile');
		}
		// tambah komentar
		public function insert(Request $request, $id)
		{
			// dd($request->all(),$id);
			$product = Product::where('id', $id)->first();
			
			// cek validasi
			$comment = Comment::where('user_id', session('id'))->get();
			// dd($komen, session('id'));
			// simpan ke database comment
			if($comment)
			{
				// $image = $request->image;
				// $slug = ($image->getClientOriginalName());
				// $new_image = time() .'_'. $slug;
				// $image->move('uploads/comment/' ,$new_image);
			   
				$comment = new Comment;
				$comment->id_wisata = $product->id;
				$comment->user_id = session('id');
				$comment->description = $request->description ;
				$comment->image = 'aa';
				$comment->save();
			}else {
	
				// Comments already exist for the user
				// Handle the case where comments exist
			}
			
			return redirect("/detailwisata/$id");
		}
	
	

    // detail cart
    public function dcart($id){
        $data['products'] = Product::find($id);

        return view('frontend.pages.detail_produk', $data);
    }

     // pesan
        
	 public function pesan(Request $request, $id){
        // dd($request);
    	$product = Product::where('id', $id)->first();

    	//cek validasi
    	$cek_cart = Cart::where('id_user', session('id'))->where('status',0)->first();

    	//simpan ke database cart
    	if(empty($cek_cart))
    	{
    		$cart = new Cart;
	    	$cart->user_id = session('id');
	    	$cart->tanggal = $request->tanggal;
	    	$cart->status = 0;
	    	$cart->jumlah_harga = 0;
            $cart->kode = mt_rand(100, 999);
	    	$cart->save();
    	}

    	//simpan ke database cart detail
    	$cart_baru = Cart::where('id_user', session('id'))->where('status',0)->first();

    	//cek cart detail
    	$cek_transaction = Transaction::where('id_product', $product->id)->where('id_cart', $cart_baru->id)->first();
    	if(empty($cek_transaction))
    	{
    		$transaction = new Transaction();
			$transaction->wisata_id = $product->id;
			$transaction->cart_id = $cart_baru->id;
			$transaction->jumlah = $request->jumlah_pesan;
			$transaction->image = "aaa";
	    	$transaction->jumlah_harga = $product->price*$request->jumlah_pesan;
			$transaction->save();
    	}else 
    	{
    		$transaction = Transaction::where('wisata_id', $product->id)->where('id_cart', $cart_baru->id)->first();

    		$transaction->jumlah =$transaction->jumlah+$request->jumlah_pesan;

    		//harga sekarang
    		$harga_transaction_baru = $product->price*$request->jumlah_pesan;
			$transaction->jumlah_harga = $transaction->jumlah_harga+$harga_transaction_baru;
			$transaction->update();
    	}

    	//jumlah total
    	$cart = Cart::where('id_user', session('id'))->where('status',0)->first();
    	$cart->jumlah_harga = $cart->jumlah_harga+$product->price*$request->jumlah_pesan;
    	$cart->update();
    	
    	return redirect('/check-out');  
		// return view('frontend.pages.pesan', $product);
    }

	// Tampil History 
	public function index()
	{
		$data ['title'] = 'History';
		$data['carts'] = Cart::where('id_user', session('id'))->where('status', '!=',0)->get();

		return view('frontend.user.history', $data);
	}

	public function struk($id)
	{
		$title = 'Detail Riwayat';
		$cart = Cart::where('id', $id)->first();
		$transaction = Transaction::where('id_cart', $cart->id)->get();

		return view('frontend.user.struk', compact('title','cart','transaction'));
	}

	public function check_out()
    {
        $title = 'Cart';
        $cart = Cart::where('id_user', session('id'))->where('status',0)->first();
 	    $transaction = [];
        if(!empty($cart))
        {
            $transaction = Transaction::where('id_cart', $cart->id)->get();
        }
        
        return view('frontend.pesan.check_out', compact('cart', 'transaction', 'title'));
    }


}

	
