<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class LeaveRequest extends Model
{
    use HasFactory;
    const STATUS_PENDING = 'pending';
    const STATUS_APPROVED = 'approved';
    const STATUS_DENIED = 'denied';

    protected $fillable = [
        'user_id',
        'leave_type_id',
        'start_date',
        'end_date',
        'status'
    ];
    protected $appends = ['leaveRequest_status','status_badge'];

    public function leaveType(): BelongsTo
    {
        return $this->belongsTo(LeaveType::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getLeaveRequestStatusAttribute(): ?string

    {
        if ($this->status == self::STATUS_APPROVED) {
            return 'Approved';
        } elseif ($this->status == self::STATUS_PENDING) {
            return 'Pending';
        } elseif ($this->status == self::STATUS_DENIED) {
            return 'Denied';
        } else return null;

    }

    public function getStatusBadgeAttribute(): ?string
    {
        if ($this->status == self::STATUS_DENIED) {
            return 'badge  badge-danger';
        } elseif ($this->status ==  self::STATUS_APPROVED) {
            return 'badge  badge-success';

        } elseif ($this->status == self::STATUS_PENDING) {
            return 'badge  badge-secondary';
        } else
            return null;
    }
}
