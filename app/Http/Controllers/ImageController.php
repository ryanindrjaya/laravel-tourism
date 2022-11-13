<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
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
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $a)
    {
        //
        $post = Image::find($request->id_image);
        $post->desc = $request->get('desc_img');
        if($request->hasFile('new_image')){
            $nama = $request->new_image->getClientOriginalName();
            $images->move(public_path('img/tempat'), $nama);
            
            $post->image = $nama;
        }

        $post->update();

        return redirect()->back();
    }
    public function imageUpdate(Request $request)
    {
        //
        $post = Image::find($request->id_image);
        $post->desc = $request->get('desc_img');
        if($request->hasFile('new_image')){
            $nama = $request->new_image->getClientOriginalName();
            $request->file('new_image')->move(public_path('img/tempat'), $nama);
            
            $post->image = $nama;
        }

        $post->update();

        return redirect()->back();
    }
    public function imageAdd(Request $request)
    {
        //
        $post = new Image;
        $post->idTempat = $request->get('id_new_image');
        $post->desc = $request->get('new_desc_img');
        $post->tags = $request->get('new_desc_img');
        if($request->hasFile('add_new_image')){
            $nama = $request->file('add_new_image')->getClientOriginalName();
            $request->file('add_new_image')->move(public_path('img/tempat'), $nama);
            
            $post->image = $nama;
        }else{
            $post->image = "";
        }

        $post->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function hapus(Request $request)
    {
        //
        // $post = Image::find($request->get('idDelete'));
        $post = Image::findOrFail($request->get('idDelete'))->delete();
        // $post->delete();
        // return redirect('/admin');
        return redirect()->back();
    }
    public function destroy($id)
    {
        //
        $post = Image::find($id);
        $post->delete();
        return redirect('/admin');
        // return redirect('/');
    }
}
