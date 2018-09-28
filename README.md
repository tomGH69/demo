demo of my technical skills
=======

Presented as an IMDb-like website

For now, only back office is done, the front is next to come

Model
=======
- [Abstract class Media](https://github.com/tomGH69/demo/blob/develop/src/BackBundle/Entity/Media.php)
    - [class Movie extends Media](https://github.com/tomGH69/demo/blob/develop/src/BackBundle/Entity/Media/Movie.php)
    - [class TvShow extends Media](https://github.com/tomGH69/demo/blob/develop/src/BackBundle/Entity/Media/TvShow.php)

- Tv show oneToMany [class Episode](https://github.com/tomGH69/demo/blob/develop/src/BackBundle/Entity/Media/Episode.php)
- [Abstract class Person](https://github.com/tomGH69/demo/blob/develop/src/BackBundle/Entity/Person.php)
    - [class Actor extends Person](https://github.com/tomGH69/demo/blob/develop/src/BackBundle/Entity/Person/Actor.php)
    - [class Director extends Person](https://github.com/tomGH69/demo/blob/develop/src/BackBundle/Entity/Person/Director.php)

- [class Image](https://github.com/tomGH69/demo/blob/develop/src/BackBundle/Entity/Image.php)          

- FOS [class User](https://github.com/tomGH69/demo/blob/develop/src/BackBundle/Entity/User.php)          

Technical skills used
=======
- Doctrine Inheritance with discriminator
- Doctrine QueryBuilder
- Constraints validator
- PHP Trait
- JSON Serializer
- PHP7 parameters and returns type

External Bundles
=======
To Do
=======
- Front

- APIs

- Back
    - Search engine
    - Table ordering
    