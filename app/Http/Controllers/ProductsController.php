<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Products;
use Exception;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public function getAll() {
        try {
            $allProduct = Products::all();
        return response()->json($allProduct,200);
        } catch (Exception $e) {
            return response($e,400);
        }
    }

    public function getOne(Request $request) {
        try {
            $product = Products::find($request->id)->first();
            return response()->json($product,200);
        }
        catch (Exception $e) {
            return response($e,400);
        }

    }
    public function getByCategory(Request $request) {
        try {
            $data = DB::table('products')->where('id_category','=',$request->id_category)->get();
            return response()->json($data,200);
        } catch (\Throwable $th) {
            return response($th,400);
        }

    }
    public function searchFoodbyName(Request $request) {
        try {
            $search =$request->searchText;
            $text = '%'.$search.'%';
        $data = Products::where('name','like',$text)->get();
        return response()->json($data,200);
        } catch (Exception $e) {
            return response($e,400);
        }

    }
}
