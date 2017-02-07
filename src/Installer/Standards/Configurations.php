<?php
namespace Restvel\Installer\Standards;


interface Configurations
{

    /** Initialize
     * Class must initialize by method.
     */
    public function init();

    /** Fetch configurations
     * It return plugin configurations, for all packages type.
     *
     * Configuration settings
     * type - Type of composer package reference: https://getcomposer.org/doc/04-schema.md#type
     * location - Directory location
     * only - List of allowed packages for specific type
     * new_name - List of "only" packages names, depending on "only"
     * vendor - Would you like to use vendor named directory structure?
     */
    public function getList();

}
