<?php

namespace App\Console\Commands;

use App\Mail\SendEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Console\Command;

class SendEmailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-email-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send welcoming email for users';

    /**
     * Execute the console command.
     */
    public function handle()
    {
    Mail::to('noha@example.con')->send(new SendEmail);
    }
}
