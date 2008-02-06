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
 * @version    CVS: $Id: MobileTestCase.php,v 1.5 2008/02/06 02:03:13 kuboa Exp $
 * @since      File available since Release 0.31.0
 */

require_once 'PHPUnit/Framework/TestCase.php';
require_once 'Net/UserAgent/Mobile.php';

// {{{ Net_UserAgent_MobileTestCase

/**
 * Some tests for Net_UserAgent_Mobile.
 *
 * @category   Networking
 * @package    Net_UserAgent_Mobile
 * @author     KUBO Atsuhiro <iteman@users.sourceforge.net>
 * @copyright  2008 KUBO Atsuhiro <iteman@users.sourceforge.net>
 * @license    http://www.php.net/license/3_0.txt  PHP License 3.0
 * @version    Release: @package_version@
 * @since      Class available since Release 0.31.0
 */
class Net_UserAgent_MobileTestCase extends PHPUnit_Framework_TestCase
{

    // {{{ properties

    /**#@+
     * @access public
     */

    /**#@-*/

    /**#@+
     * @access protected
     */

    /**#@-*/

    /**#@+
     * @access private
     */

    /**#@-*/

    /**#@+
     * @access public
     */

    public function testShouldCreateAnObjectByAGivenUserAgentString()
    {
        $this->assertType('Net_UserAgent_Mobile_DoCoMo',
                          Net_UserAgent_Mobile::factory('DoCoMo/2.0 P904i(c100;TB;W24H15)')
                          );
        $this->assertType('Net_UserAgent_Mobile_EZweb',
                          Net_UserAgent_Mobile::factory('KDDI-SA31 UP.Browser/6.2.0.7.3.129 (GUI) MMP/2.0')
                          );
        $this->assertType('Net_UserAgent_Mobile_SoftBank',
                          Net_UserAgent_Mobile::factory('SoftBank/1.0/706SC/SCJ001 Browser/NetFront/3.3 Profile/MIDP-2.0 Configuration/CLDC-1.1')
                          );
        $this->assertType('Net_UserAgent_Mobile_Willcom',
                          Net_UserAgent_Mobile::factory('Mozilla/3.0(DDIPOCKET;JRC/AH-J3001V,AH-J3002V/1.0/0100/c50)CNF/2.0')
                          );
        $this->assertType('Net_UserAgent_Mobile_NonMobile',
                          Net_UserAgent_Mobile::factory('Mozilla/5.0 (Windows; U; Windows NT 5.1; ja; rv:1.8.1.4) Gecko/20070515 Firefox/2.0.0.4 GoogleToolbarFF 3.0.20070525')
                          );
    }

    public function testShouldCreateAnObjectByTheHttpHeaderInAnEnvironment()
    {
        $_SERVER['HTTP_USER_AGENT'] = 'DoCoMo/2.0 P904i(c100;TB;W24H15)';

        $this->assertType('Net_UserAgent_Mobile_DoCoMo',
                          Net_UserAgent_Mobile::factory()
                          );

        unset($_SERVER['HTTP_USER_AGENT']);
    }

    public function testShouldReturnTheExistingObjectIfItExistsBySingletonMethod()
    {
        $agent1 = Net_UserAgent_Mobile::singleton('DoCoMo/2.0 P904i(c100;TB;W24H15)');
        $agent2 = Net_UserAgent_Mobile::singleton('DoCoMo/2.0 P904i(c100;TB;W24H15)');

        $this->assertSame($agent2, $agent1);
    }

    public function testShouldCreateACacheForEachUserAgentIfUsingSingletonMethod()
    {
        $agent1 = Net_UserAgent_Mobile::singleton('DoCoMo/2.0 P904i(c100;TB;W24H15)');
        $agent2 = Net_UserAgent_Mobile::singleton('DoCoMo/1.0/D505i/c20/TB/W20H10');

        $this->assertNotSame($agent2, $agent1);
    }

    public function testShouldSupportFallbackOnNoMatch()
    {
        $ua = 'DoCoMo/1.0/SO504i/abc/TB';
        $agent = Net_UserAgent_Mobile::factory($ua);

        $this->assertTrue(Net_UserAgent_Mobile::isError($agent));
        $this->assertEquals(NET_USERAGENT_MOBILE_ERROR_NOMATCH,
                            $agent->getCode()
                            );

        $GLOBALS['_NET_USERAGENT_MOBILE_FALLBACK_ON_NOMATCH'] = true;

        $this->assertType('Net_UserAgent_Mobile_NonMobile',
                          Net_UserAgent_Mobile::factory($ua)
                          );

        unset($GLOBALS['_NET_USERAGENT_MOBILE_FALLBACK_ON_NOMATCH']);
    }

