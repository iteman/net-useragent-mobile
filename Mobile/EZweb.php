<?php
//
// +----------------------------------------------------------------------+
// | PHP Version 4                                                        |
// +----------------------------------------------------------------------+
// | Copyright (c) 1997-2003 The PHP Group                                |
// +----------------------------------------------------------------------+
// | This source file is subject to version 2.0 of the PHP license,       |
// | that is bundled with this package in the file LICENSE, and is        |
// | available at through the world-wide-web at                           |
// | http://www.php.net/license/2_02.txt.                                 |
// | If you did not receive a copy of the PHP license and are unable to   |
// | obtain it through the world-wide-web, please send a note to          |
// | license@php.net so we can mail you a copy immediately.               |
// +----------------------------------------------------------------------+
// | Authors: KUBO Atsuhiro <kubo@isite.co.jp>                            |
// +----------------------------------------------------------------------+
//
// $Id: EZweb.php,v 1.4 2003/03/19 15:03:42 kuboa Exp $
//
// SYNOPSIS:
// require_once('Net/UserAgent/Mobile.php');
//
// $_SERVER['HTTP_USER_AGENT'] = 'UP.Browser/3.01-HI02 UP.Link/3.2.1.2';
// $agent = &Net_UserAgent_Mobile::factory();
//
// printf("Name: %s\n", $agent->getName()); // 'UP.Browser'
// printf("Version: %s\n", $agent->getVersion()); // 3.01
// printf("DeviceID: %s\n", $agent->getDeviceID()); // 'HI02'
// printf("Server: %s\n", $agent->getServer()); // 'UP.Link/3.2.1.2'
//
// e.g.) 'UP.Browser/3.01-HI02 UP.Link/3.2.1.2 (Google WAP Proxy/1.0)'
// printf("Comment: %s\n", $agent->getComment()); // 'Google WAP Proxy/1.0'
//
// e.g.) 'KDDI-TS21 UP.Browser/6.0.2.276 (GUI) MMP/1.1'
// if ($agent->isXHTMLCompliant()) {
//     print "XHTML compliant!\n"; // true
// }
//

require_once('Net/UserAgent/Mobile/Common.php');
require_once('Net/UserAgent/Mobile/Display.php');

/**
 * EZweb implementation
 *
 * Net_UserAgent_Mobile_EZweb is a subclass of Net_UserAgent_Mobile, which
 * implements EZweb (WAP1.0/2.0) user agents.
 *
 * @package Net_UserAgent_Mobile
 * @version $Revision: 1.4 $
 * @author  KUBO Atsuhiro <kubo@isite.co.jp>
 * @access  public
 * @see     Net_UserAgent_Mobile_Common()
 * @see     http://www.au.kddi.com/ezfactory/tec/spec/4_4.html
 * @see     http://www.au.kddi.com/ezfactory/tec/spec/new_win/ezkishu.html
 */
class Net_UserAgent_Mobile_EZweb extends Net_UserAgent_Mobile_Common
{

    // {{{ properties

    /**
     * device ID like 'TS21'
     * @var string
     * @access private
     */
    var $_device_id = '';

    /**
     * server string like 'UP.Link/3.2.1.2'
     * @var string
     * @access private
     */
    var $_server_name = '';

    /**
     * comment like 'Google WAP Proxy/1.0'
     * @var string
     * @access private
     */
    var $_comment = null;

    /**
     * whether it's XHTML compliant or not
     * @var boolean
     * @access private
     */
    var $_xhtml_compliant = false;

    // }}}
    // {{{ isEZweb()

    /**
     * returns true
     *
     * @return boolean
     * @access public
     */
    function isEZweb()
    {
        return true;
    }

    // }}}
    // {{{ parse()

    /**
     * parse HTTP_USER_AGENT string
     *
     * @access public
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
     * create a new Net_UserAgent_Mobile_Display class instance
     *
     * @return object Net_UserAgent_Mobile_Display
     * @access public
     * @see Net_UserAgent_Mobile_Display()
     */
    function makeDisplay()
    {
        list($width, $height) =
            explode(',', $this->getHeader('x-up-devcap-screenpixels'));
        $screen_depth =
            explode(',', $this->getHeader('x-up-devcap-screendepth'));
        $depth = $screen_depth[0];
        $color =
            $this->getHeader('x-up-devcap-iscolor') === '1' ? true : false;
        return new Net_UserAgent_Mobile_Display(array(
                                                      'width'  => $width,
                                                      'height' => $height,
                                                      'color'  => $color,
                                                      'depth'  => pow(2, $depth)
                                                      )
                                                );
    }

    // }}}
    // {{{ getDeviceID()

    /**
     * returns device ID like 'TS21'
     *
     * @return string
     * @access public
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
     * @access public
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
     * @access public
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
     * @access public
     */
    function isXHTMLCompliant()
    {
        return $this->_xhtml_compliant;
    }
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
