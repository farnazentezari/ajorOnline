<?php

namespace App\Http\Controllers;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $Products = Products::latest()->paginate(10);
        return [
            "status" => 1,
            "data" => $Products
        ];
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
    public function store(Request $request)
    {
        $request->validate([
            'size' => 'required',
            'type' => 'required',
            'color' => 'required',
            'owner' => 'required',
            'count' => 'required',
            'price' => 'required',

        ]);

        // var_dump($request);
        $Products = Products::create($request->all());
        return [
            "status" => 1,
            "data" => $Products
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Products = Products::where(['id'=>$id])->latest()->paginate(10);
        return [
            "status" => 1,
            "data" => $Products
        ];
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
    public function update(Request $request,$id)
    {
        
        $Products=$request->all();
        $listUpdate=[];
        foreach($Products as $key=>$Product){
            $listUpdate[$key]=$Product;
        }

        Products::where(['id'=>$id])->update($listUpdate);

        return [
            "status" => 1,
            "data" => $listUpdate,
            "msg" => "Products updated successfully"
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Products::where(['id'=>$id])->delete();
        return [
            "status" => 1,
            "msg" => "product deleted successfully"
        ];
    }
}
