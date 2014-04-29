<?php 
class Department extends BaseModel{
	protected $table = 'departments';
	public $timestamps = false;

	protected $guarded = [];

	protected static $rules = ['department'=>'required',
		 'seat' =>'Required|Numeric'
		
		];
}