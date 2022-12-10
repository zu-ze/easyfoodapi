<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DeliveryWorker;
use App\Models\User;


class DeliveryWorkerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $deliveryworkers = DeliveryWorker::all();

        return response()->json([
            'status' => true,
            'deliveryworkers' => $deliveryworkers
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
        $deliveryworker = new DeliveryWorker();
        $deliveryworker->userid = $request->userid;
        $deliveryworker->foodserviceid = $request->foodserviceid;

        if ($deliveryworker->save()) {
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
        $deliveryworkers = DeliveryWorker::where('foodserviceid', $id)->get();
        $newworkersarray = array();
        
        foreach($deliveryworkers as $deliveryworker) {
            $user = User::find($deliveryworker->userid);

            array_push($newworkersarray, [
                'user' => $user,
                'worker' => $deliveryworker
            ]);
        }

        return response()->json([
            'status' => true,
            'deliveryworkers' => $newworkersarray
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
