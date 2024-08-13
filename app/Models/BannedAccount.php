<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BannedAccount extends Model
{
    protected $table = 'banned_accounts';

    // Tắt tính năng tự động cập nhật thời gian
    public $timestamps = false;

    // Các cột trong bảng 'banned_accounts'
    protected $fillable = [
        'user_id', 'reason', 'lock_date','release_date'
    ];
}
