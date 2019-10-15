<?php

namespace App\Http\Controllers;

use App\PhotoEvent;
use Illuminate\Http\Request;

class PhotoEventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('photo.all');
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
     * @param  \App\PhotoEvent  $photoEvent
     * @return \Illuminate\Http\Response
     */
    public function show(PhotoEvent $photoEvent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PhotoEvent  $photoEvent
     * @return \Illuminate\Http\Response
     */
    public function edit(PhotoEvent $photoEvent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PhotoEvent  $photoEvent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PhotoEvent $photoEvent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PhotoEvent  $photoEvent
     * @return \Illuminate\Http\Response
     */
    public function destroy(PhotoEvent $photoEvent)
    {
        //
    }
}
