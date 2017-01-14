Kahlan issue coverage=4 for empty file
--------------------------------------

Reproduce:

```
$ git clone git@github.com:samsonasik/CodeIgniter4.git kahlan
$ composer install
$ vendor/bin/kahlan --coverage=4 --src=application/
```
