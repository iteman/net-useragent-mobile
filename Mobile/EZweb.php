<?php
//
// +----------------------------------------------------------------------+
// | PHP Version 4                                                        |
// +----------------------------------------------------------------------+
// | Copyright (c) 1997-2003 The PHP Group                                |
// +----------------------------------------------------------------------+
// | This source file is subject to version 3.0 of the PHP license,       |
// | that is bundled with this package in the file LICENSE, and is        |
// | available through the world-wide-web at the following url:           |
// | http://www.php.net/license/3_0.txt.                                  |
// | If you did not receive a copy of the PHP license and are unable to   |
// | obtain it through the world-wide-web, please send a note to          |
// | license@php.net so we can mail you a copy immediately.               |
// +----------------------------------------------------------------------+
// | Authors: KUBO Atsuhiro <kubo@isite.co.jp>                            |
// +----------------------------------------------------------------------+
//
// $Id: EZweb.php,v 1.9 2003/12/15 06:21:44 kuboa Exp $
//

require_once(dirname(__FILE__) . '/Common.php');
require_once(dirname(__FILE__) . '/Display.php');

/**
 * EZweb implementation
 *
 * Net_UserAgent_Mobile_EZweb is a subclass of
 * {@link Net_UserAgent_Mobile_Common}, which implements EZweb (WAP1.0/2.0)
 * user agents.
 *
 * SYNOPSIS:
 * <code>
 * require_once('Net/UserAgent/Mobile.php');
 *
 * $_SERVER['HTTP_USER_AGENT'] = 'UP.Browser/3.01-HI02 UP.Link/3.2.1.2';
 * $agent = &Net_UserAgent_Mobile::factory();
 *
 * printf("Name: %s\n", $agent->getName()); // 'UP.Browser'
 * printf("Version: %s\n", $agent->getVersion()); // 3.01
 * printf("DeviceID: %s\n", $agent->getDeviceID()); // 'HI02'
 * printf("Server: %s\n", $agent->getServer()); // 'UP.Link/3.2.1.2'
 *
 * e.g.) 'UP.Browser/3.01-HI02 UP.Link/3.2.1.2 (Google WAP Proxy/1.0)'
 * printf("Comment: %s\n", $agent->getComment()); // 'Google WAP Proxy/1.0'
 *
 * e.g.) 'KDDI-TS21 UP.Browser/6.0.2.276 (GUI) MMP/1.1'
 * if ($agent->isXHTMLCompliant()) {
 *     print "XHTML compliant!\n"; // true
 * }
 * </code>
 *
 * @package  Net_UserAgent_Mobile
 * @category Networking
 * @author   KUBO Atsuhiro <kubo@isite.co.jp>
 * @access   public
 * @version  $Revision: 1.9 $
 * @see      Net_UserAgent_Mobile_Common
 * @link     http://www.au.kddi.com/ezfactory/tec/spec/4_4.html
 * @link     http://www.au.kddi.com/ezfactory/tec/spec/new_win/ezkishu.html
 */
class Net_UserAgent_Mobile_EZweb extends Net_UserAgent_Mobile_Common
{

    // {{{ properties

    /**#@+
     * @access private
     */

    /**
     * name of the model like 'P502i'
     * @var string
     */
    var $_model = '';

    /**
     * device ID like 'TS21'
     * @var string
     */
    var $_device_id = '';

    /**
     * server string like 'UP.Link/3.2.1.2'
     * @var string
     */
    var $_server_name = '';

    /**
     * comment like 'Google WAP Proxy/1.0'
     * @var string
     */
    var $_comment = null;

    /**
     * whether it's XHTML compliant or not
     * @var boolean
     */
    var $_xhtml_compliant = false;

    /**#@-*/

    /**#@+
     * @access public
     */

    // }}}
    // {{{ isEZweb()

    /**
     * returns true
     *
     * @return boolean
     */
    function isEZweb()
    {
        return true;
    }

    // }}}
    // {{{ parse()

    /**
     * parse HTTP_USER_AGENT string
     */
    function parse()
    {
        $agent = $this->getUserAgent();

        if (preg_match('/^KDDI-(.*)/', $agent, $matches)) {

            // KDDI-TS21 UP.Browser/6.0.2.276 (GUI) MMP/1.1
            $this->_xhtml_compliant = true;
            list($this->_device_id, $browser, $opt, $this->_server_name) =
                explode(' ', $matches[1], 4);
            list($this->name, $version) = explode('/', $browser);
            $this->version = "$version $opt";
        } else {

            // UP.Browser/3.01-HI01 UP.Link/3.4.5.2
            @list($browser, $this->_server_name, $comment) =
                explode(' ', $agent, 3);
            list($this->name, $software) = explode('/', $browser);
            list($this->version, $this->_device_id) =
                explode('-', $software);
            if ($comment) {
                $this->_comment =
                    preg_replace('/^\((.*)\)$/', '$1', $comment);
            }
        }
    }

    // }}}
    // {{{ makeDisplay()

    /**
     * create a new {@link Net_UserAgent_Mobile_Display} class instance
     *
     * @return object a newly created {@link Net_UserAgent_Mobile_Display}
     *     object
     * @see Net_UserAgent_Mobile_Display
     */
    function makeDisplay()
    {
        @list($width, $height) =
            explode(',', $this->getHeader('x-up-devcap-screenpixels'));
        $screen_depth =
            explode(',', $this->getHeader('x-up-devcap-screendepth'));
        $depth = $screen_depth[0] ? pow(2, (integer)$screen_depth[0]) : 0;
        $color =
            $this->getHeader('x-up-devcap-iscolor') === '1' ? true : false;
        return new Net_UserAgent_Mobile_Display(array(
                                                      'width'  => $width,
                                                      'height' => $height,
                                                      'color'  => $color,
                                                      'depth'  => $depth
                                                      )
                                                );
    }

