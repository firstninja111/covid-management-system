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

class Test extends Authenticatable
{
    use Notifiable, HasRoles, CausesActivity, Impersonate;
    // use SoftDeletes;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'id', 'test_view', 'test_type', 'sample_type', 'template_id', 'description', 'features', 'price', 'test_color', 'test_backgroundcolor', 'result_type', 'delete_flag'
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

    public function appointment()
    {
      return $this->hasOne('App\Appointment');
    }

    public function template()
    {
      return $this->belongsTo('App\Template', 'template_id');
    }
}
