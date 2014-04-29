<?php 
class University extends BaseModel{
	protected $table = 'universities';
	public $timestamps = false;

	protected $guarded = [];

	protected static $rules = ['name'=>'required',
		 'about' =>'Required',
		'capacity'=>'Required|Numeric',
		'science' =>'Required|Numeric',
		'arts'=>'Required|Numeric',
		'commerce'=>'Required|Numeric'
		
		];
}