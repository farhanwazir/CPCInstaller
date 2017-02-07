<?php
namespace Restvel\Installer;


use Restvel\Installer\Standards\Configurations;

class ConfigurationManager implements Configurations
{
    private $list;
    private $files;

    /**
     * On create actions
     */
    public function __construct()
    {
        $this->init();
    }

    /**
     * Initialize with configuration files.
     */
    public function init(){
        if($this->files == null) $this->getConfigurations();
        if($this->list == null) $this->setConfigurations($this->files);
    }

    /**
     * @return array
     */
    public function getList(){
        if(is_array($this->list)) return $this->list;
        return [];
    }

    /**
     * @return array
     */
    private function getConfigurations(){
        $config_files = scandir(__DIR__.'/Config');
        return $this->files = ($config_files === false) ? [] : array_diff($config_files, ['..', '.']);
    }

    /**
     * @param $files[]
     */
    private function setConfigurations($files){
        foreach ($files as $file){
            $this->list[substr($file, 0, strlen($file)-4)] = require 'Config/'.$file;
        }
    }
}
