<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use App\Traits\Common;

class ProductsController extends Controller
{
    use common;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderBy('created_at','Asc')->take(3)->get();
        return view('index', compact('products'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add_product');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $data = $request->validate([
                'image'=> 'required|mimes:png,jpg,jpeg', 
                'title'=> 'required|string',
                'price'=> 'required|numeric',    
                'description'=> 'required|string|max:1000',    
                           
        ]);

        $data['image']= $this->uploadFile($request->image, 'assets/new/images/');
        $data['published']=isset($request->published);
       

        Product::create($data);
        return redirect()->route('products.allProducts');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)

    {
        $product= product::findOrFail($id);
        return view ('product_details', compact('product'));

    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product= Product::findOrFail($id);
        return view ('edit_product', compact('product'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request,$id);

        $data = $request->validate([
            'image'=> 'nullable|mimes:png,jpg,jpeg', 
            'title'=> 'required|string',
            'price'=> 'required|numeric',     
            'description'=> 'required|string|max:1000',
            
    ]);

    if ($request->hasFile('image')) { 
  $data['image']= $this->uploadFile($request->image, 'assets/new/images/');
    }

    $data['published']=isset($request->published);
    // dd($data);

       Product::where('id', $id)->update($data);
        return redirect()->route('products.allProducts');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product::where('id', $id)->delete();
        return redirect()->route('products.allProducts');
    }



    public function showDeleted()
    {
      $products= Product::onlyTrashed()->get();
        return view('trashedProducts', compact('products'));
    }



    public function restore(string $id)
    {
        Product::where('id', $id)->restore();
        return redirect()->route('products.showDeleted');
    }



    public function forceDelete(Request $request):RedirectResponse
    {
        $id=$request->id;
        Product::where('id', $id)->forceDelete();
        return redirect()->route('products.showDeleted'); ;  
    }


    public function allProducts()
    {
        $products = Product::get();
        return view('all_products', compact('products'));
    }

}
