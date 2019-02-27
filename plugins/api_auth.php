<?php
session_start();
if(hash('md5', session_id().getApiKey()) !== $_COOKIE['aljksdz7'])
{
    $headers = $_SERVER['PHP_AUTH_DIGEST'];
    if(isset($headers['Authorization']))
    {
        if(substr($headers['Authorization'], 0, 5) === "Basic")
        {
            if(base64_decode(str_replace('Basic', '', $headers['Authorization'])) !== "api:".getApiKey())
            {
                header('HTTP/1.1 403 Unauthorized');
                die();
            }
        }else
        {
            header('HTTP/1.1 403 Unauthorized');
            die();
        }
    }else
    {
        header('HTTP/1.1 403 Unauthorized');
        die();
    }
}