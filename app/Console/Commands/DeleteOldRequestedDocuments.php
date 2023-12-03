<?php

namespace App\Console\Commands;

use App\Models\Document;
use Illuminate\Console\Command;

class DeleteOldRequestedDocuments extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'documents:clean';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete unclaimed documents older than a month';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $month = now()->subMonth();

        Document::where('is_released', false)
            ->where('status', 'Ready To Pickup')
            ->where('updated_at', '<', $month)
            ->delete();

        $this->info('Unclaimed documents older than a month has been deleted.');
    }
}
