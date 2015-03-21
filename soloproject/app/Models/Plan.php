<?php 
namespace App\Models;
use DB;
use App\Library\SQL\Sql;

class User extends Model {
    protected static $table = 'user';
    protected static $key = 'user_id';
}