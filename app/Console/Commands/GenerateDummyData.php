<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;

class GenerateDummyData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:dummy-products';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to generate dummy data in products.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Product::factory()->count(50)->create();
        $this->info('50 products created successfully!');
    }
}
