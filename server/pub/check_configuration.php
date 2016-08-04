<?php
//ini_set('display_errors', false);
require_once(dirname(__FILE__)."/../config.php");
require_once(dirname(__FILE__)."/../config.ldap.php");
require_once("Net/LDAP2.php"); /* PEAR Net_LDAP2 API */

define('LDAPBIND_USER','appplatserv');
define('LDAPBIND_PASS','qwpo%&vb');

function is_cli()
{
  return !isset($_SERVER['HTTP_HOST']);
}

/**
 * Checks a configuration.
 */
function check($boolean, $message, $help = '', $fatal = false)
{
  echo $boolean ? "  OK        " : sprintf("[[%s]] ", $fatal ? ' ERROR ' : 'WARNING');
  echo sprintf("$message%s\n", $boolean ? '' : ': FAILED');

  if (!$boolean)
  {
    echo "            *** $help ***\n";
    if ($fatal)
    {
      die("You must fix this problem before resuming the check.\n");
    }
  }
}

/**
 * Gets the php.ini path used by the current PHP interpretor.
 *
 * @return string the php.ini path
 */
function get_ini_path()
{
  if ($path = get_cfg_var('cfg_file_path'))
  {
    return $path;
  }

  return 'WARNING: not using a php.ini file';
}

if (!is_cli())
{
  echo '<html><head><meta name="robots" content="noindex" /></head><body><pre>';
}

echo "******************************************************\n";
echo "*                                                    *\n";
echo "*  services platform server side requirements check  *\n";
echo "*                                                    *\n";
echo "******************************************************\n\n";

echo sprintf("php.ini used by PHP: %s\n\n", get_ini_path());

if (is_cli())
{
  echo "** WARNING **\n";
  echo "*  The PHP CLI can use a different php.ini file\n";
  echo "*  than the one used with your web server.\n";
  if ('\\' == DIRECTORY_SEPARATOR)
  {
    echo "*  (especially on the Windows platform)\n";
  }
  echo "*  If this is the case, please launch this\n";
  echo "*  utility from your web server.\n";
  echo "** WARNING **\n";
}

// mandatory
echo "\n** Mandatory requirements **\n\n";
check(version_compare(phpversion(), '5.2.4', '>='), 'PHP version is at least 5.2.4', 'Current version is '.phpversion(), true);

check(class_exists('Net_LDAP2'),'PEAR Net_LDAP2 API is installed', 'Check if the PEAR and Net_LDAP2 API are correctly installed and configured', false);

check(function_exists('mysqli_connect'), 'MySQL module is installed', 'Install the MySQL module (need to recompile php)', false);

check(function_exists('ldap_connect'), 'LDAP module is installed', 'Install the LDAP module (need to recompile php)', false);

check(class_exists('SoapServer'), 'SOAP module is installed', 'Install the SOAP module (need to recompile php)', false);

check(function_exists('mcrypt_encrypt'), 'MCrypt module is installed', 'Install the mcrypt module (need to recompile php)');

check(function_exists('mb_check_encoding'), 'Multibyte String module is installed', 'Install the mbstring module (need to recompile php)');

check(ini_get('short_open_tag'), 'php.ini has short_open_tag set to on', 'Set it to on in php.ini', false);

check(function_exists('simplexml_load_string'), 'SimpleXML module is installed', 'Install the simplexml module (need to recompile php)', false);

check(@fsockopen($_SERVER['HTTP_HOST'],80), 'The server can resolve it\'s own domain host', 'Check if the DNS server is correctly configured', false);

$BirLdapHandler = ldap_connect($LDAPSERVERS["bireme.org"]["SERVER_LDAP"], $LDAPSERVERS["bireme.org"]["SERVER_PORT"]);
check(@ldap_bind($BirLdapHandler, $LDAPSERVERS["bireme.org"]["BINDID_LDAP"], $LDAPSERVERS["bireme.org"]["BINDPW_LDAP"]), 'Connection estabilished to Bireme LDAP server', 'Check the system\'s configuration', false);

$ExtLdapHandler = ldap_connect($LDAPSERVERS["public"]["SERVER_LDAP"], $LDAPSERVERS["public"]["SERVER_PORT"]);
check(@ldap_bind($ExtLdapHandler, $LDAPSERVERS["public"]["BINDID_LDAP"], $LDAPSERVERS["public"]["BINDPW_LDAP"]), 'Connection estabilished to External Users LDAP server', 'Check the system\'s configuration', false);

// warnings
echo "\n** Optional checks **\n\n";

check(class_exists('DomDocument'), 'PHP-XML module is installed', 'Install the php-xml module', false);
//check(class_exists('XSLTProcessor'), 'XSL module is installed', 'Install the XSL module (recommended)', false);

check(function_exists('mb_strlen'), 'The mb_strlen() function is available', 'Install mb_strlen() function', false);

check(function_exists('iconv'), 'The iconv() function is available', 'Install iconv() function', false);

check(function_exists('utf8_decode'), 'The utf8_decode() is available', 'Install utf8_decode() function', false);

check(ini_get('magic_quotes_gpc'), 'php.ini has magic_quotes_gpc set to on', 'Set it to on in php.ini', false);

check(!ini_get('register_globals'), 'php.ini has register_globals set to off', 'Set it to off in php.ini', false);

check(!ini_get('session.auto_start'), 'php.ini has session.auto_start set to off', 'Set it to off in php.ini', false);

check(!ini_get('display_errors'), 'php.ini has display_errors set to off', 'Set it to off in php.ini', false);

check(is_writable(LOG_FILE), 'Apache has write privileges on the log file', 'Set write permission and ownership to Apache\'s user on the file ' . LOG_FILE . ' (recommended)', false);

check(!is_writable(dirname(__FILE__)."/../config.php"), 'The App configuration file is read-only', 'Set read-only permission and ownership to Apache\'s user on the file ' . APP_BASEDIR ."/config.php" . ' (recommended)', false);

check(!is_writable(dirname(__FILE__)."/../config.ldap.php"), 'The LDAP configuration file is read-only', 'Set read-only permission and ownership to Apache\'s user on the file ' . APP_BASEDIR ."/config.ldap.php" . ' (recommended)', false);

check(!is_writable(dirname(__FILE__)."/../instances_code.php"), 'The instances code configuration file is read-only', 'Set read-only permission and ownership to Apache\'s user on the file ' . APP_BASEDIR ."/instances_code.php" . ' (recommended)', false);


if (!is_cli())
{
  echo '</pre></body></html>';
}
