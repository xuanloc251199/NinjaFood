<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Exception;
use App\Models\Orders;
class OrderController extends Controller
{
    public function addNewOrder (Request $request) {
        try {
            $order = new Orders;
            $order->id_user = Auth::id();
            $order->id_product = $request->id_product;
            $order->amount = 1;
            $order->status = 1;
            $order->save();
            response();
        } catch (Exception $e) {
            response($e,400);
        }
    }
    public function getMyOrders(Request $request) {
        try{
            $id_user = Auth::user()->id;
            $orders = DB::table('orders')
                    ->join('products','orders.id_product','=','products.id')
                    ->join('shops','products.id_shop','=','shops.id')
                    ->join('discounts','products.id_discount','=','discounts.id')
                    ->select('orders.*','products.name','shops.name','discounts.per_hundred')
                    ->where([
                        ['orders.id_user', '=', $id_user],
                        ['status', '=', '1'],
                    ])->get();
                    return response($orders,200);
        }
        catch (Exception $e) {
            return response($e,400);
        }
    }
    public function deleteOrderById(Request $request) {
        try {
             DB::table('orders')
            ->where('id','=',$request->id)
            ->delete();
            return response();
        }
        catch (exception $e) {
            return response($e,400);
        }

    }

    public function increaseOrdersAmount(Request $request) {
        try {
            $order = Orders::find($request->id);
            $order->amount = $order->amount +1;
            $order->save();
            return response();
        }
        catch (exception $e) {
            return response($e,400);
        }
    }
    public function decreaseOrdersAmount(Request $request) {
        try {
            $order = Orders::find($request->id);
            $order->amount = $order->amount - 1;
            $order->save();
            return response();
        }
        catch (exception $e) {
            return response($e,400);
        }
    }

    public function checkoutAllOrder() {

        // 1 => not checkout ; 2 => checkouted.
        try {
            $allOrder =  Orders::where('id_user',Auth::id())
                        ->update(['status' => 2 ]);
        } catch (Exception $e) {
            return response($e,400);
        }
    }
}
