<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sach extends Model
{
	protected $dates = [
	    'created_at',
	    'updated_at',
	    // your other new column
	];
    use HasFactory;
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'tensach', 'tomtat', 'kichhoat','slug_sach','hinhanh','views','created_at','updated_at','tukhoa','noidung'
    ];
    protected $primaryKey = 'id';
 	protected $table = 'sach';
}
