<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ApprovalComplaint extends Model
{
    use HasFactory;

    protected $fillable = ['claim_code', 'fpkn_id', 'reason_claim_id', 'transaction_information', 'user_id'];

    public function fpkn(): BelongsTo {
        return $this->belongsTo(Fpkn::class, 'fpkn_id');
    }

    public function reasonClaim(): BelongsTo {
        return $this->belongsTo(ReasonClaim::class, 'reason_claim_id');
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function journalSlip(): HasMany {
        return $this->hasMany(JournalSlip::class);
    }
}
