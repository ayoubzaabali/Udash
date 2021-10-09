<?php

namespace App\lib;
use DB ;
use Illuminate\Support\Str ;
use Illuminate\Support\Facades\Hash;
use App\lib\Mai;


class Prof
{
    
public static function findProf($Label){
        $GLOBALS['aa'] =$Label;
             $myfile=DB::table('prof')
                 ->join('users', 'prof.user_id', '=', 'users.id')
                   ->select('users.id','users.name','users.photo','users.email','users.sexe','prof.specialité')
                 ->where(function($query) {
                      $query->where('users.name', 'LIKE', '%'.$GLOBALS['aa'].'%')
                            ->orWhere('users.email', 'LIKE', '%'.$GLOBALS['aa'].'%')
                            ->orWhere('prof.specialité', 'LIKE', '%'.$GLOBALS['aa'].'%');})
                 ->get();
             return($myfile);
    }
public static function findEtd($Label){
        $GLOBALS['aa'] =$Label;
             $myfile=DB::table('etudiant')
                 ->join('users', 'etudiant.user_id', '=', 'users.id')
                   ->select('users.id','users.name','users.photo','users.email','users.sexe','etudiant.classe','etudiant.apoge')
                 ->where(function($query) {
                      $query->where('users.name', 'LIKE', '%'.$GLOBALS['aa'].'%')
                            ->orWhere('users.email', 'LIKE', '%'.$GLOBALS['aa'].'%')
                            ->orWhere('etudiant.apoge', 'LIKE', '%'.$GLOBALS['aa'].'%')
                             ->orWhere('etudiant.classe', 'LIKE', '%'.$GLOBALS['aa'].'%');})
                 ->get();
             return($myfile);
    }
        
    
public static function edit($id,$name,$email,$grade,$specialite,$sexe){
     
  
     $affected = DB::table('users')
              ->where('id', $id)
              ->update(['name' => $name,'email' => $email,'sexe' => $sexe]);
     if($affected){
         $affected2 = DB::table('prof')
              ->where('user_id', $id)
              ->update(['grade' => $grade,'specialité'=>$specialite]);
         return $affected;
         
     }
     return $affected2;

 }  
    
public static function get($id){
    
     $emp=DB::table('prof')
          ->join('users', 'prof.user_id', '=', 'users.id')
          ->select('users.id','users.name','users.email','users.photo','users.sexe','prof.grade','prof.specialité')
         ->where('users.id',$id)
         ->first();
    return($emp);
}
    
    
public static function delete($id){
    
    
          try { 
        $a = DB::table('users')->where("id",$id)->delete();;
        return($a);
   
        } catch(\Illuminate\Database\QueryException $ex){ 
 
                   }
    
}
    
    
 public static function find($Label,$category_id){
            $GLOBALS['aa'] =$Label;
            $GLOBALS['a'] =$category_id;
             $admins=DB::table('users')
                           ->select('users.id','users.name','users.photo','users.email','users.sexe')->whereIn('users.id',function($q){                        
                              $q->select('user_id')->from('user_has_category')->whereRaw('category_id  ='.$GLOBALS['a'].' and role="member"');
                            })
                 ->where(function($query) {
                      $query->where('users.name', 'LIKE', '%'.$GLOBALS['aa'].'%')
                            ->orWhere('users.email', 'LIKE', '%'.$GLOBALS['aa'].'%');})
                 ->get();
             return($admins);
    }
 
    
    public static function changePass($id,$newpass){
        
         DB::table('users')
              ->where('id', $id)
              ->update(['password' => $newpass]);
    }
    
