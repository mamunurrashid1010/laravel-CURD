<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * show
     * @return array of product list
     */
    function show(){
        $products=Products::all();
        return view('Product.show',compact('products'));
    }

    /**
     * save
     * @param product info;
     * @return string of success/fail message
     */
    function save(Request $request){
        $request->validate([
            'name'   => 'required',
            'brand'  => 'required',
            'model'  => 'required',
            'price'  => 'required',
        ]);
        $result=Products::insert([
           'name'       => $request->name,
           'brand'      => $request->brand,
           'model'      => $request->model,
           'price'      => $request->price,
           'created_at' => Carbon::now(),
        ]);
        if($result)
            return back()->with('status', 'successfully inserted');
        else
            return back()->with('status', 'fail!');
    }

    /**
     * edit
     * @param Request->id
     * @return string of success/fail message
     */
    function edit(Request $request){
        $product=Products::where('id',$request->id)->first();
        return view('Product.edit',compact('product'));
    }

    /**
     * update update product info
     * @param edit product info
     * @return string of success/fail message
     */
    function update(Request $request){
        $request->validate([
            'id'   => 'required',
            'name'   => 'required',
            'brand'  => 'required',
            'model'  => 'required',
            'price'  => 'required',
        ]);
        $data=[
            'name'       => $request->name,
            'brand'      => $request->brand,
            'model'      => $request->model,
            'price'      => $request->price,
            'updated_at' => Carbon::now(),
        ];
        $result=Products::where('id',$request->id)->update($data);
        if($result)
            return back()->with('status', 'Update successfully');
        else
            return back()->with('status', 'fail!');

    }

    /**
     * delete function delete product record
     * @param Request->id
     * @return string of success/fail message
     */
    function delete(Request $request){
        $result=Products::where('id',$request->id)->delete();
        if($result)
            return back()->with('status', 'Delete successfully');
        else
            return back()->with('status', 'fail!');
    }
}
