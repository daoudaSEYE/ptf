<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\listing;
use App\Picture;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
        // $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
// DB::table('listings')
		// ->join('Pictures', 'offreId', '=', 'listings.id')
		// ->where('listings.id', '=', 'Pictures.offreId')
		// ->where('Pictures.active', '=', '1')
		// ->take(4)->inRandomOrder()->get();
		//les 4 derniers
		//all()->take(4)->skip(4)->orderBy('id','asc')->get()
        $rencentListings= listing::take(4)->inRandomOrder()->get();
        $bestOffers= listing::take(9)->orderBy('prix','desc')->get();
        // $places= lieux::take(4)->orderBy('id','desc')->get();
        $lieux= DB::table('lieux')->inRandomOrder()->get();
			$firstFourPlaces= DB::table('lieux')->take(4)->orderBy('id','asc')->get();
			$lastFourPlaces= DB::table('lieux')->take(4)->orderBy('id','desc')->get();
		$categories= DB::table('categories')->inRandomOrder()->get();
		return view('home', compact('rencentListings','bestOffers', 'lieux', 'categories', 'firstFourPlaces', 'lastFourPlaces'));
   
    }
}
