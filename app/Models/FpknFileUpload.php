<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FpknFileUpload extends Model
{
    use HasFactory;

    protected $fillable = ['fpkn_id', 'name', 'file'];

    public function fpkn(): BelongsTo {
        return $this->belongsTo(Fpkn::class, 'fpkn_id');
    }
}
