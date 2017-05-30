<?php
    include_once  "./backend/class/InfoFileHandler.php";

    $fileDirectory = strlen ($filesPath) > 1? $_SERVER['DOCUMENT_ROOT']. "/" .$filesPath. "/" : $_SERVER['DOCUMENT_ROOT']. "/";

    if (isset($_GET['unitIP'])) {
        $unitIP = $_GET['unitIP'];
        $dir = $fileDirectory . $unitIP;
        $pathToFile = $dir. "/" .$filesName;

        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }

        if (file_exists($pathToFile)) {
            if (isset($_POST['name'])) {
                $handler = new InfoFileHandler($pathToFile, "w+");
                $handler->writeInfoFile($_POST);
                $handler->closeInfoFile();
                exit("<meta http-equiv='refresh' content='0; url=".$hostName."index.php?unitIP=".$unitIP."'>");
            }
            else {
                $handler = new InfoFileHandler($pathToFile, "r");
                include_once "./view/unitInfo.php";
                $handler->closeInfoFile();
            }
        } else {

            if (isset($_POST['ip'])) {
                $handler = new InfoFileHandler($pathToFile, "w+");
                $handler->writeInfoFile($_POST);
                $handler->closeInfoFile();
                exit("<meta http-equiv='refresh' content='0; url=".$hostName."index.php?unitIP=".$unitIP."'>");
            } else {
                include_once "./view/create.php";
            }
        }
    } elseif (isset($_GET['removeIP'])) {
        $removeIP = $_GET['removeIP'];
        $file = $fileDirectory . $removeIP . "/" . $filesName;

        if (is_dir($fileDirectory . $removeIP)) {

            if (is_file($file)) {
                unlink($file);
                rmdir($fileDirectory . $removeIP);
                include_once "./view/home.php";
            }
            else {
                rmdir($fileDirectory . $removeIP);
                include_once './view/home.php';
            }
        }
    }
    else {
        include_once "./view/home.php";
    }


