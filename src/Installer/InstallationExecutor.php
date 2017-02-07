<?php
namespace Restvel\Installer;


use Composer\Installer\LibraryInstaller;
use Composer\Package\PackageInterface;
use Restvel\Installer\Traits\Configuration;
use Restvel\Installer\Traits\Package;

class InstallationExecutor extends LibraryInstaller
{
    use Configuration, Package;

    const PACKAGE_SEPARATOR = '/';

    public function getInstallPath(PackageInterface $package)
    {
        if ($this->isBound() && !$this->setAllowedPackages($this->getBound())
                ->isPackageAllowed($package->getPrettyName()))
                throw new \InvalidArgumentException(
                    "Package {$package->getPrettyName()} is not compatible with Restvel type {$this->getType()}, given is {$package->getType()}."
                );

        if ($this->getLocation() && $this->getType()) {
            $package_name_parts = explode(static::PACKAGE_SEPARATOR, $package->getPrettyName());
            $new_location = $this->getLocation();

            if(!$this->isVendorDisabled()) {
                $new_location .= $package_name_parts[0] . static::PACKAGE_SEPARATOR;
            }

            if($this->hasNewName() && ($new_name = $this->setNewNameOptions($this->getRenames())->getNewName()) !== null) {
                $new_location .= $this->furnishNewName($new_name, $package_name_parts[1]).($new_name == '' ? '' : static::PACKAGE_SEPARATOR);
            }
            else $new_location .= $package_name_parts[1].static::PACKAGE_SEPARATOR;

            return $new_location;
        }

        // There is something wrong. Missing mandatory configuration attribute(s)
        throw new \InvalidArgumentException(
            "Restvel package configuration mandatory attribute(s) missing."
        );

    }

    public function supports($packageType)
    {
        return $this->getType() === $packageType;
    }
}
