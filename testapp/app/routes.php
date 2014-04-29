<?php

/*for creating a User*/


/*Route::get('/',['as'=>'login', function()
{
	$user = ['username'=>'Ratul','email'=>'ratulcse27@gmail.com','password'=>Hash::make('1')];

	User::create($user);
}]);
*/

/*for creating a User*/


Route::get('/',['as'=>'login','uses'=>'UsersController@getLogin']);
Route::get('login',['as'=>'login','uses'=>'UsersController@getLogin']);
Route::post('login','UsersController@postLogin');
Route::get('logout',['as'=>'logout', 'uses'=>'UsersController@getLogout']);


Route::group(array('before' => 'auth'), function()
{

	Route::get('home',['as'=>'home','uses'=>'UsersController@index']);
	Route::get('adminchange',['as'=>'adminchange','uses'=>'UsersController@edit']);
	Route::post('adminchange','UsersController@update');
	
	Route::resource('university','UniversityController');

	Route::resource('department','DepartmentController');


	Route::get('university/delete/{id}', 'UniversityController@destroy');
	Route::get('department/delete/{id}', 'DepartmentController@destroy');
	

});

Route::get('api/university',function(){
	return DB::table('universities')->get();
});
Route::get('api/departments',function(){
	return DB::table('departments')->get();
});
Route::get('api/students/{reg}',function($reg){
	return Student::where('hsc_regno', '=', $reg)->get();
});
Route::get('api/{section}/{gpa}',function($section,$gpa){
	if($section == "science"){
		return University::where('science', '>=', $gpa)->get();
	}elseif($section == "arts"){
		return University::where('arts', '>=', $gpa)->get();
	}elseif($section == "commerce"){
		return University::where('commerce', '>=', $gpa)->get();
	}
	
});
