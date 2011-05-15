<?php  // Moodle configuration file

unset($CFG);
global $CFG;
$CFG = new stdClass();

$CFG->dbtype    = 'mysqli';
$CFG->dblibrary = 'native';
$CFG->dbhost    = 'localhost';
$CFG->dbname    = 'moodle2_0';
$CFG->dbuser    = 'root';
$CFG->dbpass    = 'hanmo1988';
$CFG->prefix    = 'mdl_';
$CFG->dboptions = array (
  'dbpersist' => 0,
);
$CFG->wwwroot   = 'http://moodle2.0.zjicm.org';
$CFG->dataroot  = '/var/moodledata/2.0';
$CFG->admin     = 'admin';

$CFG->directorypermissions = 0777;

$CFG->passwordsaltmain = 'f86xr1>&Lm.)P[i4k^5QFj)/';

require_once(dirname(__FILE__) . '/lib/setup.php');

// There is no php closing tag in this file,
// it is intentional because it prevents trailing whitespace problems!
