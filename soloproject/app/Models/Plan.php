<?php 
namespace App\Models;
use DB;
use App\Library\SQL\Sql;

class Plan extends Model {
    protected static $table = 'plan';
    protected static $key = 'plan_id';

    static function getPlan($user_id) {

    	$sql = "
    			SELECT plan_id,
    			start_date, num_days, start_weight,
    			lose_weight
    			FROM plan
    			WHERE user_id = :user_id
    			";
    	$plan = DB::select($sql, [':user_id' => $user_id]);

    	return $plan[0];

    }

    static function removePlan($user_id) {
    	$sql = "
    			DELETE from plan
    			WHERE user_id = :user_id
    			";
    	DB::delete($sql, [':user_id' => $user_id]);
    }


    public function getAdjustment(){

        $sql = "
                SELECT * 
                FROM plan_adjustment
                WHERE plan_id = :plan_id
                ";
        $row = DB::select($sql, [':plan_id' => $this->plan_id]);

        if($row) {

            $adjustment = new AdjustPlan($row[0]->plan_adjustment_id);
            
            return $adjustment;
        }

        return NULL;


    }


}