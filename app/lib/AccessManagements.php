<?php

namespace App\lib;

use Illuminate\Auth\Events\Authenticated;
use Auth;
use App\lib\Prof ;
use \Vaites\ApacheTika\Client;

class AccessManagements
{
    /**
     * Handle the event.
     *
     * @param  \Illuminate\Auth\Events\Registered  $event
     * @return void
     */
    public function handle(Authenticated $event)
    {
        if(!Auth::user()->role=="admin"){
          $roles=Prof::test_identity(Auth::id());
          if($roles[0]){
             session(['role' => 'prof']);
          }else if($roles[1]){
              session(['role' => 'emp']);
          }else if($roles[2]){
              session(['role' => 'etd']);
          }
        }else{
            session(['role' => 'admin']);
        }
       
        session(['client' => Client::make('tika-app-1.24.1.jar')]);

    }
}
