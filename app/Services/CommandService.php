<?php

namespace App\Services;

use phpseclib3\Net\SSH2;
use phpseclib3\Crypt\PublicKeyLoader;

class CommandService {

    public static function execute($commands){

        $ssh = new SSH2(env('CPANEL_IP'));
        if (!$ssh->login(env('CPANEL_USER'), env('CPANEL_PASS'))) {
            throw new \Exception('Login failed');
        }else{
            foreach ($commands as $key => $command) {
                $ssh->exec($command);
            }
        }

    }

}