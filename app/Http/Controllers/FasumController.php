<?php

namespace App\Http\Controllers;

use App\Models\Fasum;
use Illuminate\Http\Request;

class FasumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $fasum = Fasum::all();
        return view('pages.fasum.index', compact('fasum', 'fasum'));
    }

    public function admin()
    {
        //
        $fasum = Fasum::paginate(10);
        return view('pages.fasum.admin',['fasum' => $fasum]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.fasum.create');
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
            // 'addMoreInputFields.*.subject' => 'required'
        ]);
        // $path = $request->file('image')->store('public/images');

        if($request->hasFile('filename')){
            foreach($request->file('filename') as $images){
                $nama=$images->getClientOriginalName();
                $images->move(public_path('img/fasum'), $nama);
                $data[] = $nama;
            }
        }
        // $image = $request->file('image');
        // $request->image = $image->getClientOriginalName();
        // $image->move(public_path('img/fasum'), $image->getClientOriginalName());
        // $path = public_path('img/logo').'/'.$image->getClientOriginalName();
        // $path = $image->getClientOriginalName();
        // time().'.'.$request->file->getClientOriginalExtension();
            
        // $imageName = time().'.'.$request->image->getClientOriginalExtension();
        // $request->file->move(public_path('/images/gallert/'), $imageName);

        $post = new Fasum;
        $post->name = $request->get('tName');
        $post->desc = $request->get('tDesc');
        $post->mapUrl = $request->get('tMaps');
        
        
        $post->imageArray = str_replace(']','',str_replace(']','',str_replace('[','',str_replace('"','',json_encode($data)))));
        $post->image = str_replace('"','',json_encode($data[0])) ;
        
        // $post->seninJumat = $request->get('seninJumat1') . '-' . $request->get('seninJumat2');
        // $post->sabtuMinggu = $request->get('sabtuMinggu1') . '-' . $request->get('sabtuMinggu2');

        $post->tags = str_replace(']','',str_replace(']','',str_replace('[','',str_replace('"','',json_encode($request->get('tags'))))));
        $post->type = str_replace(']','',str_replace(']','',str_replace('[','',str_replace('"','',json_encode($request->get('tags'))))));

        //     'ticket' => implode(',', (array) $request->get('dynamicAddRemove'))
        // ]);
        
        // $post->hours = json_encode($request->input('days'));
        if($request->get('cIsAllDay') == 1){
            $post->openAllDay = 1;
        }else{
            $post->openAllDay = 0;
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
     * @param  \App\Models\Fasum  $fasum
     * @return \Illuminate\Http\Response
     */
    public function show(Fasum $fasum)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fasum  $fasum
     * @return \Illuminate\Http\Response
     */
    public function edit(Fasum $fasum)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fasum  $fasum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fasum $fasum)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fasum  $fasum
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $fasum = Fasum::findOrFail($id);
	    $fasum->delete();
        // $destinasi = Destinasi::find($id);
        // error_log($id);
        // $destinasi->delete();
        // $destinasi = Destinasi::where('id', $id)->delete();
        return redirect('/admin')->with('success', 'destinasi deleted successfully');
    }
}
