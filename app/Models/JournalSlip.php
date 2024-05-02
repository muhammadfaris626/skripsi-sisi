<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JournalSlip extends Model
{
    use HasFactory;

    protected $fillable = ['approval_complaint_id', 'journal_information', 'user_id'];

    public function approvalComplaint(): BelongsTo {
        return $this->belongsTo(ApprovalComplaint::class, 'approval_complaint_id');
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class, 'user_id');
    }
}
