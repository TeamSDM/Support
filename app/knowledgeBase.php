<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KnowledgeBase extends Model
{
    use SoftDeletes;

    public $table = 'knowledgebase';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    protected $appends = [
        'attachments',
    ];
    protected $fillable = [
        'title',
        'description',
        'image',
        'category_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public function getAttachmentsAttribute()
    {
        return $this->getMedia('attachments');
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
