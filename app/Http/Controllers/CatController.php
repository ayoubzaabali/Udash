<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\lib\Cat ;
use App\lib\Emp ;
use App\lib\Mai ;

use App\lib\Prof ;
use \stdClass ;
use View;
use Response;
use Auth ;
class CatController extends Controller
{
   
 
    public function sendmail(Request $request){
    $members=  json_decode($request->members);
        foreach( $members as $member){
            $data['name']=$member->name;
            $data['message']=$request->message;
             Mai::sendMailUsers(view('mailUsers', ['data' =>$data ])->render(),$member->email) ;

        }
     
    
//   return response($member[0]->email, 200)->header('Content-Type', 'text/plain'); 

    }
    
    
    
     public function archive(Request $request){
            Cat::archive($request->Label);
         return redirect('archive');
    }
      public function unarchive(Request $request){
          echo($request->id);
            Cat::unarchive($request->id);
          return redirect('categories');
    }

    
   public function archiveHome(Request $request){
       
       
      $data['archives']=Cat::ArchiveListAdmin();

       $archive=null;
         if(isset($request->archiveId)){
               $archive=$request->archiveId;

            }else{
             if(isset(Cat::ArchiveId()->id)){
               $archive=Cat::ArchiveId()->id;  
             }
             
             
         }
      $data['archiveId']=$archive;
        if(session('role')=="admin"){
          
           
           $data['categories']=Cat::CatListArchive($archive); 
        }else{
           $data['categories']=Cat::CatListUserArchive(Auth::id(),$archive);  
        }
        $data['files'] = new stdClass();

        //returning files
        if (isset($request->catId)) {
           
            $data['catId']=$request->catId;
            $data['files'] = Cat::FileListe($data['catId']);
            
    
        }else if ($request->isMethod('get') && isset($data['categories'][0]->id)) {
            $data['catId']=$data['categories'][0]->id;
           $data['files'] = Cat::FileListe($data['catId']);
       }else if($request->isMethod('post') && isset($data['categories'][0]->id)){
           $data['catId']=$data['categories'][0]->id;
           $data['files'] = Cat::FileListe($data['catId']);
        }
        
        if(isset($data['catId'])){
           if(session('role')=="admin"){
                $data['role']="admin";
              }else{
                $data['role']=Cat::catRole(Auth::id(),$data['catId']);
               if(isset($data['role']->role)){
                  $data['role']=$data['role']->role; 
               }else{
                  $data['role']="admin"; 
               }
                
              }
        //returning admins
        $data['emp']=Emp::emListNotiNCat($data['catId']);
        $data['profn']=Prof::profListNotiNCat($data['catId']);
        $data['admins']=Emp::ListAdmin($data['catId']);
        //returning members
        $data['members']=Emp::ListMember($data['catId']);
        $data['profnm']=Prof::profListNotiNCat($data['catId']);
        $data['empnm']=Emp::emListNotiNCat($data['catId']);
        $data['accepted'] =Cat::test($data['catId']);  
          
        }else{
          $data['role']="admin";  
           
        //returning admins
        $data['emp']= new stdClass();;
        $data['profn']= new stdClass();;
        $data['admins']= new stdClass();;
        //returning members
        $data['members']= new stdClass();;
        $data['profnm']= new stdClass();;
        $data['empnm']= new stdClass();;
        $data['accepted']=new stdClass();
        }
        
       
         

        return view('filesArchive')->with("data",$data);
   }
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home(Request $request)
    {
       
        
        
        if(session('role')=="admin"){
           $data['categories']=Cat::CatList(); 
        }else{
           $data['categories']=Cat::CatListUser(Auth::id());  
        }
        
        //returning files
        if (isset($request->catId)) {
           
            $data['catId']=$request->catId;
            $data['files'] = Cat::FileListe($data['catId']);
            
    
        }else if ($request->isMethod('get') && isset($data['categories'][0]->id)) {
            $data['catId']=$data['categories'][0]->id;
           $data['files'] = Cat::FileListe($data['catId']);
       }else{
            $data['files'] = new stdClass();
        }
        
        if(isset($data['catId'])){
           if(session('role')=="admin"){
                $data['role']="admin";
              }else{
                $data['role']=Cat::catRole(Auth::id(),$data['catId']);
               if(isset($data['role']->role)){
                  $data['role']=$data['role']->role; 
               }else{
                  $data['role']="admin"; 
               }
                
              }
        //returning admins
        $data['emp']=Emp::emListNotiNCat($data['catId']);
        $data['profn']=Prof::profListNotiNCat($data['catId']);
        $data['admins']=Emp::ListAdmin($data['catId']);
        //returning members
        $data['members']=Emp::ListMember($data['catId']);
        $data['profnm']=Prof::profListNotiNCat($data['catId']);
        $data['empnm']=Emp::emListNotiNCat($data['catId']);
        $data['accepted'] =Cat::test($data['catId']);  
          
        }else{
          $data['role']="admin";  
           
        //returning admins
        $data['emp']= new stdClass();;
        $data['profn']= new stdClass();;
        $data['admins']= new stdClass();;
        //returning members
        $data['members']= new stdClass();;
        $data['profnm']= new stdClass();;
        $data['empnm']= new stdClass();;
        $data['accepted']=new stdClass();
        }
                 

        return view('files')->with("data",$data);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       $collection=Json_decode($request->myjson);
       Cat::inserCats($collection,Auth::id());
     //  return response($collection);
       return response("OK", 200)->header('Content-Type', 'text/plain'); 

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function set(Request $request)
    {
        if(Cat::set($request->catID)){
        return response("OK", 200)->header('Content-Type', 'text/plain'); 
 
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        Cat::del($request->catID);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
