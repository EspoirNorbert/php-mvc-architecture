# PHP MVC Architecture 
A php app build with mvc architecture added repository pattern 

# Files structures
There are three main folders
-  **app**  represent app . He contains controllers, interfaces, models , repositories
-   **core** represent core app with shared features
-   **views** represent view files

# Application Structures
````
-   app
        controllers
        interfaces
        models
        repositories
-   core
        Database.php
        Helper.php
        Route.php
        View.php

-   public
        .htaccess
        index.php

-   views
        errors
        layouts
        posts
````

# Getting starting
1.  Install dependencies
```
    php composer require
```

2.  Create A database named  **php_mvc_db**
```
    Create database php_mvc_db
```

3. Execute files on root folder **db.sql**
```
    source db.sql
```

4.  Launch php server
```
    php -S localhsot:8000
```

