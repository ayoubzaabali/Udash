<?php

namespace App\lib;
use DB ;
use \Crypt;
use Carbon\Carbon;
use Illuminate\Support\Str ;
use Illuminate\Support\Facades\Hash;
use App\lib\Mai;

class File
{
   
    public static function  FileCount(){
      //  echo(Carbon::now()->subdays(8)."________________");
        
        
     return( DB::table('files')->join('category', 'files.category_id', '=', 'category.id')
                            ->select(DB::raw('count(files.id) as x,count(category.id) as y'))->whereNotIn('category.id',function($q){$q->select('category_id')->from('archive_assoc');})->groupBy(DB::raw('category.id'))
                            ->get()->all()) ;

    }
    
  public static function  TopTen(){
     return( DB::table('files')->join('users', 'files.user_id', '=', 'users.id')
                            ->select('users.name','files.original','files.path','files.date','files.size','files.id')
                            ->whereMonth('date', now()->month)->limit(20)->get()) ;

    }
      
  public static function  AllFiles(){
     return( DB::table('files')->join('users', 'files.user_id', '=', 'users.id')
                            ->select('users.name','files.original','files.path','files.date','files.size','files.id')
                            ->whereMonth('date', now()->month)->get()) ;

    }  
    
public static function FileListUser($user_id){
    
    $GLOBALS["user_id"]=$user_id;
          try { 
        $files = DB::table('users')
            ->join('user_has_category', 'user_has_category.user_id', '=', 'users.id')
             ->join('category', 'user_has_category.category_id', '=', 'category.id')
              ->join('files', 'files.category_id', '=', 'category.id')
              ->select('files.*')
            ->where(function($query) {
             $query->where([['category.accepted','=',1],['user_has_category.user_id','=',$GLOBALS["user_id"]]])
           
            
;
            })->get();
        return($files);
   
        } catch(\Illuminate\Database\QueryException $ex){ 
                dd($ex->getMessage()); 
 
                   }
    
}
    
    
  public static function  FileListAdmin(){
      
          try { 
        $files = DB::table('files')->select('files.*')->get();
        return($files);
   
        } catch(\Illuminate\Database\QueryException $ex){ 
                dd($ex->getMessage()); 
 
                   }
    
      
      
  }
    
    
    public static function del($id){
    
    
          try { 
        $a = DB::table('files')->where("id",$id)->delete();;
        return($a);
   
        } catch(\Illuminate\Database\QueryException $ex){ 
 
                   }
    
}
    
    public static function find($Label,$id){
        $GLOBALS['aa'] =$Label;
             $myfile=DB::table('files')->join('users', 'files.user_id', '=', 'users.id')
                 ->select('users.name','files.original','files.path','files.date','files.size','files.id')
                 ->where('category_id',$id)
                 ->where(function($query) {
                      $query->where('original', 'LIKE', '%'.$GLOBALS['aa'].'%')
                            ->orWhere('date', 'LIKE', '%'.$GLOBALS['aa'].'%');})
                 ->get();
             return($myfile);
    }
    
    
    public static function insert($original,$path,$user_id,$category_id,$size){
         return( DB::table('files')->insert([
    ['user_id' => $user_id,'path' => $path,'original'=>$original,'category_id'=>$category_id,'size'=>$size]

     ])) ; 
    }
    
    public static function select_file($id){
   
    try { 
      $myfile=DB::table('files')->select('files.path','files.original')->where('id', '=', $id)->first();
      return($myfile);
   
  } catch(\Illuminate\Database\QueryException $ex){ 
  dd($ex->getMessage()); 
 
     }
        
    }
    
    
 public static function  import_student_csv($line_of_text,$category_id){
     
     for($i=1;$i<count($line_of_text)-2;$i++){
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
           
            DB::table('etudiant')->insert([ 
          'classe' => $line_of_text[$i][3],
          'apoge' => $line_of_text[$i][4],
          'user_id'=>DB::getPdo()->lastInsertId(),
            ]);
            
        }
        
        $id= DB::table('users')->select('id')->where('email', '=', $line_of_text[$i][1])->first();
          DB::table('user_has_category')->insertOrIgnore(
         ['user_id' =>$id->id,
          'role' => "member",
          'category_id'=>$category_id,
          
         ]);
    
        
    }
 }
    

    
    


    
}
