<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */

/**
 * PHP versions 4 and 5
 *
 * LICENSE: This source file is subject to version 3.0 of the PHP license
 * that is available through the world-wide-web at the following URI:
 * http://www.php.net/license/3_0.txt.  If you did not receive a copy of
 * the PHP License and are unable to obtain it through the web, please
 * send a note to license@php.net so we can mail you a copy immediately.
 *
 * @category   Networking
 * @package    Net_UserAgent_Mobile
 * @author     KUBO Atsuhiro <iteman@users.sourceforge.net>
 * @copyright  2003-2007 KUBO Atsuhiro <iteman@users.sourceforge.net>
 * @license    http://www.php.net/license/3_0.txt  PHP License 3.0
 * @version    CVS: $Id: package.php,v 1.3 2008/01/30 12:32:05 kuboa Exp $
 * @since      File available since Release 0.30.0
 */

require_once 'PEAR/PackageFileManager2.php';

PEAR::staticPushErrorHandling(PEAR_ERROR_CALLBACK, create_function('$error', 'var_dump($error); exit();'));

$version = '0.30.0';
$apiVersion = '0.30.0';
$releaseStability = 'beta';
$notes = 'A new release of Net_UserAgent_Mobile is now available.

This release includes a fix for the bug #9891 "dirname(__FILE__) should not be used for include/require". This can be replaced a driver with a user enhancement driver in the normal way.

And also this release includes other fixes and supports many new models. See the following release notes for details.

## Defect Fixes ##

- Changed to not use dirname(__FILE__) for include/require. (Bug #9891)

### Net_UserAgent_Mobile_DoCoMo ###

- Changed so that an FOMA Card ID (iccXXXXXXXXXXXXXXXXXXXX) without 20 digit alphanumeric can be parsed successfully. Then getCardID() method will simply return null. (Bug #8584)
- Fixed the HTML version for 882i from 5.0 to 6.0.

### Net_UserAgent_Mobile_Vodafone ###

- Removed a duplicate statement. (Bug #8806)
- Fixed model version matching to get appropriate model version as JP10 for 705P/PJP10.

## Enhancements ##

### Net_UserAgent_Mobile_DoCoMo, Net_UserAgent_Mobile_DoCoMoDisplayMap ###

- Added support for L601i, M702iS, M702iG, N902iL, N601i, D800iDS, P703imyu, N903i, D903i, F903i, SO9603i, D903iTV, F903iX, P903iTV, N703iD, F703i, P703i, D703i, SH703i, N703imyu, SO703i.';

$package = new PEAR_PackageFileManager2();
$package->setOptions(array('filelistgenerator' => 'cvs',
                           'changelogoldtonew' => false,
                           'simpleoutput'      => true,
                           'baseinstalldir'    => '/',
                           'packagefile'       => 'package2.xml',
                           'packagedirectory'  => '.',
                           'dir_roles'         => array('tests' => 'test'))
                     );

$package->setPackage('Net_UserAgent_Mobile');
$package->setPackageType('php');
$package->setSummary('HTTP mobile user agent string parser');
$package->setDescription("Net_UserAgent_Mobile parses HTTP_USER_AGENT strings of (mainly Japanese) mobile HTTP user agents. It'll be useful in page dispatching by user agents.
This package was ported from Perl's HTTP::MobileAgent.
See http://search.cpan.org/search?mode=module&query=HTTP-MobileAgent");
$package->setChannel('pear.php.net');
$package->setLicense('PHP License',
                     'http://www.opensource.org/licenses/php.php'
                     );
$package->setAPIVersion($apiVersion);
$package->setAPIStability('beta');
$package->setReleaseVersion($version);
$package->setReleaseStability($releaseStability);
$package->setNotes($notes);
$package->setPhpDep('4.3.0');
$package->setPearinstallerDep('1.4.3');
$package->addPackageDepWithChannel('required', 'PEAR', 'pear.php.net', '1.4.3');
$package->addMaintainer('lead', 'kuboa', 'KUBO Atsuhiro', 'iteman@users.sourceforge.net');
$package->addIgnore(array('package.php', 'package2.xml'));
$package->addGlobalReplacement('package-info', '@package_version@', 'version');
$package->addInstallAs('Mobile.php', 'Net/UserAgent/Mobile.php');
$package->addInstallAs('Mobile/AirHPhone.php', 'Net/UserAgent/Mobile/AirHPhone.php');
$package->addInstallAs('Mobile/Common.php', 'Net/UserAgent/Mobile/Common.php');
$package->addInstallAs('Mobile/Display.php', 'Net/UserAgent/Mobile/Display.php');
$package->addInstallAs('Mobile/DoCoMo.php', 'Net/UserAgent/Mobile/DoCoMo.php');
$package->addInstallAs('Mobile/DoCoMoDisplayMap.php', 'Net/UserAgent/Mobile/DoCoMoDisplayMap.php');
$package->addInstallAs('Mobile/EZweb.php', 'Net/UserAgent/Mobile/EZweb.php');
$package->addInstallAs('Mobile/NonMobile.php', 'Net/UserAgent/Mobile/NonMobile.php');
$package->addInstallAs('Mobile/Request.php', 'Net/UserAgent/Mobile/Request.php');
$package->addInstallAs('Mobile/Vodafone.php', 'Net/UserAgent/Mobile/Vodafone.php');

$package->generateContents();

if (array_key_exists(1, $_SERVER['argv'])
    && $_SERVER['argv'][1] == 'make'
    ) {
    $package->writePackageFile();
} else {
    $package->debugPackageFile();
}

exit();

/*
 * Local Variables:
 * mode: php
 * coding: iso-8859-1
 * tab-width: 4
 * c-basic-offset: 4
 * c-hanging-comment-ender-p: nil
 * indent-tabs-mode: nil
 * End:
 */
