<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\BannedAccount;
use Carbon\Carbon;

class ClearBannedAccounts extends Command
{
    protected $signature = 'clear:banned-accounts';
    protected $description = 'Clear banned accounts released today or earlier';

    public function handle()
    {
        // Xác định ngày hiện tại
        $today = Carbon::now();

        // Lấy tất cả các tài khoản bị cấm có release_date là ngày hôm nay hoặc trước đó
        $bannedAccounts = BannedAccount::where('release_date', '<=', $today)->get();

        // Xóa các bản ghi
        foreach ($bannedAccounts as $account) {
            $account->delete();
        }

        $this->info('Banned accounts cleared successfully.');
    }
}
