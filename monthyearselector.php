<?php
require_once(__DIR__ . '/../../config.php');
require_once($CFG->libdir . '/formslib.php');
require_once('monthyearform.php');
require_once('page1.php');

$PAGE->set_context(context_system::instance());
$PAGE->set_url('/local/firstplugin/monthyearselector.php');
$PAGE->set_title(get_string('pluginname', 'local_firstplugin'));
$PAGE->set_heading(get_string('pluginname', 'local_firstplugin'));

$form = new monthyear_form();

if ($form->is_cancelled()) {
    redirect(new moodle_url('/'));
} elseif ($data = $form->get_data()) {
    $selected_month = $data->month;
    $selected_year = $data->year;
    $result = make_links_visible($selected_month,$selected_year);    
    echo $OUTPUT->header();
    $templatecontext = (object)[
        'texttodisplay' => "Cursos alterados:",
        'results' => $result,
    ];
    echo $OUTPUT->render_from_template('local_firstplugin/page1', $templatecontext);
    echo $OUTPUT->footer();
} else {
    echo $OUTPUT->header();
    $form->display();

    if (isset($_GET['selected_month']) && isset($_GET['selected_year'])) {
        echo '<p>Selected Month: ' . s($_GET['selected_month']) . ', Selected Year: ' . s($_GET['selected_year']) . '</p>';
    }

    echo $OUTPUT->footer();
}
