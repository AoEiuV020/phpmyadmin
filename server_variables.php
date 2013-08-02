<?php
/* vim: set expandtab sw=4 ts=4 sts=4: */
/**
 * Server variables
 *
 * @package PhpMyAdmin
 */

require_once 'libraries/common.inc.php';
require_once 'libraries/server_variables.lib.php';

$response = PMA_Response::getInstance();
$header   = $response->getHeader();
$scripts  = $header->getScripts();
$scripts->addFile('server_variables.js');

/**
 * Does the common work
 */
require 'libraries/server_common.inc.php';

/**
 * Required to display documentation links
 */
require 'libraries/server_variables_doc.php';

/**
 * Ajax request
 */

if (isset($_REQUEST['ajax_request']) && $_REQUEST['ajax_request'] == true) {
    if (isset($_REQUEST['type'])) {
        if ($_REQUEST['type'] === 'getval') {
            PMA_getAjaxReturnForGetVal();
        } else if ($_REQUEST['type'] === 'setval') {
            PMA_getAjaxReturnForSetVal();
        }
        exit;
    }
}

/**
 * Displays the sub-page heading
 */
$doc_link = PMA_Util::showMySQLDocu(
    'server_system_variables', 'server_system_variables'
);
$response->addHtml(PMA_getHtmlForSubPageHeader('variables', $doc_link));

/**
 * Link templates
 */
$response->addHtml(PMA_getHtmlForLinkTemplates());

/**
 * Displays the page
 */
$response->addHtml(PMA_getHtmlForServerVariables());

exit;

?>
