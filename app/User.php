<?php

namespace App;

use Hash;
use Carbon\Carbon;
use \DateTimeInterface;
use Illuminate\Support\Str;
use Laravel\Passport\HasApiTokens;
use Spatie\MediaLibrary\Models\Media;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Notifications\VerifyUserNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\MediaLibrary\HasMedia\HasMedia;

class User extends Authenticatable implements HasMedia
{
    use Notifiable, HasApiTokens, HasMediaTrait;

    public $table = 'users';

    protected $hidden = [
        'remember_token',
        'password',
    ];

    protected $appends = [
        'profile_image',
    ];

    protected $dates = [
        'date_of_birth',
        'email_verified_at',
        'verified_at',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'bvn',
        'name',
        'title',
        'email',
        'gender',
        'status',
        'address',
        'password',
        'verified',
        'land_mark',
        'last_name',
        'bank_name',
        'account_no',
        'first_name',
        'created_at',
        'updated_at',
        'deleted_at',
        'mobile_no_1',
        'mobile_no_2',
        'verified_at',
        'account_name',
        'date_of_birth',
        'marital_status',
        'remember_token',
        'employers_name',
        'monthly_income',
        'employers_state',
        'employment_sector',
        'employers_address',
        'email_verified_at',
        'state_of_residence',
        'verification_token',
        'employers_land_mark',
        'status_of_residence',
        'employers_local_government_area',
        'local_government_area_of_residence',
    ];

    public static $searchable = [
        'bvn',
        'email',
        'last_name',
        'account_no',
        'first_name',
        'mobile_no_1',
        'mobile_no_2',
    ];
    
    const TITLE_SELECT = [
        'Mr'        => 'Mr',
        'Mrs'       => 'Mrs',
        'Master'    => 'Master',
        'Mister'    => 'Mister',
    ];

    const GENDER_SELECT = [
        'Male'      => 'Male',
        'Female'    => 'Female',
    ];
        
    const STATUS_SELECT = [
        'Active'        => 'Active',
        'Inactive'      => 'Inactive',
    ];

    const BANK_NAME_SELECT = [
        'Access Bank'                           => 'Access Bank',
        'Citibank'                              => 'Citibank',
        'Diamond Bank'                          => 'Diamond Bank',
        'Dynamic Standard Bank'                 => 'Dynamic Standard Bank',
        'Ecobank Nigeria'                       => 'Ecobank Nigeria',
        'Fidelity Bank Nigeria'                 => 'Fidelity Bank Nigeria',
        'First Bank of Nigeria'                 => 'First Bank of Nigeria',
        'First City Monument Bank'              => 'First City Monument Bank',
        'Guaranty Trust Bank'                   => 'Guaranty Trust Bank',
        'Heritage Bank Plc'                     => 'Heritage Bank Plc',
        'Jaiz Bank'                             => 'Jaiz Bank',
        'Keystone Bank Limited'                 => 'Keystone Bank Limited',
        'Providus Bank Plc'                     => 'Providus Bank Plc',
        'Polaris Bank'                          => 'Polaris Bank',
        'Stanbic IBTC Bank Nigeria Limited'     => 'Stanbic IBTC Bank Nigeria Limited',
        'Standard Chartered Bank'               => 'Standard Chartered Bank',
        'Sterling Bank'                         => 'Sterling Bank',
        'Suntrust Bank Nigeria Limited'         => 'Suntrust Bank Nigeria Limited',
        'Union Bank of Nigeria'                 => 'Union Bank of Nigeria',
        'United Bank for Africa'                => 'United Bank for Africa',
        'Unity Bank Plc'                        => 'Unity Bank Plc',
        'Wema Bank'                             => 'Wema Bank',
        'Zenith Bank'                           => 'Zenith Bank',
    ];
    
    const MARITAL_STATUS_SELECT = [
        'Single'                => 'Single',
        'Married'               => 'Married',
        'Seperated/Divorced'    => 'Seperated/Divorced',
        'Widowed'               => 'Widowed',
    ];

    const EMPLOYERS_STATE_SELECT = [
        'Lagos'     => 'Lagos',
    ];

    const EMPLOYMENT_SECTOR_SELECT = [
        'Agriculture'              => 'Agriculture',
        'Manufacturing'            => 'Manufacturing',
        'Retail/Sales'             => 'Retail/Sales',
        'Construction'             => 'Construction',
        'Engineering'              => 'Engineering',
        'Telecoms'                 => 'Telecoms',
        'Oil & Gas'                => 'Oil & Gas',
        'Power'                    => 'Power',
        'Banking'                  => 'Banking',
        'Other Financial Services' => 'Other Financial Services',
        'Health'                   => 'Health',
        'Government'               => 'Government',
        'Others'                   => 'Others',
    ];
    
    const STATE_OF_RESIDENCE_SELECT = [
        'Lagos'     => 'Lagos',
    ];

    const STATUS_OF_RESIDENCE_SELECT = [
        'Commercial Renting' => 'Commercial Renting',
        'Owner'              => 'Owner',
        'Social Renting'     => 'Social Renting',
        'Tenant'             => 'Tenant',
        'With Parents'       => 'With Parents',
        'With Relatives'     => 'With Relatives',
        'Others'             => 'Others',
    ];

