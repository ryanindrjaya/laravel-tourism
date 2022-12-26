<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Destinasi;
use App\Models\Akomodasi;
use App\Models\Kuliner;
use App\Models\Acara;
use App\Models\Fasum;
use App\Models\Category;
use App\Models\Tempat;
use App\Models\Headline;
use App\Models\Review;
use App\Models\User;
use App\Models\Image;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        // $destinasi = Destinasi::all();
        $type = $request->get('type');
        if (Auth::check()) {
            if (Auth::user()->isAdmin == '1') {
                if ($type == "") {
                    // dashboard
                    $destinasi = Destinasi::paginate(5);
                    $akomodasi = Akomodasi::paginate(5);
                    $kuliner = Kuliner::paginate(5);
                    $acara = Acara::paginate(5);
                    $fasum = Fasum::paginate(5);
                    $headline = Headline::paginate(5);
                    // $category = Category::paginate(5);
                    // $tempat = Tempat::paginate(5);
                    $category = Category::paginate(5, ['*'], 'category');
                    $tempat = Tempat::paginate(5, ['*'], 'tempat');
                    $review = Review::paginate(5, ['*'], 'review');
                    $subcategory = SubCategory::all();
                    return view('pages.admin.index', compact('destinasi', 'destinasi'))
                        ->with('acara', $acara)->with('fasum', $fasum)
                        ->with('akomodasi', $akomodasi)
                        ->with('kuliner', $kuliner)
                        ->with('tempat', $tempat)
                        ->with('review', $review)
                        ->with('category', $category)
                        ->with('headline', $headline)
                        ->with('subcategory', $subcategory)
                        ->with('type', $type);
                } else if ($type == "cat") {
                    // category
                    $category = Category::paginate(5, ['*'], 'category');
                    $subcategory = SubCategory::all();
                    return view('pages.admin.index')
                        ->with('category', $category)
                        ->with('subcategory', $subcategory)
                        ->with('type', $type);
                } else if ($type == "temp") {
                    // tempat
                    // $tempat = Tempat::paginate(5, ['*'], 'category');
                    $tempat = Tempat::paginate(5)->withQueryString();
                    return view('pages.admin.index')
                        ->with('tempat', $tempat)
                        ->with('type', $type);
                } else if ($type == "rev") {
                    // review
                    // $review = Review::paginate(5, ['*'], 'category');
                    $review = Review::paginate(5)->withQueryString();
                    $all = DB::table('tempat')->select('id', 'name')->get();
                    return view('pages.admin.index')
                        ->with('review', $review)
                        ->with('type', $type)
                        ->with('all', $all);
                } else if ($type == "head") {
                    // headline
                    // $headline = Headline::paginate(5, ['*'], 'category');
                    $headline = Headline::paginate(5)->withQueryString();
                    return view('pages.admin.index')
                        ->with('headline', $headline)
                        ->with('type', $type);
                } else if ($type == "aca") {
                    // acara
                    // $acara = Acara::paginate(5, ['*'], 'category');
                    $acara = Acara::paginate(5)->withQueryString();
                    return view('pages.admin.index')
                        ->with('acara', $acara)
                        ->with('type', $type);
                } else if ($type == "user") {
                    // user
                    // $users = User::paginate(5, ['*'], 'category');
                    $users = User::paginate(5)->withQueryString();
                    return view('pages.admin.index')
                        ->with('users', $users)
                        ->with('type', $type);
                }
            } else {
                return redirect('/login')->with('error', 'Anda tidak memiliki akses ke halaman admin');
            }
        } else {
            return redirect('/login')->with('error', 'Anda harus login dahulu untuk mengakses halaman admin');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $type = $request->get('type');
        $category = Category::all();
        if ($request->get('cat') != "") {
            $selected = $request->get('cat');
        } else {
            $selected = 1;
        }
        return view('pages.admin.create')
            ->with('type', $type)
            ->with('selected', $selected)
            ->with('category', $category);
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
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //

        $type = $request->get('type');
        if ($type == "") {
            // dashboard
            $destinasi = Destinasi::paginate(5);
            $akomodasi = Akomodasi::paginate(5);
            $kuliner = Kuliner::paginate(5);
            $acara = Acara::paginate(5);
            $fasum = Fasum::paginate(5);
            $headline = Headline::paginate(5);
            // $category = Category::paginate(5);
            // $tempat = Tempat::paginate(5);
            $category = Category::paginate(5, ['*'], 'category');
            $tempat = Tempat::paginate(5, ['*'], 'tempat');
            $review = Review::paginate(5, ['*'], 'review');
            $subcategory = SubCategory::all();
            return view('pages.admin.index', compact('destinasi', 'destinasi'))
                ->with('acara', $acara)->with('fasum', $fasum)
                ->with('akomodasi', $akomodasi)
                ->with('kuliner', $kuliner)
                ->with('tempat', $tempat)
                ->with('review', $review)
                ->with('category', $category)
                ->with('headline', $headline)
                ->with('subcategory', $subcategory)
                ->with('type', $type);
        } else if ($type == "cat") {
            // category
            $selected = $request->get('cat');
            $category = Category::where('id', $request->get('id'))->first();
            $subCategory = SubCategory::where('id', $request->get('id'))->first();
            $type = $request->get('type');
            return view('pages.admin.edit')
                ->with('type', $type)
                ->with('selected', $selected)
                ->with('category', $category)
                ->with('subCategory', $subCategory);
        } else if ($type == "subcat") {
            // subcategory
            $selected = $request->get('cat');
            $category = Category::all();
            $subCategory = SubCategory::where('id', $request->get('id'))->first();
            return view('pages.admin.edit')
                ->with('type', $type)
                ->with('selected', $selected)
                ->with('category', $category)
                ->with('subCategory', $subCategory);
        } else if ($type == "temp") {
            // tempat
            // $tempat = Tempat::paginate(5, ['*'], 'category');
            $tempat = Tempat::find($request->id);
            $image = Image::where('idTempat', $tempat->id)->get();
            $subcategory = SubCategory::all();
            return view('pages.admin.edit')
                ->with('tempat', $tempat)
                ->with('image', $image)
                ->with('subcategory', $subcategory)
                ->with('type', $type);
        } else if ($type == "rev") {
            // review
            // $review = Review::paginate(5, ['*'], 'category');
            $review = Review::paginate(5)->withQueryString();
            return view('pages.admin.index')
                ->with('review', $review)
                ->with('type', $type);
        } else if ($type == "head") {
            // headline
            // $headline = Headline::paginate(5, ['*'], 'category');
            $headline = Headline::find($request->get('id'));
            return view('pages.admin.edit')
                ->with('headline', $headline)
                ->with('type', $type);
        } else if ($type == "aca") {
            // acara
            // $acara = Acara::paginate(5, ['*'], 'category');
            $acara = Acara::find($request->get('id'));
            return view('pages.admin.edit')
                ->with('acara', $acara)
                ->with('type', $type);
        } else if ($type == "user") {
            // user
            // $users = User::paginate(5, ['*'], 'category');
            $users = User::paginate(5)->withQueryString();
            return view('pages.admin.index')
                ->with('users', $users)
                ->with('type', $type);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }

    public function addPlace()
    {

        if (Auth::check()) {
            $category = Category::all();
            $subcat = SubCategory::all();

            return inertia('Tempat/Add', [
                'category' => $category,
                'subcat' => $subcat,
            ]);

            // return view('pages.addPlace.index')
            // ->with('category',$category);
        } else {
            return redirect('/login?addplace=1')->with('error', 'Anda harus login dahulu untuk menambahkan Tempat');
        }
    }

    public function addingPlace(Request $request)
    {
        //
        $request->validate([
            'tName' => 'required',
            // 'tDesc'=> 'required',
            'gambar' => 'required',
            'gambar.*' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
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


        if ($request->hasFile('gambar')) {
            foreach ($request->file('gambar') as $images) {
                $nama = $images->getClientOriginalName();
                $data[] = $nama;
            }
        }
        $post->image = str_replace('"', '', json_encode($data[0]));

        $post->save();

        $id = $post->id;

        if ($request->hasFile('gambar')) {
            $images = $request->file('gambar');
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
        $data1 = $request->get('tName');
        $data2 = 'berhasil ditambahkan,';
        $data3 = $data1 . ' ' . $data2;
        return redirect('/tempat' . '/' . $id)->with('message', $data3)->with('id', $id);
    }
}
