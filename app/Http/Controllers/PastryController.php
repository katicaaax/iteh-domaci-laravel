<?php

namespace App\Http\Controllers;

use App\Models\Pastry;
use Illuminate\Http\Request;
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
        return new PastryResource(Pastry::create($request->only(['name', 'description'])));
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
}
