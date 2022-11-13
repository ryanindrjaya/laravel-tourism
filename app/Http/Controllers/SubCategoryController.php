<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubCategoryController extends Controller
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
    public function create(Request $request)
    {
        //

        $category = Category::all();
        if($request->get('cat') != ""){
            $selected = $request->get('cat');
        }else{
            $selected = 1;
        }
        if(Auth::check()){
            return view("pages.subcategory.create", compact('category','category'))
            ->with('category', $category)
            ->with('selected',$selected);
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
            'tName'=>'required',
            'category'=> 'required',
            'icon'=> 'required',
        ]);
        $post = new SubCategory;
        $post->name = $request->get('tName');
        $post->category = $request->get('category');
        $post->icon = $request->get('icon');

        $post->save();
        return redirect('/admin')->with('success', 'gallery has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $subCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = SubCategory::find($id);
        $category = Category::all();
        return view('pages.subcategory.edit')
        ->with('subCategory',$post)
        ->with('category',$category);
        // return view('pages.subcategory.edit',compact('subCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'tName'=>'required',
            'category'=>'required',
            'icon'=> 'required',
        ]);
        $post = SubCategory::find($id);
        $post->name = $request->get('tName');
        $post->icon = $request->get('icon');
        $post->category = $request->get('category');
        
        $post->update();
        return redirect('/admin')->with('success', 'gallery has been added');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $subcat = SubCategory::find($id);
        // error_log($id);
        $subcat->delete();
        // $destinasi = Destinasi::where('id', $id)->delete();
        return redirect('/admin')->with('success', 'destinasi deleted successfully');
    }
}
