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
// $Id: Vodafone.php,v 1.1 2004/09/25 12:17:42 kuboa Exp $
//

require_once(dirname(__FILE__) . '/Common.php');
require_once(dirname(__FILE__) . '/Display.php');

/**
 * Vodafone implementation
 *
 * Net_UserAgent_Mobile_Vodafone is a subclass of
 * {@link Net_UserAgent_Mobile_Common}, which implements Vodafone user agents.
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
 * @version  $Revision: 1.1 $
 * @see      Net_UserAgent_Mobile_Common
 * @link     http://developers.vodafone.jp/dp/tool_dl/web/useragent.php
 * @link     http://developers.vodafone.jp/dp/tool_dl/web/position.php
 */
class Net_UserAgent_Mobile_Vodafone extends Net_UserAgent_Mobile_Common
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
    var $_packetCompliant = false;

    /**
     * terminal unique serial number
     * @var string
     */
    var $_serialNumber = null;

    /**
     * vendor code like 'SH'
     * @var string
     */
    var $_vendor = '';

    /**
     * vendor version like '0001a'
     * @var string
     */
    var $_vendorVersion = null;

    /**
     * Java profiles
     * @var array
     */
    var $_javaInfo = array();

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
    // {{{ isVodafone()

    /**
     * returns true
     *
     * @return boolean
     */
    function isVodafone()
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
            $this->_packetCompliant = true;
            @list($this->name, $this->version, $this->_model,
                 $serialNumber) = explode('/', $agent[0]);
            if ($serialNumber) {
                if (!preg_match('/^SN(.+)/', $serialNumber,
                                $matches)
                    ) {
                    return $this->noMatch();
                }
                $this->_serialNumber = $matches[1];
            }
            list($this->_vendor, $this->_vendorVersion) =
                explode('/', $agent[1]);
            for ($i = 2; $i < $count; ++$i) {
                list($key, $value) = explode('/', $agent[$i]);
                $this->_javaInfo[$key] = $value;
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
        return $this->_packetCompliant;
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
        return $this->_serialNumber;
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
        return $this->_vendorVersion;
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
        return $this->_javaInfo;
    }

    // }}}
    // {{{ getCarrierShortName()

    /**
     * returns the short name of the carrier
     *
     * @return string
     */
    function getCarrierShortName()
    {
        return 'V';
    }

    // }}}
    // {{{ getCarrierLongName()

    /**
     * returns the long name of the carrier
     *
     * @return string
     */
    function getCarrierLongName()
    {
        return 'Vodafone';
    }

    // }}}
    // {{{ isTypeC()

    /**
     * returns true if the type is C
     *
     * @return boolean
     */
    function isTypeC()
    {
        if (preg_match('/^3\./', $this->version)) {
            return true;
        }

        if (preg_match('/^2\./', $this->version)) {
            return true;
        }

        return false;
    }

    // }}}
    // {{{ isTypeP()

    /**
     * returns true if the type is P
     *
     * @return boolean
     */
    function isTypeP()
    {
        if (preg_match('/^4\./', $this->version)) {
            return true;
        }

        return false;
    }

    // }}}
    // {{{ isTypeW()

    /**
     * returns true if the type is W
     *
     * @return boolean
     */
    function isTypeW()
    {
        if (preg_match('/^5\./', $this->version)) {
            return true;
        }

        return false;
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
