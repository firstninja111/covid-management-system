<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\CanResetPassword;
// use Illuminate\Auth\Passwords\CanResetPassword;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Activitylog\Traits\CausesActivity;
use Lab404\Impersonate\Models\Impersonate;
use Hash;
use Carbon\Carbon;
use Laravel\Cashier\Billable;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Authenticatable
{
    use Notifiable, HasRoles, CausesActivity, Impersonate;
    // use SoftDeletes;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'id', 'user_id', 'type_id', 's_time', 'symptoms', 'status', 'payment_gateway', 'payment_status', 'result', 'paid', 'pdf', 'collected_time', 'reported_time', 'app_str'
    ];

    protected static $logFillable = true;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans();
    }

    // public function getUpdatedAtAttribute($value)
    // {
    //     return Carbon::parse($value)->diffForHumans();
    // }

    /**
     * @return bool
     */
    // public function canImpersonate()
    // {
    //     return $this->hasRole('admin');
    // }

    /**
     * @return bool
     */
    // public function canBeImpersonated()
    // {
    //     return !$this->hasRole('admin');
    // }

    public function test()
    {
      return $this->belongsTo('App\Test', 'type_id');
    }

    public function user()
    {
      return $this->belongsTo('App\User', 'user_id');
    }
}
