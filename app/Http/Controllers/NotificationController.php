<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use FCM;
use DB;
use App\Device;
class NotificationController extends Controller
{
    public function sendNotification()
    {
    	$optionBuiler = new OptionsBuilder();
		$optionBuiler->setTimeToLive(60*20);

		$notificationBuilder = new PayloadNotificationBuilder('Yakshanidhi');
		$count_show= DB::table('shows')
            ->join('melas', 'shows.mela_id', '=', 'melas.mela_id')
            ->join('prasanghas','shows.prasangha_id','=','prasanghas.prasangha_id')
            ->whereDate('show_date','=',\Carbon\Carbon::now()->toDateString())
            ->select('prasangha_name','show_id')->count();
		$notificationBuilder->setBody($count_show." show is there today")->setSound('default');
				    
		$dataBuilder = new PayloadDataBuilder();
		$dataBuilder->addData(['a_data' => 'my_data']);

		$option = $optionBuiler->build();
		$notification = $notificationBuilder->build();
		$data = $dataBuilder->build();

		$token = Device::pluck('device_id')->toArray();
		$downstreamResponse = FCM::sendTo($token, $option, $notification, $data);
		$downstreamResponse->numberSuccess();
		$downstreamResponse->numberFailure();
		$downstreamResponse->numberModification();
		return  back()->with('success','notification sent to devices');
    }
}
