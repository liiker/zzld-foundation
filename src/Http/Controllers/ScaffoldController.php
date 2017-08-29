<?php

namespace Zzld\Foundation\Http\Controllers;

use App\Http\Controllers\Controller;
use Zzld\Foundation\Support\Scaffoldable;
use App\Http\Requests;

class ScaffoldController extends Controller
{
	use Scaffoldable;

    public function dashboard(){
        return view('zzld-foundation::dashboard');
    }

}
