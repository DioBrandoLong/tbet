<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use  JPush\Client as JPush;

class StaticPagesController extends Controller
{
    public function home()
    {

        //初始化
        $app_key = "4e18759b69cb8fc2ff25bbdc";
        $master_secret = "5114d32ca80539718072e5e9 ";
        $client = new JPush($app_key, $master_secret);

        //简单的推送样例
        $result = $client->push()
            ->setPlatform('ios', 'android')
            ->addAllAudience()
            ->setNotificationAlert($_POST["message"])
            ->options(array(
                "apns_production" => true  //true表示发送到生产环境(默认值)，false为开发环境
            ))
            ->send();

        $feed_items = [];
        if (Auth::check()) {
            $feed_items = Auth::user()->feed()->paginate(30);
        }
        return view('static_pages/home', compact('feed_items'));
    }

    public function help()
    {
        return view('static_pages/help');
    }

    public function about()
    {
        return view('static_pages/about');
    }
}
