<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserController extends Controller
{
    // public function __construct(){
    //     return $this->middleware('admin') && $this->middleware('login');
    // }

    // public function pesan()
    // {
    // return view('pesan');
    // }
    
    // public function flus()
    // {
    // return redirect('/pesan')->with(['success' => 'Pesan Berhasil']);
    // }
    // DASHBOARD
    public function index(){
        return view('backend.pages.admin.user',[
             'item' => DB::table('users')->paginate(10),
             'title' => 'User'
        ]);  
     }
 
     // Tampilan Create Admin
     public function create(){
         return view('backend.pages.admin.user_add');
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
         User::create($validatedData); //untuk menyimpan data
         
         // toast('Registration has been successful','success');
         return redirect()->intended('/user');
     }
 
     // Tampilan Edit
     public function edit($id){
         return view("backend.pages.admin.user_edit",[
             'title' => 'Admin - Edit User',
             'item' => User::find($id),
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
         $user = User::find($id);
         $user->name = $request->name;
         $user->email = $request->email;
        //  $user->password = $request->password;
         $user->alamat = $request->alamat;
         $user->noHp = $request->noHp;
         $user->jenisKelamin = $request->jenisKelamin;
         $user->save();
         
         // toast('Your data has been saved!','success');
         return redirect("/user"); // untuk diarahkan kemana
     }
 
     // Hapus Data User
     public function destroy(Request $request, $id){
         User::destroy($id);
         // Session::flash('hapussuccess', 'Data berhasil dihapus!');
         // toast('Your data has been deleted!','success');
         return redirect("/user"); // untuk diarahkan kemana
     }

     
}
