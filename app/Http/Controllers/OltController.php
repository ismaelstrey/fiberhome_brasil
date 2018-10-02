<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OltController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }
  public static function buscaDados($teste){

        // $frase = str_replace('	',':',$teste[8]);
        $frase['total_blocks'] = str_replace('	',':',$teste[4]);
        $frase['block_number'] = str_replace('	',':',$teste[5]);
        $frase['block_records'] = str_replace('	',':',$teste[6]);
        $frase['power_info'] =    str_replace('	',':',$teste[8]);
        $header =    str_replace('	',':',$teste[10]);
        $frase['header'] = explode(':',$header);
        $quantidade = (count($teste)-15);
        $frase['quantidade_onu'] = $quantidade;

        if($quantidade > 10){
            $frase['onu'] = str_replace('	',':',$teste[$quantidade]);
            $quantidade--;


        }


        // $frase = str_replace('	',':',$teste[8]);



       return($frase);
    }
    public function index(){

        $username ='1';
        $pass ='1';
        $host = '45.6.208.42';
        $OLT = '10.0.1.2';
        $SLOT = '12';
        $PON = '5';
        $fiberhome = new FiberHome();
        // $descocect = $fiberhome->LogOut();
       $conect = $fiberhome->Connect($host);
         $login = $fiberhome->Login($username, $pass);
        // $teste = $fiberhome->CMD_OK();
    $teste = $fiberhome->OLT_Shelf();
    $comando = "LST-OMDDM::OLTID=$OLT,PONID=NA-NA-$SLOT-$PON:CTAG::;";
    $teste = $fiberhome->cmd($comando);

    $s = OltController::buscaDados($teste);

print_r($s);



        // $dados = $fiberhome->OLT_Shelf();
        //
// print_r(end($teste));

        // return view('olt.index', compact('dados'));
     }


}
