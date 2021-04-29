<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\MessageServices;

class getMessages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:message';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Получение новых сообщений';

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
     * @return int
     */
    public function handle()
    {
        $message = New MessageServices();
        $message->getMessages();
        return 0;
    }
}
