<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pastry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\PastryResource;
use App\Http\Requests\PastryStoreRequest;

class PastryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PastryResource::collection(Pastry::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PastryStoreRequest $request)
    {
        $params = $request->only(['name', 'ingredients']);
        $params['user_id'] = Auth::id();
        return new PastryResource(Pastry::create($params));
    }
    
    public function patch($id, Request $request)
    {
        $pastry = Pastry::findOrFail($id);
        $pastry->update($request->all());
        return new PastryResource($pastry);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pastry  $pastry
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new PastryResource(Pastry::findOrFail($id));
    }

    public function delete($id)
    {
        $pastry = Pastry::find($id);
        $pastry->delete();

        return response()->json(["message" => "deleted"], 200);
    }

    public function getUserPastries()
    {
       $authUser = User::find(Auth::id());
       return PastryResource::collection($authUser->pastries);
    }
}
