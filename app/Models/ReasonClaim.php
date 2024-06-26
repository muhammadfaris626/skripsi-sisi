<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ReasonClaim extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'name'];

    public function approvalComplaint(): HasMany {
        return $this->hasMany(ApprovalComplaint::class);
    }
}
