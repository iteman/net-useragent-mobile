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
// $Id: Mobile.php,v 1.11 2004/02/08 11:56:27 kuboa Exp $
//

require_once('PEAR.php');
require_once(dirname(__FILE__) . '/Mobile/Request.php');

/**
 * constants for error handling
 */
define('NET_USERAGENT_MOBILE_OK',               1);
define('NET_USERAGENT_MOBILE_ERROR',           -1);
define('NET_USERAGENT_MOBILE_ERROR_NOMATCH',   -2);
define('NET_USERAGENT_MOBILE_ERROR_NOT_FOUND', -3);

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
 * require_once('Net/UserAgent/Mobile.php');
 *
 * $agent = &Net_UserAgent_Mobile::factory($agent_string);
 * // or $agent = &Net_UserAgent_Mobile::factory(); // to get from $_SERVER
 *
 * if ($agent->isDoCoMo()) {
 *     // or if ($agent->getName() === 'DoCoMo')
 *     // or if (get_class($agent) === 'http_mobileagent_docomo')
 *     // it's NTT DoCoMo i-mode
 *     // see what's available in Net_UserAgent_Mobile_DoCoMo
 * } elseif ($agent->isJPhone()) {
 *     // it's J-PHONE J-Sky
 *     // see what's available in Net_UserAgent_Mobile_JPhone
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
 * @package  Net_UserAgent_Mobile
 * @category Networking
 * @author   KUBO Atsuhiro <kubo@isite.co.jp>
 * @access   public
 * @version  $Revision: 1.11 $
 */
class Net_UserAgent_Mobile
{

    /**#@+
     * @access public
     * @static
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
     * @param mixed $stuff User-Agent string or object that works with
     *     HTTP_Request (not implemented)
     * @return mixed a newly created Net_UserAgent_Mobile object, or a PEAR
     *     error object on error
     * @see Net_UserAgent_Mobile_Request::factory()
     */
    function &factory($stuff = null)
    {
        static $mobile_regex;
        if (!isset($mobile_regex)) {
            $docomo_regex    = '^DoCoMo/\d\.\d[ /]';
            $jphone_regex    = '^J-PHONE/\d\.\d';
            $ezweb_regex     = '^(?:KDDI-[A-Z]+\d+ )?UP\.Browser\/';
            $airhphone_regex = '^Mozilla/3\.0\(DDIPOCKET;';
            $mobile_regex =
                "(?:($docomo_regex)|($jphone_regex)|($ezweb_regex)|($airhphone_regex))";
        }

        $request = &Net_UserAgent_Mobile_Request::factory($stuff);

        // parse User-Agent string
        $ua = $request->get('User-Agent');
        $sub = 'NonMobile';
        if (preg_match("!$mobile_regex!", $ua, $matches)) {
            $sub = @$matches[1] ? 'DoCoMo' :
                (@$matches[2] ? 'JPhone' :
                 (@$matches[3] ? 'EZweb' : 'AirHPhone'));
        }
        $class_name = "Net_UserAgent_Mobile_{$sub}";
        $include    = dirname(__FILE__) . "/Mobile/{$sub}.php";
        @include_once($include);

        if (!class_exists($class_name)) {
            return PEAR::raiseError(null,
                                    NET_USERAGENT_MOBILE_ERROR_NOT_FOUND,
                                    null, null,
                                    "Unable to include the $include file",
                                    'Net_UserAgent_Mobile_Error', true
                                    );
        }

        @$instance = &new $class_name($request);
        return $instance;
    }

    // }}}
    // {{{ singleton()

    /**
     * creates a new {@link Net_UserAgent_Mobile_Common} subclass instance or
     * returns a instance from existent ones
     *
     * @param mixed $stuff User-Agent string or object that works with
     *     HTTP_Request (not implemented)
     * @return mixed a newly created or a existent Net_UserAgent_Mobile
     *     object, or a PEAR error object on error
     * @see Net_UserAgent_Mobile::factory()
     */
     function &singleton($stuff = null)
     {
         static $instance;
         if (!isset($instance)) {
             $instance = Net_UserAgent_Mobile::factory($stuff);
         }

         return $instance;
     }

    // }}}
    // {{{ isError()

    /**
     * tell whether a result code from a Net_UserAgent_Mobile method
     * is an error
     *
     * @param integer $value result code
     * @return boolean whether $value is an {@link Net_UserAgent_Mobile_Error}
     */
    function isError($value)
    {
        return is_object($value)
            && (get_class($value) == 'net_useragent_mobile_error'
                || is_subclass_of($value, 'net_useragent_mobile_error'));
    }

    // }}}
    // {{{ errorMessage()

    /**
     * return a textual error message for a Net_UserAgent_Mobile error code
     *
     * @param integer $value error code
     * @return string error message, or false if the error code was not
     *     recognized
     */
    function errorMessage($value)
    {
        static $errorMessages;
        if (!isset($errorMessages)) {
            $errorMessages = array(
                                   NET_USERAGENT_MOBILE_ERROR           => 'unknown error',
                                   NET_USERAGENT_MOBILE_ERROR_NOMATCH   => 'no match',
                                   NET_USERAGENT_MOBILE_ERROR_NOT_FOUND => 'not found',
                                   NET_USERAGENT_MOBILE_OK              => 'no error'
                                   );
        }

        if (Net_UserAgent_Mobile::isError($value)) {
            $value = $value->getCode();
        }

        return isset($errorMessages[$value]) ?
            $errorMessages[$value] :
            $errorMessages[NET_USERAGENT_MOBILE_ERROR];
    }

    /**#@-*/
}

/**
 * Net_UserAgent_Mobile_Error implements a class for reporting user
 * agent error messages
 *
 * @package  Net_UserAgent_Mobile
 * @category Networking
 * @author   KUBO Atsuhiro <kubo@isite.co.jp>
 * @access   public
 * @version  $Revision: 1.11 $
 */
class Net_UserAgent_Mobile_Error extends PEAR_Error
{

    // }}}
    // {{{ constructor

    /**
     * constructor
     *
     * @param mixed   $code     Net_UserAgent_Mobile error code, or string
     *     with error message.
     * @param integer $mode     what 'error mode' to operate in
     * @param integer $level    what error level to use for $mode and
     *     PEAR_ERROR_TRIGGER
     * @param mixed   $userinfo additional user/debug info
     * @access public
     */
    function Net_UserAgent_Mobile_Error($code = NET_USERAGENT_MOBILE_ERROR,
                                        $mode = PEAR_ERROR_RETURN,
                                        $level = E_USER_NOTICE,
                                        $userinfo = null
                                        )
    {
        if (is_int($code)) {
            $this->PEAR_Error('Net_UserAgent_Mobile Error: ' .
                              Net_UserAgent_Mobile::errorMessage($code),
                              $code, $mode, $level, $userinfo
                              );
        } else {
            $this->PEAR_Error("Net_UserAgent_Mobile Error: $code",
                              NET_USERAGENT_MOBILE_ERROR, $mode, $level,
                              $userinfo
                              );
        }
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
