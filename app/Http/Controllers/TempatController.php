<?php

namespace App\Http\Controllers;

use App\Http\Resources\TempatResource;
use App\Models\Tempat;
use App\Models\Image;
use App\Models\Review;
use App\Models\SubCategory;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TempatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tempat = Tempat::paginate(5);
        $tempatSize = Tempat::count();
        $subcat = SubCategory::all();
        $allcat = Category::all();
        $selected = "all";
        $cat = "all";

        return inertia('Search/Index', [
            'tempat' => $tempat,
            'tempatSize' => $tempatSize,
            'selected' => $selected,
            'cat' => $cat,
            'allcat' => $allcat,
            'subcat' => $subcat
        ]);

        // return view('pages.tempat.index')
        // ->with('tempat', $tempat)
        // ->with('tempatSize', $tempatSize)
        // ->with('selected', $selected)
        // ->with('cat', $cat)
        // ->with('allcat', $allcat)
        // ->with('subcat', $subcat);
    }

    public function cari(Request $request)
    {
        $cari = $request->cari;
        $tempat = Tempat::where('tags', 'like', "%" . $cari . "%")->get();
        $allTempat = Tempat::all();
        $tempatSize = Tempat::count();
        $allCat = Category::all();
        $subcat = SubCategory::all();
        $cat = $request->cat;
        $img = Category::where('id', $cat)->take(1)->get();
        if ($cari == "") {
            $selected = "all";
        } else {
            $selected = "$cari";
        }

        if (!$cari) {
            return inertia('Search/Index', [
                'tempat' => $allTempat,
                'tempatSize' => $tempatSize,
                'selected' => $selected,
                'cat' => $cat,
                'subcat' => $subcat,
                'allcat' => $allCat
            ]);
        } else {
            // return new TempatResource($tempat);
        }

        // return view('pages.tempat.index')
        //     ->with('tempat', $tempat)
        //     ->with('tempatSize', $tempatSize)
        //     ->with('cat', $cat)
        //     ->with('img', $img)
        //     ->with('selected', $selected)
        //     ->with('subcat', $subcat);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if (Auth::check()) {
            return view('pages.tempat.create');
        } else {
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
            'tName' => 'required',
            'tDesc' => 'required',
            'filename' => 'required',
            'filename.*' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'tTicket' => 'required',
            'tMapUrl' => 'required',
            'tAddress' => 'required',
            'desa' => 'required',
            'kecamatan' => 'required',
            'seninJumat1' => 'required',
            'sabtuMinggu1' => 'required',
            'imgDesc' => 'required'
        ]);

        $post = new Tempat;
        $post->name = $request->get('tName');
        $post->desc = $request->get('tDesc');
        $post->desa = $request->get('desa');
        $post->kecamatan = $request->get('kecamatan');
        $post->address = $request->get('tAddress');
        $post->mapUrl = $request->get('tMapUrl');
        if ($request->get('tTicket') != "") {
            $post->ticket = $request->get('tTicket');
        } else {
            $post->ticket = 0;
        }
        $post->rating = "4.5";
        if ($request->get('tUrl') != "") {
            $post->url = $request->get('tUrl');
        } else {
            $post->url = "";
        }
        if ($request->get('tVideo') != "") {
            $post->video = $request->get('tVideo');
        } else {
            $post->video = "";
        }

        $post->seninJumat = $request->get('seninJumat1') . '-' . $request->get('seninJumat2');
        $post->sabtuMinggu = $request->get('sabtuMinggu1') . '-' . $request->get('sabtuMinggu2');

        if ($request->get('cDisabilitas') == 1) {
            $post->disabilities = 1;
        } else {
            $post->disabilities = 0;
        }
        if ($request->get('cParkir') == 1) {
            $post->parkir = 1;
        } else {
            $post->parkir = 0;
        }
        if ($request->get('cWifi') == 1) {
            $post->wifi = 1;
        } else {
            $post->wifi = 0;
        }
        if ($request->get('cHeadline') == 1) {
            $post->isHeadline = 1;
        } else {
            $post->isHeadline = 0;
        }
        if ($request->get('cIcon') == 1) {
            $post->isIcon = 1;
        } else {
            $post->isIcon = 0;
        }

        $post->tags = str_replace(']', '', str_replace(']', '', str_replace('[', '', str_replace('"', '', json_encode($request->get('tags'))))));


        if ($request->hasFile('filename')) {
            foreach ($request->file('filename') as $images) {
                $nama = $images->getClientOriginalName();
                $data[] = $nama;
            }
        }
        $post->image = str_replace('"', '', json_encode($data[0]));

        $post->save();

        $id = $post->id;

        if ($request->hasFile('filename')) {
            $images = $request->file('filename');
            if ($request->input('imgDesc')) {
                $desc = $request->input('imgDesc');
            } else {
                $desc = $post->name;
            }
            for ($i = 0; $i < count($images); $i++) {
                $nama = $images[$i]->getClientOriginalName();
                $images[$i]->move(public_path('img/tempat'), $nama);
                $data[] = $nama;

                $imgUpload = new Image;
                $imgUpload->idTempat = $id;
                $imgUpload->image = $nama;
                // $request->get('tName')
                if (!empty($desc[$i])) {
                    $imgUpload->desc = $desc[$i];
                    $imgUpload->tags = $desc[$i];
                } else {
                    $imgUpload->desc = $request->get('tName');
                    $imgUpload->tags = $request->get('tName');
                }
                $imgUpload->save();
            }
        }
        return redirect('/admin')->with('success', 'gallery has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tempat  $tempat
     * @return \Illuminate\Http\Response
     */
    public function show(Tempat $tempat)
    {

        return inertia('Tempat/Detail', [
            'tempat' => $tempat,
            'ratings' => Review::where('idTempat', (int)$tempat->id)->avg('vote'),
            'reviewer' => Review::where('idTempat', (int)$tempat->id)->get(),
            'reviews' => Review::where('idTempat', (int)$tempat->id)->get(),
            'imageArray' => Image::where('idTempat', (int)$tempat->id)->get()
        ]);

        // return view('pages.tempat.detail')
        //     ->with('tempat', $tempat)
        //     ->with('ratingss', Review::where('idTempat', (int)$tempat->id)->avg('vote'))
        //     ->with('reviewer', Review::where('idTempat', (int)$tempat->id)->get())
        //     ->with('reviews', Review::where('idTempat', (int)$tempat->id)->get())
        //     ->with('imageArray', Image::where('idTempat', (int)$tempat->id)->get());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tempat  $tempat
     * @return \Illuminate\Http\Response
     */
    public function edit(Tempat $tempat)
    {
        //
        $image = Image::where('idTempat', $tempat->id)->get();
        $subcategory = SubCategory::all();
        return view('pages.tempat.edit')
            ->with('tempat', $tempat)
            ->with('image', $image)
            ->with('subcategory', $subcategory);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tempat  $tempat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tempat $tempat)
    {
        //
        $post = Tempat::find($tempat->id);
        $request->validate([
            'tName' => 'required',
            'tDesc' => 'required',
            // 'tTicket' => 'required',
        ]);
        $post->name = $request->get('tName');
        $post->desc = $request->get('tDesc');
        $post->desa = $request->get('desa');
        $post->kecamatan = $request->get('kecamatan');
        $post->address = $request->get('tAddress');
        $post->mapUrl = $request->get('tMapUrl');
        if ($request->get('tTicket') != "") {
            $post->ticket = $request->get('tTicket');
        } else {
            $post->ticket = 0;
        }
        $post->rating = "4.5";
        if ($request->get('tUrl') != "") {
            $post->url = $request->get('tUrl');
        } else {
            $post->url = "";
        }
        if ($request->get('tVideo') != "") {
            $post->video = $request->get('tVideo');
        } else {
            $post->video = "";
        }

        $post->seninJumat = $request->get('seninJumat1') . '-' . $request->get('seninJumat2');
        $post->sabtuMinggu = $request->get('sabtuMinggu1') . '-' . $request->get('sabtuMinggu2');

        if ($request->get('cDisabilitas') == 1) {
            $post->disabilities = 1;
        } else {
            $post->disabilities = 0;
        }
        if ($request->get('cParkir') == 1) {
            $post->parkir = 1;
        } else {
            $post->parkir = 0;
        }
        if ($request->get('cWifi') == 1) {
            $post->wifi = 1;
        } else {
            $post->wifi = 0;
        }
        // if($request->get('cHeadline') == 1){
        //     $post->isHeadline = 1;
        // }else{
        //     $post->isHeadline = 0;
        // }
        // if($request->get('cIcon') == 1){
        //     $post->isIcon = 1;
        // }else{
        //     $post->isIcon = 0; 
        // }

        $post->tags = str_replace(']', '', str_replace(']', '', str_replace('[', '', str_replace('"', '', json_encode($request->get('tags'))))));

        $post->update();

        // $id = $post->id;

        // if($request->hasFile('filename')){
        //     $images = $request->file('filename');
        //     $desc = $request->input('imgDesc');
        //     for($i=0; $i < count($images); $i++){
        //         $nama=$images[$i]->getClientOriginalName();
        //         $images[$i]->move(public_path('img/tempat'), $nama);
        //         $data[] = $nama;

        //         $imgUpload = new Image;
        //         $imgUpload->idTempat = $id;
        //         $imgUpload->image = $nama;
        //         $imgUpload->desc = $desc[$i];
        //         $imgUpload->tags = $desc[$i];
        //         $imgUpload->save();
        //     }
        // }

        return redirect('/admin')->with('success', 'gallery has been added');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tempat  $tempat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tempat $tempat)
    {
        //
        $cat = Tempat::find($tempat->id);
        // error_log($id);
        $cat->delete();
        return redirect('/admin')->with('success', 'destinasi deleted successfully');
    }
}