 public static function  import_csv($line_of_text){
     
     for($i=1;$i<count($line_of_text)-1;$i++){
         $pass= Str::random(8);
         $hashed_random_password = Hash::make($pass);
      $affected= DB::table('users')->insertOrIgnore(
         ['name' => $line_of_text[$i][0],
          'email' => $line_of_text[$i][1],
          'password' => $hashed_random_password,
          'sexe'=> $line_of_text[$i][2],
          
         ]); 
        if($affected){
            $data['name']=$line_of_text[$i][0];
            $data['message']="your password is : ".$pass;
            Mai::sendMailUsers(view('mailUsers', ['data' =>$data ])->render(),$line_of_text[$i][1]) ; 
           
            DB::table('prof')->insert(
         ['date_recrutement' => $line_of_text[$i][3],
          'grade' => $line_of_text[$i][4],
          'specialité' => $line_of_text[$i][5],
          'user_id'=>DB::getPdo()->lastInsertId(),
          
         ]);
        }
        
    }
 }



public static function profList($show){
    
    
          try { 
        $users = DB::table('prof')->join('users', 'prof.user_id', '=', 'users.id')
                                   ->select('users.id','users.name','users.email','users.photo','users.sexe','prof.specialité')->paginate($show);
        return($users);
   
        } catch(\Illuminate\Database\QueryException $ex){ 
                dd($ex->getMessage()); 
 
                   }
    
}
    
    
public static function test_identity($id){
    
    $array = array();
          try { 
        $array[0] = DB::table('users')->join('prof', 'prof.user_id', '=', 'users.id')->where('users.id',$id)->exists();
        $array[1] = DB::table('users')->join('employe', 'employe.user_id', '=', 'users.id')->where('users.id',$id)->exists();
        $array[2] = DB::table('users')->join('etudiant', 'etudiant.user_id', '=', 'users.id')->where('users.id',$id)->exists();
       
   return($array);
        } catch(\Illuminate\Database\QueryException $ex){ 
                dd($ex->getMessage()); 
 
                   }
    
}
  
public static function addMembers($dataset){
    for($i=2;$i<=count($dataset);$i++){
          DB::table('user_has_category')->insertOrIgnore(
         ['user_id' => $dataset[$i],
          'role' => "member",
          'category_id'=>$dataset[1],
          
         ]);
    }
  
}
public static function addAdmins($dataset){
    for($i=2;$i<=count($dataset);$i++){
          DB::table('user_has_category')->insert(
         ['user_id' => $dataset[$i],
          'role' => "admin",
          'category_id'=>$dataset[1],
          
         ]);
    }
  
}

 public static function profListNotAdmin($category_id){
     $GLOBALS['a'] = $category_id;
          try { 
        $users = DB::table('prof')->join('users', 'prof.user_id', '=', 'users.id')
                                   ->select('users.id','users.name','users.photo','users.email','users.sexe','prof.specialité')->whereNotIn('users.id',function($q){                        
                              $q->select('user_id')->from('user_has_category')->whereRaw('category_id  ='.$GLOBALS['a'].' and role="admin"');
                            })->get();
        return($users);
   
        } catch(\Illuminate\Database\QueryException $ex){ 
               
 
                   }
    
 }
    
public static function profListNotiNCat($category_id){
     $GLOBALS['a'] = $category_id;
          try { 
        $users = DB::table('prof')->join('users', 'prof.user_id', '=', 'users.id')
                                   ->select('users.id','users.name','users.email','users.photo','users.sexe','prof.specialité')->whereNotIn('users.id',function($q){                        
                              $q->select('user_id')->from('user_has_category')->whereRaw('category_id  ='.$GLOBALS['a']);
                            })->get();
        return($users);
   
        } catch(\Illuminate\Database\QueryException $ex){ 
               
 
                   }
    
 }


public static function etdList($show){
    
    
          try { 
        $users = DB::table('etudiant')->join('users', 'etudiant.user_id', '=', 'users.id')
                            ->select('users.id','users.name','users.email','users.photo','users.sexe','etudiant.classe','etudiant.apoge')->paginate($show);
        return($users);
   
        } catch(\Illuminate\Database\QueryException $ex){ 
                dd($ex->getMessage()); 
 
                   }
    
}











}