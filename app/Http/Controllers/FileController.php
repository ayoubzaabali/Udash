<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\lib\File;
use App\lib\Mai;
use App\lib\DocxToTextConversion;
use App\lib\pdf;

use Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;
use View;
use Response;
class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
        $filename = Crypt::encryptString($request->file('file')->getClientOriginalName()) . '.' . $request->file('file')->getClientOriginalExtension();
        $path=  $request->file('file')->storeAs("link/",$filename);
        $original= pathinfo($request->file('file')->getClientOriginalName(),PATHINFO_FILENAME);    
        File::insert($original,$path,Auth::id(),$request->categoryId,Storage::size($path));
         $members=  json_decode($request->members);
        foreach( $members as $member){
            $data['name']=$member->name;
            $data['message']=$original." Added  By ".Auth::user()->name;
             Mai::sendMailUsers(view('mailUsers', ['data' =>$data ])->render(),$member->email) ;

        }
     
    }
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addstudent(Request $request)
    {
    $file_handle = fopen($request->file('file'), 'r');
    $delimiter = ',';
    while (!feof($file_handle)) {
        $line_of_text[] = fgetcsv($file_handle, 0, $delimiter);
    }
    fclose($file_handle);
   
       File::import_student_csv($line_of_text,$request->categoryId);
   
    }
    
    public function downloader(Request $request)
    {
        
     
        $fileID = $request->fileID;
        $cord=File::select_file($fileID);
        return Storage::download($cord->path, $cord->original); 

        
    
        

    }
public function search(Request $request){
    
    $data['files']=File::find($request->Label,$request->dataid);
    $contents = View::make('sh.fileSh')->with('data', $data);
    $response = Response::make($contents, 200);
    $response->header('Content-Type', 'text/plain');
        return $response;

}
        
public function searchBack(Request $request){
    if(session('role')=="admin"){
        $data['files']=File::FileListAdmin(Auth::id());
    }else{
        $data['files']=File::FileListUser(Auth::id()); 
    }
   
    
    for($i=0;$i<count($data['files']);$i++){
      $converter = new DocxToTextConversion('storage/app/'.$data['files'][$i]->path);
      $test1= $converter->convertToText();
      
        
       
     $test= substr_count($test1,$request->Label);
     if($test!=0){
        $data['files'][$i]->num= $test;
     }else{
        $data['files'][$i]=null ;
     }
    }
    
    $contents = View::make('sh.intiligent')->with('data', $data);
    $response = Response::make($contents, 200);
    $response->header('Content-Type', 'text/plain');
    return $response;

}
    
 public function delete(Request $request)
    {
       if(File::del($request->fileID)){
            return response("OK", 200)->header('Content-Type', 'text/plain'); 
       } else{
            return response("NOT", 200)->header('Content-Type', 'text/plain'); 

       }
    } 
    
    
    
}
