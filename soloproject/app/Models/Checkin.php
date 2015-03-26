<?php 
namespace App\Models;
use DB;
use App\Library\SQL\Sql;

class Checkin extends Model {
    protected static $table = 'check_in';
    protected static $key = 'check_in_id';


    static function getCheckin($plan_id){
    	$sql = "
    			SELECT check_in_id,
    			checkin_date,
    			current_weight,
    			caloric_intake,
    			caloric_output
    			FROM check_in
    			WHERE plan_id = :plan_id
    			";
    	$check_in = DB::select($sql, [':plan_id' => $plan_id]);
    	return $check_in;
    }

    static function removeCheckin($plan_id) {
    	$sql = "
    			DELETE from check_in
    			WHERE plan_id = :plan_id
    			";
    	DB::delete($sql, [':plan_id' => $plan_id]);
    }

}