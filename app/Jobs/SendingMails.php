<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\lib\Mai;

class SendingMails implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $to;
    protected $content;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
                $this->to = "ayoub.zaabali@gmail.com";
                $this->content = "mail sent";
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mai::sendNow($this->content,$this->to);
    }
}
