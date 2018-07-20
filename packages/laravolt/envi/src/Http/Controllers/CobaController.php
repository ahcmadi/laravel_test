<?php
namespace Laravolt\Envi\Http\Controllers;


use Illuminate\Routing\Controller;


class CobaController extends Controller
{
    public function index()
    {
        return view('envi::test');
    }

}
