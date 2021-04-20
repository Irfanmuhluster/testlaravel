<?php

namespace App\Http\Controllers;

use App\Http\Requests\produkstore;
use App\Models\Kategoribaju;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //

        $produk = new Produk();
        $category = new Kategoribaju();

        $select = $request->category;

        $getcategory = $category->select('id', 'category_name')->get();
        $dataproduk = $produk->search()->paginate(5);
        return view('produk.index', compact('dataproduk', 'getcategory', 'select'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $category = new Kategoribaju();
        $getcategory = $category->select('id', 'category_name')->get();
        return view('produk.create', compact('getcategory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(produkstore $request)
    {
        
        // insert
        // dd($request->size);
        $produk = new Produk();
        $produk->category_id = $request->category;
        $produk->product_name = $request->product_name;
        $produk->product_description = $request->product_description;
        $produk->image1 =  $request->image1;
        $produk->image2 =  $request->image2;
        $produk->size =  $request->size;
        $produk->color =  $request->color;
        $produk->harga_s =  $request->harga_s;
        $produk->harga_m =  $request->harga_m;
        $produk->harga_l =  $request->harga_l;

        $produk->save();
        session()->flash('success', 'Berhasil simpan data');
        return redirect()->route('produk.index');
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
        //
        $product = new Produk();
        $category = new Kategoribaju();

        $dataproduk = $product->findOrFail($id);
        // dd();
        $getcategory = $category->select('id', 'category_name')->get();
        return view('produk.edit', compact('dataproduk', 'getcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(produkstore $request, $id)
    {
        //
        $update = Produk::findOrFail($id);

        $update->category_id = $request->category;
        $update->product_name = $request->product_name;
        $update->product_description = $request->product_description;
        $update->image1 =  $request->image1;
        $update->image2 =  $request->image2;
        $update->size =  $request->size;
        $update->color =  $request->color;
        $update->harga_s =  $request->harga_s;
        $update->harga_m =  $request->harga_m;
        $update->harga_l =  $request->harga_l;

        $update->update();

        session()->flash('success', 'Berhasil update data');
        return redirect()->back();
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        // dd($id);
        Produk::findOrFail($id)->delete();

        session()->flash('success', 'Berhasil delete data');
        return redirect()->back();
    }
}
