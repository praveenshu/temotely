<?php


/*  contact us main form 
 * 
 * @auther Praveen
 * @packege  local
 * $sub_package local_testapi
 */
if (!defined('MOODLE_INTERNAL')) {
    die('Direct access to this script is forbidden.');    //  It must be included from a Moodle page.
}


require_once($CFG->libdir.'/formslib.php');

class testapi_form extends moodleform
{
  public  function definition() {
       $mform= $this->_form;
       $mform->addElement('header','testapi',get_string('testapiform','local_testapi'));
       
       
       
        $mform->addElement('text','csvinput',get_string('csvinput','local_testapi'),  get_string('name_desc','local_testapi'));
        $mform->setType('csvinput',PARAM_ALPHA);
        $mform->addRule('csvinput',  get_string('csvinput_required','local_testapi'),'required',null,'client');
  
        
      
       $this->add_action_buttons(false, 'Send Your data');
    
       
       
       
    }
    public  function validation($data, $files) {
        return null;
    }
  
}