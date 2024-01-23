<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'Auth';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login'] = 'Auth';
$route['signIn'] = 'Auth/signIn';
$route['signUp'] = 'Auth/signUp';
$route['createLogin'] = 'Auth/daftar';
$route['registrasi'] = 'Auth/regist';

$route['dashboard'] = 'Dashboard';
$route['pengajuan_cuti'] = 'Cuti';


$route['logout'] = 'Auth/logout';
