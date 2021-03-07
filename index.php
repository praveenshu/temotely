<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once( '../../config.php');
require_once 'lib.php';
require_login();

$context = context_system::instance();
$url = new \moodle_url('/local/testapi/index.php', array());

$PAGE->set_url($url);
$PAGE->set_title('Test API');
$PAGE->set_pagelayout('common');
$PAGE->navbar->add('View Json DATA');
echo $OUTPUT->header();
$secretkey = 'praveen1234';
$username = 'praveen';
$csvdata = '1,2,3';
$csv = explode(',',$csvdata);
$csv = json_encode($csv);

$csvarray = array('wsfunction' => 'local_testapi_formatcsvdata'
          ,'wstoken' => 'fdce0c2c0dd1155076c240844ddaa714'
          ,'moodlewsrestformat' => 'json'
          ,'secretkey' => $secretkey
          ,'username' => $username
          ,'csvdata' => $csv,
        );
$response = get_csvdata($csvarray);
//$contents = $response['response'];
print_object($response);

