<?php
$login_url_skip=0;
if ($_SERVER['SCRIPT_FILENAME']=='/usr/local/vesta/web/reset/mail/index.php') $login_url_skip=1;
if ($_SERVER['SCRIPT_FILENAME']=='/usr/local/vesta/web//reset/mail/index.php') $login_url_skip=1;
if ($_SERVER['SCRIPT_FILENAME']=='/usr/local/vesta/web/reset/mail/set-ar.php') $login_url_skip=1;
if ($_SERVER['SCRIPT_FILENAME']=='/usr/local/vesta/web//reset/mail/set-ar.php') $login_url_skip=1;
if ($_SERVER['SCRIPT_FILENAME']=='/usr/local/vesta/web/reset/mail/get-ar.php') $login_url_skip=1;
if ($_SERVER['SCRIPT_FILENAME']=='/usr/local/vesta/web//reset/mail/get-ar.php') $login_url_skip=1;

if ($login_url_skip==0) {
    if (!isset($login_url_loaded)) {
        $login_url_loaded=1;
        if (file_exists('/usr/local/vesta/web/inc/login_url.php')) {
            require_once('/usr/local/vesta/web/inc/login_url.php');
            if (isset($_GET[$login_url])) {
                setcookie($login_url, '1', time() + 31536000, '/', $_SERVER['HTTP_HOST'], true);
                header ("Location: /login/");
                exit;
            }
            if (!isset($_COOKIE[$login_url])) exit;
        }
    }
}
