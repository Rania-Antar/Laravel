<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\UserProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $PerPage= 5;
        $products = Product::orderBy('category_id','asc')->paginate($PerPage);
        #$products = Product::groupBy('category_id')->paginate($PerPage);
        return view('products.index')->with('products',$products);
    }
    public function productApi(){
        return Product::orderBy('created_at','desc')->take(10)->get();

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories= Category::all();
        return view('products.create')->with('categories',$categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $product= Product::create($request->all());
        $p= new UserProduct();
        $p['user_id'] = Auth::user()->id;
        $p['product_id'] = $product->id;
        $p->save();
        #$product->users()->attach(Auth::user());
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view ('products.show')->with('product',$product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories= Category::all();
        return view('products.edit',['product'=>$product , 'categories'=>$categories]);
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
        $product = Product::find($id);
        $product->fill($request->all());
        $product->save();
        return redirect()->route('products.index')->with('success','Product Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product ->delete();
        return redirect('products')->with('success','Product Deleted');
    }

    public function delete(Product $product)
    {
        $product->users()->detach(Auth::user());
        return redirect()->route('userProduct.index');

    }

    public function api()
    {
        $categories= Category::all();
        return view('ajax.index')->with('categories',$categories);
    }
}
