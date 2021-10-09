<?php

namespace App\lib;
use DB ;



class Cat
{
    
   public static function  CatsByFiles(){
            return(DB::table('category')->leftJoin('files', 'files.category_id', '=', 'category.id')->select(DB::raw('count(files.id) as file_count, category.*'))->where("category.accepted",1)->whereNotIn('category.id',function($q){$q->select('category_id')->from('archive_assoc');})->orderBy('file_count', 'desc')->groupBy('category.id')->get())  ;

   }
    
    public static function  CatsByUsers(){
     return(DB::table('category')->leftJoin('user_has_category', 'user_has_category.category_id', '=', 'category.id')->select(DB::raw('count(user_has_category.user_id) as user_count, category.*'))->where(["category.accepted" => 1])->whereNotIn('category.id',function($q){$q->select('category_id')->from('archive_assoc');})->orderBy('user_count', 'desc')->groupBy('category.id')->get())  ;
   } 
   public static function  TopFive(){
     return(DB::table('category')->leftJoin('files', 'files.category_id', '=', 'category.id')->select(DB::raw('count(files.id) as file_count, category.*'))->where("category.accepted",1)->whereNotIn('category.id',function($q){$q->select('category_id')->from('archive_assoc');})->groupBy('category.id')->limit(8)->get())  ;
   }
    public static function  TopFiveU(){
     return(DB::table('category')->leftJoin('user_has_category', 'user_has_category.category_id', '=', 'category.id')->select(DB::raw('count(user_has_category.user_id) as user_count, category.*'))->where(["category.accepted" => 1])->whereNotIn('category.id',function($q){$q->select('category_id')->from('archive_assoc');})->groupBy('category.id')->limit(8)->get())  ;
   }    
    
   public static function  ArchiveListAdmin(){
       return(DB::table('archive')->select("*")->get()) ;
   }
    
    
  public static function  ArchiveId(){
     return(DB::table('archive')->select("id")->first()) ;
  }
public static function archive($name){
    
   $array= DB::table('category')->select("id")->whereNotIn('category.id',function($q){                        
                              $q->select('category_id')->from('archive_assoc');
                            })->get()->toArray();;
    $id=DB::table('archive')->insertGetId(['name' => $name]);

    for($i=0;$i<count($array);$i++){
         DB::table('archive_assoc')->insertOrIgnore(['archive_id' => $id,'category_id'=>$array[$i]->id]);

    }

}
  public static function   unarchive($id){
      DB::table('archive')->where('id', '=', $id)->delete();
  }
    
public static function del($id){
    
    
          try { 
        $a = DB::table('category')->where("id",$id)->delete();;
        return($a);
   
        } catch(\Illuminate\Database\QueryException $ex){ 
 
                   }
    
}
    
    
public static function test($id){
    
    
          try { 
        $a = DB::table('category')->select('accepted')->where("id",$id)->first();
        return($a);
   
        } catch(\Illuminate\Database\QueryException $ex){ 
 
                   }
    
}
    

public static function set($id){
$affected = DB::table('category')
              ->where('id', $id)
              ->update(['accepted' => 1]);
return($affected);
}


public static function inserCats($collection,$user_id){
    for($i=0;$i<count($collection);$i++){
            if(session('role')=="admin"){
            DB::table('category')->insertOrIgnore(['name' => $collection[$i],'user_id'=> $user_id]);
            }else{
                 try { 
                     DB::table('category')->insertOrIgnore(['name' => $collection[$i],'accepted'=>0,'user_id'=> $user_id ]);
                 }catch(\Illuminate\Database\QueryException $ex){
                     dd($ex->getMessage()); 
                 } 
            }

    }

       
}
    
public static function FileListe($cat_id){
$files = DB::table('files')->join('users', 'files.user_id', '=', 'users.id')
                            ->select('users.name','files.original','files.path','files.date','files.size','files.id')->where('files.category_id',$cat_id)->get();
    return($files);

}
    
public static function catRole($id,$cat_id){

    $role = DB::table('category')->join('user_has_category', 'user_has_category.category_id', '=', 'category.id')
            ->select('user_has_category.role')
            ->where([['user_has_category.user_id','=',$id],['user_has_category.category_id','=',$cat_id]])
            ->first();
    return($role);

}

public static function CatList(){
    
    
          try { 
        $categories = DB::table('category')->select('*')->whereNotIn('id',function($q){                        
                              $q->select('category_id')->from('archive_assoc');
                            })->get();
        /*for($i=0;$i<count($categories);$i++){
            $categories[$i]->role="Sadmin";
        }*/
        return($categories);
   
        } catch(\Illuminate\Database\QueryException $ex){ 
                dd($ex->getMessage()); 
 
                   }
    
}
    
public static function CatListArchive($archive_id){
    
        $GLOBALS["archive_id"]=$archive_id;

          try { 
        $categories = DB::table('category')->select('*')->whereIn('id',function($q){                        
                              $q->select('category_id')->from('archive_assoc')->where("archive_id",$GLOBALS["archive_id"]);
                            })->get();
        /*for($i=0;$i<count($categories);$i++){
            $categories[$i]->role="Sadmin";
        }*/
        return($categories);
   
        } catch(\Illuminate\Database\QueryException $ex){ 
                dd($ex->getMessage()); 
 
                   }
    
}

public static function CatListUser($user_id){
    
    $GLOBALS["user_id"]=$user_id;
          try { 
        $categories = DB::table('category')->Leftjoin('user_has_category', 'user_has_category.category_id', '=', 'category.id')->select('category.*')
            ->where(function($query) {
             $query->where([['category.accepted','=',1],['user_has_category.user_id','=',$GLOBALS["user_id"]]])
            ->orWhere('category.user_id', $GLOBALS["user_id"])
            
;
            })->whereNotIn('id',function($q){                        
                              $q->select('category_id')->from('archive_assoc');
                            })->get();
        return($categories);
   
        } catch(\Illuminate\Database\QueryException $ex){ 
                dd($ex->getMessage()); 
 
                   }
    
}   

public static function CatListUserArchive($user_id,$archive_id){
    $GLOBALS["archive_id"]=$archive_id;

    $GLOBALS["user_id"]=$user_id;
          try { 
        $categories = DB::table('category')->Leftjoin('user_has_category', 'user_has_category.category_id', '=', 'category.id')->select('category.*')
            ->where(function($query) {
             $query->where([['category.accepted','=',1],['user_has_category.user_id','=',$GLOBALS["user_id"]]])
            ->orWhere('category.user_id', $GLOBALS["user_id"])
            
;
            })->whereIn('id',function($q){                        
                              $q->select('category_id')->from('archive_assoc')->where("archive_id",$GLOBALS["archive_id"]);;
                            })->get();
        return($categories);
   
        } catch(\Illuminate\Database\QueryException $ex){ 
                dd($ex->getMessage()); 
 
                   }
    
}   










}