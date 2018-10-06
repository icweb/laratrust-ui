<?php

namespace Icweb\Trusty\App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Permission;

class TrustyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('trusty::index');
    }
}
