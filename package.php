<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */

/**
 * PHP versions 4 and 5
 *
 * Copyright (c) 2003-2009 KUBO Atsuhiro <kubo@iteman.jp>,
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 *
 *     * Redistributions of source code must retain the above copyright
 *       notice, this list of conditions and the following disclaimer.
 *     * Redistributions in binary form must reproduce the above copyright
 *       notice, this list of conditions and the following disclaimer in the
 *       documentation and/or other materials provided with the distribution.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
 * AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
 * IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE
 * ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE
 * LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF
 * SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
 * INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN
 * CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
 * ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * @category   Networking
 * @package    Net_UserAgent_Mobile
 * @author     KUBO Atsuhiro <kubo@iteman.jp>
 * @copyright  2003-2009 KUBO Atsuhiro <kubo@iteman.jp>
 * @license    http://www.opensource.org/licenses/bsd-license.php  New BSD License
 * @version    CVS: $Id: package.php,v 1.10 2009/05/10 17:29:55 kuboa Exp $
 * @since      File available since Release 0.30.0
 */

require_once 'PEAR/PackageFileManager2.php';
require_once 'PEAR.php';

PEAR::staticPushErrorHandling(PEAR_ERROR_CALLBACK, create_function('$error', 'var_dump($error); exit();'));

$releaseVersion = '1.0.0RC2';
$releaseStability = 'beta';
$apiVersion = '0.30.0';
$apiStability = 'beta';
$notes = 'A new release of Net_UserAgent_Mobile is now available.

What\'s New in Net_UserAgent_Mobile 1.0.0RC2

 * Updated DoCoMo Support: A lot of new models since the release 1.0.0RC1 have been supported.
 * A few defect fixes: A few defect (including #13905, #15776) have been fixed.
 * License Change: The license has been changed from PHP License 3.0 to New BSD License (2-clause).

See the following release notes for details.

Enhancements
============

- Added Support for the new models of docomo. (since the release 1.0.0RC1) Thanks to Sach Jobb <sach@77hz.jp> for the patch.

Defect Fixes
============

- Added @ to all list() calls to avoid unwanted warnings for invalid user agent string. (Net_UserAgent_Mobile_DoCoMo, Net_UserAgent_Mobile_EZweb, Net_UserAgent_Mobile_SoftBank) (Bug #13905)
- Fixed a defect that caused "Strict standards" errors to be raised. (Bug #15776)
- Fixed a defect that caused a broken error object to be returned even though the specified error mode is not PEAR_ERROR_RETURN. (Net_UserAgent_Mobile)';

$package = new PEAR_PackageFileManager2();
$package->setOptions(array('filelistgenerator' => 'cvs',
                           'changelogoldtonew' => false,
                           'simpleoutput'      => true,
                           'baseinstalldir'    => '/',
                           'packagefile'       => 'package.xml',
                           'packagedirectory'  => '.',
                           'dir_roles'         => array('docs' => 'doc',
                                                        'tests' => 'test'),
                           'ignore'            => array('package.php'))
                     );

$package->setPackage('Net_UserAgent_Mobile');
$package->setPackageType('php');
$package->setSummary('HTTP mobile user agent string parser');
$package->setDescription("Net_UserAgent_Mobile parses HTTP_USER_AGENT strings of (mainly Japanese) mobile HTTP user agents. It'll be useful in page dispatching by user agents.
This package was ported from Perl's HTTP::MobileAgent.
See http://search.cpan.org/search?mode=module&query=HTTP-MobileAgent");
$package->setChannel('pear.php.net');
$package->setLicense('New BSD License',
                     'http://www.opensource.org/licenses/bsd-license.php'
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
$package->addMaintainer('lead', 'kuboa', 'KUBO Atsuhiro', 'kubo@iteman.jp');
$package->addGlobalReplacement('package-info', '@package_version@', 'version');
$package->addInstallAs('Mobile.php', 'Net/UserAgent/Mobile.php');
$package->addInstallAs('Mobile/Common.php', 'Net/UserAgent/Mobile/Common.php');
$package->addInstallAs('Mobile/Display.php', 'Net/UserAgent/Mobile/Display.php');
$package->addInstallAs('Mobile/DoCoMo.php', 'Net/UserAgent/Mobile/DoCoMo.php');
$package->addInstallAs('Mobile/DoCoMo/ScreenInfo.php', 'Net/UserAgent/Mobile/DoCoMo/ScreenInfo.php');
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
