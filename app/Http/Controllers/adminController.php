<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\products;

class adminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('roleCheck:1'); // roleCheck middleware takes one argument which sets which role is needed to access this controller.  0 - user, 1 - admin
    }


    public function ctrlPanel(){
        // load main view of admin panel
        return view('ctrl.panel');
    }

    public function createProduct(){
        // load product create page
        return view('ctrl.create');
    }

    public function store(Request $request){
        // save data from create page to database
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'imgUrl' => 'required',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'group' => 'required',
        ]);
        
        $product = new products();

        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->image = $request->input('imgUrl');
        $product->price = $request->input('price');
        $product->group = $request->input('group');

        $product->save();

        return redirect('/controlpanel')->with('success', 'Product created');

    }

    public function viewproducts(){
        // view all products
        $products = products::all();

        return view('ctrl.viewproducts')->with('products', $products);
    }

    public function destroyProduct($id){
        // remove product
        $product = products::where('id', $id)->delete();

        return redirect('/controlpanel/viewproducts')->with('success', 'product Deleted');
    }
}
