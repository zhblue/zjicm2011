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
 * Strings for component 'dbtransfer', language 'en', branch 'MOODLE_20_STABLE'
 *
 * @package   dbtransfer
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

$string['copyingtable'] = 'Copying table {$a}';
$string['copyingtables'] = 'Copying table contents';
$string['creatingtargettables'] = 'Creating the tables in the target database';
$string['dbexport'] = 'Database export';
$string['dbtransfer'] = 'Database transfer';
$string['differenttableexception'] = 'Table {$a} structure does not match.';
$string['done'] = 'Done';
$string['exportdata'] = 'Export data';
$string['exportschemaexception'] = 'Current database structure does not match all install.xml files. <br /> {$a}';
$string['checkingsourcetables'] = 'Checking source table structure';
$string['importschemaexception'] = 'Current database structure does not match all install.xml files. <br /> {$a}';
$string['importversionmismatchexception'] = 'Current version {$a->currentver} does match exported version {$a->schemaver}.';
$string['malformedxmlexception'] = 'Malformed XML found, can not continue.';
$string['notargetconectexception'] = 'Can not connect target database, sorry.';
$string['transferdata'] = 'Transfer data';
$string['transferdbintro'] = 'This script will transfer the entire contents of this database to another database server.';
$string['transferdbtoserver'] = 'Transfer this Moodle database to another server';
$string['transferringdbto'] = 'Transferring this database to {$a->dbtype} database {$a->dbname} on {$a->dbhost}';
$string['unknowntableexception'] = 'Unknown table {$a} found in export file.';
