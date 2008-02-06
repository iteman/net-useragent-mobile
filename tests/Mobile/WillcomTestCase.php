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
 * @version    CVS: $Id: WillcomTestCase.php,v 1.1 2008/02/06 03:24:33 kuboa Exp $
 * @since      File available since Release 0.31.0
 */

require_once 'PHPUnit/Framework/TestCase.php';
require_once 'Net/UserAgent/Mobile/Willcom.php';

// {{{ Net_UserAgent_Mobile_WillcomTestCase

/**
 * Some tests for Net_UserAgent_Mobile_Willcom.
 *
 * @category   Networking
 * @package    Net_UserAgent_Mobile
 * @author     KUBO Atsuhiro <iteman@users.sourceforge.net>
 * @copyright  2008 KUBO Atsuhiro <iteman@users.sourceforge.net>
 * @license    http://www.php.net/license/3_0.txt  PHP License 3.0
 * @version    Release: @package_version@
 * @since      Class available since Release 0.31.0
 */
class Net_UserAgent_Mobile_WillcomTestCase extends PHPUnit_Framework_TestCase
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

    private $_profiles = array('Mozilla/3.0(DDIPOCKET;JRC/AH-J3001V,AH-J3002V/1.0/0100/c50)CNF/2.0' => array('model' => 'AH-J3001V,AH-J3002V'),
                               'Mozilla/3.0(DDIPOCKET;KYOCERA/AH-K3001V/1.7.2.70.000000/0.1/C100) Opera 7.0' => array('model' => 'AH-K3001V'),
                               'Mozilla/3.0(DDIPOCKET;JRC/AH-J3003S/1.0/0100/c50)CNF/2.0' => array('model' => 'AH-J3003S'),
                               'Mozilla/3.0(WILLCOM;SANYO/WX310SA/2;1/1/C128) NetFront/3.3,61.198.142.127' => array('model' => 'WX310SA')
                               );

    /**#@-*/

    /**#@+
     * @access public
     */

    public function testShouldDetectUserAgentsAsWillcom()
    {
        reset($this->_profiles);
        while (list($userAgent, $profile) = each($this->_profiles)) {
            $agent = new Net_UserAgent_Mobile_Willcom($userAgent);

            $this->assertFalse($agent->isDoCoMo());
            $this->assertFalse($agent->isEZweb());
            $this->assertFalse($agent->isSoftBank());
            $this->assertTrue($agent->isWillcom());
            $this->assertFalse($agent->isNonMobile());
        }
    }

    public function testShouldProvideTheModelNameOfAUserAgent()
    {
        reset($this->_profiles);
        while (list($userAgent, $profile) = each($this->_profiles)) {
            $agent = new Net_UserAgent_Mobile_Willcom($userAgent);

            $this->assertEquals($profile['model'], $agent->getModel());
        }
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
