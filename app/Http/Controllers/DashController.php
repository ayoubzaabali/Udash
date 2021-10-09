<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\lib\Cat ;
use App\lib\Emp ;
use App\lib\Mai ;
use App\lib\Prof ;
use App\lib\File ;
use App\lib\Dash ;

use \stdClass ;
use View;
use Response;
use Auth ;
class DashController extends Controller
{
    
    
    public function sendPhoto(Request $request){
        $id = Auth::id();
        if ($request->has('ProfilePhoto')) {
        $path=  $request->file('ProfilePhoto')->store("link/");
         $data=array();
         $data['val']=Dash::updatePhoto($path,$id);
         $data['path']=$path;
         
         return response($data , 200);    
        }  
    }
  
    
    
    public function FileCount(){
         //return response( json_encode(File::FileCount(), JSON_FORCE_OBJECT ) , 200)->header('Content-Type', 'text/plain'); 
         return response()->json(File::FileCount());
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //top categories 
        $data['Scount']=Dash::CountS();
        $data['Pcount']=Dash::CountP();
        $data['Acount']=Dash::CountA();
        $data['Fcount']=Dash::CountF();

        $data['categories']=Cat::TopFive();
        $data['categoriesU']=Cat::TopFiveU();
        $data['files']=File::TopTen();
        return view('dash')->with("data",$data);;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ListCatsFile()
    {
        //CatagoriesByFiles
        $data['categories']=Cat::CatsByFiles();
        return view('catsCount')->with("data",$data);;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function RecentFiles(Request $request)
    {
        $data['files']=File::AllFiles();
        return view('FilesMonth')->with("data",$data);;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ListCatsUser()
    {
              //CatagoriesByUsers
        $data['categoriesU']=Cat::CatsByUsers();
        return view('catsCountU')->with("data",$data);;
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
