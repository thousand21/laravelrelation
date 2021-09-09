<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $video=Video::all();
        return view('pages.video',compact('video'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.create');
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
        request()->validate([
            "url"=>["required", "min:1", "max:140"],
            "img"=>["required", "min:1", "max:140"],
            "duration"=>["required", "min:1", "max:15"],
            "title"=>["required", "min:1", "max:15"],
            "description"=>["required", "min:1", "max:350"],
        ]);
        $newEntry = new Video();
        $newEntry->url = $request->url;
        $newEntry->img = $request->file("img")->hashName();
        $newEntry->duration = $request->duration;
        $newEntry->title = $request->title;
        $newEntry->description = $request->description;
        $newEntry->save();

        $request->file("img")->storePublicly("img","public");
        return redirect('/videos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        //
        return view('pages.show', compact('video'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        //
        return view('pages.edit', compact('video'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        //
        request()->validate([
            "url"=>["required", "min:1", "max:140"],
            "img"=>["required", "min:1", "max:140"],
            "duration"=>["required", "min:1", "max:15"],
            "title"=>["required", "min:1", "max:15"],
            "description"=>["required", "min:1", "max:350"],
        ]);
        Storage::disk("public")->delete("img/" . $video->url);
        Storage::disk("public")->delete("img/" . $video->img);
        $video->url= $request->file("url")->hashName();
        $video->img = $request->file('img')->hashName();
        $video->duration = $request->duration;
        $video->title = $request->title;
        $video->description = $request->description;
        $video->save();
        $request->file("url")->storePublicly("img", "public");
        $request->file("img")->storePublicly("img", "public");
        return redirect()->route("videos.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        //
        Storage::disk("public")->delete("img/" . $video->img);
        Storage::disk("public")->delete("img/" . $video->url);
        $video->delete();
        return redirect()->route("videos.index");
    }
}
