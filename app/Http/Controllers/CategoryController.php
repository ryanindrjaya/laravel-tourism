<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view("pages.category.index");
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
            return view("pages.category.create");
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
            'icon'=> 'required',
            'image'=> 'required',
            'image.*' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);
        $post = new Category;
        $post->name = $request->get('tName');
        $post->icon = $request->get('icon');

        if($request->image != "" && $request->image != null){
            error_log('has image.');
            $image = $request->file('image');
            $request->image = $image->getClientOriginalName();
            $image->move(public_path('img/category'), $image->getClientOriginalName());
            $path = $image->getClientOriginalName();
            $post->image = $path;
        }
        $post->save();
        return redirect('/admin')->with('success', 'gallery has been added');
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
        return view('pages.category.edit',compact('category'));
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
        $request->validate([
            'tName'=>'required',
            'icon'=> 'required',
        ]);
        $post = Category::find($id);
        $post->name = $request->get('tName');
        $post->icon = $request->get('icon');

        if($request->image != "" && $request->image != null){
            $image = $request->file('image');
            $request->image = $image->getClientOriginalName();
            $image->move(public_path('img/category'), $image->getClientOriginalName());
            $path = $image->getClientOriginalName();
            $post->image = $path;
        }
        $post->update();
        return redirect('/admin')->with('success', 'gallery has been added');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //

        $cat = Category::find($category->id);
        // error_log($id);
        $cat->delete();
        $subcat = SubCategory::where('idTempat',$category->id);
        foreach($subcat as $sub){
            $subcat->delete();
        }
        // $destinasi = Destinasi::where('id', $id)->delete();
        return redirect('/admin')->with('success', 'destinasi deleted successfully');
    }
}
