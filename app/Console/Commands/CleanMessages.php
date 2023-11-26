<?php

namespace App\Console\Commands;

use App\Models\Message;
use Illuminate\Console\Command;

class CleanMessages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'messages:clean';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete messages older than 90 days';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $days = now()->subDays(90);

        Message::where('created_at', '<', $days)->delete();
        
        $this->info('Messages deleted successfully.');
    }
}
