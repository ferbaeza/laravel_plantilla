<?php

namespace Src\Shared\Kernel\Laravel\Traits;

use Illuminate\Support\Facades\Request;


trait LoggerTrait
{
    public static function log()
    {
        $log = [];
        $log['subject'] = '';
        $log['url'] = Request::fullUrl();
        $log['route'] = Request::route()->uri;
        $log['method'] = Request::method();
        $log['query'] = json_encode(Request::toArray());
        $log['ip'] = Request::ip();
        $log['keys'] = json_encode(Request::toArray());
        $log['user_id'] = auth()->check() ? auth()->user()->id : 1;
        $log['xxxxx'] = Request::fingerprint();
        dd($log);
    }

}
