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
// $Id: Common.php,v 1.2 2003/02/24 10:50:04 kuboa Exp $
//

/**
 * Base class that is extended by each user agents implementor
 *
 * Net_UserAgent_Mobile_Common is a class for mobile user agent
 * abstraction layer on Net_UserAgent_Mobile.
 *
 * @package Net_UserAgent_Mobile
 * @version $Revision: 1.2 $
 * @author  KUBO Atsuhiro <kubo@isite.co.jp>
 * @access  public
 */
class Net_UserAgent_Mobile_Common
{

    // {{{ properties

    /**
     * User-Agent name like 'DoCoMo'
     * @var string
     * @access public
     */
    var $name = '';

    /**
     * User-Agent version number like '1.0'
     * @var string
     * @access public
     */
    var $version = '';

    /**
     * Net_UserAgent_Mobile_Display object
     * @var object Net_UserAgent_Mobile_Display
     * @access private
     */
    var $_display = '';

    /**
     * Net_UserAgent_Mobile_Request_XXX object
     * @var object Net_UserAgent_Mobile_Request_XXX
     * @access private
     */
    var $_request;

    // }}}
    // {{{ constructor

    /**
     * Constructor
     *
     * @param object Net_UserAgent_Mobile_Request_XXX $request
     */
    function Net_UserAgent_Mobile_Common($request)
    {
        $this->_request = $request;
        $this->parse();
    }

    // }}}
    // {{{ getUserAgent()

    /**
     * returns User-Agent string
     *
     * @return string
     * @access public
     */
    function getUserAgent()
    {
        return $this->getHeader('User-Agent');
    }

    // }}}
    // {{{ getHeader()

    /**
     * returns a specified HTTP header
     *
     * @param string $header
     * @return string
     * @access public
     */
    function getHeader($header)
    {
        return $this->_request->get($header);
    }

    // }}}
    // {{{ getName()

    /**
     * returns User-Agent name like 'DoCoMo'
     *
     * @return string
     * @access public
     */
    function getName()
    {
        return $this->name;
    }

    // }}}
    // {{{ getDisplay()

    /**
     * returns Net_UserAgent_Mobile_Disply object
     *
     * @return object Net_UserAgent_Mobile_Display
     * @access public
     * @see Net_UserAgent_Mobile_Display
     */
    function getDisplay()
    {
        if ($this->_display === '') {
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
     * @access public
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
     * @return object PEAR_Error
     * @access public
     */
    function noMatch()
    {
        return PEAR::raiseError($this->getUserAgent() .
                                ': no match. Might be new variants. ' .
                                'please contact the author of Net_UserAgent_Mobile!',
                                NET_USERAGENT_MOBILE_ERROR_NOMATCH
                                );
    }

    // }}}
    // {{{ parse()

    /**
     * parse HTTP_USER_AGENT string (should be implemented in subclasses)
     *
     * @access public
     */
    function parse()
    {
        die();
    }

    // }}}
    // {{{ makeDisplay()

    /**
     * create a new Net_UserAgent_Mobile_Display class instance (should be implemented in subclasses)
     *
     * @access public
     */
    function makeDisplay()
    {
        die();
    }

    // }}}
    // {{{ isDoCoMo()

    /**
     * returns TRUE if the agent is DoCoMo
     *
     * @return boolean
     * @access public
     */
    function isDoCoMo()
    {
        return FALSE;
    }

    // }}}
    // {{{ isJPhone()

    /**
     * returns TRUE if the agent is J-PHONE
     *
     * @return boolean
     * @access public
     */
    function isJPhone()
    {
        return FALSE;
    }

    // }}}
    // {{{ isEZweb()

    /**
     * returns TRUE if the agent is EZweb
     *
     * @return boolean
     * @access public
     */
    function isEZweb()
    {
        return FALSE;
    }

    // }}}
    // {{{ isWAP1()

    /**
     * returns TRUE if the agent can speak WAP1 protocol
     *
     * @return boolean
     * @access public
     */
    function isWAP1()
    {
        return $this->isEZweb() && !$this->isWAP2();
    }

    // }}}
    // {{{ isWAP2()

    /**
     * returns TRUE if the agent can speak WAP2 protocol
     *
     * @return boolean
     * @access public
     */
    function isWAP2()
    {
        return $this->isEZweb() && $this->isXHTMLCompliant();
    }

    // }}}
    // {{{ isNonMobile()

    /**
     * returns TRUE if the agent is NonMobile
     *
     * @return boolean
     * @access public
     */
    function isNonMobile()
    {
        return FALSE;
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
