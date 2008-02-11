<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */

/**
 * PHP version 5
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
 * @version    CVS: $Id: Common.php,v 1.22 2008/02/11 12:43:16 kuboa Exp $
 * @since      File available since Release 0.1
 */

require_once 'Net/UserAgent/Mobile/Exception.php';

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
abstract class Net_UserAgent_Mobile_Common
{

    // {{{ properties

    /**#@+
     * @access public
     */

    /**#@-*/

    /**#@+
     * @access protected
     */

    /**
     * User-Agent name like 'DoCoMo'
     * @var string
     */
    protected $_name;

    /**
     * User-Agent version number like '1.0'
     * @var string
     */
    protected $_version;

    /**#@-*/

    /**#@+
     * @access private
     */

    /**
     * {@link Net_UserAgent_Mobile_Display} object
     * @var object {@link Net_UserAgent_Mobile_Display}
     */
    private $_display;

    /**
     * The User-Agent string.
     * @var string
     * @since Property available since Release 0.31.0
     **/
    private $_userAgent;

    /**
     * The model name of the user agent.
     *
     * @var string
     * @since Property available since Release 0.31.0
     */
    protected $_model;

    /**
     * The raw model name of the user agent.
     *
     * @var string
     * @since Property available since Release 0.31.0
     */
    protected $_rawModel;

    /**#@-*/

    /**#@+
     * @access public
     */

    // }}}
    // {{{ __construct()

    /**
     * constructor
     *
     * @param string $userAgent User-Agent string
     */
    public function __construct($userAgent)
    {
        $this->_parse($userAgent);
        $this->_userAgent = $userAgent;
    }

    // }}}
    // {{{ getUserAgent()

    /**
     * returns User-Agent string
     *
     * @return string
     */
    public function getUserAgent()
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
    public function getHeader($header)
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
    public function getName()
    {
        return $this->_name;
    }

    // }}}
    // {{{ getDisplay()

    /**
     * returns {@link Net_UserAgent_Mobile_Disply} object
     *
     * @return object {@link Net_UserAgent_Mobile_Display} object
     */
    public function getDisplay()
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
    public function getVersion()
    {
        return $this->_version;
    }

    // }}}
    // {{{ noMatch()

    /**
     * Throws an exception for new variants.
     *
     * @throws Net_UserAgent_Mobile_Exception
     */
    public function noMatch()
    {
        throw new Net_UserAgent_Mobile_Exception("{$this->_userAgent} might be new variants. Please contact the author of Net_UserAgent_Mobile!");
    }

    // }}}
    // {{{ makeDisplay()

    /**
     * create a new Net_UserAgent_Mobile_Display class instance (should be
     * implemented in subclasses)
     */
    abstract public function makeDisplay();

    // }}}
    // {{{ isDoCoMo()

    /**
     * returns true if the agent is DoCoMo
     *
     * @return boolean
     */
    public function isDoCoMo()
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
    public function isJPhone()
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
    public function isVodafone()
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
    public function isEZweb()
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
    public function isAirHPhone()
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
    public function isNonMobile()
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
    public function isTUKa()
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
    public function isWAP1()
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
    public function isWAP2()
    {
        return $this->isEZweb() && $this->isXHTMLCompliant();
    }

    // }}}
    // {{{ getCarrierShortName()

    /**
     * returns the short name of the carrier
     */
    abstract public function getCarrierShortName();

    // }}}
    // {{{ getCarrierLongName()

    /**
     * returns the long name of the carrier
     */
    abstract public function getCarrierLongName();

    // }}}
    // {{{ isSoftBank()

    /**
     * Returns whether the agent is SoftBank or not.
     *
     * @return boolean
     * @since Method available since Release 0.31.0
     */
    public function isSoftBank()
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
    public function isWillcom()
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
    public function getModel()
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
    public function getRawModel()
    {
        return $this->_rawModel;
    }

    /**#@-*/

    /**#@+
     * @access protected
     */

    // }}}
    // {{{ parse()

    /**
     * Parses HTTP_USER_AGENT string.
     *
     * @param string $userAgent User-Agent string
     * @abstract
     */
    abstract protected function _parse($userAgent);

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
