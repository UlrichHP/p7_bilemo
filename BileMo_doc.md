# Categories #

## /categories ##

### `GET` /categories ###

_Get the list of all categories._


## /categories/{id} ##

### `GET` /categories/{id} ###

_Get one category._

#### Requirements ####

**id**

  - Requirement: \d+
  - Type: integer
  - Description: The category unique identifier.



# Products #

## /products ##

### `GET` /products ###

_Get the list of all products._

#### Filters ####

keyword:

  * Requirement: [a-zA-Z0-9]
  * Description: The keyword to search for.

order:

  * Requirement: asc|desc
  * Description: Sort order (asc or desc)
  * Default: asc

limit:

  * Requirement: \d+
  * Description: Max number of products per page.
  * Default: 15

offset:

  * Requirement: \d+
  * Description: The pagination offset
  * Default: 0


## /products/{id} ##

### `GET` /products/{id} ###

_Get one product._

#### Requirements ####

**id**

  - Requirement: \d+
  - Type: integer
  - Description: The product unique identifier.
