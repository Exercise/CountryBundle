Installation
============

  1. Add this bundle to your project as a Git submodule:

          $ git submodule add git@github.com:Exercise/CountryBundle.git src/Exercise/CountryBundle

  2. Add this bundle to your application's kernel:

          // application/ApplicationKernel.php
          public function registerBundles()
          {
              return array(
                  // ...
                  new Exercise\CountryBundle\ExerciseCountryBundle(),
                  // ...
              );
          }

  3. Populate your database with countries defined in the csv file:

          php exercise/console app:data:load --fixtures=src/Exercise/CountryBundle/Resources/data/fixtures/doctrine/mongodb

Example Usage
-----------------------------

  1. Load all countries:

          $this['doctrine.odm.mongodb.document_manager']->getRepository('ExerciseCountryBundle:Country')->findAll();
