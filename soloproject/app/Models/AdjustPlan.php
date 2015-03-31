<?php 
namespace App\Models;
use DB;
use App\Library\SQL\Sql;

class AdjustPlan extends Model {

	protected static $table = 'plan_adjustment';
    protected static $key = 'plan_adjustment_id';


    static function removeAdjustPlan($plan_id){
    	$sql = "
    			DELETE from plan_adjustment
    			WHERE plan_id = :plan_id
    			";
    	DB::delete($sql, [':plan_id' => $plan_id]);

    }
}