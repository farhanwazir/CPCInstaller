# CPC Installer 

Composer Packages Custom Installer is a easy to custom, you don't need any speciality. This will helpful for installation of your packages, modules, plugins, theme(s) and/or whatever you call, in your's given location with many more options. 

#### Boost up your work, just FORK it right now!

If you have forked then go under src/Installer/Config see sample.php configuration file, copy it and add many as you wish. Each attribute of configuration file has its own functionality so read comments carefully and change it as on your needs. If you don't want optional attributes then remove it.

## Configuration
- `Configuration file name` - here is no restrictions, name it whatever you want.
- `PHP file extension` - configuration file extension should be .php.

### Configuration attributes

- `type` - _Package type_

    It is belongs to composer.json type attribute. For more detail visit
    [Composer official documentation](https://getcomposer.org/doc/04-schema.md#type)
    
    - _DataType: String_
    - _Mandatory attribute_


- `location` - _Installation directory_
     It helps you to define where you wanted to install. It must be start from
     parent directory of vendor directory.
     
     **Instruction**: Path should end with trail slash /. Below example only for understanding, other attributes applies.
     
     - _Default: 'vendor'_
     - _Type: String Path_
     - _Mandatory attribute_
     
     `
     i.e 'directory1/subdirectory/' hierarchy looks like directory1/subdirectory/vendor/package
     `


- `only` _Allowed package(s)_
     If you want multiple packages for same "type" then use array as value
     like "only" => ["vendor/package_1", "vendor/package_2"]
     
     You can also use wild card for packages like "restvel/*" this will allow
     all packages from vendor "restvel" by matching "type"
     
     - _Default: null_
     - _Type: String/Array_
     - _Optional attribute_


- `rename` _Renaming package(s)_
     
     If "rename" will be string then all same "type" and "only" attributes
     installed under renamed. You can also use wild card, with prefix and/or
     suffix like **"package-\*" or "\*-package" or "package-\*-packages"**.
     Above example will be return "package-test" or "test-package" or "package-test-packages".
     
     If "only" has multiple packages list and you wants each package install
     under your custom name then it's length must be equals to "only" otherwise
     last name will be used in case of unordered position.
     
     **Instruction**: Empty quotes '' place package files on root of location attribute. Vendor attribute action applies.
     
     - _Default: null_
     - _Type: String_
     - _Optional attribute_


- `vendor` _Vendor reference_

    If you don't wanted to use vendor reference with package then its value should
    be false.
    
    - _Default: true_
    - _Options: true/false_
    - _Optional attribute_


### Contribution
If anyone thinks document for CPCInstaller needs to improve then send me pull request.


## Thank you for using