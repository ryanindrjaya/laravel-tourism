<?php

namespace App\Http\Controllers;

use App\Models\Acara;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AcaraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $position = 'Acara';
        if($request->ajax()) {
       
            $data = Acara::whereDate('start', '>=', $request->start)
                      ->whereDate('end',   '<=', $request->end)
                      ->get();
 
            return response()->json($data);
       }
       return view('pages.acara.index')->with('acaras',Acara::get());

    //    $acaraa = Acara::paginate(10);
    //    error_log('Some message here.');
    //    return view('pages.acara.index')->with('position', $position)
    //    ->with('acaraa',$acaraa); ;
    }

    public function ajax(Request $request)
    {
 
        switch ($request->type) {
           case 'add':
              $event = Acara::create([
                  'name' => $request->name,
                  'start' => $request->start,
                  'end' => $request->end,
              ]);
 
              return response()->json($event);
             break;
  
           case 'update':
              $event = Acara::find($request->id)->update([
                  'name' => $request->name,
                  'start' => $request->start,
                  'end' => $request->end,
              ]);
 
              return response()->json($event);
             break;
  
           case 'delete':
              $event = Acara::find($request->id)->delete();
  
              return response()->json($event);
             break;
             
           default:
             # code...
             break;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $tags = ["Alam","Budaya","Rekreasi"];
        if(Auth::check()){
            return view('pages.acara.create',compact('tags'));
        }else{
            return redirect('/');
        }
        
    }
    public function admin()
    {
        //
        // $destinasi = Destinasi::all();
        // return view('pages.destinasi.admin', compact('destinasi', 'destinasi'));
        $acara = Acara::paginate(10);
        return view('pages.acara.admin',['acara' => $acara]);
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
        // $string = "";
        // $comma = "=";
        // $temp = [];
        // // $string=implode(",",$your_array);
        // foreach ($request->addMoreInputFields as $key => $value) {
        //     $temp=implode(",",$value);
        //     error_log($temp);
        //     // Student::create($value);
        // }
        // Log::info(json_encode($request->get('addMoreInputFields'))); 

        // error_log(implode(",",$request->get('addMoreInputFields')));
        $request->validate([
            'tName'=>'required',
            'tDesc'=> 'required',
            'filename'=> 'required',
            'filename.*' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            // 'tVideo' => 'required',
            // 'tAddress' => 'required',
            // 'tLong' => 'required',
            // 'tLat' => 'required',
            // 'tAddress' => 'required',
            'tStart' => 'required',
            'tEnd' => 'required',
            'tTicket' => 'required',
            // 'addMoreInputFields.*.subject' => 'required'
        ]);
        // $path = $request->file('image')->store('public/images');

        // if($request->hasFile('filename')){
        //     foreach($request->file('filename') as $images){
        //         $nama=$images->getClientOriginalName();
        //         $images->move(public_path('img/acara'), $nama);
        //         $data[] = $nama;
        //     }
        //     $post->imageArray = str_replace(']','',str_replace(']','',str_replace('[','',str_replace('"','',json_encode($data)))));
        //     $post->image = str_replace('"','',json_encode($data[0])) ;
        // }
        if($request->hasFile('filename')){
            $nama=$request->filename->getClientOriginalName();
            $request->filename->move(public_path('img/acara'), $nama);
        }
        // $path = $image->getClientOriginalName();
        // time().'.'.$request->file->getClientOriginalExtension();
            
        // $imageName = time().'.'.$request->image->getClientOriginalExtension();
        // $request->file->move(public_path('/images/gallert/'), $imageName);

        $post = new Acara;
        $post->name = $request->get('tName');
        $post->desc = $request->get('tDesc');
        $post->kecamatan = $request->get('kecamatan');
        // $post->address = $request->get('desa') . " " . $request->get('kecamatan');
        $post->desa = $request->get('desa');
        $post->mapUrl = $request->get('tMaps');
        $post->image = $nama;
        $post->imageArray = $nama;
        
        // $post->seninJumat = $request->get('seninJumat1') . '-' . $request->get('seninJumat2');
        // $post->sabtuMinggu = $request->get('sabtuMinggu1') . '-' . $request->get('sabtuMinggu2');

        $post->ticket = $request->get('tTicket');
        $post->start = $request->get('tStart');
        $post->end = $request->get('tEnd');

        $post->tags = str_replace(']','',str_replace(']','',str_replace('[','',str_replace('"','',json_encode($request->get('tags'))))));
        if($request->get('cDisabilitas') == 1){
            $post->disabilitas = 1;
        }else{
            $post->disabilitas = 0; 
        }
        if($request->get('cParkir') == 1){
            $post->parkiran = 1;
        }else{
            $post->parkiran = 0; 
        }
        if($request->get('cWifi') == 1){
            $post->wifi = 1;
        }else{
            $post->wifi = 0; 
        }
        if($request->get('cHeadline') == 1){
            $post->isHeadline = 1;
        }else{
            $post->isHeadline = 0;
        }
        if($request->get('cIcon') == 1){
            $post->isIcon = 1;
        }else{
            $post->isIcon = 0; 
        }
        $post->save();
        return redirect('/admin')->with('success', 'gallery has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Acara  $acara
     * @return \Illuminate\Http\Response
     */
    public function show(Acara $acara)
    {
        //
        return view('pages.acara.detail')->with('acara', $acara);   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Acara  $acara
     * @return \Illuminate\Http\Response
     */
    public function edit(Acara $acara)
    {
        //
        return view('pages.acara.edit')->with('acara', $acara);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Acara  $acara
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Acara $acara)
    {
        //

        if($request->hasFile('filename')){
            foreach($request->file('filename') as $images){
                $nama=$images->getClientOriginalName();
                $images->move(public_path('img/acara'), $nama);
                $data[] = $nama;
            }
            $post->imageArray = str_replace(']','',str_replace(']','',str_replace('[','',str_replace('"','',json_encode($data)))));
            $post->image = str_replace('"','',json_encode($data[0])) ;
        }
        $post = Acara::find($acara->id);
        $post->name = $request->get('tName');
        $post->desc = $request->get('tDesc');
        $post->kecamatan = $request->get('kecamatan');
        // $post->address = $request->get('desa') . " " . $request->get('kecamatan');
        $post->desa = $request->get('desa');
        $post->mapUrl = $request->get('tMaps');
        
        // $post->seninJumat = $request->get('seninJumat1') . '-' . $request->get('seninJumat2');
        // $post->sabtuMinggu = $request->get('sabtuMinggu1') . '-' . $request->get('sabtuMinggu2');

        $post->ticket = $request->get('tTicket');
        $post->start = $request->get('tStart');
        $post->end = $request->get('tEnd');

        $post->tags = str_replace(']','',str_replace(']','',str_replace('[','',str_replace('"','',json_encode($request->get('tags'))))));
        if($request->get('cDisabilitas') == 1){
            $post->disabilitas = 1;
        }else{
            $post->disabilitas = 0; 
        }
        if($request->get('cParkir') == 1){
            $post->parkiran = 1;
        }else{
            $post->parkiran = 0; 
        }
        if($request->get('cWifi') == 1){
            $post->wifi = 1;
        }else{
            $post->wifi = 0; 
        }
        if($request->get('cHeadline') == 1){
            $post->isHeadline = 1;
        }else{
            $post->isHeadline = 0;
        }
        if($request->get('cIcon') == 1){
            $post->isIcon = 1;
        }else{
            $post->isIcon = 0; 
        }
        $post->update();
        return redirect('/admin')->with('success', 'gallery has been added');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Acara  $acara
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $acara = Acara::findOrFail($id);
	    $acara->delete();
        // $destinasi = Destinasi::find($id);
        // error_log($id);
        // $destinasi->delete();
        // $destinasi = Destinasi::where('id', $id)->delete();
        return redirect('/admin')->with('success', 'destinasi deleted successfully');
    }
}
