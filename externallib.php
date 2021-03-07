<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 *
 * @package    local_testapi
 * @since      7th march 2021
 * @author  Praveen
 */
defined('MOODLE_INTERNAL') || die;
define('secretkey', 'praveen1234');
define('username', 'praveen');
require_once("$CFG->libdir/externallib.php");
class local_testapi_external extends external_api {

public static function process_csvdata_parameters() {
    return new external_function_parameters(
            array(
        'secretkey' => new external_value(PARAM_RAW, 'key'),
        'username' => new external_value(PARAM_USERNAME, 'username'),
        'csvdata' => new external_value(PARAM_RAW, 'csv tabular data in json')
            )
    );
}

public static function process_csvdata($secretkey, $username, $csvdata) {
    global $DB, $CFG;
    $params = self::validate_parameters(self::process_csvdata_parameters(), array(
                'secretkey' => $secretkey, 'username' => $username, 'csvdata' => $csvdata
    ));
    $result = [];
    $error = false;
    $errormessage = '';
    $user = $DB->get_record('user', array('username' => $params['username'], 'deleted' => 0));
    if ($username != username) {

        $error = true;
        $errormessage = 'Invalid username, not found user with this username';
    }
    if (secretkey != secretkey) {
        $error = true;
        $errormessage = 'Invalid secretkey, please check with admin.';
    }


    if (empty($csvdata)) {
        $error = true;
        $errormessage = 'No csv data';
    }

    if ($error) {
        $result['error'] = true;
        $result['errormessage'] = $errormessage;
        $result['csvdata'] = '';

        return $result;
    }

$csv_data = json_decode($csvdata);
$returnurl = new moodle_url($CFG->wwwroot . '/local/testapi/testfrom.php');
$output = '';
    $output  = '<style>
    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }
    
    td{
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }</style><table>
    <tr>
      <td>'.$csv_data[0].'</td>
      <td>'.$csv_data[1].'</td>
      <td>'.$csv_data[2].'</td>
      <td>'.$returnurl.'</td>
    </tr>';

    $result['error'] = false;
    $result['errormessage'] = '';
    $result['csvdata'] = $output;
    return $result;
}

public static function process_csvdata_returns() {

    return new external_single_structure(
            array(
        'error' => new external_value(PARAM_BOOL, 'true in case of invalid request, else false'),
        'errormessage' => new external_value(PARAM_TEXT, 'The error message'),
        'csvdata' => new external_value(PARAM_RAW, 'csv data json format')
            )
    );
}

}
