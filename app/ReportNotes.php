<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportNotes extends Model
{
	protected $table = 'report_notes';
    protected $primaryKey='id';
    protected $fillable = ['reportId', 'userId','point_1','point_2', 'point_3'];

}
