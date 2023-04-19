<?php
/**
 * @package     local_firstplugin
 * @author      Rodrigo M. Araujo
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
require_once(__DIR__ . '/../../config.php'); 
require_once($CFG->dirroot . '/course/lib.php');
require_once($CFG->dirroot . '/course/externallib.php');

function make_links_visible($month,$year){
    
    global $DB;

    // Verifica se está logado e tem permisso de acesso ao plugin
    require_login();
    $context = context_system::instance();
    require_capability('local/firstplugin:page1', $context);

    $sql = "SELECT id, shortname, fullname 
            FROM {course} 
            WHERE startdate >= :startdate AND startdate <= :enddate";
    $params = [
        'startdate' => mktime(0, 0, 0, $month, 1, $year),
        'enddate' => mktime(0, 0, 0, $month+1, 1, $year) - 1,
    ];

    $courses = $DB->get_records_sql($sql, $params);    
    $results = [];
    foreach ($courses as $course) {
        $course_modules = get_course_mods($course->id);      
        foreach ($course_modules as $course_module) {
            $modinfo = get_coursemodule_from_id('', $course_module->id);
            if ($modinfo->modname == 'label' || $modinfo->modname == 'url' || $modinfo->modname == 'page') {
                if ((strpos($modinfo->name, "Assista") === 0)AND($modinfo->visible === "0")) {                
                    // $result = set_coursemodule_visible($modinfo->id, 1);
                    $results[intval($course->id)] = $course->shortname . " - " . $course->fullname;                
                }            
            }
        }    
    }

    return array_values($results);
}



function dd($variable){
    echo '<pre>';
    die(var_dump($variable));
    echo '</pre>';
}