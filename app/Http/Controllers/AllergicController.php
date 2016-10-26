<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Allergic;
use Illuminate\Http\Request;

class AllergicController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$allergics = Allergic::orderBy('id', 'desc')->paginate(10);

		return view('allergics.index', compact('allergics'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('allergics.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$allergic = new Allergic();

		$allergic->name = $request->input("name");
        $allergic->avoid = $request->input("avoid");
        $allergic->take_care = $request->input("take_care");

		$allergic->save();

		return redirect()->route('allergics.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$allergic = Allergic::findOrFail($id);

		return view('allergics.show', compact('allergic'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$allergic = Allergic::findOrFail($id);

		return view('allergics.edit', compact('allergic'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @param Request $request
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		$allergic = Allergic::findOrFail($id);

		$allergic->name = $request->input("name");
        $allergic->avoid = $request->input("avoid");
        $allergic->take_care = $request->input("take_care");

		$allergic->save();

		return redirect()->route('allergics.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$allergic = Allergic::findOrFail($id);
		$allergic->delete();

		return redirect()->route('allergics.index')->with('message', 'Item deleted successfully.');
	}

}
