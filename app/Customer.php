<?php 

namespace App;

use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use \DateTimeInterface;

class Customer extends Model implements HasMedia {

    use SoftDeletes, HasMediaTrait, Auditable;

    public $table = 'customers';

    protected $hidden = [
        'password',
    ];

    protected $appends = [
        'profile_image',
    ];

    const EMPLOYERS_STATE_SELECT = [
        'Lagos'     => 'Lagos',
    ];
    
    const STATE_OF_RESIDENCE_SELECT = [
        'Lagos'     => 'Lagos',
    ];

    const BANK_NAME_SELECT = [
        'Lagos'     => 'Lagos',
        'Lagos'     => 'Lagos',
        'Lagos'     => 'Lagos',
        'Lagos'     => 'Lagos',
        'Lagos'     => 'Lagos',
        'Lagos'     => 'Lagos',
        'Lagos'     => 'Lagos',
        'Lagos'     => 'Lagos',
        'Lagos'     => 'Lagos',
        'Lagos'     => 'Lagos',
        'Lagos'     => 'Lagos',
        'Lagos'     => 'Lagos',
        'Lagos'     => 'Lagos',
        'Lagos'     => 'Lagos',
        'Lagos'     => 'Lagos',
        'Lagos'     => 'Lagos',
        'Lagos'     => 'Lagos',
        'Lagos'     => 'Lagos',
    ];

    const GENDER_SELECT = [
        'Male'      => 'Male',
        'Female'    => 'Female',
    ];

    const EMPLOYERS_LOCAL_GOVERNMENT_AREA_SELECT = [
        'Alimosho'      => 'Alimosho',
    ];

    const STATUS_SELECT = [
        'Active'    => 'Active',
        'Inactive'    => 'Inactive',
    ];

    const LOCAL_GOVERNMENT_AREA_OF_RESIDENCE_SELECT = [
        'Alimosho'      => 'Alimosho',
    ];

    protected $dates = [
        'date_of_birth',
        'email_verified_at',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const TITLE_SELECT = [
        'Mr'        => 'Mr',
        'Mrs'       => 'Mrs',
        'Master'    => 'Master',
        'Mister'    => 'Mister',
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

    const STATUS_OF_RESIDENCE_SELECT = [
        'Commercial Renting' => 'Commercial Renting',
        'Owner'              => 'Owner',
        'Social Renting'     => 'Social Renting',
        'Tenant'             => 'Tenant',
        'With Parents'       => 'With Parents',
        'With Relatives'     => 'With Relatives',
        'Others'             => 'Others',
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

    protected $fillable = [
        'bvn',
        'title',
        'first_name',
        'last_name',
        'gender',
        'date_of_birth',
        'mobile_no_1',
        'mobile_no_2',
        'email',
        'address',
        'land_mark',
        'state_of_residence',
        'local_government_area_of_residence',
        'status_of_residence',
        'monthly_income',
        'employment_sector',
        'employers_name',
        'employers_address',
        'employers_land_mark',
        'employers_state',
        'employers_local_government_area',
        'password',
        'email_verified_at',
        'remember_token',
        'bank_name',
        'account_name',
        'account_no',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(\DateTimeInterface $date) {
        return $date->format('Y-m-d H:i:s');
    }

    public static function boot() {
        parent::boot();
        Customer::observe(new \App\Observers\CustomerActionObserver);
    }

    public function registerMediaConversions(Media $media = null) {
        $this->addMediaConversion('thumb')->width(50)->height(50);
    }

    public function customerCustomerDocuments() {
        return $this->hasMany(CustomerDocument::class, 'customer_id', 'id');
    }

    public function customerCustomerNotes() {
        return $this->hasMany(CustomerNote::class, 'customer_id', 'id');
    }

    public function customerLoans() {
        return $this->hasMany(Loan::class, 'customer_id', 'id');
    }

    public function getDateOfBirthAttribute($value) {
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

    public function setEmailVerifiedAttribute($value) {
        $this->attribute['email_verifed_at'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }
}