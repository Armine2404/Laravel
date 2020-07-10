<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // VAMOS A MOVER DESDE CONTROLADOR AQUI
    public static function uploadAvatar($image)
    {
        // if ($request->hasFile('image')) {
            $fileName = $image->getClientOriginalName();
            // primero comprobamos si el user tiene imagen, si tiene primero lo borramos luego actualizamos 
            // $this->deleteOldImage();
           
            $image->storeAs("images", $fileName, "public");
        //  en el controlador $this es auth()-user()
         auth()->user()->update(['avatar' => $fileName]);
        //   }
    }
    protected function deleteOldImage()
    {
         if($this->avatar)
          {

            Storage::delete('/public/images/'.$this->avatar);
          }
    }

    // relashionship, hasMany significa que cada usuario tiene muchos todos
    public function todos(){
       return $this->hasMany(Todo::class);
    }

    // public function setPasswordAtribute($password)
    // {
    //     $this->attributes['password'] = bcrypt($password);
    // }
    // public function getNameAttribute($name)
    // {
    //     return 'My name is :'.ucfirst($name);
    // }
}
