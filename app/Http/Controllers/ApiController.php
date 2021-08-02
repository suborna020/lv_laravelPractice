<?php

namespace App\Http\Controllers;

use App\Models\api;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('api');
        
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\api  $api
     * @return \Illuminate\Http\Response
     */
    public function show(api $api)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\api  $api
     * @return \Illuminate\Http\Response
     */
    public function edit(api $api)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\api  $api
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, api $api)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\api  $api
     * @return \Illuminate\Http\Response
     */
    public function destroy(api $api)
    {
        //
    }
}
