<?php 
class UsersController extends BaseController{


	function __construct()
	{
		$this->beforeFilter('csrf', array('on'=>'post'));
   		
	}

	public function index()
	{
		return View::make('users.index')->with('title','Addmission Pedia - Home');
	}



	public function getLogin()
	{

		

		return View::make('users.login')->with('title','Addmission Pedia - Login');
	}

	public function postLogin()
	{

		


		$user = ['email'=>Input::get('email'),'password'=>Input::get("password")];


		if(Auth::attempt($user)){
			return Redirect::route('home')->with('message','You are Logged In !!');

		}else{
			return Redirect::back()->with('message','your username/password was invalid')->withInput();
		}
	}

	public function getLogout()
	{
		if(Auth::check()){
			Auth::logout();
			return Redirect::route('login')->with('message','You are now logged out!');
		}else{
			return Redirect::route('home');
		}
	}


	public function edit()
	{
		return View::make('users.edit')
			->with('title','Addmission Pedia - New Admin')
			->with('user',User::all());
	}

	public function update()
	{
		
		$validation = User::validate(Input::all());

		if($validation->passes()){

			$user = ['email'=>Input::get('email'),'username'=>Input::get('username'),'password'=>Hash::make(Input::get('password'))];

			DB::table('users')->truncate();

			User::create($user);
			Auth::logout();

			return Redirect::route('login')->with('message','Admin Account Modified!');
			
		}

		return Redirect::back()->withInput()->withErrors($validation);
	}




}
