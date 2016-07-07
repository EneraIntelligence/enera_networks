<?php

namespace Networks\Jobs;

use Networks\Administrator;
use Networks\Campaign;
use Networks\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;

class cancelCampaign extends Job implements SelfHandling, ShouldQueue
{
    use InteractsWithQueue, SerializesModels;


    protected $campaign;
    protected $user;
    protected $razon;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Campaign $campaign, Administrator $user, $razon)
    {
        $this->campaign = $campaign;
        $this->user = $user;
        $this->razon = $razon;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $user = $this->user;
        Mail::send('mail.cancel', ['cam' => $this->campaign, 'user' => $this->user,  'razon' =>  $this->razon], function ($m) use ($user) {
            $m->from('soporte@enera.mx', 'Enera Intelligence');
//            $m->bcc('aavaloz@enera.mx', 'Angel Avaloz');
            $m->to($user->email, $user->name['first'] . ' ' . $user->name['last'])->subject('Campaña Cancelda');
        });
    }
}
