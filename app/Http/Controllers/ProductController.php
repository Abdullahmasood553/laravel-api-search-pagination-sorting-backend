<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function frontend() {
         $products =  Product::all();
         return response()->json(["products" => $products, 'message' => 'Products', 'code' => 200]);
        // return json_encode($products);
        
        //  $age = array("Peter"=>35, "Ben"=>37, "Joe"=>43);
        // echo json_encode($age);

        //  return response()->json(array("products"=> $products), 200);
        // return response()->json(["products" => $products], 200);
        // return response()->json(["products" => $products, 'message' => 'Products', 'code' => 200]);


        // return json_decode($products, true);

        // return response()->json([
        //     'response' => [   
        //     'products' => $products,
        //     "errorCode" => 200,
        //     "errorMessage" => "Success"]
        // ]); 
    }


    public function searchProduct(Request $request) {
        $query = Product::query();
        $data = $request->input('search_by_name');
        if($data) {
            $query->whereRaw("title LIKE '%". $data ."%'")
            ->orWhereRaw("description LIKE '%". $data ."%'");
        }
         return $query->get();


        // if($sort = $request->input('sort')) {
        //     $query->orderBy('price', $sort);
        // }

        // $perPage = 9;
        // $page = $request->input('page', 1);
        // $total = $query->count();

        // $result = $query->offset(($page - 1) * $perPage)->limit($perPage)->get();
        // $data = json_decode($result, true);
      
        // return [
        //     'data' => $data,
        //     'total' => $total,
        //     'page' => $page,
        //     'last_page' => ceil($total / $perPage)
        //  ];
    }


    public function addMultipleProducts(Request $request) {
        if($request->isMethod('post')) {
            $data = $request->input();
            foreach($data['products'] as $key => $value) {
                $product = new Product;
                $product->title         = $value['title'];
                $product->description   = $value['description'];
                $product->image         = $value['image'];
                $product->price         = $value['price'];
                $product->save();
            }
            return response()->json(['message' => 'Product Added Successfully']);
        }
    }

    
    public function fetchMultipleProducts(Request $request) {
        if($request->isMethod('post')) {
              $data = $request->input();
             
                foreach($data as $key => $value) {      
                    $items = Product::select("id", "title", "description", "price")->whereIn('id', $data['selected_categories'])->get();
                }
              $json_toArray = json_encode($items,true);
              return $json_toArray;
        }
    }
}
