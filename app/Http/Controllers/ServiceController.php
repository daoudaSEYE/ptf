<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class ServiceController extends Controller
{
    function index()
    {
		$lieux= DB::table('lieux')->get();
		$firstFourPlaces= DB::table('lieux')->take(4)->orderBy('id','asc')->get();
		$lastFourPlaces= DB::table('lieux')->take(4)->orderBy('id','desc')->get();
		$categories= DB::table('categories')->get();
		return view('service', compact('lieux', 'categories', 'firstFourPlaces', 'lastFourPlaces'));
    }
}
?>
