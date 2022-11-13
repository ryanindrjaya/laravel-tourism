<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;

 
class GooglePlayController extends Controller
{
    /**
     * 
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function getInfo(Request $request)
    {
        // Retrieving full app info
        $gplay = new \Nelexa\GPlay\GPlayApps();
        $appInfo = $gplay->getAppInfo($request->id);
        return $appInfo;
    }
}