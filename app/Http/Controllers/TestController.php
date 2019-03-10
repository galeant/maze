<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function maze(Request $request){
        $length = $request->input('length',15);
        $masuk = $request->input('masuk',2);
        $ar = $this->mazeMap1($length,$masuk);
        // dd($ar);
        return view('maze',['data' => $ar]);
    }
    public function mazeMap1($input = 15,$pmasuk = 2){
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
    // prototype
    public function mazeMap2($input = 15,$pmasuk = 2){
        $input = 15;
        $ar = [];
        $mid = $input/2;
        // dd($mid);
        if(gettype($mid) == 'double'){
            $midH = (int)ceil($mid)+1;
            $midL = (int)floor($mid);
            $midC = (int)ceil($mid);
        }else{
            $midH = (int)$mid+1;
            $midL = (int)$mid;
            $midC = null;
        }
        $middleR = [$midL,$midC,$midH];
        // dd($middleR);
        for($i = 1;$i<= $input;$i++){
            if(in_array($i,$middleR)){
                for($j = 1;$j<=$input;$j++){
                    if($j%2 == 1){
                        $ar[$i][$j] = 1;
                    }else{
                        $ar[$i][$j] = null;
                    }
                }
            }else{
                $imod = $i%2;
                if($imod == 1){
                    $aE[] = $i;
                }
                for($j = 1;$j<=$input;$j++){
                    $sc = array_search($i,$aE);
                    $ex = ($sc+1);
                    $jmod = $j%2;
                    if($imod == 1){
                        if($jmod == 0 && $i != $input){
                            if($j<=$i+1 || ($j>= $input-($i-2) && $i != 1)){
                                $ar[$i][$j] = null;
                            }else{
                                $ar[$i][$j] = 1;
                            }
                        }else{
                            $ar[$i][$j] = 1;
                        }
                    }else{
                        if($j < $input){
                            if($jmod == 0 && $j+$i> $j){
                                $ar[$i][$j] = null;   
                            }else{
                                $ar[$i][$j] = 1;    
                            }
                        }else{
                            $ar[$i][$j] = 1;
                        }
                    }
                }
            }
                
        }
        return $ar;
    }
}
