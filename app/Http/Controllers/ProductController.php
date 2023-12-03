<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Facedes\File;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // DASHBOARD
    public function index(){
        $data ['title'] = 'Product';
        $data['products'] = Product::with('category')->get();

        return view('backend.pages.admin.product', $data);

     }
 
     public function lindex(){
        $data ['title'] = 'Product';
        $data['products'] = Product::with('category')->get();

        return view('frontend.pages.produk', $data);

     }

     public function search(Request $request)
    {
        // dd(request('search'));
        if($request->has('search')){
            $products =Product::where('name','LIKE','%'.$request->search.'%')->get();
            // $searchProduct = Product::where('name', 'LIKE', '%'.$request->search.'%')->latest()->paginate(15);
            // return view('frontend.pages.search', compact('searchProduct'));
        }
        else{
            $products = Product::all();
            // return redirect()->back()->with('message', 'Empty Search');
        }
        return view('frontend.pages.home', ['products' =>$products]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data ['title'] = 'Tambah Data Produk';
        
        $data['category'] = Category::all();

        return view('backend.pages.admin.product_add', $data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request)
    {
        // dd($request->all()); 
         $request->validate([
            'name' => 'required', 
            'image'=> 'required|image|mimes:png,jpg|max:2040',
            'description' => 'required', 
            'price' => 'required',  
            'id_category' => 'required' 
        ]);

        
        //upload image 
        $image = $request->image; 
        $image = $request->image;
        $slug = ($image->getClientOriginalName());
        $new_image = time() .'_'. $slug;
        $image->move('uploads/product/' ,$new_image);
        
       
        $products = new Product();
        $products->image = 'uploads/product/'.$new_image;
        $products->name= $request->name;
        $products->description= $request->description;
        $products->price = $request->price;
        $products->id_category = $request->id_category;
        $products->save();
        
        return to_route('product.index');
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $data ['title'] = 'Edit Produk';
        $data['category'] = Category::all();
        $data['products'] = Product::find($id);

        return view('backend.pages.admin.product_edit', $data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'image' => 'required',
            'description' => 'required',
            'price' => 'required', 
            'id_category' => 'required'
        ]);

        $products= Product::find($id);
        if($request->hasFile('image')){
            $request->validate([
                'image' => 'required|image|mimes:png,jpg|max:2040'
            ]);
        
        $image = $request->image;
        $slug = Str::slug($image->getClientOriginalName());
        $new_image = time() .'_'. $slug;
        $image->move('uploads/product/', $new_image);
        $products->image = 'uploads/product/'.$new_image;
        }

        
        $products->name= $request->name;
        $products->description= $request->description;
        $products->price = $request->price;
        $products->id_category = $request->id_category;
        $products->save();
        
        

        return redirect('/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
        return redirect("/product")->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
