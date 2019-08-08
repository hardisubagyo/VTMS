<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Model\Listvessel;

class ListvesselController extends Controller
{
    public function index(){
    	$data = array(
            "status" => "1"
        );

        return json_encode($data);
    }

    public function listkapal(){
    	$history = DB::table('ais_ivef')
    					->select('Pos_Long','Pos_Lat','TrackData_UpdateTime','TrackData_Width')
    					->where('VesselData_ID','5')
    					->where('TrackData_Width','0')
    					->orderBy('id', 'desc')
    					->get();

    	$output = array();
    	foreach($history as $item){
    		array_push($output, array(
    			"lng" => floatval($item->Pos_Long),
    			"lat" => floatval($item->Pos_Lat),
    			"time" => strtotime($item->TrackData_UpdateTime),
    			"dir" => "null",
    			"heading" => "null",
    			"info" => array()
    		));
    	}

    	echo json_encode($output);
    }
}
