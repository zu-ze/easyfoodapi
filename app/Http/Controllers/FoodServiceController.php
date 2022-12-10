<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreFoodServiceRequest;
use App\Models\FoodService;

class FoodServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $foodServices = FoodService::all();
        return response()->json([
            "status" => true,
            "foodservices" => $foodServices
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
    public function store(StoreFoodServiceRequest $request)
    {
        //
        $foodService = new FoodService();
        $foodService->userid = $request->userid;
        $foodService->name = $request->name;
        $foodService->paypalemail = $request->paypalemail;
        $foodService->status = $request->status ?? 'pending';

        if ($foodService->save()) {
            return response()->json([
                "status" => true,
                "message" => "Food Service Created"
            ], 201);
        } else {
            return response()->json([
                "status" => false,
                "message" => "Failed to create Food Service"
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
        $foodService = FoodService::where('userid', $id)->first();
        
        return response()->json([
            'status' => true,
            'foodservice' => $foodService
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
    public function update(StoreFoodServiceRequest $request, $id)
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
