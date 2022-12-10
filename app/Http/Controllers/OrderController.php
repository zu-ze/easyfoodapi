<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Dish;



class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $orders = Order::all();
        return response()->json([
            'status' => true,
            'orders' => $orders
        ]);
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
        //
        $order = new Order();
        $order->userid = $request->userid;
        $order->dropOffLocation = $request->dropOffLocation;
        $order->locationGoogle = $request->locationGoogle;
        $order->locationDescription = $request->locationDescription;
        $order->status = 'pending';

        if ($order->save()) {

            $newOrder = Order::where('userid', $order->userid)->orderByRaw("created_at DESC")->first();

            return response()->json([
                'status' => true,
                'neworder' => $newOrder
            ]);
        } else {
            return response()->json([
                'status' => false,
                "message" => "Failed to create Order!"
            ]);
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
        //
        $orders = Order::where("userid", $id)->get();
        
        return response()->json([
            'status' => true,
            'orders' => $orders
        ]);
    }

    public function getorders($id)
    {
        //
        // $orders = Order::where("userid", $id)->get();

        $food_items = Dish::where('foodserviceid', $id)->get();
        $order_items = array();

        foreach ($food_items as $food_item) {
            $result = OrderItem::where('fooditemid', $food_item->fooditemid)->get();

            if (empty($result)) {
                continue;
            } else {
                array_push($order_items, [
                    'orderitems' => $result,
                    'fooditem' => $food_item
                ]);
            }
        }


        return response()->json([
            'status' => true,
            'order_items' => $order_items,
        ]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
