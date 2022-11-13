<?php

namespace App\Http\Controllers;

use App\Models\Home;
use App\Models\Destinasi;
use App\Models\Akomodasi;
use App\Models\Kuliner;
use App\Models\Acara;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Headline;
use App\Models\Tempat;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $obj = json_decode($Destinasi::where('isIcon', 1)->take(1)->get(), true);
        // foreach ($obj['geometry'] as $key => $value) {
        //     $lat = $value['location']['lat'];
        // }
        $data = Destinasi::whereIn('isIcon', [1])->get();

        if(Category::take(1)->count() == 0){
            $firstSize = 0;
        }else{
            $firstSize = Tempat::where('tags', 'LIKE', '%'.Category::take(1)->get()[0]->name.'%')->count();
        }

        return view('pages.home')
        ->with('first', Category::take(1)->get())
        ->with('firstSize', $firstSize)
        ->with('firstList', Tempat::where('tags', 'LIKE', '%'.SubCategory::take(3)->get()[2]->name.'%')->take(5)->get())
        ->with('second', Category::take(1)->get())
        ->with('secondSize', $firstSize)
        ->with('secondList', Tempat::where('tags', 'LIKE', '%'.SubCategory::take(2)->get()[1]->name.'%')->take(5)->get())
        ->with('acaras', Acara::take(5)->get())
        // ->with('firstList', Tempat::where('tags', 'LIKE', '%'.SubCategory::take(4)->get()[1]->name.'%')->take(5)->get())
        // ->with('firstList', Tempat::where('tags', 'LIKE', '%'.SubCategory::take(4)->get()[2]->name.'%')->take(5)->get())
        // ->with('firstList', Tempat::where('tags', 'LIKE', '%'.SubCategory::take(4)->get()[3]->name.'%')->take(5)->get())

        ->with('headline', Headline::take(3)->get())
        // ->with('akomodasi', Akomodasi::latest()->take(6)->get())
        ->with('akomodasiSize', Akomodasi::count())
        ->with('destinasiSize', Destinasi::count())
        ->with('kulinerSize', Kuliner::count())
        ->with('acaraSize', Acara::count())
        // ->with('destinasiIcon', $data)
        ->with('destinasiIcon', Destinasi::where('isIcon', 1)->take(1)->get())
        ->with('akomodasiIcon', Akomodasi::where('isIcon', 1)->take(1)->get())
        ->with('kulinerIcon', Kuliner::where('isIcon', 1)->take(1)->get())
        ->with('acaraIcon', Acara::where('isIcon', 1)->take(1)->get())
        ->with('destinasi', Destinasi::whereIn('isHeadline',[1])->take(6)->get())
        ->with('akomodasi', Akomodasi::whereIn('isHeadline',[1])->take(6)->get())
        ->with('kuliner', Kuliner::whereIn('isHeadline',[1])->take(6)->get())
        ->with('acara', Acara::whereIn('isHeadline',[1])->take(6)->get());
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
     * @param  \App\Models\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function show(Home $home)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function edit(Home $home)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Home $home)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function destroy(Home $home)
    {
        //
    }
}
