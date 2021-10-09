<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\lib\Prof;
use Redirect;
use View;
use Response;
class ProfController extends Controller
{
    
    
    
    
public function homeStudent(Request $request)
    {
        $show=10;
        if(isset($request->show)){
            
            
            $show=$request->show;
            if($show==0)
                $show=1;
                
            
        }
        $data['etd']=Prof::etdList($show);
        return view("etd")->with("data",$data);
    }
    
 public function remove(Request $request)
    {
      if(Prof::delete($request->profID)){
            return response("OK", 200)->header('Content-Type', 'text/plain'); 
       } else{
            return response("NOT", 200)->header('Content-Type', 'text/plain'); 

       }
        
    } 
    
    
public function edit(Request $request)
    {
       $data['prof'] = Prof::get($request->id);
         return view("editProf")->with('data',$data);

        
    }

public function  editRcords(Request $request){
    Prof::edit($request->id,$request->name,$request->email,$request->grade,$request->specialite,$request->sexe);
               return redirect('profs');

    
  }
    
    
public function searchProfs(Request $request){
    $data['prof']=Prof::findProf($request->Label);
   $contents = View::make('sh.profSh')->with('data', $data);
    $response = Response::make($contents, 200);
    $response->header('Content-Type', 'text/plain');
        return   $response;
        
        
        
    }
    
 public function searchEtds(Request $request){
    $data['etd']=Prof::findEtd($request->Label);
   $contents = View::make('sh.etdSh')->with('data', $data);
    $response = Response::make($contents, 200);
    $response->header('Content-Type', 'text/plain');
        return   $response;
        
        
        
    }   
    
    
    
    
    
    
public function search(Request $request){
    
    $data['admins']=Prof::find($request->Label,$request->catID);
     $data['catId']=$request->catId;

    $contents = View::make('sh.adminSh')->with('data', $data);
    $response = Response::make($contents, 200);
    $response->header('Content-Type', 'text/plain');
    return $response;

}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
           //$path=  $request->file('file')->store("link/");
           // 
    $file_handle = fopen($request->file('file'), 'r');
    $delimiter = ',';
    while (!feof($file_handle)) {
        $line_of_text[] = fgetcsv($file_handle, 0, $delimiter);
    }
    fclose($file_handle);
   
       Prof::import_csv($line_of_text);
   
    return response($line_of_text);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home(Request $request)
    {
        $show=10;
        if(isset($request->show)){
            
            
            $show=$request->show;
            if($show==0)
                $show=1;
                
            
        }
        $data['prof']=Prof::profList($show);
        
        return view("prof")->with("data",$data);
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeAdmins(Request $request)
    {
       $array=array_values($request->all());
       unset($array[0]);
       Prof::addAdmins($array);
       return redirect('categories');
        
    }
    
    public function storeMember(Request $request)
    {
       $array=array_values($request->all());
       unset($array[0]);
       Prof::addMembers($array);
       return redirect('categories');
        
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
