<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\LineBotController;

class SendNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lazy:push';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = ' 怠け者をlineで晒します';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        LineBotController::noticeLazy();
    }
}
