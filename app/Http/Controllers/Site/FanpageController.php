<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Fanpage;

class FanpageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fanpages = Fanpage::where('user_id', Auth::user()->id)
        ->paginate(20);

        return view('site.fanpage.index', compact('fanpages'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fanpage = Fanpage::where('fanpage_id', $id)
        ->where('status', 1)
        ->first();
        if($fanpage){
            return view('site.fanpage.send', compact('fanpage'));
        }

        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getFanpage()
    {
        try {
        $user = Auth::user();
        $limit = 100;
        $url = 'https://graph.facebook.com/me/accounts?fields=id,name,access_token,about&limit='.$limit.'&access_token='.$user->token;
        $file = file_get_contents($url , false);
        $data = json_decode($file)->data;
            foreach($data as $fanpage){
                $fanpageExist = Fanpage::where('user_id', $user->id)
                ->where('fanpage_id',  $fanpage->id)
                ->first();

                if(!$fanpageExist){
                    $page = Fanpage::insert([
                        "user_id" => $user->id,
                        "fanpage_id" => $fanpage->id,
                        "fanpage_name" => $fanpage->name,
                        "fanpage_id_career" => 0,
                        "fanpage_id_token" => $fanpage->access_token,
                        "page_about" => $fanpage->about,
                        "created_at" => new \DateTime()
                    ]);
                }else{
                    $page = Fanpage::where('user_id', $user->id)
                    ->where('fanpage_id',  $fanpage->id)
                    ->update([
                        "fanpage_name" => $fanpage->name,
                        "fanpage_id_token" => $fanpage->access_token,
                        "page_about" => $fanpage->about,
                    ]);
                }
            }
            return redirect()->back()->with('success', 'Cập nhật thành công!');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Cập nhật thành công!');
        }
    }
}
