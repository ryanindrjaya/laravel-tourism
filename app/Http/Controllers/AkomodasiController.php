<?php

namespace App\Http\Controllers;

use App\Models\Akomodasi;
use Illuminate\Http\Request;

class AkomodasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $akomodasi = Akomodasi::all();
        return view('pages.akomodasi.index', compact('akomodasi', 'akomodasi'));
    }
    public function admin()
    {
        //
        $akomodasi = Akomodasi::paginate(10);
        return view('pages.akomodasi.admin',['akomodasi' => $akomodasi]);
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
        return view('pages.akomodasi.create',compact('tags'));
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
            // 'tTicket' => 'required',
            // 'addMoreInputFields.*.subject' => 'required'
        ]);
        // $path = $request->file('image')->store('public/images');

        if($request->hasFile('filename')){
            foreach($request->file('filename') as $images){
                $nama=$images->getClientOriginalName();
                $images->move(public_path('img/akomodasi'), $nama);
                $data[] = $nama;
            }
        }
        // $image = $request->file('image');
        // $request->image = $image->getClientOriginalName();
        // $image->move(public_path('img/akomodasi'), $image->getClientOriginalName());
        // $path = public_path('img/logo').'/'.$image->getClientOriginalName();
        // $path = $image->getClientOriginalName();
        // time().'.'.$request->file->getClientOriginalExtension();
            
        // $imageName = time().'.'.$request->image->getClientOriginalExtension();
        // $request->file->move(public_path('/images/gallert/'), $imageName);

        $post = new Akomodasi;
        $post->name = $request->get('tName');
        $post->desc = $request->get('tDesc');
        $post->kecamatan = $request->get('kecamatan');
        $post->address = $request->get('desa') . " " . $request->get('kecamatan');
        $post->desa = $request->get('desa');
        $post->mapUrl = $request->get('tMaps');
        
        $post->imageArray = str_replace(']','',str_replace(']','',str_replace('[','',str_replace('"','',json_encode($data)))));
        $post->image = str_replace('"','',json_encode($data[0])) ;
        
        $post->seninJumat = $request->get('seninJumat1') . '-' . $request->get('seninJumat2');
        $post->sabtuMinggu = $request->get('sabtuMinggu1') . '-' . $request->get('sabtuMinggu2');

        $post->ticket = '';

        $post->tags = str_replace(']','',str_replace(']','',str_replace('[','',str_replace('"','',json_encode($request->get('tags'))))));
        $post->type = str_replace(']','',str_replace(']','',str_replace('[','',str_replace('"','',json_encode($request->get('tags'))))));

        //     'ticket' => implode(',', (array) $request->get('dynamicAddRemove'))
        // ]);
        
        // $post->hours = json_encode($request->input('days'));
        if($request->get('cIsAllDay') == 1){
            $post->isOpenAllDay = 1;
        }else{
            $post->isOpenAllDay = 0;
        }
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
     * @param  \App\Models\Akomodasi  $akomodasi
     * @return \Illuminate\Http\Response
     */
    public function show(Akomodasi $akomodasi)
    {
        //
        return view('pages.akomodasi.detail',compact('akomodasi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Akomodasi  $akomodasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Akomodasi $akomodasi)
    {
        //
        return view('pages.akomodasi.edit',compact('akomodasi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Akomodasi  $akomodasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        // $akomodasi = Akomodasi::find($id);
        $post = Akomodasi::find($id);
        $request->validate([
            'tName'=>'required',
            'tDesc'=> 'required',
            // 'tTicket' => 'required',
        ]);

        if($request->hasFile('filename')){
            if(count($request->get('old')) > 0){
                foreach($request->file('filename') as $images){
                    $nama=$images->getClientOriginalName();
                    $images->move(public_path('img/akomodasi'), $nama);
                    $data[] = $nama;
                }
                $data[] = array_merge($data, $request->get('old'));
            }else{
                foreach($request->file('filename') as $images){
                    $nama=$images->getClientOriginalName();
                    $images->move(public_path('img/akomodasi'), $nama);
                    $data[] = $nama;
                }
            }
        }else{
            if(count($request->get('old')) > 0){
                $data[] = $request->get('old');
            }
            else{
                $data = "";
            }
        }

        
        $post->name = $request->get('tName');
        $post->desc = $request->get('tDesc');
        $post->kecamatan = $request->get('kecamatan');
        $post->address = $request->get('desa') . " " . $request->get('kecamatan');
        $post->desa = $request->get('desa');
        $post->mapUrl = $request->get('tMaps');
        
        $post->imageArray = json_encode($data);
        $post->image = json_encode($data);
        
        $post->seninJumat = $request->get('seninJumat1') . '-' . $request->get('seninJumat2');
        $post->sabtuMinggu = $request->get('sabtuMinggu1') . '-' . $request->get('sabtuMinggu2');

        $post->ticket = '';

        $post->tags = json_encode($request->get('tags'));
        $post->type = json_encode($request->get('tags'));
        
        if($request->get('cIsAllDay') == 1){
            $post->isOpenAllDay = 1;
        }else{
            $post->isOpenAllDay = 0;
        }
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
     * @param  \App\Models\Akomodasi  $akomodasi
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        //
        $akomodasi = Akomodasi::find($id);
        // error_log($id);
        $akomodasi->delete();
        // $akomodasi = Akomodasi::where('id', $id)->delete();
        return redirect('/admin')->with('success', 'akomodasi deleted successfully');
    }
}
