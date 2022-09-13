<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PastryCategory;
use App\Http\Resources\PastryCategoryResource;
use App\Http\Requests\PastryCategoryStoreRequest;
use App\Models\Pastry;

class PastryCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PastryCategoryResource::collection(PastryCategory::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PastryCategoryStoreRequest $request)
    {
        return new PastryCategoryResource(Pastry::create($request->only('name', 'description')));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PastryCategory  $pastryCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(PastryCategory $pastryCategory)
    {
        //
    }
}
