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
// $Id: Mobile.php,v 1.1 2003/02/19 16:28:41 kuboa Exp $
//
// SYNOPSIS:
// require_once('Net/UserAgent/Mobile.php');
//
// $agent = &Net_UserAgent_Mobile::factory($agent_string);
// // or $agent = &Net_UserAgent_Mobile::factory(); to get from $_SERVER
//
// if ($agent->isDoCoMo()) {
//     // or if ($agent->getName() === 'DoCoMo')
//     // or if (get_class($agent) === 'http_mobileagent_docomo')
//     // it's NTT DoCoMo i-mode
//     // see what's available in Net_UserAgent_Mobile_DoCoMo
// } elseif ($agent->isJPhone()) {
//     // it's J-PHONE J-Sky
//     // see what's available in Net_UserAgent_Mobile_JPhone
// } elseif ($agent->isEZweb()) {
//     // it's KDDI/EZWeb
//     // see what's available in Net_UserAgent_Mobile_EZweb
// } else {
//     // may be PC
//     // $agent is Net_UserAgent_Mobile_NonMobile
// }
//
// $display = $agent->getDisplay();    // Net_UserAgent_Mobile_Display
// if ($display->isColor()) {
//    ...
// }
//

require_once('PEAR.php');
require_once('Net/UserAgent/Mobile/Request.php');

// package dependent error codes

/**
 * @const NET_USERAGENT_MOBILE_ERROR_NOMATCH
 */
define('NET_USERAGENT_MOBILE_ERROR_NOMATCH', -1); // no match

/**
 * HTTP mobile user agent string parser
 *
 * Net_UserAgent_Mobile parses HTTP_USER_AGENT strings of (mainly Japanese)
 * mobile HTTP user agents. It'll be useful in page dispatching by user
 * agents.
 * This package was ported from Perl's HTTP::MobileAgent.
 * See http://search.cpan.org/search?mode=module&query=HTTP-MobileAgent
 * The author of the HTTP::MobileAgent module is Tatsuhiko Miyagawa
 * <miyagawa@bulknews.net>
 *
 * @package Net_UserAgent_Mobile
 * @version $Revision: 1.1 $
 * @author  KUBO Atsuhiro <kubo@isite.co.jp>
 * @access  public
 */
class Net_UserAgent_Mobile
{

    // }}}
    // {{{ factory()

    /**
     * create a new Net_UserAgent_Mobile_Common concrete class instance
     *
     * parses HTTP headers and constructs Net_UserAgent_Mobile_Common
     * subclass instance.
     * If no argument is supplied, $_SERVER{'HTTP_*'} is used.
     *
     * @param mixed $stuff User-Agent string or object that works with HTTP
     *                     Request (not implemented)
     * @return object Net_UserAgent_Mobile_Common subclass instance
     * @access public
     * @static
     * @see Net_UserAgent_Mobile_Request::factory()
     * @see PEAR::getStaticProperty()
     */
    function &factory($stuff = NULL)
    {
        $mobile_regex = &PEAR::getStaticProperty('Net_UserAgent_Mobile',
                                                 'mobile_regex'
                                                 );
        if ($mobile_regex === NULL) {
            $docomo_regex = '^DoCoMo/\d\.\d[ /]';
            $jphone_regex = '^J-PHONE/\d\.\d';
            $ezweb_regex  = '^(?:KDDI-[A-Z]+\d+ )?UP\.Browser\/';
            $mobile_regex =
                "(?:($docomo_regex)|($jphone_regex)|($ezweb_regex))";
        }

        $request = &Net_UserAgent_Mobile_Request::factory($stuff);

        // parse UA string
        $ua = $request->get('User-Agent');
        $sub = 'NonMobile';
        if (preg_match("!$mobile_regex!", $ua, $matches)) {
            $sub = @$matches[1] ? 'DoCoMo' :
                (@$matches[2] ? 'JPhone' : 'EZweb');
        }
        $classname = "Net_UserAgent_Mobile_{$sub}";
        @include_once("Net/UserAgent/Mobile/{$sub}.php");
        @$instance = &new $classname($request);
        return $instance;
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
