<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tempat;
use App\Models\Image;
use App\Models\Review;
use App\Models\Headline;
use App\Models\Acara;
use App\Models\Category;
use App\Models\SubCategory;

class MobileController extends Controller
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
    public function mobilehome(Request $request){
        $tempat = Tempat::take(5)->get();
        $event = Acara::take(5)->get();
        $headline = Headline::take(3)->get();
        $category = Category::take(3)->get();
        $response = [
            'tempat'=> $tempat,
            'event'=> $event,
            'headline'=> $headline,
            'category'=> $category
        ];
        // $response = json(['tempat'=>$tempat,'event'=>$event,'headline'=>$headline]);
        return $response;
    }
    public function imagebyid(Request $request){
        $cari = $request->cari;
        $image = Image::where('idTempat',$cari)->get();
        return $image;
    }
    public function reviewbyid(Request $request){
        $cari = $request->cari;
        $review = Review::where('idTempat','like',"%".$cari."%")->get();
        return $review;
    }
    public function getTags(Request $request){
        $tag = SubCategory::get();
        return $tag;
    }
    public function getHeadline(Request $request){
        $headline = Headline::take(3)->get();
        return $headline;
    }
    public function getpage(Request $request){
        $page = $request->get('page');
        $limit = $request->get('limit');
        $cari = $request->get('cari');
        $tags = $request->get('tags');
        if($limit == null){
            $limit = 5;
        }
        if($page == null){
            $page = 1;
        }
        // if($cari){
        //     $tempat = Tempat::where('name','like',"%".$cari."%")->paginate(
        //     $limit, // per page (may be get it from request)
        //     ['*'], // columns to select from table (default *, means all fields)
        //     'page', // page name that holds the page number in the query string
        //     $page // current page, default 1
        //     )->withQueryString();
        // }else{
        //     $tempat = Tempat::paginate(
        //     $limit, // per page (may be get it from request)
        //     ['*'], // columns to select from table (default *, means all fields)
        //     'page', // page name that holds the page number in the query string
        //     $page // current page, default 1
        // )->withQueryString();
        // }
        $tempat = Tempat::where('name','like',"%".$cari."%")->where('tags','like',"%".$tags."%")->paginate(
            $limit, // per page (may be get it from request)
            ['*'], // columns to select from table (default *, means all fields)
            'page', // page name that holds the page number in the query string
            $page // current page, default 1
            )->withQueryString();
        return $tempat;
    }
    public function getacara(Request $request){
        $page = $request->get('page');
        $limit = $request->get('limit');
        $cari = $request->get('cari');
        $tags = $request->get('tags');
        if($limit == null){
            $limit = 5;
        }
        if($page == null){
            $page = 1;
        }
        $tempat = Acara::where('name','like',"%".$cari."%")->where('tags','like',"%".$tags."%")->paginate(
            $limit, // per page (may be get it from request)
            ['*'], // columns to select from table (default *, means all fields)
            'page', // page name that holds the page number in the query string
            $page // current page, default 1
            )->withQueryString();
        return $tempat;
    }
    public function storereview(Request $request)
    {
        $post = new Review;
        $post->idTempat = $request->get('id_tempat');
        $post->name = $request->get('name_review');
        $post->vote = $request->get('vote');
        $post->image = "";
        $post->reply = "";
        $post->email = $request->get('email_review');
        $post->message = $request->get('review_text');
        $post->save();
        return response()->json(['success' => 'success'], 200);
    }
    public function reviewbyemail(Request $request)
    {
        $cari = $request->cari;
        $review = Review::where('email','like',"%".$cari."%")->get();
        if(!$review){
            return response()->json(['error' => 'Not Found'], 404);
        }
        return $review;
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
