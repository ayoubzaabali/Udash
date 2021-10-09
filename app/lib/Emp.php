<?php

namespace App\lib;
use DB ;



class Emp
{
public static function get($id){
    
     $emp=DB::table('employe')
          ->join('users', 'employe.user_id', '=', 'users.id')
          ->select('users.id','users.name','users.photo','users.email','users.sexe','employe.poste')
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
 public static function edit($id,$name,$email,$poste,$sexe){
     
  
     $affected = DB::table('users')
              ->where('id', $id)
              ->update(['name' => $name,'email' => $email,'sexe' => $sexe]);
     if($affected){
         $affected = DB::table('employe')
              ->where('user_id', $id)
              ->update(['poste' => $poste]);
         return $affected;
         
     }
     return $affected;

 }   
    
    
    
 public static function findEmp($Label){
        $GLOBALS['aa'] =$Label;
             $myfile=DB::table('employe')
                 ->join('users', 'employe.user_id', '=', 'users.id')
                  ->select('users.id','users.name','users.photo','users.email','users.sexe','employe.poste')
                 ->where(function($query) {
                      $query->where('users.name', 'LIKE', '%'.$GLOBALS['aa'].'%')
                            ->orWhere('users.email', 'LIKE', '%'.$GLOBALS['aa'].'%')
                            ->orWhere('employe.poste', 'LIKE', '%'.$GLOBALS['aa'].'%');})
                 ->get();
             return($myfile);
    }
    
    
public static function del($category_id,$user_id){
    
    
          try { 
        $a = DB::table('user_has_category')->where([["category_id",$category_id],["user_id",$user_id]])->delete();
        return($a);
   
        } catch(\Illuminate\Database\QueryException $ex){ 
 
                   }
    
}
   
    public static function find($Label,$category_id){
            $GLOBALS['aa'] =$Label;
            $GLOBALS['a'] =$category_id;
             $admins=DB::table('users')
                           ->select('users.id','users.name','users.photo','users.email','users.sexe')->whereIn('users.id',function($q){                        
                              $q->select('user_id')->from('user_has_category')->whereRaw('category_id  ='.$GLOBALS['a'].' and role="admin"');
                            })
                 ->where(function($query) {
                      $query->where('users.name', 'LIKE', '%'.$GLOBALS['aa'].'%')
                            ->orWhere('users.email', 'LIKE', '%'.$GLOBALS['aa'].'%');})
                 ->get();
             return($admins);
    }
    
    
 public static function  import_csv($line_of_text){
     
     for($i=1;$i<count($line_of_text)-1;$i++){
      $affected= DB::table('users')->insertOrIgnore(
         ['name' => $line_of_text[$i][0],
          'email' => $line_of_text[$i][1],
          'password' => bcrypt("ayoub2019"),
          'sexe'=> $line_of_text[$i][2],
          
         ]); 
        if($affected){
            DB::table('employe')->insert(
         ['date_recrutement' => $line_of_text[$i][3],
          'poste' => $line_of_text[$i][4],
          'user_id'=>DB::getPdo()->lastInsertId(),
          
         ]);
        }
        
    }
 }



public static function empList($show){
    
    
          try { 
        $users = DB::table('employe')->join('users', 'employe.user_id', '=', 'users.id')
                                   ->select('users.id','users.name','users.email','users.photo','users.sexe','employe.poste')->paginate($show);
        return($users);
   
        } catch(\Illuminate\Database\QueryException $ex){ 
                dd($ex->getMessage()); 
 
                   }
    
}
  
public static function emListNotiNCat($category_id){
     $GLOBALS['a'] = $category_id;
          try { 
        $users = DB::table('employe')->join('users', 'employe.user_id', '=', 'users.id')
                                   ->select('users.id','users.name','users.email','users.photo','users.sexe','employe.poste')->whereNotIn('users.id',function($q){                        
                              $q->select('user_id')->from('user_has_category')->whereRaw('category_id  ='.$GLOBALS['a']);
                            })->get();
              
        return($users);
   
        } catch(\Illuminate\Database\QueryException $ex){ 
               
 
                   }
    
 }
 public static function empListNotAdmin($category_id){
     $GLOBALS['a'] = $category_id;
          try { 
        $users = DB::table('employe')->join('users', 'employe.user_id', '=', 'users.id')
                                   ->select('users.id','users.name','users.email','users.photo','users.sexe','employe.poste')->whereNotIn('users.id',function($q){                        
                              $q->select('user_id')->from('user_has_category')->whereRaw('category_id  ='.$GLOBALS['a'].' and role="admin"');
                            })->get();
        return($users);
   
        } catch(\Illuminate\Database\QueryException $ex){ 
               
 
                   }
    
 }
 public static function ListAdmin($category_id){
     $GLOBALS['a'] = $category_id;
          try { 
        $users = DB::table('users')
                           ->select('users.id','users.name','users.email','users.photo','users.sexe')->whereIn('users.id',function($q){                        
                              $q->select('user_id')->from('user_has_category')->whereRaw('category_id  ='.$GLOBALS['a'].' and role="admin"');
                            })->get();
        return($users);
   
        } catch(\Illuminate\Database\QueryException $ex){ 
               
 
                   }
    
 }
    
 public static function ListMember($category_id){
     $GLOBALS['a'] = $category_id;
          try { 
        $users = DB::table('users')
                           ->select('users.id','users.name','users.email','users.photo','users.sexe')->whereIn('users.id',function($q){                        
                              $q->select('user_id')->from('user_has_category')->whereRaw('category_id  ='.$GLOBALS['a'].' and role="member"');
                            })->get();
              
      for($i=0;$i<count($users);$i++) {
             $cpl= Prof::test_identity($users[$i]->id);
              if($cpl[0]){
                  $users[$i]->identity="prof";
              }else if($cpl[1]){
                  $users[$i]->identity="emp";
              }else if($cpl[2]){
                  $users[$i]->identity="etd";
              }
          }
      
              
              return($users);
   
        } catch(\Illuminate\Database\QueryException $ex){ 
               
 
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
    
public static function addMember($dataset){
    for($i=2;$i<=count($dataset);$i++){
          DB::table('user_has_category')->insert(
         ['user_id' => $dataset[$i],
          'role' => "member",
          'category_id'=>$dataset[1],
          
         ]);
    }
  
}










}