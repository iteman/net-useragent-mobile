<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */

/**
 * PHP versions 4 and 5
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
 * @copyright  2003-2008 KUBO Atsuhiro <iteman@users.sourceforge.net>
 * @license    http://www.php.net/license/3_0.txt  PHP License 3.0
 * @version    CVS: $Id: Common.php,v 1.29 2009/05/10 17:06:11 kuboa Exp $
 * @since      File available since Release 0.1
 */

require_once 'Net/UserAgent/Mobile.php';

// {{{ Net_UserAgent_Mobile_Common

/**
 * Base class that is extended by each user agents implementor
 *
 * Net_UserAgent_Mobile_Common is a class for mobile user agent
 * abstraction layer on Net_UserAgent_Mobile.
 *
 * @category   Networking
 * @package    Net_UserAgent_Mobile
 * @author     KUBO Atsuhiro <iteman@users.sourceforge.net>
 * @copyright  2003-2008 KUBO Atsuhiro <iteman@users.sourceforge.net>
 * @license    http://www.php.net/license/3_0.txt  PHP License 3.0
 * @version    Release: @package_version@
 * @since      Class available since Release 0.1
 */
class Net_UserAgent_Mobile_Common extends PEAR
{

    // {{{ properties

    /**#@+
     * @access public
     */

    /**
     * User-Agent name like 'DoCoMo'
     * @var string
     */
    var $name;

    /**
     * User-Agent version number like '1.0'
     * @var string
     */
    var $version;

    /**#@-*/

    /**#@+
     * @access private
     */

    /**
     * {@link Net_UserAgent_Mobile_Display} object
     * @var object {@link Net_UserAgent_Mobile_Display}
     */
    var $_display;

    /**
     * {@link Net_UserAgent_Mobile_Error} object for error handling in the constructor
     * @var object
     **/
    var $_error;

    /**
     * The User-Agent string.
     * @var string
     * @since Property available since Release 0.31.0
     **/
    var $_userAgent;

    /**
     * The model name of the user agent.
     *
     * @var string
     * @since Property available since Release 0.31.0
     */
    var $_model;

    /**
     * The raw model name of the user agent.
     *
     * @var string
     * @since Property available since Release 0.31.0
     */
    var $_rawModel;

    /**#@-*/

    /**#@+
     * @access public
     */

    // }}}
    // {{{ constructor

    /**
     * constructor
     *
     * @param string $userAgent User-Agent string
     */
    function Net_UserAgent_Mobile_Common($userAgent)
    {
        parent::PEAR('Net_UserAgent_Mobile_Error');

        $this->_userAgent = $userAgent;

        $result = $this->parse($userAgent);
        if (Net_UserAgent_Mobile::isError($result)) {
            $this->_error = &$result;
        }
    }

    // }}}
    // {{{ getError

    /**
     * Gets a Net_UserAgent_Mobile_Error object.
     *
     * @param object {@link Net_UserAgent_Mobile_Error} object when setting an error
     * @return Net_UserAgent_Mobile_Error
     * @since Method available since Release 1.0.0RC2
     */
    function &getError()
    {
        if (is_null($this->_error)) {
            $return = null;
            return $return;
        }

        return $this->_error;
    }

    // }}}
    // {{{ getUserAgent()

    /**
     * returns User-Agent string
     *
     * @return string
     */
    function getUserAgent()
    {
        return $this->_userAgent;
    }

    // }}}
    // {{{ getHeader()

    /**
     * returns a specified HTTP header
     *
     * @param string $header
     * @return string
     */
    function getHeader($header)
    {
        return @$_SERVER[ 'HTTP_' . str_replace('-', '_', $header) ];
    }

    // }}}
    // {{{ getName()

    /**
     * returns User-Agent name like 'DoCoMo'
     *
     * @return string
     */
    function getName()
    {
        return $this->name;
    }

    // }}}
    // {{{ getDisplay()

    /**
     * returns {@link Net_UserAgent_Mobile_Disply} object
     *
     * @return Net_UserAgent_Mobile_Display
     */
    function getDisplay()
    {
        if (is_null($this->_display)) {
            $this->_display = $this->makeDisplay();
        }

        return $this->_display;
    }

    // }}}
    // {{{ getVersion()

    /**
     * returns User-Agent version number like '1.0'
     *
     * @return string
     */
    function getVersion()
    {
        return $this->version;
    }

