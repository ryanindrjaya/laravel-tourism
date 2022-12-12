<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SearchResource;
use App\Models\Tempat;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $cari = $request->cari;
        //get data
        $data = Tempat::where('tags', 'like', "%" . $cari . "%")->get();
        //return collection of posts as a resource
        return new SearchResource(true, 'Result data', $data);
    }
}
