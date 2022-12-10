<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderItem;
use App\Models\Dish;

class OrderItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $orderitems = OrderItem::all();
        return response()->json([
            'status' => true,
            "orderitems" => $orderitems
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
        $orderitem = new OrderItem();
        $orderitem->orderid = $request->orderid;
        $orderitem->fooditemid = $request->fooditemid;
        $orderitem->quantity = $request->quantity;
        $orderitem->status = 'pending';

        if ($orderitem->save()) {
            return response()->json([
                'status' => true,
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => "failed to create orderitem!",
                'item' => $orderitem
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
        $orderitems = OrderItem::where('orderid', $id)->get();
        $neworderitems = array();
        foreach ($orderitems as $orderitem) {
            $fooditem = Dish::where('fooditemid', $orderitem->fooditemid)->first();
            array_push($neworderitems, [
                'orderitem' => $orderitem, 
                'fooditem' => $fooditem
            ]);
        }

        return response()->json([
            "status" => true,
            "orderitems" => $neworderitems
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
        $orderitem = OrderItem::find($id);
        // var_dump($orderitem);
        // exit;

        $orderitem->status = $request->status;

        if($orderitem->save()) {
            return response()->json([
                'status' => true,
                'message' => ''
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => ''
            ]);
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
        //
    }
}
