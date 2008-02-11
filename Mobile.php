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
 * @version    CVS: $Id: Mobile.php,v 1.35 2008/02/11 12:43:16 kuboa Exp $
 * @since      File available since Release 0.1
 */

// {{{ Net_UserAgent_Mobile

/**
 * HTTP mobile user agent string parser
 *
 * Net_UserAgent_Mobile parses HTTP_USER_AGENT strings of (mainly Japanese)
 * mobile HTTP user agents. It'll be useful in page dispatching by user
 * agents.
 * This package was ported from Perl's HTTP::MobileAgent.
 * See {@link http://search.cpan.org/search?mode=module&query=HTTP-MobileAgent}
 * The author of the HTTP::MobileAgent module is Tatsuhiko Miyagawa
 * <miyagawa@bulknews.net>
 *
 * SYNOPSIS:
 * <code>
 * require_once 'Net/UserAgent/Mobile.php';
 *
 * $agent = Net_UserAgent_Mobile::factory($agent_string);
 * // or $agent = Net_UserAgent_Mobile::factory(); // to get from $_SERVER
 *
 * if ($agent->isDoCoMo()) {
 *     // or if ($agent->getName() == 'DoCoMo')
 *     // or if (strtolower(get_class($agent)) == 'http_mobileagent_docomo')
 *     // it's NTT DoCoMo i-mode
 *     // see what's available in Net_UserAgent_Mobile_DoCoMo
 * } elseif ($agent->isVodafone()) {
 *     // it's Vodafone(J-PHONE)
 *     // see what's available in Net_UserAgent_Mobile_Vodafone
 * } elseif ($agent->isEZweb()) {
 *     // it's KDDI/EZWeb
 *     // see what's available in Net_UserAgent_Mobile_EZweb
 * } else {
 *     // may be PC
 *     // $agent is Net_UserAgent_Mobile_NonMobile
 * }
 *
 * $display = $agent->getDisplay();    // Net_UserAgent_Mobile_Display
 * if ($display->isColor()) {
 *    ...
 * }
 * </code>
 *
 * @category   Networking
 * @package    Net_UserAgent_Mobile
 * @author     KUBO Atsuhiro <iteman@users.sourceforge.net>
 * @copyright  2003-2008 KUBO Atsuhiro <iteman@users.sourceforge.net>
 * @license    http://www.php.net/license/3_0.txt  PHP License 3.0
 * @version    Release: @package_version@
 * @since      Class available since Release 0.1
 */