    const EMPLOYERS_LOCAL_GOVERNMENT_AREA_SELECT = [
        'Agege'                => 'Agege',
        'Ajeromi-Ifelodun'     => 'Ajeromi-Ifelodun',
        'Alimosho'             => 'Alimosho',
        'Amuwo-Odofin'         => 'Amuwo-Odofin',
        'Badagry'              => 'Badagry',
        'Apapa'                => 'Apapa',
        'Epe'                  => 'Epe',
        'Eti Osa'              => 'Eti Osa',
        'Ibeju-Lekki'          => 'Ibeju-Lekki',
        'Ifako-Ijaiye'         => 'Ifako-Ijaiye',
        'Ikeja'                => 'Ikeja',
        'Ikorodu'              => 'Ikorodu',
        'Kosofe'               => 'Kosofe',
        'Lagos Island'         => 'Lagos Island',
        'Mushin'               => 'Mushin',
        'Lagos Mainland'       => 'Lagos Mainland',
        'Ojo'                  => 'Ojo',
        'Oshodi-Isolo'         => 'Oshodi-Isolo',
        'Shomolu'              => 'Shomolu',
        'Surulere'             => 'Surulere',
    ];

    const LOCAL_GOVERNMENT_AREA_OF_RESIDENCE_SELECT = [
        'Agege'                => 'Agege',
        'Ajeromi-Ifelodun'     => 'Ajeromi-Ifelodun',
        'Alimosho'             => 'Alimosho',
        'Amuwo-Odofin'         => 'Amuwo-Odofin',
        'Badagry'              => 'Badagry',
        'Apapa'                => 'Apapa',
        'Epe'                  => 'Epe',
        'Eti Osa'              => 'Eti Osa',
        'Ibeju-Lekki'          => 'Ibeju-Lekki',
        'Ifako-Ijaiye'         => 'Ifako-Ijaiye',
        'Ikeja'                => 'Ikeja',
        'Ikorodu'              => 'Ikorodu',
        'Kosofe'               => 'Kosofe',
        'Lagos Island'         => 'Lagos Island',
        'Mushin'               => 'Mushin',
        'Lagos Mainland'       => 'Lagos Mainland',
        'Ojo'                  => 'Ojo',
        'Oshodi-Isolo'         => 'Oshodi-Isolo',
        'Shomolu'              => 'Shomolu',
        'Surulere'             => 'Surulere',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function getIsAdminAttribute()
    {
        return $this->roles()->where('id', 1)->exists();
    }

    public function __construct(array $attributes = []) {
        parent::__construct($attributes);
        self::created(function (User $user) {
            if (auth()->check()) {
                $user->verified    = 1;
                $user->verified_at = Carbon::now()->format(config('panel.date_format') . ' ' . config('panel.time_format'));
                $user->save();
            } elseif (!$user->verification_token) {
                // $token     = Str::random(64);
                // $usedToken = User::where('verification_token', $token)->first();

                // while ($usedToken) {
                //     $token     = Str::random(64);
                //     $usedToken = User::where('verification_token', $token)->first();
                // }

                // $user->verification_token = $token;
                // $user->save();

                // $registrationRole = config('panel.registration_default_role');

                // if (!$user->roles()->get()->contains($registrationRole)) {
                //     $user->roles()->attach($registrationRole);
                // }

                // $user->notify(new VerifyUserNotification($user));
            }
        });
    }

    public function userUserAlerts() {
        return $this->belongsToMany(UserAlert::class);
    }

    public function registerMediaConversions(Media $media = null) {
        $this->addMediaConversion('thumb')->width(50)->height(50);
    }

    public function userDocuments() {
        return $this->hasMany(Document::class, 'user_id', 'id');
    }

    public function customerCustomerNotes() {
        return $this->hasMany(CustomerNote::class, 'customer_id', 'id');
    }

    public function userPayments() {
        return $this->hasMany(Payment::class, 'user_id', 'id');
    }

    public function userLoans() {
        return $this->hasMany(Loan::class, 'user_id', 'id');
    }

    public function getDateOfBirthAttribute($value) {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }
    
    public function setDateOfBirthAttribute($value) {
        $this->attributes['date_of_birth'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getProfileImageAttribute() {
        $file = $this->getMedia('profile_image')->last();

        if($file) {
            $file->url          = $file->getUrl();
            $file->thumbnail    = $file->getUrl('thumb');
        }

        return $file;
    }

    public function getEmailVerifiedAtAttribute($value) {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setEmailVerifiedAtAttribute($value) {
        $this->attributes['email_verified_at'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function setPasswordAttribute($input) {
        if ($input) {
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
        }
    }

    public function sendPasswordResetNotification($token) {
        $this->notify(new ResetPassword($token));
    }

    public function getVerifiedAtAttribute($value) {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setVerifiedAtAttribute($value) {
        $this->attributes['verified_at'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function roles() {
        return $this->belongsToMany(Role::class);
    }
    
    public function hasRole($role) {
        if($this->roles()->where('name', $role)->first()) {
            return true;
        }
        return false;
    }

}



