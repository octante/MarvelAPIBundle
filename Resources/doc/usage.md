Bundle usage
=============================
Marvel API documentation is [here](http://developer.marvel.com/documentation/getting_started) and an interactive tool
[here](http://developer.marvel.com/docs). You need to create an api key [here](https://developer.marvel.com/account).

With MarvelAPIBundle you can easily use Marvel API without calling directly Rest API.

### Exposed services:

Services to access repository classes. With these services you can load comics, characters, series, events, stories and
 creators data.

* marvel.comics
* marvel.characters
* marvel.series
* marvel.events
* marvel.stories
* marvel.creators

Services to access query classes. With these services you can create a query to use with repository. You need to
pass query service as a parameter of repository classes.

* marvel.comics_query
* marvel.characters_query
* marvel.creators_query
* marvel.events_query
* marvel.series_query
* marvel.stories_query

### Examples:

Load comics from an specific creator:

```php
<?php

$query = $this->container->get('marvel.comics_query');
$query->setCreators(4430);

$comics = $this->container->get('marvel.comics');
$comicsData = $comics
            ->getComics($query)
            ->getData()
            ->getResults();
```

Load title from loaded comics:

```php
<?php

$query = $this->container->get('marvel.comics_query');
$query->setCreators(4430);

$comics = $this->container->get('marvel.comics');
$comicsData = $comics
            ->getComics($query)
            ->getData()
            ->getResults();

foreach ($comicsData as $comic) {
    var_dump($comic->getTitle());
}
```