class Net_UserAgent_Mobile
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

    private static $_instances = array();
    private static $_useNomatchFallback = false;

    /**#@-*/

    /**#@+
     * @access public
     */

    // }}}
    // {{{ factory()

    /**
     * Creates a new {@link Net_UserAgent_Mobile_Common} subclass instance.
     *
     * parses HTTP headers and constructs {@link Net_UserAgent_Mobile_Common}
     * subclass instance.
     * If no argument is supplied, $_SERVER{'HTTP_*'} is used.
     *
     * @param string $userAgent User-Agent string
     * @return Net_UserAgent_Mobile_Common Net_UserAgent_Mobile_Common object
     * @throws Net_UserAgent_Mobile_Exception
     */
    public static function factory($userAgent = null)
    {
        if (is_null($userAgent)) {
            $userAgent = $_SERVER['HTTP_USER_AGENT'];
        }

        // parse User-Agent string
        if (Net_UserAgent_Mobile::isDoCoMo($userAgent)) {
            $driver = 'DoCoMo';
        } elseif (Net_UserAgent_Mobile::isEZweb($userAgent)) {
            $driver = 'EZweb';
        } elseif (Net_UserAgent_Mobile::isSoftBank($userAgent)) {
            $driver = 'SoftBank';
        } elseif (Net_UserAgent_Mobile::isWillcom($userAgent)) {
            $driver = 'Willcom';
        } else {
            $driver = 'NonMobile';
        }

        $class = "Net_UserAgent_Mobile_$driver";

        if (!class_exists($class)) {
            $file = str_replace('_', '/', $class) . '.php';
            if (!include_once $file) {
                throw new Net_UserAgent_Mobile_Exception("Unable to include the $file file");
            }
        }

        try {
            return new $class($userAgent);
        } catch (Net_UserAgent_Mobile_Exception $e) {
            if (self::$_useNomatchFallback) {
                return Net_UserAgent_Mobile::factory('Net_UserAgent_Mobile_NomatchFallback');
            }

            throw $e;
        }
    }

    // }}}
    // {{{ singleton()

    /**
     * Creates a new {@link Net_UserAgent_Mobile_Common} subclass instance or
     * returns a instance from existent ones
     *
     * @param string $userAgent User-Agent string
     * @return Net_UserAgent_Mobile_Common Net_UserAgent_Mobile_Common object
     */
    public static function singleton($userAgent = null)
    {
        if (is_null($userAgent)) {
            $userAgent = $_SERVER['HTTP_USER_AGENT'];
        }

        if (!array_key_exists($userAgent, self::$_instances)) {
            self::$_instances[$userAgent] = Net_UserAgent_Mobile::factory($userAgent);
        }

        return self::$_instances[$userAgent];
    }

    // }}}
    // {{{ isMobile()

    /**
     * Checks whether or not the user agent is mobile by a given user agent
     * string.
     *
     * @param string $userAgent
     * @return boolean
     * @since Method available since Release 0.31.0
     */
    public static function isMobile($userAgent = null)
    {
        if (Net_UserAgent_Mobile::isDoCoMo($userAgent)) {
            return true;
        } elseif (Net_UserAgent_Mobile::isEZweb($userAgent)) {
            return true;
        } elseif (Net_UserAgent_Mobile::isSoftBank($userAgent)) {
            return true;
        } elseif (Net_UserAgent_Mobile::isWillcom($userAgent)) {
            return true;
        }

        return false;
    }

    // }}}
    // {{{ isDoCoMo()

    /**
     * Checks whether or not the user agent is DoCoMo by a given user agent
     * string.
     *
     * @param string $userAgent
     * @return boolean
     * @since Method available since Release 0.31.0
     */
    public static function isDoCoMo($userAgent = null)
    {
        if (is_null($userAgent)) {
            $userAgent = $_SERVER['HTTP_USER_AGENT'];
        }

        if (preg_match('!^DoCoMo!', $userAgent)) {
            return true;
        }

        return false;
    }

    // }}}
    // {{{ isEZweb()

    /**
     * Checks whether or not the user agent is EZweb by a given user agent
     * string.
     *
     * @param string $userAgent
     * @return boolean
     * @since Method available since Release 0.31.0
     */
    public static function isEZweb($userAgent = null)
    {
        if (is_null($userAgent)) {
            $userAgent = $_SERVER['HTTP_USER_AGENT'];
        }

        if (preg_match('!^KDDI-!', $userAgent)) {
            return true;
        } elseif (preg_match('!^UP\.Browser!', $userAgent)) {
            return true;
        }

        return false;
    }

    // }}}
    // {{{ isSoftBank()

    /**
     * Checks whether or not the user agent is SoftBank by a given user agent
     * string.
     *
     * @param string $userAgent
     * @return boolean
     * @since Method available since Release 0.31.0
     */
    public static function isSoftBank($userAgent = null)
    {
        if (is_null($userAgent)) {
            $userAgent = $_SERVER['HTTP_USER_AGENT'];
        }

        if (preg_match('!^SoftBank!', $userAgent)) {
            return true;
        } elseif (preg_match('!^Semulator!', $userAgent)) {
            return true;
        } elseif (preg_match('!^Vodafone!', $userAgent)) {
            return true;
        } elseif (preg_match('!^Vemulator!', $userAgent)) {
            return true;
        } elseif (preg_match('!^MOT-!', $userAgent)) {
            return true;
        } elseif (preg_match('!^MOTEMULATOR!', $userAgent)) {
            return true;
        } elseif (preg_match('!^J-PHONE!', $userAgent)) {
            return true;
        } elseif (preg_match('!^J-EMULATOR!', $userAgent)) {
            return true;
        }

        return false;
    }

    // }}}
    // {{{ isWillcom()

    /**
     * Checks whether or not the user agent is Willcom by a given user agent
     * string.
     *
     * @param string $userAgent
     * @return boolean
     * @since Method available since Release 0.31.0
     */
    public static function isWillcom($userAgent = null)
    {
        if (is_null($userAgent)) {
            $userAgent = $_SERVER['HTTP_USER_AGENT'];
        }

        if (preg_match('!^Mozilla/3\.0\((?:DDIPOCKET|WILLCOM);!', $userAgent)) {
            return true;
        }

        return false;
    }

    // }}}
    // {{{ setUseNomatchFallback()

    /**
     * Sets whether or not the fallback mode using NonMobile is used when
     * detecting an unknown user agent.
     *
     * @param boolean $useNomatchFallback
     * @since Method available since Release 0.32.0
     */
    public static function setUseNomatchFallback($useNomatchFallback)
    {
        self::$_useNomatchFallback = $useNomatchFallback;
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
