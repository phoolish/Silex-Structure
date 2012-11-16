silex-structure
===============

The file structure for all my silex applications, feel free to use and or contribute.

## Installation

Download the [master.zip](https://github.com/ChrisRiddell/Silex-Structure/archive/master.zip) file and extract it.

run the `php composer.phar install` command to install it:
(note: You have to cd into the Library folder first)

(note2: Will have a zip file with all the vendors installed later)

## Documentation

All your configurations are done in the Library/base/Configuration.php file, you can do everything from the silex
documentation, The only thing you have to remember is $app is now $this->app,

Look at the example code inside the file to understand how to set/register Routes,Controllers etc.