    public function testShouldTellWhetherAUserAgentIsDocomo()
    {
        $this->assertTrue(Net_UserAgent_Mobile::isDoCoMo('DoCoMo/2.0 P904i(c100;TB;W24H15)'));
    }

    public function testShouldTellWhetherAUserAgentIsEzweb()
    {
        $this->assertTrue(Net_UserAgent_Mobile::isEZweb('KDDI-SA31 UP.Browser/6.2.0.7.3.129 (GUI) MMP/2.0'));
    }

    public function testShouldTellWhetherAUserAgentIsSoftbank()
    {
        $this->assertTrue(Net_UserAgent_Mobile::isSoftBank('SoftBank/1.0/706SC/SCJ001 Browser/NetFront/3.3 Profile/MIDP-2.0 Configuration/CLDC-1.1'));
    }

    public function testShouldTellWhetherAUserAgentIsWillcom()
    {
        $this->assertTrue(Net_UserAgent_Mobile::isWillcom('Mozilla/3.0(DDIPOCKET;JRC/AH-J3001V,AH-J3002V/1.0/0100/c50)CNF/2.0'));
    }

    public function testShouldTellWhetherAUserAgentIsMobile()
    {
        $this->assertTrue(Net_UserAgent_Mobile::isMobile('DoCoMo/2.0 P904i(c100;TB;W24H15)'));
        $this->assertTrue(Net_UserAgent_Mobile::isMobile('KDDI-SA31 UP.Browser/6.2.0.7.3.129 (GUI) MMP/2.0'));
        $this->assertTrue(Net_UserAgent_Mobile::isMobile('SoftBank/1.0/706SC/SCJ001 Browser/NetFront/3.3 Profile/MIDP-2.0 Configuration/CLDC-1.1'));
        $this->assertTrue(Net_UserAgent_Mobile::isMobile('Mozilla/3.0(DDIPOCKET;JRC/AH-J3001V,AH-J3002V/1.0/0100/c50)CNF/2.0'));
        $this->assertFalse(Net_UserAgent_Mobile::isMobile('Mozilla/5.0 (Windows; U; Windows NT 5.1; ja; rv:1.8.1.4) Gecko/20070515 Firefox/2.0.0.4 GoogleToolbarFF 3.0.20070525'));
    }

    public function testShouldTellWhetherAUserAgentIsDocomoByTheHttpHeaderInAnEnvironment()
    {
        $_SERVER['HTTP_USER_AGENT'] = 'DoCoMo/2.0 P904i(c100;TB;W24H15)';

        $this->assertTrue(Net_UserAgent_Mobile::isDoCoMo());

        unset($_SERVER['HTTP_USER_AGENT']);
    }

    public function testShouldTellWhetherAUserAgentIsEzwebByTheHttpHeaderInAnEnvironment()
    {
        $_SERVER['HTTP_USER_AGENT'] = 'KDDI-SA31 UP.Browser/6.2.0.7.3.129 (GUI) MMP/2.0';

        $this->assertTrue(Net_UserAgent_Mobile::isEZweb());

        unset($_SERVER['HTTP_USER_AGENT']);
    }

    public function testShouldTellWhetherAUserAgentIsSoftbankByTheHttpHeaderInAnEnvironment()
    {
        $_SERVER['HTTP_USER_AGENT'] = 'SoftBank/1.0/706SC/SCJ001 Browser/NetFront/3.3 Profile/MIDP-2.0 Configuration/CLDC-1.1';

        $this->assertTrue(Net_UserAgent_Mobile::isSoftBank());

        unset($_SERVER['HTTP_USER_AGENT']);
    }

    public function testShouldTellWhetherAUserAgentIsWillcomByTheHttpHeaderInAnEnvironment()
    {
        $_SERVER['HTTP_USER_AGENT'] = 'Mozilla/3.0(DDIPOCKET;JRC/AH-J3001V,AH-J3002V/1.0/0100/c50)CNF/2.0';

        $this->assertTrue(Net_UserAgent_Mobile::isWillcom());

        unset($_SERVER['HTTP_USER_AGENT']);
    }

    public function testShouldTellWhetherAUserAgentIsMobileByTheHttpHeaderInAnEnvironment()
    {
        $_SERVER['HTTP_USER_AGENT'] = 'DoCoMo/2.0 P904i(c100;TB;W24H15)';

        $this->assertTrue(Net_UserAgent_Mobile::isMobile());

        unset($_SERVER['HTTP_USER_AGENT']);
    }

    /**#@-*/

    /**#@+
     * @access protected
     */

    /**#@-*/

    /**#@+
     * @access private
     */

    /**#@-*/

    // }}}
}

// }}}

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
