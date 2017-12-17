# Categories #

## /api/categories ##

### `GET` /api/categories ###

_Get the list of all categories._


## /api/category/{id} ##

### `GET` /api/category/{id} ###

_Get one category._

#### Requirements ####

**id**

  - Requirement: \d+
  - Type: integer
  - Description: The category unique identifier.



# Products #

## /api/product/{id} ##

### `GET` /api/product/{id} ###

_Get one product._

#### Requirements ####

**id**

  - Requirement: \d+
  - Type: integer
  - Description: The product unique identifier.


## /api/products ##

### `GET` /api/products ###

_Get the list of all products._

#### Filters ####

keyword:

  * Requirement: [a-zA-Z0-9]
  * Description: The keyword to search for.

order:

  * Requirement: asc|desc
  * Description: Sort order (asc or desc).
  * Default: asc

limit:

  * Requirement: \d+
  * Description: Max number of products per page.
  * Default: 15

offset:

  * Requirement: \d+
  * Description: The pagination offset.
  * Default: 0



# User #

## /api/user/me ##

### `GET` /api/user/me ###

_Get current user informations._


## /api/user/{id} ##

### `DELETE` /api/user/{id} ###

_Delete one user._

#### Requirements ####

**id**

  - Type: integer
  - Description: The user unique identifier.


### `GET` /api/user/{id} ###

_Get one user._

#### Requirements ####

**id**

  - Requirement: \d+
  - Type: integer
  - Description: The user unique identifier.


## /api/users ##

### `GET` /api/users ###

_Get all users registered._


## /register ##

### `POST` /register ###

_User registration._

#### Parameters ####

email:

  * type: [a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}
  * required: true
  * description: User's email.

username:

  * type: 
  * required: true
  * description: User's username.

password:

  * type: 
  * required: true
  * description: User's password.

lastname:

  * type: [A-Za-z- ]+
  * required: true
  * description: User's lastname.

firstname:

  * type: [A-Za-z- ]+
  * required: true
  * description: User's firstname.

client_id:

  * type: [0-9]+_[a-zA-Z0-9]+
  * required: true
  * description: The client_id with the client secret id.

client_secret:

  * type: [a-zA-Z0-9]+
  * required: false
  * description: Client_secret used for authentication code and password grant type.

grant_type:

  * type: password|token|code
  * required: true
  * description: Grant type requested

redirect_uri:

  * type: 
  * required: true
  * description: The url where Oauth server will be redirected.

role:

  * type: ROLE_USER|ROLE_ADMIN
  * required: false
  * description: Optional, possibility to create an Admin who can delete users.
