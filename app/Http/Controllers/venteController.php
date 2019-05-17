<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class venteController extends Controller
{
    function index()
    {
     $ventes = DB::table('listings')->where('categorie', '=', 'vente')->orderBy('id', 'asc')->paginate(6);
     $lieux= DB::table('lieux')->get();
			$firstFourPlaces= DB::table('lieux')->take(4)->orderBy('id','asc')->get();
			$lastFourPlaces= DB::table('lieux')->take(4)->orderBy('id','desc')->get();
	 $categories= DB::table('categories')->get();
	 return view('vente', compact('ventes', 'lieux', 'categories', 'firstFourPlaces', 'lastFourPlaces'));
    }

    function fetch_ventes(Request $request)
    {
     if($request->ajax())
     {
      $sort_by = $request->get('sortby');
      $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
      $ventes = DB::table('listings')
                    ->where('id', 'like', '%'.$query.'%')
                    ->orWhere('nom', 'like', '%'.$query.'%')
                    ->orWhere('categorie', 'like', '%'.$query.'%')
                    ->orderBy($sort_by, $sort_type)
                    ->paginate(5);
	$lieux= DB::table('lieux')->get();
      return view('pagination_ventes', compact('ventes', 'lieux'))->render();
     }
    }
}
?>
