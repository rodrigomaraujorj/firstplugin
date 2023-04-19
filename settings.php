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
 * Página de configurações do plugin.
 *
 * Inclui as páginas do plugin no menu lateral de administração do site, dentro
 * do item Plugins/Plugins locais.
 *
 * @package    local_firstplugin
 * @copyright  2023 Instituto Infnet {@link http://infnet.edu.br}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
defined('MOODLE_INTERNAL') || die;
// die("Loading settings");
if (has_capability('local/firstplugin:page1', context_system::instance())) {
    //die("has capabilites");
    $ADMIN->add('localplugins', new admin_category('firstplugin', get_string('menu1', 'local_firstplugin')));
    $ADMIN->add(
        'firstplugin',
        new admin_externalpage(
            'local_firstplugin_page1',
            get_string('courses', 'local_firstplugin'),
            new moodle_url('/local/firstplugin/page1.php')
        )
    );
    $ADMIN->add(
        'firstplugin',
        new admin_externalpage(
            'local_firstplugin_linkbulkvisibility',
            get_string('links_visibility', 'local_firstplugin'),
            new moodle_url('/local/firstplugin/monthyearselector.php')
        )
    );
}