<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    function index(){
        $artists = Artist::orderBy('created_at','desc')->get();
        return response()->json($artists,200);
    }

    function most_popular(){
        $artists = Artist::orderBy('followers','desc')->take(3)->get();
        return response()->json($artists,200);
    }

    function followers(){
        $artists = Artist::orderBy('followers','desc')->paginate(9);
        return response()->json($artists,200);
    }

    function latest(){
        $artists = Artist::orderBy('created_at','desc')->paginate(9);
        return response()->json($artists,200);
    }

    function longest(){
        $artists = Artist::orderBy('created_at','asc')->paginate(9);
        return response()->json($artists,200);
    }

    function store(Request $request){

        if($uploaded = $request->file('image')->store('artists')){
            $artist = Artist::create([
                'first_name'=>$request->first_name,
                'last_name'=>$request->last_name,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'description'=>$request->description,
                'image'=>$uploaded,
            ]);

            if($artist){
                return response()->json(['message'=>'success'],200);
            }
        }

        return response()->json(['message'=>'bad response'],400);
    }
}
