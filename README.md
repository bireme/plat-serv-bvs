Virtual Health Library's Services Platform
==========================================

The VHL's Services Platform aims to provide functionality and custom services to the users and applications members of the Virtual Health Library.

Based on a distributed computing concept, the VHL's Services Platform consists on a server side module and a client side module that interoperate through the web services technology.

Generate encryption keys
------------------------

Generate the `PRIVATE_KEY`:

```
$ php -r 'echo base64_encode(random_bytes(SODIUM_CRYPTO_SECRETBOX_KEYBYTES)) . PHP_EOL; ?>'
```

Generate the `INDEX_KEY`:

```
$ php -r 'echo base64_encode(random_bytes(SODIUM_CRYPTO_SECRETBOX_NONCEBYTES)) . PHP_EOL; ?>'
```

Copy the keys and add/change the following settings in the system configuration files (`client/config.php` and `server/config.php`):

```
define('PRIVATE_KEY',''); // add PRIVATE_KEY here
define('INDEX_KEY','');   // add INDEX_KEY here
```