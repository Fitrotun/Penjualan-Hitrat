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

    //  public function search(Request $request)
    // {
    //     // dd(request('search'));
    //     if($request->has('search')){
    //         $products =Product::where('name','LIKE','%'.$request->search.'%')->get();
    //         // $searchProduct = Product::where('name', 'LIKE', '%'.$request->search.'%')->latest()->paginate(15);
    //         // return view('frontend.pages.search', compact('searchProduct'));
    //     }
    //     else{
    //         $products = Product::all();
    //         // return redirect()->back()->with('message', 'Empty Search');
    //     }
    //     return view('frontend.pages.produk', ['products' =>$products]);
    // }

    public function searchProduct(Request $request)
    {
        if($request->search){
            $searchProduct = Product::where('name', 'LIKE', '%'.$request->search.'%')->latest()->paginate(15);
            return view('frontend.pages.search', compact('searchProduct'));
        }
        else{
            return redirect()->back()->with('message', 'Empty Search');
        }
    }

    public function create()
    {
        $data ['title'] = 'Tambah Data Produk';

        $data['category'] = Category::all();

        return view('backend.pages.admin.product_add', $data);
    }



    public function store(Request $request)
    {
        // dd($request->all());
         $request->validate([
            'name' => 'required',
            'image'=> 'required|image|mimes:png,jpg|max:2040',
            'description' => 'required',
            'price' => 'required',
            'discount_price' => 'required',
            'rating' => 'required',
            'id_category' => 'required'
        ]);


        //upload image
        $image = $request->image;
        $fileNameWithoutExtension = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
        $slug = Str::slug($fileNameWithoutExtension);
        $fileExtension = $image->getClientOriginalExtension();
        $new_image = time() .'_'. $slug. ".". $fileExtension;
        $image->move('uploads/product/' ,$new_image);


        $products = new Product();
        $products->image = 'uploads/product/'.$new_image;
        $products->name= $request->name;
        $products->description= $request->description;
        $products->price = $request->price;
        $products->discount_price = $request->discount_price;
        $products->rating = $request->rating;
        $products->stok = $request->stok;
        $products->id_category = $request->id_category;
        $products->save();



        return to_route('product.index');


    }

    public function show($id)
    {
        $data['products'] = Product::find($id);

        return view('frontend.pages.detail_produk', $data);
    }


    public function edit($id)
    {

        $data ['title'] = 'Edit Produk';
        $data['category'] = Category::all();
        $data['products'] = Product::find($id);

        return view('backend.pages.admin.product_edit', $data);

    }


    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'image' => 'image|mimes:png,jpg|max:2040',
            'description' => 'required',
            'price' => 'required',
            'discount_price' => 'required',
            'stok' => 'required',
            'rating' => 'required',
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
        $products->discount_price = $request->discount_price;
        $products->id_category = $request->id_category;
        $products->save();



        return redirect('/product');
    }

    public function destroy($id)
    {
        Product::destroy($id);
        return redirect("/product")->with(['success' => 'Data Berhasil Dihapus!']);
    }

}
