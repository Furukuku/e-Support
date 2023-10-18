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
    protected $description = 'Delete unclaimed documents older than a week';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $week = now()->subWeek();

        Document::where('created_at', '<', $week)->delete();

        $this->info('Documents older than a week have been deleted.');
    }
}
