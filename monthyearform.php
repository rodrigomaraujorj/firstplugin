<?php 

// monthyearform.php
require_once($CFG->libdir . '/formslib.php');

class monthyear_form extends moodleform {
    protected function definition() {
        $mform = $this->_form;

        $months = array(
            '01' => 'Janeiro',
            '02' => 'Fevereiro',
            '03' => 'Março',
            '04' => 'Abril',
            '05' => 'Maio',
            '06' => 'Junho',
            '07' => 'Julho',
            '08' => 'Agosto',
            '09' => 'Setembro',
            '10' => 'Outubro',
            '11' => 'Novembro',
            '12' => 'Dezembro'
        );        
        
        // Add select for years
        $years = array(
            '2022' => '2022',
            '2023' => '2023'
        );
        
        $mform->addElement('select', 'month', get_string('month', 'local_firstplugin'), $months);
        $mform->addElement('select', 'year', get_string('year', 'local_firstplugin'), $years);
        $mform->addElement('submit', 'submitbutton', get_string('submit', 'local_firstplugin'));
    }
}
