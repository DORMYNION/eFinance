<?php

namespace App;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use \DateTimeInterface;

class CustomerDocument extends Model implements HasMedia {
    use HasMediaTrait, Auditable;

    public $table = 'customer_documents';

    protected $appends = [
        'document_file',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'customer_id',
        'document_type',
        'description',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const DOCUMENT_TYPE_SELECT = [
        'Employment Letter'        => 'Employment Letter',
        'Promotion Letter'         => 'Promotion Letter',
        'Employment Identity Card' => 'Employment Identity Card (ID Card)',
        'Government Identity Card' => 'Government Identity Card (ID Card)',
        'Bank Statement'           => 'Bank Statement (Last 6 Months)',
    ];

    protected function serializeDate(DateTimeInterface $date) {
        return $date->format('Y-m-d H:i:s');
    }

    public static function boot() {
        parent::boot();
        CustomerDocument::observe(new \App\Observers\CustomerDocumentActionObserver);
    }

    public function registerMediaConversions(Media $media = null) {
        $this->addMediaConversion('thumb')->width(50)->height(50);
    }

    public function customer() {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function getDocumentFileAttribute() {
        return $this->getMedia('document_file')->last();
    }
}