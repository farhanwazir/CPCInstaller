<?php
namespace Restvel\Installer\Traits;


trait Configuration
{
    /* All defined variables are used in configuration lifecycle */
    protected $location, $package_type, $rename, $bounded_packages;
    protected $no_vendor = false;
    protected $matched_index = 0;

    /**
     * @return package custom path
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param $location
     * @return object
     */
    public function setLocation($location)
    {
        $this->location = $location;
        return $this;
    }

    /**
     * @return package type
     */
    public function getType()
    {
        return $this->package_type;
    }

    /**
     * @param $type
     * @return object
     */
    public function setType($type)
    {
        $this->package_type = $type;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRenames()
    {
        return $this->rename;
    }

    /**
     * @param $name (string|array)
     * @return object
     */
    public function setRenames($name)
    {
        $this->rename = $name;
        return $this;
    }

    /**
     * @return bool
     */
    public function hasNewName()
    {
        return $this->rename !== null? true : false;
    }

    /**
     * @param $packages (string|array)
     * @return object
     */
    public function setBound($packages)
    {
        $this->bounded_packages = $packages;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBound(){
        return $this->bounded_packages;
    }

    /**
     * @return bool
     */
    public function isBound()
    {
        return $this->getBound() !== null;
    }

    /**
     * @return object
     */
    public function disableVendor(){
        $this->no_vendor = true;
        return $this;
    }

    /**
     * @return object
     */
    public function enableVendor(){
        $this->no_vendor = false;
        return $this;
    }

    /**
     * @return bool
     */
    public function isVendorDisabled(){
        return $this->no_vendor === true;
    }
}
