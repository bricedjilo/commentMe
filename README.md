# commentMe

## Demo link

https://comment-me.herokuapp.com


## Views of the App

0. Landing page

1. /register            Allows visitors to sign up

2. /#login              Allows visitors to login using username/password

3. /admin               View for the admin. It shows all products. It allows the admin to add/or delete products.

4. User views:

    * /comments:        Shows the most recently posted product and its associated comments

    * /categories/id    Shows products associated to a specific category

    * /products/id      Shows a specific product, its associated comments and a form to leave a comment

    * /Archives/date   Shows products posted on a specific date    

5. /fizzbuzz           Show a solution to the FizzBuzz "problem" for a given interval of numbers.


## How to run the App

1. configure the database connection

    * this information is found in the /config.php file

2. Make sure the .htaccess is in the root folder if you running the app on a Domain

3. This App uses reCaptcha which is domain sensitive. reCaptcha is seen on the /register page

    #### Setting up reCaptcha:

    - Make sure <script src='https://www.google.com/recaptcha/api.js'></script> is in the app/views/partials/footer.php

    - In app/views/registrations/create.view.php, uncomment line 59-61 if you are working on localhost. If you are running the app on a domain, you may have to get reCaptcha keys from https://developers.google.com/recaptcha/

    - After you have uncommented 59-61, comment lines 65-67.

app/views/registrations/create.view.php

3. Run
    ~~~~~~~~~~~~~~~~~~
    composer install
    ~~~~~~~~~~~~~~~~~~
4. Run
    ~~~~~~~~~~~~~~~~~~~~~~
    composer dump-autoload
    ~~~~~~~~~~~~~~~~~~~~~~

5. Database dump is in the /dump folder



## Most important files

1. /config.php        

    * contains database, reCaptcha config parameters.

2. app/core/bootstrap.php

    * Here is all the magic happens.

    * this file bind the config, database, mailer, recaptcha, session and exception handler to the App.

    * It contains view helpers that make available or pass variables to the views

3. app/core/Router.php

    * It creates relationships between routes and the associated controllers.

    * Parses routes in order to determine the appropriate controller.

4. app/routes.php

    * It contains all the routes used by the App.

5. app/exception/ExceptionHandler.php

    * Globally handles uncaught exceptions.

## How to access the App

1. Launch the App then go to /register

2. Create an account

3. then use your username to log in. Although you may access the the /comments page without logging in, you will have to login to leave a comment.
