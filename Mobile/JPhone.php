<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */
// +----------------------------------------------------------------------+
// | PHP version 4                                                        |
// +----------------------------------------------------------------------+
// | Copyright (c) 1997-2004 The PHP Group                                |
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
// $Id: JPhone.php,v 1.7 2004/02/08 11:58:38 kuboa Exp $
//

require_once(dirname(__FILE__) . '/Common.php');
require_once(dirname(__FILE__) . '/Display.php');

/**
 * J-PHONE implementation
 *
 * Net_UserAgent_Mobile_JPhone is a subclass of
 * {@link Net_UserAgent_Mobile_Common}, which implements J-PHONE user agents.
 *
 * SYNOPSIS:
 * <code>
 * require_once('Net/UserAgent/Mobile.php');
 *
 * $_SERVER['HTTP_USER_AGENT'] = 'J-PHONE/2.0/J-DN02';
 * $agent = &Net_UserAgent_Mobile::factory();
 *
 * printf("Name: %s\n", $agent->getName()); // 'J-PHONE'
 * printf("Version: %s\n", $agent->getVersion()); // 2.0
 * printf("Model: %s\n", $agent->getModel()); // 'J-DN02'
 * if ($agent->isPacketCompliant()) {
 *     print "Packet is compliant.\n"; // false
 * }
 *
 * // only availabe in Java compliant
 * // e.g.) 'J-PHONE/4.0/J-SH51/SNXXXXXXXXX SH/0001a Profile/MIDP-1.0 Configuration/CLDC-1.0 Ext-Profile/JSCL-1.1.0'
 * printf("Serial: %s\n", $agent->getSerialNumber()); // XXXXXXXXX
 * printf("Vendor: %s\n", $agent->getVendor()); // 'SH'
 * printf("Vendor Version: %s\n", $agent->getVendorVersion()); // '0001a'
 *
 * $info = $agent->getJavaInfo();  // array
 * foreach ($info as $key => $value) {
 *     print "$key: $value\n";
 * }
 * </code>
 *
 * @package  Net_UserAgent_Mobile
 * @category Networking
 * @author   KUBO Atsuhiro <kubo@isite.co.jp>
 * @access   public
 * @version  $Revision: 1.7 $
 * @see      Net_UserAgent_Mobile_Common
 * @link     http://www.dp.j-phone.com/jsky/user.html
 * @link     http://www.dp.j-phone.com/jsky/position.html
 */
class Net_UserAgent_Mobile_JPhone extends Net_UserAgent_Mobile_Common
{

    // {{{ properties

    /**#@+
     * @access private
     */

    /**
     * name of the model like 'J-DN02'
     * @var string
     */
    var $_model = '';

    /**
     * whether the agent is packet connection complicant or not
     * @var boolean
     */
    var $_packet_compliant = false;

    /**
     * terminal unique serial number
     * @var string
     */
    var $_serial_number = null;

    /**
     * vendor code like 'SH'
     * @var string
     */
    var $_vendor = '';

    /**
     * vendor version like '0001a'
     * @var string
     */
    var $_vendor_version = null;

    /**
     * Java profiles
     * @var array
     */
    var $_java_info = array();

    /**#@-*/

    /**#@+
     * @access public
     */

    // }}}
    // {{{ isJPhone()

    /**
     * returns true
     *
     * @return boolean
     */
    function isJPhone()
    {
        return true;
    }

    // }}}
    // {{{ parse()

    /**
     * parse HTTP_USER_AGENT string
     *
     * @return mixed void, or a PEAR error object on error
     */
    function parse()
    {
        $agent = explode(' ', $this->getUserAgent());
        $count = count($agent);

        if ($count > 1) {

            // J-PHONE/4.0/J-SH51/SNJSHA3029293 SH/0001aa Profile/MIDP-1.0 Configuration/CLDC-1.0 Ext-Profile/JSCL-1.1.0
            $this->_packet_compliant = true;
            @list($this->name, $this->version, $this->_model,
                 $serial_number) = explode('/', $agent[0]);
            if ($serial_number) {
                if (!preg_match('/^SN(.+)/', $serial_number,
                                $matches)
                    ) {
                    return $this->noMatch();
                }
                $this->_serial_number = $matches[1];
            }
            list($this->_vendor, $this->_vendor_version) =
                explode('/', $agent[1]);
            for ($i = 2; $i < $count; ++$i) {
                list($key, $value) = explode('/', $agent[$i]);
                $this->_java_info[$key] = $value;
            }
        } else {

            // J-PHONE/2.0/J-DN02
            @list($this->name, $this->version, $model) =
                explode('/', $agent[0]);
            $this->_model  = (string)$model;
            if ($this->_model) {
                preg_match('/J-([A-Z]+)/', $this->_model, $matches);
                $this->_vendor = $matches[1];
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
            explode('*', $this->getHeader('x-jphone-display'));
        $color = false;
        $depth = 0;
        if ($color_string = $this->getHeader('x-jphone-color')) {
            preg_match('/^([CG])(\d+)$/', $color_string, $matches);
            $color = $matches[1] === 'C' ? true : false;
            $depth = $matches[2];
        }
        return new Net_UserAgent_Mobile_Display(array(
                                                      'width'  => $width,
                                                      'height' => $height,
                                                      'depth'  => $depth,
                                                      'color'  => $color)
                                                );
    }

    // }}}
    // {{{ getModel()

    /**
     * returns name of the model like 'J-DN02'
     *
     * @return string
     */
    function getModel()
    {
        return $this->_model;
    }

    // }}}
    // {{{ isPacketCompliant()

    /**
     * returns whether the agent is packet connection complicant or not
     *
     * @return boolean
     */
    function isPacketCompliant()
    {
        return $this->_packet_compliant;
    }

    // }}}
    // {{{ getSerialNumber()

    /**
     * return terminal unique serial number. returns null if user forbids to
     * send his/her serial number.
     *
     * @return string
     */
    function getSerialNumber()
    {
        return $this->_serial_number;
    }

    // }}}
    // {{{ getVendor()

    /**
     * returns vendor code like 'SH'
     *
     * @return string
     */
    function getVendor()
    {
        return $this->_vendor;
    }

    // }}}
    // {{{ getVendorVersion()

    /**
     * returns vendor version like '0001a'. returns null if unknown.
     *
     * @return string
     */
    function getVendorVersion()
    {
        return $this->_vendor_version;
    }

    // }}}
    // {{{ getJavaInfo()

    /**
     * returns array of Java profiles
     *
     * Array structure is something like:
     *
     * - 'Profile'       => 'MIDP-1.0',
     * - 'Configuration' => 'CLDC-1.0',
     * - 'Ext-Profile'   => 'JSCL-1.1.0'
     *
     * @return array
     */
    function getJavaInfo()
    {
        return $this->_java_info;
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
