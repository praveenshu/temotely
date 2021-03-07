<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * local_testapi
 * author : Praveen
 */

// We defined the web service functions to install.
$functions = array(
        'local_testapi_formatcsvdata' => array(
                'classname'    => 'local_testapi_external',
                'methodname'   => 'process_csvdata',
                'classpath'    => 'local/testapi/externallib.php',
                'description'  => 'show csv data in github.',
                'type'         => 'read',
                'capabilities' => '',
                'ajax'         => true,
        )
);

// We define the services to install as pre-build services. A pre-build service is not editable by administrator.
$services = array(
        'testapi service' => array(
                'functions' => array (
                        'local_testapi_formatcsvdata',
                ),
                'restrictedusers' => 0,
                'enabled'=>1,
        )
);