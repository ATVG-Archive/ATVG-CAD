<?php

// https://gitlab.atvg-studios.at/atvg-studios/ATVG-CAD/-/archive/v1.1.0.9/ATVG-CAD-v1.1.0.9.zip

    /**
     * Updater
     *
     * This plugin allows the Admin to install a new version of ATVG-CAD.
     *
     * License: OSPL v1.3 (Open Source Project License v1.3 by ATVG-Studios)
     * License Url: https://ospl.atvg-studios.at
     */

    class Updater
    {
        function doUpdate(){
            if(file_exists('DISABLE_UPDATER')){return;}
            if(!extension_loaded('curl'))
            {
                die("Required PHP Extension 'curl' not installed/loaded");
            }
            if(!extension_loaded('zip'))
            {
                die("Required PHP Extension 'zip' not installed/loaded");
            }

            if(!$this->checkPermissions()){
                die("Cannot write to the directory ATVG-CAD is in thus updating is not possible.");
            }

            echo "Starting update process ...<br>";
            $version = $this->getVersion();
            $this->createBackup();
            $this->downloadVersion($version);
            $success = $this->applyUpdate($version);
            if(!$success){
                echo "Update failed, restoring backup ...<br>";
                $this->applyBackup();
                echo "Backup restored!<br>";
            }else{
                echo "Update successfull, version $version installed!<br>";
            }
            $this->cleanup($version);
            echo "<a href='../../oc-admin/admin.php'>Back to the admin interface</a>";
        }

        function getVersion()
        {
            $c = curl_init();
            curl_setopt($c, CURLOPT_URL, "https://gitlab.atvg-studios.at/api/v4/projects/64/repository/tags");
            curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($c, CURLOPT_USERAGENT, "ATVG-CAD/1.0");
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
            return $ver;
        }

        function downloadVersion($version){
            $fp = fopen (dirname(__FILE__) . '/newversion.zip', 'w+');
            $c = curl_init();
            curl_setopt($c, CURLOPT_URL, "https://gitlab.atvg-studios.at/atvg-studios/ATVG-CAD/-/archive/$version/ATVG-CAD-$version.zip");
            curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($c, CURLOPT_USERAGENT, "ATVG-CAD/1.0");
            curl_setopt($c, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($c, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($c, CURLOPT_FILE, $fp);

            curl_exec($c);
            curl_close($c);
            fclose($fp);
        }

        function createBackup(){
            $rootPath = realpath('../../');
            $zip = new ZipArchive();
            $zip->open('backup.zip', ZipArchive::CREATE | ZipArchive::OVERWRITE);

            $files = new RecursiveIteratorIterator(
                new RecursiveDirectoryIterator($rootPath),
                RecursiveIteratorIterator::LEAVES_ONLY
            );

            foreach ($files as $name => $file)
            {
                if (!$file->isDir())
                {
                    if($file->getFilename() !== "backup.zip" && $file->getFilename() !== "newversion.zip"){
                        $filePath = $file->getRealPath();
                        $relativePath = substr($filePath, strlen($rootPath) + 1);
                        $zip->addFile($filePath, $relativePath);
                    }
                }
            }

            $zip->close();

            // CREATE DB BACKUP HERE
        }

        function applyBackup(){
            $zip = new ZipArchive;
            $res = $zip->open('backup.zip');
            if ($res === TRUE) {
                $zip->extractTo(realpath('../../'));
                $zip->close();
            }

            // APPLY DB BACKUP HERE
        }

        function applyUpdate($version){
            $zip = new ZipArchive;
            $res = $zip->open('newversion.zip');
            if ($res === TRUE) {
                try {
                    $zip->extractTo(realpath('.'));
                    $zip->close();
                    $files = scandir("ATVG-CAD-$version");
                    $oldfolder = "ATVG-CAD-$version/";
                    $newfolder = "../../";
                    foreach($files as $fname) {
                        if($fname != '.' && $fname != '..') {
                            rename($oldfolder.$fname, $newfolder.$fname);
                        }
                    }
                    return true;
                } catch (\Throwable $th) {
                    return false;
                }
            }

            // APPLY DB MIGRATIONS HERE
        }

        function checkPermissions(){
            return is_writable(realpath('../../'));
        }

        function cleanup($version){
            unlink("newversion.zip");
            $this->removeFolder("ATVG-CAD-$version");
        }

        function removeFolder($name){
            system("rm -rf ".escapeshellarg($name));
        }
    }
