<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\lib\Emp;
use Redirect;
use View;
use Response;
class EmpController extends Controller
{
    
    
    public function searchEmps(Request $request){
    $data['emp']=Emp::findEmp($request->Label);
   $contents = View::make('sh.empSh')->with('data', $data);
    $response = Response::make($contents, 200);
    $response->header('Content-Type', 'text/plain');
        return   $response;
        
        
        
    }
    
    
    public function search(Request $request){
    
    $data['admins']=Emp::find($request->Label,$request->catID);
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
   
       Emp::import_csv($line_of_text);
   
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
        $data['emp']=Emp::empList($show);
        
        return view("emp")->with("data",$data);
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
       Emp::addAdmins($array);
       return back()->withInput();
    }
    
  public function storeMember(Request $request)
    {
       $array=array_values($request->all());
        unset($array[0]);
       Emp::addMember($array);
       return redirect('categories');
        
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
         if(Emp::del($request->catID,$request->userID)){
            return response("OK", 200)->header('Content-Type', 'text/plain'); 
       } else{
            return response("NOT", 200)->header('Content-Type', 'text/plain'); 

       }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
       $data['emp'] = Emp::get($request->id);
         return view("editEmp")->with('data',$data);

        
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
    public function remove(Request $request)
    {
      if(Emp::delete($request->empID)){
            return response("OK", 200)->header('Content-Type', 'text/plain'); 
       } else{
            return response("NOT", 200)->header('Content-Type', 'text/plain'); 

       }
        
    }
    
    
  public function  editRcords(Request $request){
    Emp::edit($request->id,$request->name,$request->email,$request->poste,$request->sexe);
               return redirect('emps');

    
  }
}
