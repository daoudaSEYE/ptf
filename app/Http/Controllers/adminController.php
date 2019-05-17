<?php
 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Datatables;
use Auth;
// use App\User;
use App\Listing;
use App\Lieux;
use App\Categorie;
use Redirect,Response;
use DB;
class adminController extends Controller
{
/**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */
public function index()
{
if(!Auth::user())
{
     return redirect('login');
}
    if(request()->ajax()) {
        return datatables()->of(Listing::select('*'))
        ->addColumn('action', 'action_button')
        ->rawColumns(['action'])
        ->addIndexColumn()
        ->make(true);
    }
	$lieux= DB::table('lieux')->get();
			$firstFourPlaces= DB::table('lieux')->take(4)->orderBy('id','asc')->get();
			$lastFourPlaces= DB::table('lieux')->take(4)->orderBy('id','desc')->get();
	$categories= DB::table('categories')->get();
		
    return view('admin1', compact('lieux','categories','firstFourPlaces','lastFourPlaces'));
}
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('admin1');
    }
 
/**
 * Store a newly created resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */
public function store(Request $request)
{  
// dd($request->all());
	$request->validate([
		// 'id'=>'required',
		'nom'=>'required',
		'categorie'=>'required',
		'prix'=>'required',
		'addresse'=>'required'
	]);

	if($request->get('id')==="null"){
		 
		 $offre = new Listing([
			'nom' => $request->get('nom'),
			'categorie' => $request->get('categorie'),
			'addresse' => $request->get('addresse'),
			'louer' => $request->get('disponibilite'),
			'temps_location' => $request->get('temps_location'),
			'prix' => $request->get('prix')
		  ]);
		  $offre->save();
		return redirect('/admin')->with('success', 'L\'offre a été modifié.');
	}else{
	//CREATE REFERENCE
		$date = date('y');
		$categorieFormat = substr($request->get('categorie'), 0 ,1);
		$addresseFormat = substr($request->get('addresse'), 0 ,1);
		$rand1 = rand(1,9);
		$rand2 = rand(51,99);
		$reference="Ref-".$date.$categorieFormat.$addresseFormat.$rand1.$rand2;
		
		$offre = Listing::updateOrCreate(['id' => $request->get('id')],
                ['ref' => $reference,'nom' => $request->get('nom'), 'categorie' => $request->get('categorie'),'addresse' => $request->get('addresse'), 'prix' => $request->get('prix'), 'louer' => $request->get('louer'), 'temps_location' => $request->get('temps_location'), 'louer' => $request->get('disponibilite')]);
    	return redirect('/admin')->with('success', 'L\'offre a été publié. Rechercher et ajouter y une image');
	}
}
 
public function storeCategorie(Request $request)
{  
// dd($request->all());
	$request->validate([
		'categorie'=>'required'
	]);
		$categorie = new Categorie([
			'nom' => $request->get('categorie')
		  ]);
		  $categorie->save();
		  
		return redirect('/admin')->with('success', 'La categorie '.$request->get('categorie').' a été ajouter');
}

public function storeAddresse(Request $request)
{  
// dd($request->all());
	$request->validate([
		'city'=>'required'
	]);
	$addresse = new Lieux([
		'nom' => $request->get('city')
	]);
	$addresse->save();
		  // $offre = Lieux::updateOrCreate(
                // ['nom' => $request->get('addresse')]);
	return redirect('/admin')->with('success', 'L\'addresse '.$request->get('categorie').' a été ajouter');
}
/**
 * Show the form for editing the specified resource.
 *
 * @param  \App\Product  $product
 * @return \Illuminate\Http\Response
 */
public function edit($id)
{   
    $where = array('id' => $id);
    $user  = listing::where($where)->first();
 
    return Response::json($user);
}
 
 
/**
 * Remove the specified resource from storage.
 *
 * @param  \App\Product  $product
 * @return \Illuminate\Http\Response
 */
public function destroy($id)
{
    $user = listing::where('id',$id)->delete();
 
    return Response::json($user);
}
}