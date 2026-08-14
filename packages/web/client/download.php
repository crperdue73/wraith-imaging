<?php
/**
 * Downloads wraith client and utilitie files.
 *
 * PHP version 5
 *
 * @category Download
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://wraithproject.org
 */
/**
 * Downloads wraith client and utilitie files.
 *
 * @category Download
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://wraithproject.org
 */
/**
 * If new client is clicked, prep variable as the new client MSI.
 */
if (isset($_REQUEST['newclient'])) {
    $filename = 'WRAITHService.msi';
}
/**
 * If wraith prep is clicked, prep variable as the wraithprep file.
 */
if (isset($_REQUEST['wraithprep'])) {
    $filename = 'WraithPrep.zip';
}
/**
 * If wraith crypt is clicked, prep variable as the wraithcrypt file.
 */
if (isset($_REQUEST['wraithcrypt'])) {
    $filename = 'WRAITHCrypt.zip';
}
/**
 * If smart installer is clicked, prep variable as smartinstaller file.
 */
if (isset($_REQUEST['smartinstaller'])) {
    $filename = 'SmartInstaller.exe';
}
/**
 * If the file doesn't exist exit the script.
 */
if (!file_exists($filename)) {
    exit;
}
/**
 * Only use the base name in the case something else set the filename.
 */
$file = basename($filename);
/**
 * Prep file download information headers.
 */
header("X-Sendfile: $filename");
header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header("Content-Disposition: attachment; filename=$file");
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
/**
 * If we cannot open the file exit the script.
 */
if (($fh = fopen($file, 'rb')) === false) {
    exit;
}
/**
 * Read in the file so we can distribute it.
 * This method is also, essentially, size proof.
 */
while (feof($fh) === false) {
    /**
     * If we cannot read the line break the loop.
     */
    if (($line = fread($fh, 4092)) === false) {
        break;
    }
    /**
     * Output the line in 4092 bit chunks.
     */
    echo $line;
    /**
     * Ensure it's pushed to the user.
     */
    flush();
}
/**
 * Close the opened file.
 */
fclose($fh);
exit;
