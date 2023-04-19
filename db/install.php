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
 * @package     local_firstplugin 
 * @author      Rodrigo M. Araujo
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Installation hook for local_firstplugin plugin 
 * @return bool
 */
function xmldb_local_firstplugin_install() {
    global $CFG, $DB;

    $dbman = $DB->get_manager();

    $skip = false;

    // Define table local_message to be created.
    $table = new xmldb_table('local_message');
    if ($dbman->table_exists($table)) {
        // $dbman->rename_table($table, 'local_message');
        $skip = true;
    }

    // Define table theme_remui_section_instance to be created.
    $table2 = new xmldb_table('local_message_read');
    if ($dbman->table_exists($table2)) {
        // $dbman->rename_table($table2, 'local_message_read');
        $skip = true;
    }

    if ($skip == true) {
        return true;
    }
    $table = new xmldb_table('local_message');
    $table->add_field('id', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, XMLDB_SEQUENCE, null);
    $table->add_field('messagetext', XMLDB_TYPE_TEXT, '1500', null, XMLDB_NOTNULL, null, null);
    $table->add_field('messagetype', XMLDB_TYPE_CHAR, '255', null, XMLDB_NOTNULL, null, null);    

    // Adding keys to table theme_remui_section_instance.
    $table->add_key('primary', XMLDB_KEY_PRIMARY, array('id'));

    // Conditionally launch create table for theme_remui_section_instance.
    if (!$dbman->table_exists($table)) {
        $dbman->create_table($table);
    }    
    
    $table2 = new xmldb_table('local_message_read');
    $table2->add_field('id', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, XMLDB_SEQUENCE, null);
    $table2->add_field('messageid', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, null, '0');
    $table2->add_field('userid', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, null, '0');
    $table2->add_field('timeread', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, null, '0');    

    // Adding keys to table theme_remui_section_instance.
    $table2->add_key('primary', XMLDB_KEY_PRIMARY, array('id'));

    // Conditionally launch create table for theme_remui_section_instance.
    if (!$dbman->table_exists($table2)) {
        $dbman->create_table($table2);
    }
    return true;
}
