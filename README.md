freespacealert
==============

Server free space email alert

About
-----
This script is pretty simple - just send an email if your server free space is critical.

Installation
------------
Same simple.
1. Get the contents from this repo.
2. Setup config
3. Setup crontab

Configuration
-------------
Copy config_sample.php to congfig.php:
```
cp config_sample.php config.php
```
Edit your `config.php` - set up paths of your disks to be checked, minimum space (default 1Gb or 1%), emails to send.
Add a line to crontab:
(example)
```
#every hour
0 * * * * php /home/user/freespacealert/freespacealert.php
#-or-
#every half an hour
*/2 * * * * php /home/user/freespacealert/freespacealert.php
```
