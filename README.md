# main_website
I am currently redesigning my main website using composer's autoload feature for the classes that I develop. I was using an autoloader that I found on the internet, but doing it this way is cleaner and more standardize with Github.

Just have a composer.json file in this format

```javascript
{
  "autoload": {
    "psr-4": {
      "Library\\":"src/"
    }
  }
} 
```

then just do the following to update the autoloader that is in the vendor folder at the command prompt:

composer dumpautoload -o

Where Library (You can name this anything you wish) is the namespace and src (again you can name src anything you want, but just make sure it's in the root directory) is the actual directory where your classes will be located at.

namespace Library\Calendar;

use Library\Database\Database as DB;
use DateTime;
use DateTimeZone;
use PDO;

abstract class Location {

The above shows an example of one of my classes and yes I know the class doesn't correspond to the the folder named Calender in Library\Calendar namespace, but as long as the file is named Location.php representing the class Location and it is in the folder src/Calendar there should be no problem. I just wanted to show it this way, for it helped me visualize how to do this. 

A better explantion on how to use an autoloader with namespaces can be found here : http://phpenthusiast.com/blog/how-to-autoload-with-composer
