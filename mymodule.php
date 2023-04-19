<?php

defined('MOODLE_INTERNAL') || die();

require_once(__DIR__ . '/../../config.php');
require_once($CFG->libdir.'/formslib.php');

class myplugin_form extends moodleform {
    public function definition() {
        $mform = $this->_form;
        $mform->addElement('select', 'month', 'Month', array(
            '01' => 'January',
            '02' => 'February',
            '03' => 'March',
            '04' => 'April',
            '05' => 'May',
            '06' => 'June',
            '07' => 'July',
            '08' => 'August',
            '09' => 'September',
            '10' => 'October',
            '11' => 'November',
            '12' => 'December',
        ));
        $mform->addElement('select', 'year', 'Year', array(
            '2022' => '2022',
            '2023' => '2023',
        ));
        $mform->addElement('html', '<div class="form-group"><button type="submit" class="btn btn-primary">Show</button></div>');
    }
}

class local_firstplugin extends plugin_renderer_base {
    public function render() {
        global $CFG, $OUTPUT;

        $data = new stdClass();
        $data->month = optional_param('month', '', PARAM_INT);
        $data->year = optional_param('year', '', PARAM_INT);

        $form = new myplugin_form(null, array('action' => new moodle_url('/local/firstplugin/mymodule.php')));
        if ($form->is_cancelled()) {
            redirect($CFG->wwwroot);
        } else if ($fromform = $form->get_data()) {
            echo "Selected Month: " . $fromform->month . "<br>";
            echo "Selected Year: " . $fromform->year . "<br>";
        } else {
            echo $OUTPUT->header();
            $form->display();
            echo $OUTPUT->footer();
        }
    }
}

$renderer = $PAGE->get_renderer('local_firstplugin');
echo $renderer->render();
