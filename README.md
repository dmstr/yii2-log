Yii 2.0 Framework Log Classes
=============================
SyslogTarget writes log to syslog.

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist dmstr/yii2-log "*"
```

or add

```
"dmstr/yii2-log": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

        'log'	=> [
            'targets'	=> [
                [
                    'class'		=> 'dmstr\log\SyslogTarget',
                    'levels'	=> ['error', 'warning', 'info', 'trace'],
                    'enabled'	=> true,
                    'logVars'	=> ['_GET','_POST'],
                ],
            ],
        ],