# Extra Folder Protect

Gives extra layer of protect of certain folder and it's subfolders.
Specially protects from bots.
More advanced than just .htpassword protecting your folder
Specially good for outdated projects that needs protection from bots.
Not tested with wordpress.

## Requirements
Apache & php support
.htaccess support for any folder
php_value include_path support

## Installation

Edit the _config.php file as you need.
Test
Delete index.php
Upload to your server into the folder you want to protect.
Usually /admin
If it does not work, check htaccess
If gives Internal Server Error, then your server might not support auto_prepend_file

## How it works
Every request to the folder, it's files or it's subfolder goes trough .htaccess -file.
This file prepends _admin_check_requirer.php -file to the request. This is if the php fails, it won't show your other files source.
That file requires _admin_check.php file.
If there is no cookie, or script run from whitelisted ip-address, the login form is shown.
Also the request to target file is halted.
After successful login, long lasting cookie is set.



## History

1.0 First release

## Credits

jukka (at) tuunix (dot) fi
https://www.tuunix.fi/

## License

Mit licence