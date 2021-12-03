<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\IconTag;

class Icon extends Model
{
    protected $fillable = ['name', 'user_id', 'icon_file'];

    public function IconTags(){
        return $this->hasMany('App\IconTag','icon_id', 'id');
    }

    public function User(){
    	return $this->belongsTo('App\User', 'user_id', 'userId');
    }

    public function getAllIcons($params) {

    	$qry = DB::table('icons');

        if (isset($params['tag_id']) && $params['tag_id'] != '') {
            //$qry = DB::table('icons');
            $qry->join('icon_tags', 'icons.id', '=', 'icon_tags.icon_id');
            $qry->where('icon_tags.tag_id', '=', $params['tag_id']);
        }

    	if (isset($params['limit'])) {
    		$qry->limit($params['limit']);
    	}
    	if (isset($params['order_by'])) {
    		if (isset($params['order_by'])) {
    			$qry->orderBy($params['order_by'], $params['order_dir']);
    		} else {
    			$qry->orderBy('desc');
    		}
    	}
//params[page]	1
    	//$result = $qry->get();
    	$qry->select('icons.id','icons.name', 'icons.icon_file');
        //echo $qry->get()->count();
    	if ($qry->get()->count() > 0) {
	    	//$result = $qry->get();
            $result = $qry->paginate($params['limit'], ['*'], 'page', $params['current_page']);
            //paginate($perPage = null, $columns = ['*'], $pageName = 'page', $page = null)
	    	return ['icons' => $result->toArray(), 'status' => 1];
	    } else {
	    	return ['status' => 0, 'msg' => 'No Record Found'];
	    }

    	/*
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
		*/
    }

}
