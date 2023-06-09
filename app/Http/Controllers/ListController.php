<?php

namespace App\Http\Controllers;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
 


class ListController extends Controller
{
    //
    public function index(){

        $products = Products::all();
        return view('products', compact('products'));
        
    }
    //request for update list
    public function updateList(Request $request){

        $Products=$request->all();
        $id=$Products['id'];
        unset($Products['id']);
        unset($Products['_token']);

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://127.0.0.1:8000/api/products/'.$id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30000,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "PUT",
            CURLOPT_POSTFIELDS => json_encode($Products),
            CURLOPT_HTTPHEADER => array(
                // Set here requred headers
                "accept: */*",
                "accept-language: en-US,en;q=0.8",
                "content-type: application/json",
            ),
        ));

        $response = curl_exec($curl);
        // var_dump($response);die;
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            return redirect(url('/'));
        }
        
    }
    //request for insert list
    public function storeList(Request $request){

        $Products=$request->all();
        

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://127.0.0.1:8000/api/products',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30000,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($Products),
            CURLOPT_HTTPHEADER => array(
                // Set here requred headers
                "accept: */*",
                "accept-language: en-US,en;q=0.8",
                "content-type: application/json",
            ),
        ));

        $response = curl_exec($curl);
        // var_dump($response);die;
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            return redirect(url('/'));
        }
        
    }
    //show list
    public function createList(){
        return view('list');
    }
    //delete method
    public function deleteList($id){

        $response = Http::delete('http://127.0.0.1:8000/api/products/'.$id);
        $products = Products::all();
        return view('products', compact('products'));

        
    }
    //filter
    public function filterList(Request $request){

        $lists=$request->all();
        $listfilter=[];
        unset($lists['_token']);

        foreach($lists as $key=>$list){
            if(!empty($list))
                $listfilter[$key]=$list;
        }
        $products=Products::where($listfilter)->get()->toArray();

        return view('products', compact('products'));
    }
}


