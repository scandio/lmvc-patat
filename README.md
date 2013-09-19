# LMVC Patat (Find a snack)

LMVC Patat is a small app built using the LMVC Framework and its modules.

A small little app suggesting fast food restaurant within walking distance to a hungry person.

## Install LMVC Patat

LMVC Patat is based upon [LMVC](https://raw.github.com/SEP007/lmvc) and more specifically [LMVC Afresh](https://github.com/scandio/lmvc-afresh).

### Download and Config Setup

1. Clone and move into the folder from command line:
   - `git clone https://github.com/SEP007/lmvc-patat.git`
   - `cd lmvc-patat`
2. Copy the contents of the [sample-config.json](https://github.com/SEP007/lmvc-patat/blob/master/sample-config.json) into a new file named `config.json` and adjust its values if needed
   - Meaning change database-name and credentials
2. Now copy the contents of the [.-sample-htaccess-file](https://github.com/SEP007/lmvc-patat/blob/master/.sample-htaccess) into a new `.htaccess`
   - Set the app's root to whereever the app resides on your own *localhost's* htdocs
4. Lastly copy the contents of the [/app/javascripts/sample-config.js](https://github.com/SEP007/lmvc-patat/blob/master/app/javascripts/sample-config.js) into a new *config.js* and set the app's root to whereever the app resides on your own *localhost* too (e.g. just `lmvc-patat`.

### Setup the Database

1. Setup a new database in your own MySQL and select it
   - When you're using MAMP this is typically done on your *localhost* with *phymyadmin* as a front-end for your database
2. Import the security module's [database](https://github.com/SEP007/lmvc-modules/blob/master/lib/Scandio/lmvc/modules/security/docs/DatabasePrincipal.sql)
3. Import patat's [database](https://github.com/SEP007/lmvc-patat/blob/master/docs/lmvc-patat.sql)

### Install the Dependencies

1. Now run `sh bootstrap.sh` on your terminal *in the patat-folder* and the dependency fetching will begin

Launch the app in the browser e.g. [localhost/lmvc-patat](http://localhost/lmvc-patat).

## Some screenshots

### Application on desktop
[![App index](https://raw.github.com/scandio/lmvc-patat/master/screens/patat-1-s.jpg)](https://raw.github.com/scandio/lmvc-patat/master/screens/patat-1-b.jpg)
[![Restaurant list](https://raw.github.com/scandio/lmvc-patat/master/screens/patat-2-s.jpg)](https://raw.github.com/scandio/lmvc-patat/master/screens/patat-2-s.jpg)
[![Single Restaurant](https://raw.github.com/scandio/lmvc-patat/master/screens/patat-3-s.jpg)](https://raw.github.com/scandio/lmvc-patat/master/screens/patat-3-b.jpg)
[![Route to Restaurant](https://raw.github.com/scandio/lmvc-patat/master/screens/patat-4-s.jpg)](https://raw.github.com/scandio/lmvc-patat/master/screens/patat-4-b.jpg)
[![Registration](https://raw.github.com/scandio/lmvc-patat/master/screens/patat-5-s.jpg)](https://raw.github.com/scandio/lmvc-patat/master/screens/patat-5-b.jpg)
[![Manage Menu](https://raw.github.com/scandio/lmvc-patat/master/screens/patat-6-s.jpg)](https://raw.github.com/scandio/lmvc-patat/master/screens/patat-6-b.jpg)
[![Edit Dish](https://raw.github.com/scandio/lmvc-patat/master/screens/patat-7-s.jpg)](https://raw.github.com/scandio/lmvc-patat/master/screens/patat-7-b.jpg)

### Application on mobile (it's just bootstrap)

[![Restaurant list](https://raw.github.com/scandio/lmvc-patat/master/screens/patat-8-s.jpg)](https://raw.github.com/scandio/lmvc-patat/master/screens/patat-8-b.jpg)
[![Restaurant view](https://raw.github.com/scandio/lmvc-patat/master/screens/patat-9-s.jpg)](https://raw.github.com/scandio/lmvc-patat/master/screens/patat-9-b.jpg)
[![Menu](https://raw.github.com/scandio/lmvc-patat/master/screens/patat-10-s.jpg)](https://raw.github.com/scandio/lmvc-patat/master/screens/patat-10-b.jpg)

## Further references

* [LMVC on GitHub](https://raw.github.com/scandio/lmvc)
* [LMVC Modules on GitHub](https://github.com/scandio/lmvc-modules)
* [Bower](http://bower.io/)
* [Composer](http://getcomposer.org/) and [Packagist](http://packagist.org)