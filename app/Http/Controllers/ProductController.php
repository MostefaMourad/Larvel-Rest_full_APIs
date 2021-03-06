<?php

namespace App\Http\Controllers;

use App\Helpers\APIHelpers;
use App\Http\Requests\SaveProductRequest;
use Illuminate\Http\Request;

use App\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $response = APIHelpers::createAPIResponse(false,200,'',$products);
        return response()->json($response,200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveProductRequest $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->discription = $request->discription;
        $product->price= $request->price;
        $product_save = $product->save();
        if($product_save){
            $response = APIHelpers::createAPIResponse(false,201,'Product added successfully',null);
            return response()->json($response,200);
        }
        else{
            $response = APIHelpers::createAPIResponse(false,400,'Product failed to add',null);
            return response()->json($response,400);
        }
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
      $response = APIHelpers::createAPIResponse(false,200,'laay laay',$product);
      return response()->json($response,200);
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
        $product->name = $request->name;
        $product->discription = $request->discription;
        $product->price = $request->price;
        $product_updated = $product->save();

        if($product_updated){
            $response = APIHelpers::createAPIResponse(false,200,'Product updated successfully',null);
            return response()->json($response,200);
        }
        else{
            $response = APIHelpers::createAPIResponse(false,400,'Product failed too update',null);
            return response()->json($response,400);
        }
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
        $product_del= $product->delete();

        if($product_del){
            $response = APIHelpers::createAPIResponse(false,200,'Product deleted successfully',null);
            return response()->json($response,200);
        }
        else{
            $response = APIHelpers::createAPIResponse(false,400,'Product failed too delete',null);
            return response()->json($response,400);
        }
    }
}
