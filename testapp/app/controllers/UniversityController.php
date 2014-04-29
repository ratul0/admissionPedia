<?php

class UniversityController extends BaseController {

	


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('university.index')
			->with('university',University::all())
			->with('title','Addmission Pedia - Home');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('university.create')->with('title','Addmission Pedia - Create University');

		//return View::make('users.index')->with('title','Addmission Pedia - Home');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validation = University::validate(Input::all());
		
		if($validation->passes()){
			$university = ['universityname'=>Input::get('name'),
				'about'=>Input::get('about'),
				'capacity'=>Input::get('capacity'),
				'science'=>Input::get('science'),
				'arts'=>Input::get('arts'),
				'commerce'=>Input::get('commerce'),
				'seatplan'=>Input::get('seatplan'),
				'admissiondate'=>Input::get('admissiondate')
				]; 

			University::create($university);
			return Redirect::route('university.index');
		}
		return Redirect::back()->withInput()->withErrors($validation);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return View::make('university.show')
			->with('university',University::find($id))
			->with('title','Addmission Pedia - Show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return View::make('university.edit')
				->with('university',University::find($id))
				->with('title','Addmission Pedia - Edit');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$id = Input::get('university_id');
		$validation = University::validate(Input::all());
		
		if($validation->passes()){
			$university = ['universityname'=>Input::get('name'),
				'about'=>Input::get('about'),
				'capacity'=>Input::get('capacity'),
				'science'=>Input::get('science'),
				'arts'=>Input::get('arts'),
				'commerce'=>Input::get('commerce'),
				'seatplan'=>Input::get('seatplan'),
				'admissiondate'=>Input::get('admissiondate')
				];  

			University::find($id)->update($university);
			return Redirect::route('university.index');
		}
		return Redirect::route('university.edit',$id)->withInput()->withErrors($validation);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Department::where('univ_id','=',$id)->delete();
		University::destroy($id);
		return Redirect::route('university.index')
				->with('message','University Deleted!');
	}

}