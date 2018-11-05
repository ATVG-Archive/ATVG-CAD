<?php
    /**
     * Update-Notifier
     *
     * This plugin shows the Admin on login if a new version of
     * ATVG-CAD is available.
     *
     * License: OSPL v1.3 (Open Source Project License v1.3 by ATVG-Studios)
     * License Url: http://ospl.atvg-studios.at
     */

    class UpdateNotifier
    {
        public function checkVersion($current)
        {
            if(!extension_loaded('curl'))
            {
                die("Required PHP Extension 'curl' not installed/loaded");
            }

            $c = curl_init();
            curl_setopt($c, CURLOPT_URL, "https://gitlab.atvg-studios.at/api/v4/projects/64/repository/tags");
            curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($c, CURLOPT_USERAGENT, "ATVG-CAD/$current");
            curl_setopt($c, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($c, CURLOPT_SSL_VERIFYPEER, 0);
            $headers = array(
                'Content-Type:application/json'
            );
            curl_setopt($c, CURLOPT_HTTPHEADER, $headers);
            $res = curl_exec($c);
            curl_close($c);

            $arr = json_decode($res, true);
            $ver = $arr[0]['name'];
            $ver = str_replace('v', '', $ver);

            if(version_compare($ver, $current, '>'))
            {
                echo '<div class="alert alert-success" style="width:60%; margin-left:25%"><span style="font-size:16px">A new version of ATVG-CAD is available! (Current v'.$current.'; New: v'.$ver.')</span> <a style="margin-left:10px" class="btn btn-primary" href="https://gitlab.atvg-studios.at/atvg-studios/ATVG-CAD/tags/v'.$ver.'">Download</a><a style="margin-left:10px" class="btn btn-primary" href="'.BASE_URL.'/plugins/updater/index.php">Install</a></div>';
            }
        }
    }