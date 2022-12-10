<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notifications;

class NotificationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notifications = Notifications::all();
        return response()->json([
            "status" => true,
            "records" => $notifications
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
        $notification = new Notifications();
        $notification->from = $request->from;
        $notification->to = $request->to;
        $notification->type = $request->type;
        $notification->content = $request->content; 

        if ($notification->save()) {
            return response()->json([
                'status' => true,
                'message' => 'Notification was sent!'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Failed to send notification!'
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
        $notifications = Notifications::where('to', $id)->orderby('created_at', 'desc')->get();

        return response()->json([
            'status' => true,
            'notifications' => $notifications
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
