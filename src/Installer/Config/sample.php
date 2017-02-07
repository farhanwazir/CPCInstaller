<?php
return [

    /* Package type
     * It is belongs to composer.json type attribute. For more detail visit
     * https://getcomposer.org/doc/04-schema.md#type
     *
     * Type: String
     * Mandatory attribute
     * Format: 'vendor-type'
     */
    'type' => 'farhanwazir-package',


    /* Installation directory
     * It helps you to define where you wanted to install. It must be start from
     * parent directory of vendor directory.
     *
     * Default: 'vendor'
     * Type: String Path
     * Mandatory attribute
     *
     * i.e 'directory1/subdirectory/' hierarchy looks like directory1/subdirectory/vendor/package
     *
     * Instruction: Path should end with trail slash /. Above example only for understanding,
     * other attributes applies.
     */
    'location' => 'directory/sub-directory/another-sub-directory',


    /* Allowed package(s)
     * If you want multiple packages for same "type" then use array as value
     * like "only" => ["vendor/package_1", "vendor/package_2"]
     *
     * You can also use wild card for packages like "restvel/*" this will allow
     * all packages from vendor "restvel" by matching "type"
     *
     * Default: null
     * Type: String, Array
     * Optional attribute
     */
    'only' => 'farhanwazir/cpcinstaller', /* 'farhanwazir/*' it means any package from vendor farhanwazir will be accepted if package type matched.*/


    /* Naming convention
     * If "new_name" will be string then all same "type" and "only" attributes
     * installs under mentioned name. You can also use wild card, with prefix and/or
     * suffix like "package-*" or "*-package" or "package-*-packages".
     * Above example will be return "package-test" or "test-package" or "package-test-packages".
     *
     * If "only" has multiple packages list and you wants each package install
     * under your custom name then it's length must be equals to "only" otherwise
     * last new_name will be used for rest.
     *
     * Default: null
     * Type: String
     * Optional attribute
     * Instruction: Empty quotes '' place package files on root of location attribute. Vendor attribute
     * action applies.
     */
    'rename' => 'anyname',


    /* Vendor reference
     * If you don't wanted to use vendor reference with package then its value should
     * be false.
     * Default: true
     * Options: true, false
     * Optional attribute
    */
    'vendor' => false,
];
