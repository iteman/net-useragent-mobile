<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */

/**
 * PHP versions 5
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
 * @copyright  2008 KUBO Atsuhiro <iteman@users.sourceforge.net>
 * @license    http://www.php.net/license/3_0.txt  PHP License 3.0
 * @version    CVS: $Id: AllTests.php,v 1.5 2008/05/10 11:17:58 kuboa Exp $
 * @since      File available since Release 0.31.0
 */

if (!defined('PHPUnit_MAIN_METHOD')) {
    define('PHPUnit_MAIN_METHOD', 'Net_UserAgent_Mobile_AllTests::main');
}

require_once 'PHPUnit/Framework/TestSuite.php';
require_once 'PHPUnit/TextUI/TestRunner.php';

chdir(dirname(__FILE__) . '/..');

require_once dirname(__FILE__) . '/MobileTestCase.php';
require_once dirname(__FILE__) . '/Mobile/AllTests.php';

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
        $suite->addTest(Mobile_AllTests::suite());
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
