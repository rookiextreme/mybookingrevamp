<?php

if ( ! defined('BASEPATH') && ! defined('INSTALLATION_BASEPATH')) exit('No direct script access allowed setting');

/*
  | -------------------------------------------------------------------------
  | Email
  | -------------------------------------------------------------------------
  | Please see the user guide for info:
  |
  |	http://codeigniter.com/user_guide/libraries/email.html
  |
 */
//new config
//MAIL_DRIVER=smtp
//MAIL_HOST=postmaster.1govuc.gov.my
//MAIL_PORT=25
//MAIL_USERNAME=
//MAIL_PASSWORD=
//MAIL_ENCRYPTION=
//MAIL_FROM_ADDRESS=esurvey@jkr.gov.my
//MAIL_FROM_NAME="E-Survey JKR"

$config["mailtype"] = "html";
$config["charset"] = "utf-8";
$config["newline"] = "\r\n";
$config["protocol"] = "smtp";
$config["smtp_host"] = "postmaster.1govuc.gov.my";
$config["smtp_user"] = "";
$config["smtp_pass"] = "";

//Old Config
//$config["mailtype"] = "html";
//$config["charset"] = "utf-8";
//$config["newline"] = "\r\n";
//$config["protocol"] = "smtp";
//$config["smtp_host"] = "10.24.251.125";
//$config["smtp_user"] = "";
//$config["smtp_pass"] = "";

$config["mailpath"] = "/usr/sbin/sendmail";
//$config["smtp_host"] = "postmaster.1govuc.gov.my";
//$config["smtp_user"] = "";
//$config["smtp_pass"] = "";
$config["smtp_port"] = "25";
$config["smtp_timeout"] = "5";
//
/* End of file email.php */
/* Location: ./application/config/email.php */
