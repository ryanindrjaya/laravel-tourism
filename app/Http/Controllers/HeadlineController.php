<?php

namespace App\Http\Controllers;

use App\Models\Headline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HeadlineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if(Auth::check()){
            return view('pages.headline.create');
        }else{
            return redirect('/');
        }
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
        $request->validate([
            'tTitle'=>'required',
            'tSubTitle'=> 'required',
            'alignment'=> 'required',
            'filename'=> 'required',
            'filename.*' => 'image|mimes:jpg,png,jpeg,gif,svg',
        ]);

        if($request->hasFile('filename')){
            $nama=$request->filename->getClientOriginalName();
            $request->filename->move(public_path('img/headline'), $nama);
        }
        $post = new Headline;
        $post->title = $request->get('tTitle');
        $post->subtitle = $request->get('tSubTitle');
        $post->alignment = $request->get('alignment');
        $post->image = $nama;
        $post->save();
        return redirect('/admin')->with('success', 'gallery has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Headline  $headline
     * @return \Illuminate\Http\Response
     */
    public function show(Headline $headline)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Headline  $headline
     * @return \Illuminate\Http\Response
     */
    public function edit(Headline $headline)
    {
        //
        return view('pages.headline.edit',compact('headline'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Headline  $headline
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Headline $headline)
    {
        //
        $post = Headline::find($headline->id);
        $request->validate([
            'tTitle'=>'required',
            'tSubTitle'=> 'required',
            'alignment'=> 'required',
        ]);

        if($request->hasFile('filename')){
            $nama=$request->filename->getClientOriginalName();
            $request->filename->move(public_path('img/headline'), $nama);
            $post->image = $nama;
        }
        $post->title = $request->get('tTitle');
        $post->subtitle = $request->get('tSubTitle');
        $post->alignment = $request->get('alignment');
        $post->save();
        return redirect('/admin')->with('success', 'gallery has been added');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Headline  $headline
     * @return \Illuminate\Http\Response
     */
    public function destroy($headline)
    {
        //
        $destinasi = Headline::findOrFail($headline);
	    $destinasi->delete();
        return redirect('/admin')->with('success', 'destinasi deleted successfully');
    }
}
