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

    // detail cart
    public function dcart($id){
        $data['products'] = Product::find($id);

        return view('frontend.pages.detail_produk', $data);
    }

    

}

	
