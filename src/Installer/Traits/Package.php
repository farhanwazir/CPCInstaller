<?php
namespace Restvel\Installer\Traits;


trait Package
{
    protected $selected_pos = -1;
    protected $allowed_packages;
    protected $package_new_names;

    protected function isPackageAllowed($package){
        if ($packages = $this->getAllowedPackages()){ //proceed if has allowed package(s)
            if(!is_array($packages)) $packages = [$packages];
            foreach ($packages as $index => $bounded){
                if($this->matchPackageName($bounded, $package)){
                    $this->setSelectedPos($index);
                    return true;
                }
            }
        }

        return false;
    }

    protected function matchPackageName($bounded, $required){
        if($bounded == $required ||
            ($this->checkWildCard($bounded) &&
                substr($required, 0, strlen($this->removeWildCard($bounded))) == $this->removeWildCard($bounded))) return true;

        return false;
    }

    protected function getAllowedPackages(){
        return $this->allowed_packages;
    }

    protected function setAllowedPackages($packages){
        $this->allowed_packages = $packages;
        return $this;
    }

    protected function getNewName(){
        if(($this->getSelectedPos() === -1 && $this->getNewNameOptions()) ||
            ($this->getNewNameOptions() && $this->getSelectedPos() >= count($this->getNewNameOptions())))
            return $this->getNewNameOptions()[count($this->getNewNameOptions()) - 1];
        elseif($this->getNewNameOptions() && $this->getSelectedPos() < count($this->getNewNameOptions()))
            return $this->getNewNameOptions()[$this->getSelectedPos()];

        return false;
    }

    protected function furnishNewName($name, $original = ''){
        if($this->checkWildCard($name))
            return $this->replaceWildCard($name, $original);

        return $name;
    }

    protected function setNewNameOptions($names){
        if(!is_array($names) && $names !== null) $this->package_new_names = [$names];
        else $this->package_new_names = $names;

        return $this;
    }

    protected function getNewNameOptions(){
        return $this->package_new_names;
    }

    protected function checkWildCard($value){
        return strpos($value, "*") === false ? false : true;
    }

    protected function removeWildCard($value){
        return str_replace("*", "", $value);
    }

    protected function replaceWildCard($value, $replace){
        return str_replace("*", $replace, $value);
    }

    protected function setSelectedPos($pos){
        $this->selected_pos = $pos;
    }

    protected function getSelectedPos(){
        return $this->selected_pos;
    }
}
