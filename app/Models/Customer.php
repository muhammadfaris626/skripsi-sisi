<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'nasabah_id', 'name', 'email', 'birth_place', 'birth_date', 'phone', 'address', 'card_number'];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function fpkn(): HasMany {
        return $this->hasMany(Fpkn::class);
    }
}
