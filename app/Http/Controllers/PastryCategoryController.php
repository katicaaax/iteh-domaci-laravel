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
        return new PastryCategoryResource(PastryCategory::create($request->only('name', 'description')));
    }

    public function patch($id, Request $request)
    {
        $category = PastryCategory::findOrFail($id);
        $category->update($request->all());
        return new PastryCategoryResource($category);
    }

    public function show($id)
    {
        $category = PastryCategory::findOrFail($id);
        return new PastryCategoryResource($category);
    }

    public function delete($id)
    {
        $pastry = PastryCategory::find($id);
        $pastry->delete();

        return response()->json(["message" => "deleted"], 200);
    }
}
