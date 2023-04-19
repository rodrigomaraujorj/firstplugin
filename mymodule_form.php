<?php

class mymodule_form extends moodleform {

    public function definition() {
        $mform = $this->_form;
        
        // Add select for months
        $months = array(
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
            '12' => 'December'
        );
        $mform->addElement('select', 'month', 'Select a month', $months);
        
        // Add select for years
        $years = array(
            '2022' => '2022',
            '2023' => '2023'
        );
        $mform->addElement('select', 'year', 'Select a year', $years);
        
        // Add submit button
        $mform->addElement('submit', 'submitbutton', 'Show selected date');
    }

}