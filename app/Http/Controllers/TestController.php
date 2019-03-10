<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function maze(Request $request){
        $length = $request->input('length',15);
        $masuk = $request->input('masuk',2);
        $ar = $this->mazeMap($length,$masuk);
        return view('maze',['data' => $ar]);
    }
    public function mazeMap($input = 15,$pmasuk = 2){
        $ar = [];
        for($i = 1;$i<= $input;$i++){
            $imod = $i%2;
            if($imod == 1){
                $aE[] = $i;
            }
            for($j = 1;$j<=$input;$j++){
                $sc = array_search($i,$aE);
                $ex = ($sc+1)%2;
                $pkeluar = $input-($pmasuk-1);
                $p_akhir = $input-$pmasuk+2;
                if($imod == 1 && $j == $pmasuk && $ex == 1){
                    $ar[$i][$j] = null;
                }else if($imod == 1 && $j == $pkeluar && $ex != 1){
                    $ar[$i][$j] = null;
                }else if($imod == 0 && ($j>=$pmasuk && $j<$p_akhir)){
                    $ar[$i][$j] = null;
                }else{
                    $ar[$i][$j] = 1;
                }
            }
        }
        return $ar;
    }
}
