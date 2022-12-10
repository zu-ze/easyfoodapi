<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\comment;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = comment::all();
        return response()->json([
            "status" => true,
            "records" => $comments
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
        $comment = new comment;
        $comment->username = $request->username;
        $comment->content = $request->content;
        $comment->save();
        return response()->json([
            "status" => true,
            "message" => "Comment Added."
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comment = comment::find($id);
        if(!empty($comment))
        {
            return response()->json($comment);
        }
        else
        {
            return response()->json([
                "status" => true,
                "message" => "Comment not found"
            ], 404);
        }
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
        if (comment::where('id', $id)->exists()) {
            $comment = comment::find($id);
            $comment->username = is_null($request->username) ? $comment->username : $request->username;
            $comment->content = is_null($request->content) ? $comment->content : $request->content;
            $comment->save();
            return response()->json([
                "message" => "Comment Updated."
            ], 201);
        }else{
            return response()->json([
                "message" => "Comment Not Found."
            ], 404);
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
        if(comment::where('id', $id)->exists()) {
            $comment = comment::find($id);
            $comment->delete();

            return response()->json([
                "message" => "records deleted."
            ], 202);
        } else {
            return response()->json([
                "message" => "Comment not found."
            ], 404);
        }
    }
}
