Yii 2.0 Framework Log Classes
=============================

SyslogTarget writes log to syslog.

> Output is currently send via `error_log()` which allows you to capture output from php-fpm in nginx **for development**.
This extension was created mainly for development with docker, fig and vagrant.


Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Run

```
php composer.phar require --prefer-dist dmstr/yii2-log "*"
```


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

