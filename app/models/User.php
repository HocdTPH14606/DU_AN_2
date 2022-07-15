<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class User extends Model{
    protected $table = 'users';
    public $timestamps = false;
    public static function exist_param($fieldname)
    {
        return array_key_exists($fieldname, $_REQUEST);
    }  
    public static function add_cookie($name, $value, $day)
    {
        setcookie($name, $value, time() + (86400 + $day), "/");
    }
    public static function get_cookie($name)
    {
        return $_COOKIE[$name] ?? '';
    }
}
?>
