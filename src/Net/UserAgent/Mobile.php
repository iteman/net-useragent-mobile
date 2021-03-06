<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */

/**
 * PHP version 5
 *
 * Copyright (c) 2003-2009 KUBO Atsuhiro <kubo@iteman.jp>,
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 *
 *     * Redistributions of source code must retain the above copyright
 *       notice, this list of conditions and the following disclaimer.
 *     * Redistributions in binary form must reproduce the above copyright
 *       notice, this list of conditions and the following disclaimer in the
 *       documentation and/or other materials provided with the distribution.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
 * AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
 * IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE
 * ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE
 * LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF
 * SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
 * INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN
 * CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
 * ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * @category   Networking
 * @package    Net_UserAgent_Mobile
 * @author     KUBO Atsuhiro <kubo@iteman.jp>
 * @copyright  2003-2009 KUBO Atsuhiro <kubo@iteman.jp>
 * @license    http://www.opensource.org/licenses/bsd-license.php  New BSD License
 * @version    Release: @package_version@
 * @since      File available since Release 0.1
 */

require_once 'Net/UserAgent/Mobile/Exception.php';

// {{{ Net_UserAgent_Mobile

/**
 * HTTP mobile user agent string parser
 *
 * Net_UserAgent_Mobile parses HTTP_USER_AGENT strings of (mainly Japanese) mobile
 * HTTP user agents. It'll be useful in page dispatching by user agents.
 * This package was ported from Perl's HTTP::MobileAgent.
 * See {@link http://search.cpan.org/search?mode=module&query=HTTP-MobileAgent}
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
 * } elseif ($agent->isSoftBank()) {
 *     // it's SoftBank
 *     // see what's available in Net_UserAgent_Mobile_SoftBank
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
 * @author     KUBO Atsuhiro <kubo@iteman.jp>
 * @copyright  2003-2009 KUBO Atsuhiro <kubo@iteman.jp>
 * @license    http://www.opensource.org/licenses/bsd-license.php  New BSD License
 * @version    Release: @package_version@
 * @since      Class available since Release 0.1
 */
class Net_UserAgent_Mobile
{

    // {{{ properties

    /**#@+
     * @access public
     */

    public static $fallbackOnNomatch = false;

    /**#@-*/

    /**#@+
     * @access protected
     */

    /**#@-*/

    /**#@+
     * @access private
     */

    private static $instanceCache = array();

    /**#@-*/

    /**#@+
     * @access public
     */

    // }}}
    // {{{ factory()

    /**
     * create a new {@link Net_UserAgent_Mobile_Common} subclass instance
     *
     * parses HTTP headers and constructs {@link Net_UserAgent_Mobile_Common}
     * subclass instance.
     * If no argument is supplied, $_SERVER{'HTTP_*'} is used.
     *
     * @param string $userAgent User-Agent string
     * @return Net_UserAgent_Mobile_Common a newly created or an existing
     *     Net_UserAgent_Mobile_Common object
     * @throws Net_UserAgent_Mobile_Exception
     */
    public static function factory($userAgent = null)
    {
        if (is_null($userAgent)) {
            $userAgent = @$_SERVER['HTTP_USER_AGENT'];
        }

        // parse User-Agent string
        if (self::isDoCoMo($userAgent)) {
            $driver = 'DoCoMo';
        } elseif (self::isEZweb($userAgent)) {
            $driver = 'EZweb';
        } elseif (self::isSoftBank($userAgent)) {
            $driver = 'SoftBank';
        } elseif (self::isWillcom($userAgent)) {
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
            if (self::$fallbackOnNomatch) {
                return self::factory('Net_UserAgent_Mobile_Fallback_On_NoMatch');
            }

            throw $e;
        }
    }

    // }}}
    // {{{ singleton()

    /**
     * creates a new {@link Net_UserAgent_Mobile_Common} subclass instance or returns
     * a instance from existent ones
     *
     * @param string $userAgent User-Agent string
     * @return Net_UserAgent_Mobile_Common a newly created or an existing
     *     Net_UserAgent_Mobile_Common object
     */
    public static function singleton($userAgent = null)
    {
        if (is_null($userAgent)) {
            $userAgent = @$_SERVER['HTTP_USER_AGENT'];
        }

        if (!array_key_exists($userAgent, self::$instanceCache)) {
            self::$instanceCache[$userAgent] = self::factory($userAgent);
        }

        return self::$instanceCache[$userAgent];
    }

    // }}}
    // {{{ isMobile()

    /**
     * Checks whether or not the user agent is mobile by a given user agent string.
     *
     * @param string $userAgent
     * @return boolean
     * @since Method available since Release 0.31.0
     */
    public static function isMobile($userAgent = null)
    {
        if (self::isDoCoMo($userAgent)) {
            return true;
        } elseif (self::isEZweb($userAgent)) {
            return true;
        } elseif (self::isSoftBank($userAgent)) {
            return true;
        } elseif (self::isWillcom($userAgent)) {
            return true;
        }

        return false;
    }

    // }}}
    // {{{ isDoCoMo()

    /**
     * Checks whether or not the user agent is DoCoMo by a given user agent string.
     *
     * @param string $userAgent
     * @return boolean
     * @since Method available since Release 0.31.0
     */
    public static function isDoCoMo($userAgent = null)
    {
        if (is_null($userAgent)) {
            $userAgent = @$_SERVER['HTTP_USER_AGENT'];
        }

        if (preg_match('!^DoCoMo!', $userAgent)) {
            return true;
        }

        return false;
    }

    // }}}
    // {{{ isEZweb()

    /**
     * Checks whether or not the user agent is EZweb by a given user agent string.
     *
     * @param string $userAgent
     * @return boolean
     * @since Method available since Release 0.31.0
     */
    public static function isEZweb($userAgent = null)
    {
        if (is_null($userAgent)) {
            $userAgent = @$_SERVER['HTTP_USER_AGENT'];
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
     * Checks whether or not the user agent is SoftBank by a given user agent string.
     *
     * @param string $userAgent
     * @return boolean
     * @since Method available since Release 0.31.0
     */
    public static function isSoftBank($userAgent = null)
    {
        if (is_null($userAgent)) {
            $userAgent = @$_SERVER['HTTP_USER_AGENT'];
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
     * Checks whether or not the user agent is Willcom by a given user agent string.
     *
     * @param string $userAgent
     * @return boolean
     * @since Method available since Release 0.31.0
     */
    public static function isWillcom($userAgent = null)
    {
        if (is_null($userAgent)) {
            $userAgent = @$_SERVER['HTTP_USER_AGENT'];
        }

        if (preg_match('!^Mozilla/3\.0\((?:DDIPOCKET|WILLCOM);!', $userAgent)) {
            return true;
        }

        return false;
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
