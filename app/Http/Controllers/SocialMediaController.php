<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SocialMedia;

class SocialMediaController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $socialMediaDetails = SocialMedia::all();
        return $socialMediaDetails;
        return response()->json(['socialMediaDetails'=> $socialMediaDetails]);
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
        $id = $request->uid;
        $socialmedia_count =  SocialMedia::where(['user_id' => $id, 'status' => 1])->count();
        if($socialmedia_count == 0){
            $socialmedia = new SocialMedia;
            $socialmedia->user_id = $request->uid;
            $socialmedia->facebook_url = $request->facebook_url;
            $socialmedia->instagram_url = $request->instagram_url;
            $socialmedia->twitter_url = $request->twitter_url;
            $socialmedia->linkedin_url = $request->linkedin_url;
            
            $result = $socialmedia->save();
            if($result){
                return response()->json(["result"=>"Social Media details added successfully"]);
            }else{
                return response()->json(["result"=>"Error in added Social Media details"]);
            }
        }else{
            return response()->json(["result"=>"Data already present please update if you want to change the details."]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $socialmedia =  SocialMedia::where(['user_id' => $id, 'status' => 1])->first();
        return $socialmedia;
        return response()->json(["socialmedia"=>$socialmedia]);
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
    public function update(Request $request)
    {
        $id = $request->uid;

        $result = SocialMedia::Where('user_id',$id)->update([
            'facebook_url' => $request->facebook_url,
            'instagram_url' => $request->instagram_url,
            'twitter_url' => $request->twitter_url,
            'linkedin_url' => $request->linkedin_url
        ]);

        if($result >= 0){
            return response()->json(["result"=>"Social Media details Updated successfully"]);
        }else{
            return response()->json(["result"=>"Error in Updating Social Media details"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $socialmedia_count =  SocialMedia::where(['user_id' => $id, 'status' => 1])->count();

        $socialmedia =  SocialMedia::where(['user_id' => $id, 'status' => 1])->get();
        
        if($socialmedia_count > 0){
            $id = $socialmedia[0]->id;
        
            $socialmedia = SocialMedia::find($id);
            $result = $socialmedia->delete();

            if($result){
                return response()->json(["result"=>"Social Media details Deleted successfully"]);
            }else{
                return response()->json(["result"=>"Issue in deleting Social Media details"]);
            }    
        }else{
                return response()->json(["result"=>"No record found"]);
        }
    }
}
