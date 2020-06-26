<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExpensesModel extends Model
{
    public $table='expenses';
	public $primaryKey='id';
	public $incrementing=true;
	public $keyType='int';
	public  $timestamps=false;

}
