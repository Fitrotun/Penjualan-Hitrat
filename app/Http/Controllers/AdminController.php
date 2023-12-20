<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Admin;
use App\Models\Transaction;

class AdminController extends Controller
{
    // public function __construct(){
    //     return $this->middleware('admin') && $this->middleware('login');
    // }
    
    // DASHBOARD
    public function index(){
        return view('backend.pages.admin.admin',[
             'item' => DB::table('admins')->paginate(10),
             'title' => 'Admin'
        ]);
         
     }
 
     // Tampilan Create Admin
     public function create(){
         return view('backend.pages.admin.admin_add');
     }
 
     // Create Admin
     public function store(Request $request){
        // dd($request->all());
         $validatedData=$request->validate([
             'name' => 'required',
             'email' => 'required|email',
             'password' => 'required|min:5',
             'alamat' => 'required|min:5',
             'noHp' => 'required',
             'jenisKelamin' => 'required',
         ]);
         $validatedData['password']=bcrypt($validatedData['password']);
         Admin::create($validatedData); //untuk menyimpan data
         
         // toast('Registration has been successful','success');
         return redirect()->intended('/admin');
     }
 
     // Tampilan Edit
     public function edit($id){
         return view("backend.pages.admin.admin_edit",[
             'title' => 'Admin - Edit Admin',
             'item' => Admin::find($id),
         ]);
     }
         
     // Simpan Hasil Edit
     public function update(Request $request, $id){
        // dd($request->all());
        $validatedData=$request->validate([
             'name' => 'required',
             'email' => 'required|email',
            //  'password' => 'required|min:5',
             'alamat' => 'required|min:5',
             'noHp' => 'required',
             'jenisKelamin' => 'required',
         ]);
 
         // Menyimpan update
         $user = Admin::find($id);
         $user->name = $request->name;
         $user->email = $request->email;
        //  $user->password = $request->password;
         $user->alamat = $request->alamat;
         $user->noHp = $request->noHp;
         $user->jenisKelamin = $request->jenisKelamin;
         $user->save();
         
         // toast('Your data has been saved!','success');
         return redirect("/admin"); // untuk diarahkan kemana
     }
 
     // Hapus Data User
     public function destroy(Request $request, $id){
         Admin::destroy($id);
         // Session::flash('hapussuccess', 'Data berhasil dihapus!');
         // toast('Your data has been deleted!','success');
         return redirect("/admin"); // untuk diarahkan kemana
     } 

     // dashbord list transaksi - role admin
    public function transaction()
    {
		$data ['title'] = 'Cart';
        $data['transaction'] = Transaction::with('cart', 'product')->get();

    	return view('backend.pages.admin.listTransaksi', $data);
    }
     
}
