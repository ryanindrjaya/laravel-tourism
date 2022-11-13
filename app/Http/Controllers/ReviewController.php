<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Review;
use Illuminate\Http\Request;
use Log;

class ReviewController extends Controller
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
        $request->validate([
            'name_review'=>'required',
            'email_review'=> 'required',
            'review_text' => 'required',
            'vote' => 'required',
            'id_tempat' => 'required',
        ]);
        $post = new Review;
        $post->idTempat = $request->get('id_tempat');
        $post->name = $request->get('name_review');
        $post->vote = $request->get('vote');
        $post->image = "";
        $post->reply = "";
        $post->email = $request->get('email_review');
        $post->message = $request->get('review_text');
        $post->save();
        return redirect('/tempat/'.$post->idTempat)->with('success', 'gallery has been added');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addReply(Request $request){
        Log::info('message');
        
        $post = Review::find(1);
        Log::info($request->input('reviewer_id'));
        $request->validate([
            'review_text' => 'required',
        ]);
        $post->reply = $request->get('reviewer_id');

        $post->update();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $review = Review::find($id);
        // error_log($id);
        $review->delete();
        // $destinasi = Destinasi::where('id', $id)->delete();
        return redirect('/admin')->with('success', 'destinasi deleted successfully');
    }
}
