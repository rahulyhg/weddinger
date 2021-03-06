<?php

use Illuminate\Database\Seeder;
use App\Models\Event;
use App\User;
use Carbon\Carbon;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $event = new Event();
        $event->event_name = "Test Event";
        $event->event_start_date = Carbon::createFromFormat('Y-m-d h:i A', '2016-05-21 12:00 PM')->toDateTimeString();
        $event->event_end_date = Carbon::createFromFormat('Y-m-d h:i A', '2016-05-21 3:30 PM')->toDateTimeString();

        $user = User::find(1);
        
        $event->user_id = $user->id;
        $event->save();
    }
}
