<?php

namespace App\Http\Controllers;

use App\Http\Requests\PalindromRequest;
use App\Service\PalindromService;



class Testcontroller extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    private $string;
    public function __construct(PalindromService $string )
    {
        $this->string = $string;
    }
    public function Proverka(PalindromRequest $string)
    {
        //1string = polindromservice. 2string = testcontroller
        $otvet = $this->string->palindrom($string->stroka);
        return response($otvet,200);


    }


        
    
}
