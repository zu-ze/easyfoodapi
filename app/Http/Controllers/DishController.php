<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dish;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $fooditems = Dish::all();
        return response()->json([
            'status' => true,
            'fooditems' => $fooditems
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
        $fooditem = new Dish();
        $fooditem->foodserviceid = $request->foodserviceid;
        $fooditem->name = $request->name;
        $fooditem->photo = $request->photo;
        $fooditem->description = $request->description;
        $fooditem->rating = $request->rating;
        $fooditem->price = $request->price;

        if ($fooditem->save()) {
            return response()->json([
                "status" => true,
                "message" => "Food Item Created"
            ], 201);
        } else {
            return response()->json([
                "status" => false,
                "message" => "Failed to create Food Item"
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
        $fooditems = Dish::where('foodserviceid', $id)->get();

        return response()->json([
            'status' => true,
            'fooditems' => $fooditems
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
