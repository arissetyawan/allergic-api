<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Allergic;
use App\Http\Controllers\BaseController;

class AllergicsController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $allergics = Allergic::paginate(); //select('id', 'name')->get();
        return response()
            ->json($allergics,
            200); 
    }

    public function create(Request $request)
    {
        $allergic = new Allergic();
        $input = $request->getContent();
        $input = json_decode($input, true);

        if(isset($input['allergic'])){
            $input = $input['allergic'];
            $allergic->name = $input['name'];
            $allergic->avoid = $input['avoid'];
            $allergic->take_care = $input['take_care'];
        }          
        else{
            $input = array();
        }
	    if($allergic->save($input)){
	       return response()
	              ->json(array("id" => $allergic->id, "created_at" => $allergic->created_at), 200);
	    }

		return response()
		        -> json(array('errors' => $allergic->errors, "message" => 'failed to create'), 400);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $allergic = Allergic::find($id);
       if(empty($allergic))
       {
            return response()
                -> json(array('message' => 'was not found'), 400);
       }
       return response()
            -> json($allergic, 200);
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
}
