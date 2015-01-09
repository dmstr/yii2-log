Yii 2.0 Framework Log Classes
=============================

SyslogTarget writes log to syslog.


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

### Settings

> Output is currently send via `error_log()` which allows you to capture output from php-fpm in nginx **for development**.
This extension was created mainly for development with docker, fig and vagrant.


### Sample output

Start docker container with `fig up` or `docker run`

```
web_1 | 2015/01/09 16:13:36 [error] 52#0: *163 FastCGI sent in stderr: "PHP message: dmstr\log\SyslogTarget::export via error_log() ===
web_1 | PHP message: 
web_1 | --- begin ---
web_1 | PHP message: [trace][yii\base\Application::bootstrap] Bootstrap with schmunk42\packaii\Bootstrap::bootstrap()
web_1 | PHP message: [trace][yii\base\Application::bootstrap] Bootstrap with dektrium\user\Bootstrap::bootstrap()
web_1 | PHP message: [trace][yii\base\Module::getModule] Loading module: user
web_1 | PHP message: [trace][yii\base\Application::bootstrap] Bootstrap with schmunk42\giiant\Bootstrap::bootstrap()
web_1 | PHP message: [trace][yii\base\Module::getModule] Loading module: gii
web_1 | PHP message: [trace][yii\base\Application::bootstrap] Bootstrap with schmunk42\markdocs\Bootstrap::bootstrap()
web_1 | PHP message: [trace][yii\base\Application::bootstrap] Bootstrap with yii\log\Dispatcher
web_1 | PHP message: [trace][yii\base\Module::getModule] Loading module: debug
web_1 | PHP message: [trace][yii\base\Application::bootstrap] Bootstrap with yii\debug\Module::bootstrap()
web_1 | PHP message: [trace][yii\base\Application::bootstrap] Bootstrap with yii\gii\Module::bootstrap()
web_1 | PHP message: [trace][yii\web\UrlManager::parseRequest] No matching URL rules. Using default URL parsing logic.
web_1 | PHP message: [trace][yii\web\Application::handleRequest] Route requested: ''

[...]

web_1 | PHP message: [trace][yii\base\View::renderFile] Rendering view file: /app/views/layouts/_modal.php
web_1 | PHP message: [info][application] $_COOKIE = [
web_1 |     'PHPSESSID' => 'xxxxxxxxxxxxxxxx'
web_1 | ]
web_1 | 
web_1 | $_SESSION = [
web_1 |     '__flash' => []
web_1 |     '__id' => 1
web_1 |     '__captcha/site/captcha' => 'xxxxxx'
web_1 |     '__captcha/site/captchacount' => 1
web_1 | ]
web_1 | PHP message: 
web_1 | --- end ---" while reading upstream, client: 192.168.59.3, server: web, request: "GET / HTTP/1.1", upstream: "fastcgi://unix:/var/run/php5-fpm.sock:", host: "docker.local:49177", referrer: "http://docker.local:49177/docs/42-testing.md"
```
