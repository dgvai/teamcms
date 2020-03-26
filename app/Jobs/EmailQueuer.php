<?php

namespace App\Jobs;

use App\Mail\NewsLetter;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class EmailQueuer implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $recepients;
    public $data;

    public function __construct($recepients,$data)
    {
        $this->recepients = $recepients;
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach($this->recepients as $recepient)
        {
            Mail::to($recepient)->queue(new NewsLetter($this->data));
        }
    }
}
