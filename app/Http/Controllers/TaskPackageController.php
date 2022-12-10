<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TaskPackage;
use App\Models\Dish;
use App\Models\OrderItem;


class TaskPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $taskpackages = TaskPackage::all();

        return response()->json([
            'status' => true,
            'taskpackages' => $taskpackages
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
        $taskpackage = new TaskPackage();
        $taskpackage->deliverytaskid = $request->deliverytaskid;
        $taskpackage->orderitemid = $request->orderitemid;
        $taskpackage->status = 'pending';

        if ($taskpackage->save()) {
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
        $taskpackages = TaskPackage::where('deliverytaskid', $id)->get();
        $newdata = array();

        foreach($taskpackages as $taskpackage) {
            $orderitem = OrderItem::where('orderitemid', $taskpackage->orderitemid)->first();
            $fooditem = Dish::where('fooditemid', $orderitem->fooditemid)->first();

            array_push($newdata, [
                "taskpackage" => $taskpackage,
                'orderitem' => $orderitem,
                "fooditem" => $fooditem
            ]);
        }

        return response()->json([
            'status' => true,
            'taskpackages' => $newdata
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
        $taskpackage = TaskPackage::find($id);

        $taskpackage->status = $request->status;

        if($taskpackage->save()) {
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
