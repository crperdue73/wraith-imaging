<?php
/**
 * Generates a new token on ajax request.
 *
 * PHP Version 5
 *
 * @category NewToken
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://github.com/crperdue73/wraith-imaging/
 */
/**
 * Generates a new token on ajax request.
 *
 * PHP Version 5
 *
 * @category NewToken
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://github.com/crperdue73/wraith-imaging/
 */
/**
 * Lambda to create random data.
 *
 * @return string
 */
require '../commons/base.inc.php';
return print json_encode(
    base64_encode(
        WRAITHCore::createSecToken()
    )
);
