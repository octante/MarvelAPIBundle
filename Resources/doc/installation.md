Setting up the bundle
=============================
### A) Add MarvelAPIBundle to your composer.json

// TODO : Add marvel api bundle to packagist

### B) Enable the bundle

Enable the bundle in the kernel:

```php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new Octante\Bundle\MarvelAPIBundle\MarvelAPIBundle(),
    );
}
```
### C) Add a parameters.yml file in your application

You need to configure private and public keys in your parameters file. You can create the keys in [marvel's developer page](https://developer.marvel.com/account)

```yaml
parameters:
    marvel_public_key: your_public_key
    marvel_private_key: your_private_key
```

### D) Add a config.yml file in your application

You need to add created parameters to your app/config/config.yml:

```yaml
octante_marvel_api:
    public_key: "%marvel_public_key%"
    private_key: "%marvel_private_key%"
```