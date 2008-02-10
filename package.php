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
 * @copyright  2003-2008 KUBO Atsuhiro <iteman@users.sourceforge.net>
 * @license    http://www.php.net/license/3_0.txt  PHP License 3.0
 * @version    CVS: $Id: package.php,v 1.4 2008/02/10 11:46:17 kuboa Exp $
 * @since      File available since Release 0.30.0
 */

require_once 'PEAR/PackageFileManager2.php';

PEAR::staticPushErrorHandling(PEAR_ERROR_CALLBACK, create_function('$error', 'var_dump($error); exit();'));

$releaseVersion = '0.31.0';
$releaseStability = 'beta';
$apiVersion = '0.30.0';
$apiStability = 'beta';
$notes = 'A new release of Net_UserAgent_Mobile is now available.

What\'s New in Net_UserAgent_Mobile 0.31.0

 * Updated DoCoMo Support: A lot of new models since the release 0.30.0 have been supported. Thanks to yosuke for providing a patch.
 * Some useful interfaces by the Net_UserAgent_Mobile class: The new methods isMobile() and isDoCoMo()/isEZweb()/isSoftBank()/isWillcom() can be used directly to check whether or not the user agent is mobile/DoCoMo/EZweb/SoftBank/Willcom.
 * Enhanced parsers: The Net_UserAgent_Mobile class and the SoftBank parser support SoftBank emulators. And the DoCoMo parser supports Yahoo!\'s Web Crawler. Thanks to Hiroaki Kawai for feature requests and providing patches.

See the following release notes for details.

Enhancements
============

- Added support for a lot of models. (Net_UserAgent_Mobile_DoCoMo, Net_UserAgent_Mobile_DoCoMoDisplayMap)
- Changed the behavior of singleton() so that it creates a cache for each user-agent. (Net_UserAgent_Mobile)
- Added the method isSoftBank() to check whether an agent is SoftBank or not. (Net_UserAgent_Mobile_Common)
- Renamed the class name from Net_UserAgent_Mobile_Vodafone to Net_UserAgent_Mobile_SoftBank.
- Added the methods isMobile() and isDoCoMo()/isEZweb()/isSoftBank()/isWillcom() to check whether or not the user agent is mobile/DoCoMo/EZweb/SoftBank/Willcom by a given user agent string or by the HTTP header in an environment. (Net_UserAgent_Mobile)
- Added the method isWillcom() to check whether an agent is Willcom or not. (Net_UserAgent_Mobile_Common)
- Renamed the class name from Net_UserAgent_Mobile_AirHPhone to Net_UserAgent_Mobile_Willcom.
- Added $_model/$_rawModel properties and getModel()/getRawModel() methods. (Net_UserAgent_Mobile_Common)
- Removed getDeviceID(). (Net_UserAgent_Mobile_NonMobile)
- Added support some emulators. (Request #12877) (Net_UserAgent_Mobile, Net_UserAgent_Mobile_SoftBank)
- Added support for Yahoo!\'s Web Crawler. (Request #13061) (Net_UserAgent_Mobile_DoCoMo)

Defect Fixes
============

- Fixed the model name from N506ISII to N506IS2. (Net_UserAgent_Mobile_DoCoMoDisplayMap)
- Fixed a defect that caused supported HTML versions for some user agents that support HTML version 6.0 or greater to be detected as 5.0. (Net_UserAgent_Mobile_DoCoMo)
- Fixed invalid width and height of some models. (Net_UserAgent_Mobile_DoCoMoDisplayMap)';

$package = new PEAR_PackageFileManager2();
$package->setOptions(array('filelistgenerator' => 'cvs',
                           'changelogoldtonew' => false,
                           'simpleoutput'      => true,
                           'baseinstalldir'    => '/',
                           'packagefile'       => 'package.xml',
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
$package->setAPIStability($apiStability);
$package->setReleaseVersion($releaseVersion);
$package->setReleaseStability($releaseStability);
$package->setNotes($notes);
$package->setPhpDep('4.3.0');
$package->setPearinstallerDep('1.4.3');
$package->addPackageDepWithChannel('required', 'PEAR', 'pear.php.net', '1.4.3');
$package->addExtensionDep('required', 'pcre');
$package->addExtensionDep('optional', 'xml');
$package->addMaintainer('lead', 'kuboa', 'KUBO Atsuhiro', 'iteman@users.sourceforge.net');
$package->addIgnore(array('package.php', 'package.xml'));
$package->addGlobalReplacement('package-info', '@package_version@', 'version');
$package->addInstallAs('Mobile.php', 'Net/UserAgent/Mobile.php');
$package->addInstallAs('Mobile/Common.php', 'Net/UserAgent/Mobile/Common.php');
$package->addInstallAs('Mobile/Display.php', 'Net/UserAgent/Mobile/Display.php');
$package->addInstallAs('Mobile/DoCoMo.php', 'Net/UserAgent/Mobile/DoCoMo.php');
$package->addInstallAs('Mobile/DoCoMoDisplayMap.php', 'Net/UserAgent/Mobile/DoCoMoDisplayMap.php');
$package->addInstallAs('Mobile/EZweb.php', 'Net/UserAgent/Mobile/EZweb.php');
$package->addInstallAs('Mobile/NonMobile.php', 'Net/UserAgent/Mobile/NonMobile.php');
$package->addInstallAs('Mobile/SoftBank.php', 'Net/UserAgent/Mobile/SoftBank.php');
$package->addInstallAs('Mobile/Willcom.php', 'Net/UserAgent/Mobile/Willcom.php');

$package->generateContents();

if (array_key_exists(1, $_SERVER['argv']) && $_SERVER['argv'][1] == 'make') {
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
