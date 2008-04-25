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
 * @version    CVS: $Id: SoftBankTestCase.php,v 1.3 2008/04/25 17:21:43 kuboa Exp $
 * @since      File available since Release 0.31.0
 */

require_once 'PHPUnit/Framework/TestCase.php';
require_once 'Net/UserAgent/Mobile/SoftBank.php';

// {{{ Net_UserAgent_Mobile_SoftBankTestCase

/**
 * Some tests for Net_UserAgent_Mobile_SoftBank.
 *
 * @category   Networking
 * @package    Net_UserAgent_Mobile
 * @author     KUBO Atsuhiro <iteman@users.sourceforge.net>
 * @copyright  2008 KUBO Atsuhiro <iteman@users.sourceforge.net>
 * @license    http://www.php.net/license/3_0.txt  PHP License 3.0
 * @version    Release: @package_version@
 * @since      Class available since Release 0.31.0
 */
class Net_UserAgent_Mobile_SoftBankTestCase extends PHPUnit_Framework_TestCase
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

    private $_profiles = array(

                               // 3GC
                               'SoftBank/1.0/810P/PJP10/123456789012345 Browser/NetFront/3.4 Profile/MIDP-2.0 Configuration/CLDC-1.1' => array('model' => '810P'),
                               'SoftBank/1.0/805SC/SCJ001/123456789012345 Browser/NetFront/3.3 Profile/MIDP-2.0 Configuration/CLDC-1.1' => array('model' => '805SC'),
                               'SoftBank/1.0/912SH/SHJ001/123456789012345 Browser/NetFront/3.4 Profile/MIDP-2.0 Configuration/CLDC-1.1' => array('model' => '912SH'),
                               'SoftBank/1.0/813SH/SHJ001/123456789012345 Browser/NetFront/3.3 Profile/MIDP-2.0 Configuration/CLDC-1.1' => array('model' => '813SH'),
                               'SoftBank/1.0/707SC2/SCJ001/123456789012345 Browser/NetFront/3.3 Profile/MIDP-2.0 Configuration/CLDC-1.1' => array('model' => '707SC2'),
                               'SoftBank/1.0/911T/TJ001/123456789012345 Browser/NetFront/3.3 Profile/MIDP-2.0 Configuration/CLDC-1.1' => array('model' => '911T'),
                               'SoftBank/1.0/813SHe/SHJ001/123456789012345 Browser/NetFront/3.3 Profile/MIDP-2.0 Configuration/CLDC-1.1' => array('model' => '813SHe'),
                               'SoftBank/1.0/813T/TJ001/123456789012345 Browser/NetFront/3.3 Profile/MIDP-2.0 Configuration/CLDC-1.1' => array('model' => '813T'),
                               'SoftBank/1.0/708SC/SCJ001/123456789012345 Browser/NetFront/3.3' => array('model' => '708SC'),
                               'SoftBank/1.0/706N/NJ001/123456789012345 Browser/NetFront/3.3 Profile/MIDP-2.0 Configuration/CLDC-1.1' => array('model' => '706N'),
                               'SoftBank/1.0/706P/PJP10/123456789012345 Browser/Teleca-Browser/3.1 Profile/MIDP-2.0 Configuration/CLDC-1.1' => array('model' => '706P'),
                               'SoftBank/1.0/812T/TJ001/123456789012345 Browser/NetFront/3.3 Profile/MIDP-2.0 Configuration/CLDC-1.1' => array('model' => '812T'),
                               'SoftBank/1.0/812SH/SHJ001/123456789012345 Browser/NetFront/3.3 Profile/MIDP-2.0 Configuration/CLDC-1.1' => array('model' => '812SH'),
                               'SoftBank/1.0/709SC/SCJ001/123456789012345 Browser/NetFront/3.3 Profile/MIDP-2.0 Configuration/CLDC-1.1' => array('model' => '709SC'),
                               'SoftBank/1.0/707SC/SCJ001/123456789012345 Browser/NetFront/3.3 Profile/MIDP-2.0 Configuration/CLDC-1.1' => array('model' => '707SC'),
                               'SoftBank/1.0/911SH/SHJ001/123456789012345 Browser/NetFront/3.3 Profile/MIDP-2.0 Configuration/CLDC-1.1' => array('model' => '911SH'),
                               'SoftBank/1.0/910SH/SHJ001/123456789012345 Browser/NetFront/3.3 Profile/MIDP-2.0 Configuration/CLDC-1.1' => array('model' => '910SH'),
                               'SoftBank/1.0/910T/TJ001/123456789012345 Browser/NetFront/3.3 Profile/MIDP-2.0 Configuration/CLDC-1.1' => array('model' => '910T'),
                               'SoftBank/1.0/810SH/SHJ001/123456789012345 Browser/NetFront/3.3 Profile/MIDP-2.0 Configuration/CLDC-1.1' => array('model' => '810SH'),
                               'SoftBank/1.0/811SH/SHJ001/123456789012345 Browser/NetFront/3.3 Profile/MIDP-2.0 Configuration/CLDC-1.1' => array('model' => '811SH'),
                               'SoftBank/1.0/810T/TJ001/123456789012345 Browser/NetFront/3.3 Profile/MIDP-2.0 Configuration/CLDC-1.1' => array('model' => '810T'),
                               'SoftBank/1.0/811T/TJ001/123456789012345 Browser/NetFront/3.3 Profile/MIDP-2.0 Configuration/CLDC-1.1' => array('model' => '811T'),
                               'SoftBank/1.0/705N/NJ001/123456789012345 Browser/NetFront/3.3 Profile/MIDP-2.0 Configuration/CLDC-1.1' => array('model' => '705N'),
                               'SoftBank/1.0/705NK/NKJ001/123456789012345 Series60/3.0 NokiaN73/3.0650 Profile/MIDP-2.0 Configuration/CLDC-1.1' => array('model' => '705NK'),
                               'SoftBank/1.0/705P/PJP10/123456789012345 Browser/Teleca-Browser/3.1 Profile/MIDP-2.0 Configuration/CLDC-1.1' => array('model' => '705P'),
                               'SoftBank/1.0/705SC/SCJ001/123456789012345 Browser/NetFront/3.3 Profile/MIDP-2.0 Configuration/CLDC-1.1' => array('model' => '705SC'),
                               'SoftBank/1.0/706SC/SCJ001/123456789012345 Browser/NetFront/3.3 Profile/MIDP-2.0 Configuration/CLDC-1.1' => array('model' => '706SC'),
                               'SoftBank/1.0/810P/PJP10 Browser/NetFront/3.4 Profile/MIDP-2.0 Configuration/CLDC-1.1' => array('model' => '810P'),
                               'SoftBank/1.0/805SC/SCJ001 Browser/NetFront/3.3 Profile/MIDP-2.0 Configuration/CLDC-1.1' => array('model' => '805SC'),
                               'SoftBank/1.0/912SH/SHJ001 Browser/NetFront/3.4 Profile/MIDP-2.0 Configuration/CLDC-1.1' => array('model' => '912SH'),
                               'SoftBank/1.0/813SH/SHJ001 Browser/NetFront/3.3 Profile/MIDP-2.0 Configuration/CLDC-1.1' => array('model' => '813SH'),
                               'SoftBank/1.0/707SC2/SCJ001 Browser/NetFront/3.3 Profile/MIDP-2.0 Configuration/CLDC-1.1' => array('model' => '707SC2'),
                               'SoftBank/1.0/911T/TJ001 Browser/NetFront/3.3 Profile/MIDP-2.0 Configuration/CLDC-1.1' => array('model' => '911T'),
                               'SoftBank/1.0/813SHe/SHJ001 Browser/NetFront/3.3 Profile/MIDP-2.0 Configuration/CLDC-1.1' => array('model' => '813SHe'),
                               'SoftBank/1.0/813T/TJ001 Browser/NetFront/3.3 Profile/MIDP-2.0 Configuration/CLDC-1.1' => array('model' => '813T'),
                               'SoftBank/1.0/708SC/SCJ001 Browser/NetFront/3.3' => array('model' => '708SC'),
                               'SoftBank/1.0/706N/NJ001 Browser/NetFront/3.3 Profile/MIDP-2.0 Configuration/CLDC-1.1' => array('model' => '706N'),
                               'SoftBank/1.0/706P/PJP10 Browser/Teleca-Browser/3.1 Profile/MIDP-2.0 Configuration/CLDC-1.1' => array('model' => '706P'),
                               'SoftBank/1.0/812T/TJ001 Browser/NetFront/3.3 Profile/MIDP-2.0 Configuration/CLDC-1.1' => array('model' => '812T'),
                               'SoftBank/1.0/812SH/SHJ001 Browser/NetFront/3.3 Profile/MIDP-2.0 Configuration/CLDC-1.1' => array('model' => '812SH'),
                               'SoftBank/1.0/709SC/SCJ001 Browser/NetFront/3.3 Profile/MIDP-2.0 Configuration/CLDC-1.1' => array('model' => '709SC'),
                               'SoftBank/1.0/707SC/SCJ001 Browser/NetFront/3.3 Profile/MIDP-2.0 Configuration/CLDC-1.1' => array('model' => '707SC'),
                               'SoftBank/1.0/911SH/SHJ001 Browser/NetFront/3.3 Profile/MIDP-2.0 Configuration/CLDC-1.1' => array('model' => '911SH'),
                               'SoftBank/1.0/910SH/SHJ001 Browser/NetFront/3.3 Profile/MIDP-2.0 Configuration/CLDC-1.1' => array('model' => '910SH'),
                               'SoftBank/1.0/910T/TJ001 Browser/NetFront/3.3 Profile/MIDP-2.0 Configuration/CLDC-1.1' => array('model' => '910T'),
                               'SoftBank/1.0/810SH/SHJ001 Browser/NetFront/3.3 Profile/MIDP-2.0 Configuration/CLDC-1.1' => array('model' => '810SH'),
                               'SoftBank/1.0/811SH/SHJ001 Browser/NetFront/3.3 Profile/MIDP-2.0 Configuration/CLDC-1.1' => array('model' => '811SH'),
                               'SoftBank/1.0/810T/TJ001 Browser/NetFront/3.3 Profile/MIDP-2.0 Configuration/CLDC-1.1' => array('model' => '810T'),
                               'SoftBank/1.0/811T/TJ001 Browser/NetFront/3.3 Profile/MIDP-2.0 Configuration/CLDC-1.1' => array('model' => '811T'),
                               'SoftBank/1.0/705N/NJ001 Browser/NetFront/3.3 Profile/MIDP-2.0 Configuration/CLDC-1.1' => array('model' => '705N'),
                               'SoftBank/1.0/705NK/NKJ001 Series60/3.0 NokiaN73/3.0650 Profile/MIDP-2.0 Configuration/CLDC-1.1' => array('model' => '705NK'),
                               'SoftBank/1.0/705P/PJP10 Browser/Teleca-Browser/3.1 Profile/MIDP-2.0 Configuration/CLDC-1.1' => array('model' => '705P'),
                               'SoftBank/1.0/705SC/SCJ001 Browser/NetFront/3.3 Profile/MIDP-2.0 Configuration/CLDC-1.1' => array('model' => '705SC'),
                               'SoftBank/1.0/706SC/SCJ001 Browser/NetFront/3.3 Profile/MIDP-2.0 Configuration/CLDC-1.1' => array('model' => '706SC')
                               );

    /**#@-*/

    /**#@+
     * @access public
     */

    public function testShouldDetectUserAgentsAsSoftbank()
    {
        reset($this->_profiles);
        while (list($userAgent, $profile) = each($this->_profiles)) {
            $agent = new Net_UserAgent_Mobile_SoftBank($userAgent);

            $this->assertFalse($agent->isDoCoMo());
            $this->assertFalse($agent->isEZweb());
            $this->assertTrue($agent->isSoftBank());
            $this->assertFalse($agent->isWillcom());
            $this->assertFalse($agent->isNonMobile());

            $this->assertTrue($agent->isJPhone());
            $this->assertTrue($agent->isVodafone());
        }
    }

    public function testShouldProvideTheModelNameOfAUserAgent()
    {
        reset($this->_profiles);
        while (list($userAgent, $profile) = each($this->_profiles)) {
            $agent = new Net_UserAgent_Mobile_SoftBank($userAgent);

            $this->assertEquals($profile['model'], $agent->getModel());
        }
    }

    public function testShouldSupportSemulator()
    {
        $agent = new Net_UserAgent_Mobile_SoftBank('Semulator/1.0/813T/TJ001/SN123456789012345 Browser/NetFront/3.3 Profile/MIDP-2.0 Configuration/CLDC-1.1');

        $this->assertTrue($agent->isSoftBank());
        $this->assertEquals('813T', $agent->getModel());
        $this->assertTrue($agent->isPacketCompliant());
        $this->assertEquals('123456789012345', $agent->getSerialNumber());
        $this->assertEquals('J001', $agent->getVendorVersion());
        $this->assertEquals(array('Profile' => 'MIDP-2.0',
                                  'Configuration' => 'CLDC-1.1'),
                            $agent->getJavaInfo()
                            );
        $this->assertTrue($agent->isType3GC());
        $this->assertEquals('Semulator', $agent->getName());
        $this->assertEquals('1.0', $agent->getVersion());

        $agent = new Net_UserAgent_Mobile_SoftBank('Vemulator/1.0/V902SH/SHJ001/SN123456789012345');

        $this->assertTrue($agent->isSoftBank());
        $this->assertEquals('V902SH', $agent->getModel());
        $this->assertTrue($agent->isPacketCompliant());
        $this->assertEquals('123456789012345', $agent->getSerialNumber());
        $this->assertEquals('J001', $agent->getVendorVersion());
        $this->assertTrue($agent->isType3GC());
        $this->assertEquals('Vemulator', $agent->getName());
        $this->assertEquals('1.0', $agent->getVersion());
    }

    public function testShouldSupportVemulator()
    {
        $agent = new Net_UserAgent_Mobile_SoftBank('Vemulator/1.0/V902SH/SHJ001/SN123456789012345');

        $this->assertTrue($agent->isSoftBank());
        $this->assertEquals('V902SH', $agent->getModel());
        $this->assertTrue($agent->isPacketCompliant());
        $this->assertEquals('123456789012345', $agent->getSerialNumber());
        $this->assertEquals('J001', $agent->getVendorVersion());
        $this->assertTrue($agent->isType3GC());
        $this->assertEquals('Vemulator', $agent->getName());
        $this->assertEquals('1.0', $agent->getVersion());
    }

    public function testShouldSupportJemulator()
    {
        $agent = new Net_UserAgent_Mobile_SoftBank('J-EMULATOR/4.3/V602SH/SN12345678901');

        $this->assertTrue($agent->isSoftBank());
        $this->assertEquals('V602SH', $agent->getModel());
        $this->assertFalse($agent->isPacketCompliant());
        $this->assertEquals('12345678901', $agent->getSerialNumber());
        $this->assertTrue($agent->isTypeP());
        $this->assertEquals('J-EMULATOR', $agent->getName());
        $this->assertEquals('4.3', $agent->getVersion());
    }

    /**
     * @since Method available since Release 1.0.0
     */
    public function testShouldProvideTheUidOfASubscriber()
    {
        $uid = '1234567890123456';
        $_SERVER['HTTP_X_JPHONE_UID'] = $uid;
        $agent = new Net_UserAgent_Mobile_SoftBank('SoftBank/1.0/706SC/SCJ001 Browser/NetFront/3.3 Profile/MIDP-2.0 Configuration/CLDC-1.1');

        $this->assertEquals($uid, $agent->getUID());

        unset($_SERVER['HTTP_X_JPHONE_UID']);
        $agent = new Net_UserAgent_Mobile_SoftBank('SoftBank/1.0/706SC/SCJ001 Browser/NetFront/3.3 Profile/MIDP-2.0 Configuration/CLDC-1.1');

        $this->assertNull($agent->getUID());
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
