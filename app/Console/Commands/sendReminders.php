<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use App\payments;
use App\products;
use Carbon\Carbon;
use App\Mail\subReminder;
use Illuminate\Support\Facades\Mail;

class sendReminders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:reminders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send reminders about subscriptions';

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

        /*
            Get all payment data, check for expired licences, get users email and send him email.
        */
        $allPayments = payments::all();

        foreach($allPayments as $payment)
        {
            if(Carbon::parse($payment->activeUntil) <= Carbon::now())
            {
                $paymentPlan = $payment->planid;
                $productNameQ = products::where('id', $paymentPlan)->first();
                $productName = $productNameQ->name;
                $whereToSendQ = User::where('id', $payment->userID)->first();
                Mail::to($whereToSendQ->email)->send(new subReminder($productName, $paymentPlan));

            }
        }
    }
}
