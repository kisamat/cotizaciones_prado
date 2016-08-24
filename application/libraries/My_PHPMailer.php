<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH.'third_party/phpmailer/PHPMailerAutoload.php';
require_once(APPPATH.'third_party/phpmailer/class.phpmailer.php'); 


class My_PHPMailer extends PHPMailer{

public function __construct()
	{
		parent::__construct();
                $this->isSMTP();
                //$this->SMTPDebug = 1;
                $this->SMTPKeepAlive = true;
                $this->CharSet="UTF-8";
                $this->SMTPAuth = true;
                $this->Host = "smtp.gmail.com";
                $this->SMTPSecure = "ssl";
                $this->Port = 465;
                //$this->Host = 'relay-hosting.secureserver.net';
                //$this->Port = 25;
                //$this->SMTPAuth = false;
                //$this->SMTPSecure = false;
                $this->Username = "noreply@hotelelpradobarranquilla.com";
                $this->Password = "abcde12345678a";
                $this->From = "noreply@hotelelpradobarranquilla.com";
	}


}


