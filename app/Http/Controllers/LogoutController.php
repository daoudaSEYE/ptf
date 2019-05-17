<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class LogoutController extends Controller
{
    function logout()
    {
		Auth()->logout();
		return redirect('/')->with('success', 'Vous etes a present deconecter');
	}
}
