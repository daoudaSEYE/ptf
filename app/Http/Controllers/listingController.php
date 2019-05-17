<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use  App\listing;
class listingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		
        $listings= DB::table('listings')->orderBy('id','asc')->paginate(6);
		$lieux= DB::table('lieux')->get();
			$firstFourPlaces= DB::table('lieux')->take(4)->orderBy('id','asc')->get();
			$lastFourPlaces= DB::table('lieux')->take(4)->orderBy('id','desc')->get();
		$categories= DB::table('categories')->get();
		return view('listing', compact('listings', 'lieux', 'categories', 'firstFourPlaces', 'lastFourPlaces'));
   }
    function fetch_locations(Request $request)
    {
     if($request->ajax())
     {
      $sort_by = $request->get('sortby');
      $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
      $locations = DB::table('listings')
                    ->where('id', 'like', '%'.$query.'%')
                    ->orWhere('nom', 'like', '%'.$query.'%')
                    ->orWhere('categorie', 'like', '%'.$query.'%')
                    ->orderBy($sort_by, $sort_type)
                    ->paginate(5);
		$lieux= DB::table('lieux')->get();
		$categories= DB::table('categories')->get();
      return view('pagination_locations', compact('locations', 'lieux', 'categories'))->render();
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
