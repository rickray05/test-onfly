<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use OpenApi\Generator;

class Swagger extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:swagger';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to generate documentation swagger';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $openApi = Generator::scan([
            [
                'app/Http/Controllers/Api'
            ]
        ]);
        file_put_contents("public/api-documentation/swagger.json", $openApi->toJson());
        $this->info("Api documentation generate successfully");
        return Command::SUCCESS;
    }
}
