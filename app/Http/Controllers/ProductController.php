<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function frontend() {
        return Product::all();
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
}
