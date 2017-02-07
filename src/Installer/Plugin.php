<?php
namespace Restvel\Installer;

use Composer\Composer;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;

class Plugin implements PluginInterface
{

    protected $config;

    public function activate(Composer $composer, IOInterface $io)
    {
        $configs = new ConfigurationManager();
        foreach ($configs->getList() as $name => $config){
            $installer = new InstallationExecutor($io, $composer);
            $installer->setLocation($config['location'])->setType($config['type']);
            if (array_key_exists('vendor', $config) && !$config['vendor']) $installer->disableVendor();
            if (array_key_exists('rename', $config)) $installer->setRenames($config['rename']);
            if (array_key_exists('only', $config)) $installer->setBound($config['only']);
            $composer->getInstallationManager()->addInstaller($installer);
        }
    }
}
