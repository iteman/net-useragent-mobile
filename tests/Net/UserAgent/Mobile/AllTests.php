<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */

/**
 * PHP version 5
 *
 * Copyright (c) 2008-2009 KUBO Atsuhiro <kubo@iteman.jp>,
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
 * @copyright  2008-2009 KUBO Atsuhiro <kubo@iteman.jp>
 * @license    http://www.opensource.org/licenses/bsd-license.php  New BSD License
 * @version    Release: @package_version@
 * @since      File available since Release 0.31.0
 */

if (!defined('PHPUnit_MAIN_METHOD')) {
    define('PHPUnit_MAIN_METHOD', 'Net_UserAgent_Mobile_AllTests::main');
}

require_once 'PHPUnit/Framework/TestSuite.php';
require_once 'PHPUnit/TextUI/TestRunner.php';
require_once 'System.php';

require_once 'Net/UserAgent/MobileTestCase.php';
require_once 'Net/UserAgent/Mobile/DoCoMoTestCase.php';
require_once 'Net/UserAgent/Mobile/EZwebTestCase.php';
require_once 'Net/UserAgent/Mobile/SoftBankTestCase.php';
require_once 'Net/UserAgent/Mobile/WillcomTestCase.php';
require_once 'Net/UserAgent/Mobile/NonMobileTestCase.php';

class Net_UserAgent_Mobile_AllTests
{
    public static function main()
    {
        PHPUnit_TextUI_TestRunner::run(self::suite());
    }
    public static function suite()
    {
        $suite = new PHPUnit_Framework_TestSuite('Net_UserAgent_Mobile package');
        $suite->addTestSuite('Net_UserAgent_MobileTestCase');
        $suite->addTestSuite('Net_UserAgent_Mobile_DoCoMoTestCase');
        $suite->addTestSuite('Net_UserAgent_Mobile_EZwebTestCase');
        $suite->addTestSuite('Net_UserAgent_Mobile_SoftBankTestCase');
        $suite->addTestSuite('Net_UserAgent_Mobile_WillcomTestCase');
        $suite->addTestSuite('Net_UserAgent_Mobile_NonMobileTestCase');
        return $suite;
    }
}

if (PHPUnit_MAIN_METHOD == 'Net_UserAgent_Mobile_AllTests::main') {
    Net_UserAgent_Mobile_AllTests::main();
}

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
