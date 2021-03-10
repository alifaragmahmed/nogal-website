<?php

namespace App;

use DB;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use \Illuminate\Database\Eloquent\SoftDeletes;

use App\helper\ViewBuilder;

class User  extends Authenticatable
{
    use SoftDeletes; 
    use Notifiable;
    
    /**
     * table name of user model
     * 
     * @var type 
     */
    protected $table = "users";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'description', 'photo', 'role', 'active', 'confirm_code'
    ]; 
    
    protected $appends = [
        'url'
    ];
   
    public function getUrlAttribute() { 
        if ($this->photo && $this->photo != "user.png")
            return url('/images/users') . "/" . $this->photo;
        else
            return url('/images/user.png');
    }
    
    /**
     *  return all orders of this user
     * 
     */
    public function orders() {
        return $this->hasMany("App\Order");
    } 
     
    
    /**
     * get user from session
     * @return App\User
     */
    public static function auth() { 
        return (session("user"))? User::find(session("user")) : null;
    }

    /**
     * build view object this will make view html
     * 
     * @return ViewBuilder
     */
    public function getViewBuilder() {
        $builder = new ViewBuilder($this, "rtl");
 
        $builder->setAddRoute(url('/dashboard/user/store'))
                ->setEditRoute(url('/dashboard/user/update') . "/" . $this->id) 
                ->setCol(["name" => "id", "label" => __('id'), "editable" => false ]) 
                ->setCol(["name" => "name", "label" => __('name')]) 
                ->setCol(["name" => "phone", "label" => __('phone'), "required" => false]) 
                ->setCol(["name" => "active", "label" => __('active'), "type" => "checkbox"]) 
                
                ->setCol(["name" => "description", "label" => __('description'), "col" => 'col-lg-6 col-md-6 col-sm-12', "required" => false]) 
                 
                ->setCol(["name" => "email", "label" => __('email'), "type"=> "email", "col" => 'col-lg-6 col-md-6 col-sm-12']) 
                ->setCol(["name" => "password", "label" => __('password'), "type"=> "password", "col" => 'col-lg-6 col-md-6 col-sm-12']) 
                
                ->setCol(["name" => "photo", "label" => __('photo'), "type" => "image", "col" => 'col-lg-6 col-md-6 col-sm-12', "required" => false]) 
                ->setCol(["name" => "role", "label" => __('role'), "type"=> "select", "data"=>[
                    ['ADMIN', __("admin")],
                    ['USER', __('user')], 
                ], "col" => 'col-lg-6 col-md-6 col-sm-12']) 
                ->setUrl(url('/image/users'))
                ->build();
        
        return $builder;
    }
}
