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
 * @version    CVS: $Id: package.php,v 1.11 2009/05/25 07:06:30 kuboa Exp $
 * @since      File available since Release 0.30.0
 */

require_once 'PEAR/PackageFileManager2.php';
require_once 'PEAR.php';

PEAR::staticPushErrorHandling(PEAR_ERROR_CALLBACK, create_function('$error', 'var_dump($error); exit();'));

$releaseVersion = '1.0.0RC3';
$releaseStability = 'beta';
$apiVersion = '0.30.0';
$apiStability = 'beta';
$notes = 'A new release of Net_UserAgent_Mobile is now available.

What\'s New in Net_UserAgent_Mobile 1.0.0RC3

 * Updated docomo Support: Three new models, P-07A, N-06A, and N-08A since the release 1.0.0RC2 have been supported. These models have the i-mode browser 2.0, can be distinguished by newly added getBrowserVersion().

See the following release notes for details.

Enhancements
============

- Changed the class declaration so as not to inherit from PEAR. (Net_UserAgent_Mobile, Net_UserAgent_Mobile_Common)
- Added support for the new models of docomo. (since the release 1.0.0RC2)
- Added getBrowserVersion() to get the i-mode browser version.';

$package = new PEAR_PackageFileManager2();
$package->setOptions(array('filelistgenerator' => 'cvs',
                           'changelogoldtonew' => false,
                           'simpleoutput'      => true,
                           'baseinstalldir'    => '/',
                           'packagefile'       => 'package.xml',
                           'packagedirectory'  => '.',
                           'dir_roles'         => array('Net' => 'php',
                                                        'docs' => 'doc',
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
