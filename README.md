## String Calculator Solution By Himanshu Patel


#### Implementation details

It's been developed on window 10 , PHP Version 7.4.7 & PHPUnit 9.5.20

Solution has mainly 3 below files 
1) src\StrCal.php
2) tests\StrCalTest.php
3) composer.json


#### Hypothesis and choice

For simplicity max number allowed is 100, which can be changed by 
changes `const MAX_NUMBER_ALLOWED = 100;` in `StrCal.php` file.

#### How to run it

First, you need to install composer dependencies.
```bash
composer.phar install
```

Or Update composer dependencies.
```bash
composer update
```

Run test cases
```bash
vendor\bin\phpunit tests
```

#### Unit tests

Nine unit tests have been wrote, you can find it in `tests` directory.
You can also run them via console command.

```bash
vendor\bin\phpunit tests
```

#### Unit tests OUTPUT
``` 
PHPUnit 9.5.20 #StandWithUkraine

.........                                                           9 / 9 (100%)


Time: 00:00.032, Memory: 4.00 MB

OK (9 tests, 9 assertions)

```

#### Screenshots OUTPUT
 screenshots of the command line output of working code includeed as a jpg in the `screenshots` repository
