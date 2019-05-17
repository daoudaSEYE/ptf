<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\listing;
use DB;
class offresController extends Controller
{

    public function index()
    {
		
		// $ventes = DB::table('listings')->where('categorie', '=', 'vente')->orderBy('id', 'asc')->paginate(6);
		// $offers = listing::where('id', '=', '4')->take(1)->get();
		//les 4 derniers
		// $recents= listing::take(4)->orderBy('id','asc')->get();
		// return view('offre', compact('recents', 'offers'));
   
    }

    public function offre()
    {
// DB::table('listing')
		// ->join('Picture', 'offreId', '=', 'listing.id')
		// ->where('listing.id', '=', 'Picture.offreId')
		// ->where('Picture.active', '=', '1')
		// ->take(4)->inRandomOrder()->get();
// var_dump($_SERVER);		
		// if (\Request::is('offre/*')) { 
		  // will match URL /offre/4 or /offre/something
			$URI=$_SERVER["REQUEST_URI"];
			$explode=explode("/", $URI);
			$params=$explode[1];
			$offers = listing::where('ref', '=', $params)->take(1)->get();
			// var_dump($params);
			if(count($offers) === 1){
				$recents= listing::take(4)->orderBy('id','asc')->get();
				$lieux= DB::table('lieux')->take(4)->orderBy('id','asc')->get();
			$firstFourPlaces= DB::table('lieux')->take(4)->orderBy('id','asc')->get();
			$lastFourPlaces= DB::table('lieux')->take(4)->orderBy('id','desc')->get();
				return view('offre', compact('recents', 'offers', 'lieux', 'firstFourPlaces', 'lastFourPlaces'));
			}else{
				return redirect('/listing');
				// return view('listing', compact('listings'));
			}
		// }else{
			// return redirect('/listing');
			// return view('listing', compact('recents', 'offers'));
		// }
    }
	public function searchByPlace()
    {
		$URI=$_SERVER["REQUEST_URI"];
		$explode=explode("/", $URI);
		$params=$explode[1];
		// var_dump($params);
		$search = $params;
        $search = str_replace(" ", "%", $search);
		$searchs = listing::where('addresse', 'like', '%'.$search.'%')
								->orderBy('id', 'asc')->paginate(6);
		
		if(count($searchs) != 0){
			$recents= listing::take(3)->orderBy('id','asc')->get();
			$categories= DB::table('categories')->get();
			$lieux= DB::table('lieux')->get();
			$firstFourPlaces= DB::table('lieux')->take(4)->orderBy('id','asc')->get();
			$lastFourPlaces= DB::table('lieux')->take(4)->orderBy('id','desc')->get();
			return view('search', compact('searchs', 'lieux', 'recents', 'categories', 'firstFourPlaces', 'lastFourPlaces'));
		}else{
			return redirect('/listing')->with('error', 'Une erreur s\'est produite');
		}   
	}

}
