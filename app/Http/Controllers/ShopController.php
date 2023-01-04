<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Shops;
use Exception;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    public function getAllShop() {
        $allShop = Shops::all();
       return response()->json($allShop,200);
    }
}