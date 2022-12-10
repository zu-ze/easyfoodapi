<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DeliveryTask;
use App\Models\OrderItem;
use App\Models\Order;
use App\Models\FoodService;
use App\Models\Dish;




class DeliveryTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $order = Order::find($request->orderid);
        $deliverytask = new DeliveryTask();
        $deliverytask->customerid = $order->userid;
        $deliverytask->workerid = $request->workerid;
        $deliverytask->foodserviceid = $request->foodserviceid;
        $deliverytask->dropofflocation = $order->dropOffLocation;
        $deliverytask->status = 'pending';

        if ($deliverytask->save()) {
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $order_item = OrderItem::find($id);
        $dish = Dish::find($order_item->fooditemid);
        $order = Order::find($order_item->orderid);
        $foodservice = FoodService::find($dish->foodserviceid);
        $deliverytask = DeliveryTask::where('customerid', $order->userid)
                                    ->where('foodserviceid', $dish->foodserviceid)
                                    ->where('status', 'pending')->first();

        return response()->json([
            'status' => true,
            'deliverytask' => $deliverytask
        ]);
    }

    public function getdeliverytask($id)
    {
        $deliverytasks = DeliveryTask::where('workerid', $id)
                                    ->where('status', 'pending')
                                    ->get();
        $newdata = array();

        foreach( $deliverytasks as $deliverytask) {
            $foodservice = FoodService::find($deliverytask->foodserviceid);
            array_push($newdata, [
                'deliverytask' => $deliverytask,
                'foodservice' => $foodservice
            ]);
        }

        return response()->json([
            'status' => true,
            'deliverytasks' => $newdata
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
