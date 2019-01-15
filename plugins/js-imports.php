<?php
    function jsimport($imports = ["jquery"], $prefix = "!"){
        echo "<!-- JS-Import -->";
        foreach ($imports as $import) {
            switch ($import) {
                case 'jquery2':
                    $import = "jquery-2.1.3.min";
                    break;
                default:
                    # code...
                    break;
            }
            if($prefix != "!"){
                echo "<script src'".$prefix."js/$import.js'></script>";
            }else{
                echo "<script src'".BASE_URL."/js/$import.js'></script>";
            }
            
        }
        echo "<!-- JS-Import END -->";
    }