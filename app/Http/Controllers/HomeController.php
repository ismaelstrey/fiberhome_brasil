<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $username ='1';
        $pass ='1';
        $host = '45.6.208.42';
        $fiberhome = new FiberHome();

        $fiberhome->Connect($host);
        $fiberhome->Login($username, $pass);
        $fiberhome->Handshaking();
        $comando = "LST-OMDDM::OLTID=10.0.1.2,PONID=NA-NA-12-5:CTAG::;";
        $dados = $fiberhome->cmd($comando);
        return view('home', compact('dados'));
    }
}
