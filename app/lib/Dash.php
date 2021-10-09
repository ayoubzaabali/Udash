<?php

namespace App\lib;
use DB ;



class Dash
{
    
    public static function updatePhoto($photo,$id){
   
    try { 
   $affected = DB::table('users')
              ->where('id', $id)
              ->update(['photo' => $photo]);
     return("OK");
     } catch(\Illuminate\Database\QueryException $ex){ 
       return("NOT");

 
     }
    }
    
    
    
     public static function  CountS(){        
        
     return( DB::table('etudiant')
                            ->select('id')
                            ->count()) ;

    }
 public static function  CountF(){        
        
     return( DB::table('files')
                            ->select('id')
                            ->count()) ;

    }
    
    public static function  CountP(){        
        
     return( DB::table('prof')
                            ->select('id')
                            ->count()) ;

    }
 public static function  CountA(){        
        
     return( DB::table('employe')
                            ->select('id')
                            ->count()) ;

    }
    
}