    // }}}
    // {{{ noMatch()

    /**
     * generates a warning message for new variants
     *
     * @throws Net_UserAgent_Mobile_Error
     */
    function noMatch()
    {
        return $this->raiseError($this->getUserAgent() . ': might be new variants. Please contact the author of Net_UserAgent_Mobile!',
                                 NET_USERAGENT_MOBILE_ERROR_NOMATCH
                                 );
    }

    // }}}
    // {{{ parse()

    /**
     * Parses HTTP_USER_AGENT string.
     *
     * @param string $userAgent User-Agent string
     * @abstract
     */
    function parse($userAgent) {}

    // }}}
    // {{{ makeDisplay()

    /**
     * create a new Net_UserAgent_Mobile_Display class instance (should be
     * implemented in subclasses)
     *
     * @return Net_UserAgent_Mobile_Display
     * @abstract
     */
    function makeDisplay() {}

    // }}}
    // {{{ isDoCoMo()

    /**
     * returns true if the agent is DoCoMo
     *
     * @return boolean
     */
    function isDoCoMo()
    {
        return false;
    }

    // }}}
    // {{{ isJPhone()

    /**
     * returns true if the agent is J-PHONE
     *
     * @return boolean
     */
    function isJPhone()
    {
        return false;
    }

    // }}}
    // {{{ isVodafone()

    /**
     * returns true if the agent is Vodafone
     *
     * @return boolean
     */
    function isVodafone()
    {
        return false;
    }

    // }}}
    // {{{ isEZweb()

    /**
     * returns true if the agent is EZweb
     *
     * @return boolean
     */
    function isEZweb()
    {
        return false;
    }

    // }}}
    // {{{ isAirHPhone()

    /**
     * returns true if the agent is AirH"PHONE
     *
     * @return boolean
     */
    function isAirHPhone()
    {
        return false;
    }

    // }}}
    // {{{ isNonMobile()

    /**
     * returns true if the agent is NonMobile
     *
     * @return boolean
     */
    function isNonMobile()
    {
        return false;
    }

    // }}}
    // {{{ isTUKa()

    /**
     * returns true if the agent is TU-Ka
     *
     * @return boolean
     */
    function isTUKa()
    {
        return false;
    }

    // }}}
    // {{{ isWAP1()

    /**
     * returns true if the agent can speak WAP1 protocol
     *
     * @return boolean
     */
    function isWAP1()
    {
        return $this->isEZweb() && !$this->isWAP2();
    }

    // }}}
    // {{{ isWAP2()

    /**
     * returns true if the agent can speak WAP2 protocol
     *
     * @return boolean
     */
    function isWAP2()
    {
        return $this->isEZweb() && $this->isXHTMLCompliant();
    }

    // }}}
    // {{{ getCarrierShortName()

    /**
     * returns the short name of the carrier
     *
     * @abstract
     */
    function getCarrierShortName()
    {
        die();
    }

    // }}}
    // {{{ getCarrierLongName()

    /**
     * returns the long name of the carrier
     *
     * @abstract
     */
    function getCarrierLongName()
    {
        die();
    }

    // }}}
    // {{{ isSoftBank()

    /**
     * Returns whether the agent is SoftBank or not.
     *
     * @return boolean
     * @since Method available since Release 0.31.0
     */
    function isSoftBank()
    {
        return false;
    }

    // }}}
    // {{{ isWillcom()

    /**
     * Returns whether the agent is Willcom or not.
     *
     * @return boolean
     * @since Method available since Release 0.31.0
     */
    function isWillcom()
    {
        return false;
    }

    // }}}
    // {{{ getModel()

    /**
     * Returns the model name of the user agent.
     *
     * @return string
     * @since Method available since Release 0.31.0
     */
    function getModel()
    {
        if (is_null($this->_model)) {
            return $this->_rawModel;
        } else {
            return $this->_model;
        }
    }

    // }}}
    // {{{ getRawModel()

    /**
     * Returns the raw model name of the user agent.
     *
     * @return string
     * @since Method available since Release 0.31.0
     */
    function getRawModel()
    {
        return $this->_rawModel;
    }

    // }}}
    // {{{ getUID()

    /**
     * Gets the UID of a subscriber.
     *
     * @return string
     * @since Method available since Release 1.0.0RC1
     */
    function getUID() {}

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
