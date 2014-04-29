<?php

class DepartmentController extends BaseController {

	
	private function getUniversityWithId(){
		$universities = University::all();

		$store = array();
		
		foreach ($universities as $university) {
			$store[$university->id] = $university->universityname;


		}

		return $store;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('department.index')
			->with('universities',$this->getUniversityWithId())
			->with('department',Department::all())
			->with('title','Addmission Pedia - Departments');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('department.create')
			->with('universities',$this->getUniversityWithId())
			->with('title','Addmission Pedia - Add a new Department');

		//return View::make('users.index')->with('title','Addmission Pedia - Home');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validation = Department::validate(Input::all());
		
		if($validation->passes()){
			$department = ['univ_id'=>Input::get('universityname'),
				'department'=>Input::get('department'),
				'seat'=>Input::get('seat')
				]; 

			Department::create($department);
			return Redirect::route('department.index');
		}
		return Redirect::back()->withInput()->withErrors($validation);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($departmentid)
	{
		return View::make('department.show')
			->with('universities',$this->getUniversityWithId())
			->with('department',department::find($departmentid))
			->with('title','Addmission Pedia - Show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($departmentid)
	{
		return View::make('department.edit')
			->with('universities',$this->getUniversityWithId())
			->with('department',Department::find($departmentid))
			->with('title','Addmission Pedia - Edit');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($departmentid)
	{
		$dept_id = Input::get('department_id');
		$validation = Department::validate(Input::all());
		
		if($validation->passes()){
			$department = ['univ_id'=>Input::get('universityname'),
				'department'=>Input::get('department'),
				'seat'=>Input::get('seat')
				]; 

			Department::find($dept_id)->update($department);
			return Redirect::route('department.index');
		}
		return Redirect::route('department.edit',$departmentid)->withInput()->withErrors($validation);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Department::destroy($id);
		return Redirect::route('department.index')
				->with('message','Department Deleted!');
	}

}