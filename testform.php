<?php

/*  testapi us main  page  
 * 
 * @auther Praveen
 * @packege  local
 * $sub_package local_testapi
 */

require_once('../../config.php');
require_once($CFG->dirroot.'/local/testapi/testapi_form.php');
require_once('lib.php');
$returnurl = new moodle_url($CFG->wwwroot . '/local/testapi/index.php');
$PAGE->set_url(new moodle_url($CFG->wwwroot.'/local/testapi/testapi_form.php'));
$PAGE->set_context(context_system::instance());
$PAGE->set_title('Test API');
$PAGE->set_heading('API Testing');
$PAGE->set_pagelayout('standard');
echo $OUTPUT->header();

$testapiobj= new testapi_form();
$secretkey = optional_param('secretkey','praveen1234','PARAM_RAW');
$username = optional_param('username','praveen','PARAM_RAW');
    print_object($_POST);
if($testapiobj->is_cancelled())
{
 
}else if($testapiobj->is_submitted())
{    
  $data = $testapiobj->get_data();
  redirect($returnurl, 'Data Successfully sent to API.');

} else {
 
$testapiobj->display();    
echo $OUTPUT->footer();
}