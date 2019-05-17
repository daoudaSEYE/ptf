<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Http\Controllers\Session;
use DB;
use  App\listing;
class searchController extends Controller
{
    function search(Request $request)
    {
		// dd($request->all());
		$request->validate([
			'search'=>'required',
			'city'=>'required',
			'categorie'=>'required'
		]);
		$city = $request->get('city');
		$categorie = $request->get('categorie');
		$search = $request->get('search');
        $search = str_replace(" ", "%", $search);
		$searchs = listing::where('nom', 'like', '%'.$search.'%')
								->Where('categorie', '=', $categorie)
								->Where('addresse', '=', $city)
								->orderBy('id', 'asc')->paginate(6);
		
		if(count($searchs) != 0){
			$recents= listing::take(3)->orderBy('id','asc')->get();
			$categories= DB::table('categories')->get();
			$lieux= DB::table('lieux')->get();
			$firstFourPlaces= DB::table('lieux')->take(4)->orderBy('id','asc')->get();
			$lastFourPlaces= DB::table('lieux')->take(4)->orderBy('id','desc')->get();
			return view('search', compact('searchs', 'lieux', 'recents', 'categories', 'firstFourPlaces', 'lastFourPlaces'));
		}else{
			return redirect('/listing')->with('error', 'Aucun element trouvé. Ci dessous toute nos offres');
		}   
	}
}
