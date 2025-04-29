<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Appointment;
use Carbon\Carbon;

class UpdateAppointmentStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'appointments:update-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update the status of appointments that have passed their scheduled time';

    /**
     * Execute the console command.
     */
    // public function handle()
    // {
    //     $now = Carbon::now();
        
    //     // Get all scheduled appointments that have passed their time
    //     $appointments = Appointment::where('status', 'scheduled')
    //         ->where(function($query) use ($now) {
    //             $query->whereDate('appointment_date', '<', $now->format('Y-m-d'))
    //                 ->orWhere(function($q) use ($now) {
    //                     $q->whereDate('appointment_date', $now->format('Y-m-d'))
    //                       ->whereTime('appointment_time', '<', $now->format('H:i:s'));
    //                 });
    //         })
    //         ->get();

    //     $count = 0;
    //     foreach ($appointments as $appointment) {
    //         $appointment->update(['status' => 'completed']);
    //         $count++;
    //     }

    //     $this->info("Updated {$count} appointments to completed status.");
    // }
}
