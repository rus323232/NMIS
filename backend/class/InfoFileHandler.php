<?php

/**
 * Created by IntelliJ IDEA.
 * User: rus
 * Date: 26.05.2017
 * Time: 18:02
 */
class InfoFileHandler {
    private $file;
    private $filePath;
    private $fileSize;
    private $fileContent;
    private $unitProps;

    function __construct($filePath, $key) {
        try {
            $this->filePath = $filePath;
            $this->file = fopen($filePath, $key);

            if($this->file) {
                if (filesize($filePath) > 0) {
                    $this->setParams();
                } else {
                     echo "Info file is empty";
                }
            } else {
                throw new Exception('Error with open .txt file');
            }

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    /* handleByProperties: private func
     * return associate array
     * key ~ property Name
     * value ~ property Value
    */
    private function handleByUnitProperties () {
        $unitProperties = array();
        $f = $this->fileContent;
        $lines  = explode("\r\n",$f);

        foreach ($lines as $prop) {
            $result = explode("|", $prop);

            if (isset($result[0]) && isset($result[1])) {
                $propertyName = strtolower($result[0]);
                $propertyValue = $result[1];
                $unitProperties[$propertyName] = $propertyValue;
            }

        }

        return $unitProperties;
    }

    private function setParams () {
        $this->fileSize = filesize($this->filePath);
        $this->fileContent = fread($this->file, $this->fileSize);
        $this->unitProps = $this->handleByUnitProperties();
    }

    public function getUnitProp ($propName) {
        $prop = strtolower($propName);

        if ($prop == "all") {
            return $this->unitProps;
        }

        if (!array_key_exists($prop, $this->unitProps)) {
            return "Pass the property name";
        }

        return $this->unitProps[$prop];
    }

    public function readAsIs() {
        $f = $this->fileContent;
        $answer = str_replace("\r\n", "<br>", $f);

        return $answer;
    }

    public function writeInfoFile($args) {
        if ((gettype($args) != 'array')) {
            return false;
        }

        $schema = "";

        foreach ($args as $prop => $value) {
            $schema .= $prop. "|" .$value. "\r\n";
        }

        fwrite($this->file, $schema);

        return true;
    }

    public function closeInfoFile () {
        if ($this->file) {
            fclose($this->file);
        }

    }

    static function scanForUnits ($dir) {
        if (!is_dir($dir)) {
            return "Dir not exist";
        }

        $files = scandir($dir);
        $units = array();

        foreach ($files as $value) {
            if (is_dir($dir . "/" . $value) && $value != "." && $value != "..") {
                array_push($units, $value);
            }
        }

        sort($units);

        return $units;
    }
}