<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*general routes*/

Route::get('/home','HomeController@index')->name('home');
Route::get('/clear-cache','HomeController@optimize')->name('optimize');
Route::get('/', 'HomeController@showloginform')->middleware('checkAuth');
Route::get('/mail', 'HomeController@mail')->middleware('auth');
Route::get('/setting', 'HomeController@setting')->middleware('password.confirm','auth')->name('setd');
Route::post('/change-password', 'SettingController@store')->middleware('auth')->name('change.password');
Auth::routes();
Route::get('/search','HomeController@search')->name('search');
Route::post('/sendPhoto','DashController@sendPhoto')->middleware('auth')->name('sendPhoto');

/*general routes end*/


/*Dash routes*/

Route::get('/dash','DashController@index')->middleware('auth')->name('dash');
Route::get('/CatagoriesByFiles','DashController@ListCatsFile')->middleware('auth')->name('dash.catsFiles');
Route::get('/CatagoriesByUsers','DashController@ListCatsUser')->middleware('auth')->name('dash.ListCatsUsers');
Route::get('/RecentFiles','DashController@RecentFiles')->middleware('auth')->name('RecentFiles');
Route::get('/countFiles','DashController@FileCount')->middleware('auth')->name('FileCount');

/*Dash routes end*/

/*prof routes*/
Route::get('/students','ProfController@homeStudent')->middleware('auth')->name("etd.home");
Route::get('/profs','ProfController@home')->middleware('auth')->name("prof.home");
Route::post('/upload', 'ProfController@upload')->middleware('auth')->name("prof.index");
Route::post('/uploadProfAdmins', 'ProfController@storeAdmins')->middleware('auth')->name("prof.admins");
Route::post('/uploadProfMember', 'ProfController@storeMember')->middleware('auth')->name("prof.member");
Route::get('/shMembers/{Label}/{catID}','ProfController@search')->middleware('auth')->name("meme.sh");
Route::get('/deleteProf/{profID}','ProfController@remove')->middleware('auth')->name("prof.delete");
Route::post('/showProf','ProfController@edit')->middleware('auth')->name("prof.edit");
Route::post('/editp','ProfController@editRcords')->middleware('auth')->name("editp");
Route::get('/shProf/{Label}','ProfController@searchProfs')->middleware('auth')->name("prof.search");
Route::post('/editp','ProfController@editRcords')->middleware('auth')->name("prof.records");
Route::get('/shEtd/{Label}','ProfController@searchEtds')->middleware('auth')->name("etd.search");

/*prof routes end*/



/*emp routes*/
Route::get('/emps','EmpController@home')->middleware('auth')->name("emp.home");
Route::post('/uploadE', 'EmpController@upload')->middleware('auth')->name("emp.index");
Route::post('/uploadEmpAdmins', 'EmpController@storeAdmins')->middleware('auth')->name("emp.admins");
Route::post('/uploadEmpMember', 'EmpController@storeMember')->middleware('auth')->name("emp.member");
Route::get('/shAdmins/{Label}/{catID}','EmpController@search')->middleware('auth')->name("emp.sh");
Route::get('/shEmps/{Label}','EmpController@searchEmps')->middleware('auth')->name("emp.search");
Route::get('/deleteEmp/{empID}','EmpController@remove')->middleware('auth')->name("emp.delete");
Route::post('/showEmp','EmpController@edit')->middleware('auth')->name("emp.edit");
Route::post('/edit','EmpController@editRcords')->middleware('auth')->name("emp.records");


/*emp routes end*/


/*category routes*/
Route::get('/categories','CatController@home')->middleware('auth')->name("cat.home");
Route::get('/addCategories/{myjson}','CatController@create')->middleware('auth')->name("cat.add");
Route::get('/set/{catID}','CatController@set')->middleware('auth')->name("cat.set");
Route::get('/sup/{catID}','CatController@delete')->middleware('auth')->name("cat.sup");
Route::post('/categories','CatController@home')->middleware('auth')->name("cat.homePost");
Route::post('/addarchive','CatController@archive')->middleware('auth')->name("cat.archive");
Route::post('/unarchive','CatController@unarchive')->middleware('auth')->name("cat.unarchive");
Route::get('/archive','CatController@archiveHome')->middleware('auth')->name("cat.archivehome");
Route::post('/archive','CatController@archiveHome')->middleware('auth')->name("cat.archivehomePost");
Route::post('/sendmail','CatController@sendmail')->middleware('auth')->name("sendmail");
Route::get('/sendmail','CatController@sendmail')->middleware('auth')->name("get.sendmail");

/*category routes end*/

/*emp routes*/
Route::post('/uploadF', 'FileController@upload')->middleware('auth')->name("file.upload");
/*emp routes end*/

/*files routes*/
Route::get('/download/{fileID}','FileController@downloader')->middleware('auth')->name("file.down");
Route::post('/addstudent','FileController@addstudent')->middleware('auth')->name("student");
Route::get('/shFile/{Label}/{dataid}','FileController@search')->middleware('auth')->name("file.sh");
Route::get('/deleteFile/{fileID}','FileController@delete')->middleware('auth')->name("file.delete");
Route::get('/SearchBack/{Label}','FileController@searchBack')->middleware('auth')->name("file.shearch");

/*files routes end*/


Route::get('/deleteMA/{catID}/{userID}','EmpController@delete')->middleware('auth')->name("admin.delete");



