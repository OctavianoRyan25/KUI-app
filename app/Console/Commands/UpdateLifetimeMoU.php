<?php

namespace App\Console\Commands;

use App\Models\MoU;
use Illuminate\Console\Command;

class UpdateLifetimeMoU extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mou:update-lifetime';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update lifetime MoUs that have expired and create new ones';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $experiedMous = MoU::where('type_of_contract', 'Life Time')
            ->where('end_date', '<', now())
            ->get();

        foreach ($experiedMous as $mou) {
            $newMou = $mou->replicate();
            $newMou->start_date = now();
            $newMou->end_date = now()->addYears(5);
            $newMou->document_number = $mou->document_number . '-EXT';
            $newMou->save();

            $this->info('MoU ' . $mou->document_number . ' has been extended to ' . $newMou->document_number);
        }
        $this->info('Lifetime MoUs have been updated');
        return Command::SUCCESS;
    }
}