    // }}}
    // {{{ getModel()

    /**
     * returns name of the model like 'A5501T'
     *
     * @return string
     */
    function getModel()
    {
        static $device_id_to_model;
        if (!isset($device_id_to_model)) {
            $device_id_to_model = array(
                                        // W (excluding W01K)
                                        'KC31' => 'W11K',
                                        'HI31' => 'W11H',

                                        // INFOBAR, A5000/C5000
                                        'ST22' => 'INFOBAR',
                                        'SA26' => 'A5503SA',
                                        'TS26' => 'A5501T',
                                        'SN25' => 'A5404S',
                                        'CA24' => 'A5403CA',
                                        'SN24' => 'A5402S',
                                        'CA23' => 'A5401CA', // including A5401CA II
                                        'ST21' => 'A5306ST',
                                        'KC22' => 'A5305K',
                                        'TS24' => 'A5304T',
                                        'HI24' => 'A5303H II',
                                        'HI23' => 'A5303H',
                                        'CA22' => 'A5302CA',
                                        'TS23' => 'A5301T',
                                        'TS21' => 'C5001T',

                                        // A1400/A1300/A1100
                                        'KC23' => 'A1401K',
                                        'TS25' => 'A1304T',
                                        'SA25' => 'A1303SA',
                                        'SA24' => 'A1302SA',
                                        'SN23' => 'A1301S',
                                        'SN22' => 'A1101S',

                                        // A1000/C1000/C400/C300/C200
                                        'SA22' => 'A3015SA',
                                        'SN21' => 'A3014S',
                                        'TS22' => 'A3013T',
                                        'CA21' => 'A3012CA',
                                        'SA21' => 'A3011SA',
                                        'MA21' => 'C3003P',
                                        'KC21' => 'C3002K',
                                        'HI21' => 'C3001H',
                                        'ST14' => 'A1014ST',
                                        'KC15' => 'A1013K',
                                        'KC14' => 'A1012K',
                                        'ST13' => 'A1011ST',
                                        'SN17' => 'C1002S',
                                        'SY15' => 'C1001SA',
                                        'CA14' => 'C452CA',
                                        'HI14' => 'C451H',
                                        'TS14' => 'C415T',
                                        'KC13' => 'C414K',
                                        'SN15' => 'C413S',
                                        'SN16' => 'C413S',
                                        'SY14' => 'C412SA',
                                        'ST12' => 'C411ST',
                                        'TS13' => 'C410T',
                                        'CA13' => 'C409CA',
                                        'MA13' => 'C408P',
                                        'HI13' => 'C407H',
                                        'SN13' => 'C406S',
                                        'SY13' => 'C405SA',
                                        'SN12' => 'C404S',
                                        'SN14' => 'C404S',
                                        'ST11' => 'C403ST',
                                        'DN11' => 'C402DE',
                                        'SY12' => 'C401SA',
                                        'KC12' => 'C313K',
                                        'CA12' => 'C311CA',
                                        'TS12' => 'C310T',
                                        'HI12' => 'C309H',
                                        'MA11' => 'C308P',
                                        'MA12' => 'C308P',
                                        'KC11' => 'C307K',
                                        'SN11' => 'C305S',
                                        'SY11' => 'C304SA',
                                        'CA11' => 'C303CA',
                                        'HI11' => 'C302H',
                                        'TS11' => 'C301T',
                                        'DN01' => 'C202DE',
                                        'HI01' => 'C201H',
                                        'HI02' => 'C201H',

                                        // Tu-Ka
                                        'KCTD' => 'TS40',
                                        'TST8' => 'TT32',
                                        'TST7' => 'TT31',
                                        'KCTC' => 'TK31',
                                        'SYT4' => 'TS31',
                                        'KCTB' => 'TK23',
                                        'KCTA' => 'TK22',
                                        'TST6' => 'TT22',
                                        'KCT9' => 'TK21',
                                        'TST5' => 'TT21',
                                        'TST4' => 'TT11',
                                        'KCT8' => 'TK12',
                                        'SYT3' => 'TS11',
                                        'KCT7' => 'TK11',
                                        'MIT1' => 'TD11',
                                        'MAT3' => 'TP11',
                                        'KCT6' => 'TK05',
                                        'TST3' => 'TT03',
                                        'KCT5' => 'TK04',
                                        'KCT4' => 'TK03',
                                        'SYT2' => 'TS02',
                                        'MAT1' => 'TP01',
                                        'MAT2' => 'TP01',
                                        'TST2' => 'TT02',
                                        'KCT2' => 'TK02',
                                        'KCT3' => 'TK02',
                                        'KCT1' => 'TK01',
                                        'TST1' => 'TT01',
                                        'SYT1' => 'TS01'
                                        );
        }

        return @$device_id_to_model[$this->_device_id];
    }

    // }}}
    // {{{ getDeviceID()

    /**
     * returns device ID like 'TS21'
     *
     * @return string
     */
    function getDeviceID()
    {
        return $this->_device_id;
    }

    // }}}
    // {{{ getServer()

    /**
     * returns device ID like 'TS21'
     *
     * @return string
     */
    function getServer()
    {
        return $this->_server_name;
    }

    // }}}
    // {{{ getComment()

    /**
     * returns comment like 'Google WAP Proxy/1.0'. returns null if nothinng.
     *
     * @return boolean
     */
    function getComment()
    {
        return $this->_comment;
    }

    // }}}
    // {{{ isXHTMLCompliant()

    /**
     * returns whether it's XHTML compliant or not
     *
     * @return boolean
     */
    function isXHTMLCompliant()
    {
        return $this->_xhtml_compliant;
    }

    /**#@-*/
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
?>
