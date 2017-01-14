Kahlan issue coverage=4 for empty file
--------------------------------------

Reproduce:

```
$ git clone -b kahlan --single-branch git@github.com:samsonasik/CodeIgniter4.git
$ cd CodeIgniter4
$ composer install
$ vendor/bin/kahlan --coverage=4 --src=application/
```
