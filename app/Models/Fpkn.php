<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Fpkn extends Model
{
    use HasFactory;

    protected $fillable = [
        'complaint_code', 'customer_id', 'branch_id', 'request_type_id', 'form_date', 'transaction_type_id',
        'transaction_feature_id', 'transaction_value', 'description', 'escalation',
        'card_center_status', 'settlement_status'
    ];

    public function customer(): BelongsTo {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function branch(): BelongsTo {
        return $this->belongsTo(Branch::class, 'branch_id');
    }

    public function requestType(): BelongsTo {
        return $this->belongsTo(RequestType::class, 'request_type_id');
    }

    public function transactionType(): BelongsTo {
        return $this->belongsTo(TransactionType::class, 'transaction_type_id');
    }

    public function transactionFeature(): BelongsTo {
        return $this->belongsTo(TransactionFeature::class, 'transaction_feature_id');
    }

    public function fpknFileUpload(): HasMany {
        return $this->hasMany(FpknFileUpload::class);
    }

    public function approvalComplaint(): HasMany {
        return $this->hasMany(ApprovalComplaint::class);
    }
}
