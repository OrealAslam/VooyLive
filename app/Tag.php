<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tag extends Model
{
    protected $fillable = ['name'];

    public function TagIcons(){
        return $this->hasMany('App\IconTag','tag_id', 'id');
    }


    public function getTags($query, $limit) {
    	$query = strtolower($query);

    	if (DB::table('tags')->where('name', 'like', '%'.$query.'%')->count() > 0) {
	    	$tags = DB::table('tags')
	                ->where('name', 'like', '%'.$query.'%')
	                //->limit(5)
	                ->get();
	                //->pluck('name', 'id');
	        $result = array();
	        foreach ($tags as $tag) {
	        	$result[] = ['id' => $tag->id, 'title' => $tag->name];
	        }

			return ['tags' => $result, 'status' => true];
		} else {
			return ['status' => false];
		}
    }
}
