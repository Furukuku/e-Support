<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class DeleteDeclinedResidentUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:delete-declined-resident';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete declined resident users.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $week = now()->subWeek();

        User::where('is_approved', false)
            ->where('decline_msg', '!=', null)
            ->where('created_at', '<', $week)
            ->forceDelete();

        $this->info('Declined resident users older than a week has been deleted.');
    }
}
