<?php

namespace App\Service;


class PalindromService {

    public static function palindrom($string){
        $yes = "Фраза полиндром";
        $no = "Фраза не полиндром";
        $stroka = mb_strtolower($string);
        $stroki='';
        $stroki = str_replace(" ",'',$stroka);
        $stroki = str_replace(",",'',$stroki);
        $stroki = str_replace(".",'',$stroki);
        $stroki = str_replace('?', '', $stroki);
        $stroki = str_replace('!', '', $stroki);
        $stroki = str_replace(':', '', $stroki);
        $stroki = str_replace('"', '', $stroki);
        $stroki = str_replace('-', '', $stroki);
        $stroki2 = $stroki;
        $stroki2 = preg_replace('/[^ a-zа-яё\d]/ui', '',$stroki );
        $stroki2 = preg_replace('/ /', '', $stroki2);//echo $stroki2;
        $str = '';
        $str2 = '';
        for($i=strlen($stroki2);$i>=0;$i--){
            $str .= mb_substr($stroki2,$i,1);
        }
        
        
        $str = preg_replace('/[^ a-zа-яё\d]/ui', '',$str );
        $str = preg_replace('/ /', '', $str);
        if ($stroki2==$str){
            return $yes;
        }
        else{
            return $no;
            }
        
    }
}
