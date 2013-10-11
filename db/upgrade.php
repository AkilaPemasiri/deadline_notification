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
 * This file keeps track of upgrades to the live module
 *
 * Sometimes, changes between versions involve alterations to database
 * structures and other major things that may break installations. The upgrade
 * function in this file will attempt to perform all the necessary actions to
 * upgrade your older installation to the current version. If there's something
 * it cannot do itself, it will tell you what you need to do.  The commands in
 * here will all be database-neutral, using the functions defined in DLL libraries.
 *
 * @package    deadline_notification
 * @copyright  2013 Akila Pemasiri
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
defined('MOODLE_INTERNAL') || die();

/**
 * Execute live upgrade from the given old version
 *
 * @param int $oldversion
 * @return bool
 */
function xmldb_block_deadline_notification_upgrade($oldversion) {
    global $DB;
    
    $dbman = $DB->get_manager(); 
    
    if ($oldversion <  2012061703) {

        
        // Define field id to be added to deadline_notification_subs
        $table = new xmldb_table('deadline_notification_subs');
        $field = new xmldb_field('id', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, XMLDB_SEQUENCE, null, null);

        // Conditionally launch add field id
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }
        
         // Define field user_id to be added to deadline_notification_subs
        $table = new xmldb_table('deadline_notification_subs');
        $field = new xmldb_field('user_id', XMLDB_TYPE_TEXT, null, null, null, null, null, 'id');

        // Conditionally launch add field user_id
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }
        // Define field facebook_id to be added to deadline_notification_subs
        $table = new xmldb_table('deadline_notification_subs');
        $field = new xmldb_field('facebook_id', XMLDB_TYPE_TEXT, null, null, null, null, null, 'user_id');

        // Conditionally launch add field facebook_id
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }
        // Another save point reached
        upgrade_block_savepoint(true, 2012061703, 'deadline_notification');
    }

    return true;
}