<?php

namespace App\Http\Controllers;

use App\Service\IPService;
use Illuminate\Http\Request;


class IpController extends Controller
{
    private $ip;
    public function __construct(IpService $ip)
    {
        $this->ip=$ip;
    }
    public function Otvet()
    {
        $otvet2 = $_SERVER['REMOTE_ADDR'];
        $result = $this->ip->TestIp($otvet2);
        return response('Ваш ip:'.$otvet2. '<br/>IP: '. $result, 200);
    }
}
