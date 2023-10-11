<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notification;
use Validator;
use Auth;
use Carbon\Carbon;

class NotifictionsController extends Controller
{     
    public function get_notifictions(){
        $active_dog = dsld_active_dogs_by_user(); 

        $total_request = Notification::where('receiver_id', $active_dog->id)->where('is_view', 0)->where('is_hide', 0)->count();
        $frequest = Notification::where('receiver_id', $active_dog->id)->where('is_view', 0)->where('is_hide', 0)->where('reason_key','friend_requests')->orderBy('created_at', 'desc')->limit(2)->get();
        
        $lastWeeks = Notification::where('receiver_id', $active_dog->id)->where('is_view', 0)->where('is_hide', 0)->whereNotIn('reason_key', ['friend_requests'])->whereBetween('created_at', [Carbon::now()->subWeek()->startOfWeek(), Carbon::now()->subWeek()->endOfWeek()])->orderBy('created_at', 'desc')->get();

        $lastMonths = Notification::where('receiver_id', $active_dog->id)->where('is_view', 0)->where('is_hide', 0)->whereNotIn('reason_key', ['friend_requests'])->whereMonth('created_at', '=', Carbon::now()->subMonth()->month)->orderBy('created_at', 'desc')->get();

        $yday = date("Y-m-d", strtotime( '-1 days' ) );
        $yesterdays = Notification::where('receiver_id', $active_dog->id)->where('is_view', 0)->where('is_hide', 0)->whereNotIn('reason_key', ['friend_requests'])->whereDate('created_at', $yday)->orderBy('created_at', 'desc')->get();

        $tday = date("Y-m-d", strtotime( 'now' ) );
        $todays = Notification::where('receiver_id', $active_dog->id)->where('is_view', 0)->where('is_hide', 0)->whereNotIn('reason_key', ['friend_requests'])->whereDate('created_at', $tday)->orderBy('created_at', 'desc')->get();

        return view('frontend.partials.notifications-items', compact('lastWeeks', 'lastMonths', 'todays', 'yesterdays','frequest', 'total_request'));

    }

    public function manage(){
        return view('frontend.partials.notifications-manage');
    }

    public function received_request(){
        $active_dog = dsld_active_dogs_by_user(); 
        $frequest = Notification::where('receiver_id', $active_dog->id)->where('is_view', 0)->where('is_hide', 0)->where('reason_key','friend_requests')->orderBy('created_at', 'desc')->limit(20)->get();
        return view('frontend.partials.notifications-manage-received', compact('frequest'));
    }

    public function sent_request(){
        $active_dog = dsld_active_dogs_by_user(); 
        $frequest = Notification::where('sender_id', $active_dog->id)->where('is_view', 0)->where('is_hide', 0)->where('reason_key','friend_requests')->orderBy('created_at', 'desc')->limit(20)->get();
        return view('frontend.partials.notifications-manage-sent', compact('frequest'));
    }
    
    public function manage_multiple(){
        return view('frontend.partials.notifications-manage-multiple');
    }

    public function received_request_multiple(){
        $active_dog = dsld_active_dogs_by_user(); 
        $frequest = Notification::where('receiver_id', $active_dog->id)->where('is_view', 0)->where('is_hide', 0)->where('reason_key','friend_requests')->orderBy('created_at', 'desc')->limit(20)->get();
        return view('frontend.partials.notifications-manage-received-multiple', compact('frequest'));
    }

    public function sent_request_multiple(){
        $active_dog = dsld_active_dogs_by_user(); 
        $frequest = Notification::where('sender_id', $active_dog->id)->where('is_view', 0)->where('is_hide', 0)->where('reason_key','friend_requests')->orderBy('created_at', 'desc')->limit(20)->get();
        return view('frontend.partials.notifications-manage-sent-multiple', compact('frequest'));
    }
}
