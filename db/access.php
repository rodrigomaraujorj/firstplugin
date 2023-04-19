<?php
/**
 * Capability definitions for the First Plugin.
 *
 * @package    local_firstplugin
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$capabilities = array(
    'local/firstplugin:page1' => array(
        'captype' => 'write',
        'contextlevel' => CONTEXT_SYSTEM,
        'archetypes' => array(
            'user' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        ),
        'clonepermissionsfrom' => 'moodle/site:config',
    )
);

/*function local_firstplugin_check_access($courseid) {
    global $USER;
    $context = context_course::instance($courseid);
    return has_capability('local/firstplugin:view', $context, $USER->id);
}*/
