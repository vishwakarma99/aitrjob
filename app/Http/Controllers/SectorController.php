<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sector;

class SectorController extends Controller
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
        $sector = Sector::all();
        return $sector;
        return response()->json(['sector'=> $sector]);
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
        $sector_count =  Sector::where(['user_id' => $id, 'status' => 1])->count();
        if($sector_count == 0){
            $sector = new Sector;
            $sector->user_id = $request->uid;
            $sector->industry_hire_for = $request->industry_hire_for;
            $sector->functional_area = $request->functional_area;
            $sector->skills = $request->skills;
            $sector->interview_day = $request->interview_day;  

            $result = $sector->save();
            if($result){
                return response()->json(["result"=>"Company Sector details added successfully"]);
            }else{
                return response()->json(["result"=>"Error in added sector details"]);
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
        $sector =  Sector::where(['user_id' => $id, 'status' => 1])->first();
        return $sector;
        return response()->json(["user"=>$sector]);
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

        $result = Sector::Where('user_id',$id)->update([
            'industry_hire_for' => $request->industry_hire_for,
            'functional_area' => $request->functional_area,
            'skills' => $request->skills,
            'interview_day' => $request->interview_day
        ]);

        if($result >= 0){
            return response()->json(["result"=>"Sector details Updated successfully"]);
        }else{
            return response()->json(["result"=>"Error in Updating Sector details"]);
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
        $sector_count =  Sector::where(['user_id' => $id, 'status' => 1])->count();
        
        $sector =  Sector::where(['user_id' => $id, 'status' => 1])->get();
        
        if($sector_count > 0){
            $id = $sector[0]->id;
            
            $sector = Sector::find($id);
            
            $result = $sector->delete();
            
            if($result){
                return response()->json(["result"=>"Sector details Deleted successfully"]);
            }else{
                return response()->json(["result"=>"Issue in deleting Sector details"]);
            }    
        }else{
                return response()->json(["result"=>"No record found"]);
        }
    }
}
