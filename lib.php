<?php
/**
 * Detalhes da versão do plugin.
 *
 * Define a versão atual do plugin, nome e versão mínima do Moodle necessária.
 *
 * @package     local_firstplugin
 * @author      Rodrigo M. Araujo
 * @copyright   2023 Instituto Infnet {@link http://infnet.edu.br}
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
require_once(__DIR__ . '/db/access.php');

function local_firstplugin_before_footer() {

  $message = "Teste do primeiro plugin";
  // $type = \core\output\notification::NOTIFY_SUCCESS;
  // // Add a notification of some kind.
  // \core\notification::add($message, $type);
    
}
