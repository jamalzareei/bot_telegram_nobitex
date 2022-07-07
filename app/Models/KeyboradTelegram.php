<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeyboradTelegram extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the parent that owns the KeyboradTelegram
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo($this, 'parent_id', 'id');
    }
}
