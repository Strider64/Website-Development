# Website_Development
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

Where Library is the namespace and src is the actual directory where your classes will be located at. Library can be any namespace name that you want and so can src though the directory needs to be at the same level as your vendor folder is. In this case it's at the root directory and probably will be for 99.9 percent of your projects. 

```javascript
namespace Library\Calendar;

use Library\Database\Database as DB;
use DateTime;
use DateTimeZone;
use PDO;

abstract class Location {
```

The above shows an example of one of my classes and yes I know the class doesn't correspond to the the folder named Calender in Library\Calendar namespace, but as long as the file is named Location.php representing the class Location and it is in the folder src/Calendar there should be no problem. I just wanted to show it this way, for it helped me visualize how to do this and doing it this way might also help you out also. 

A better explantion on how to use an autoloader with namespaces can be found here : http://phpenthusiast.com/blog/how-to-autoload-with-composer
