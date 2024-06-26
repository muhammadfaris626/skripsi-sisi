<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TransactionFeature extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'name'];

    public function fpkn(): HasMany {
        return $this->hasMany(Fpkn::class);
    }
}
