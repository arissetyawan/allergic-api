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
        var_dump($input['allergic']);
        
		if($allergic->save($input['allergic'])){
		   return response()
		          ->json(["id" => $allergic->id], 200);
		}
		return response()
		        -> json($allergic->errors, 400);
		 
		

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}
