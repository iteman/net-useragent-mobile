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
// $Id: NonMobile.php,v 1.3 2003/02/24 15:56:34 kuboa Exp $
//
// SYNOPSIS:
// require_once('Net/UserAgent/Mobile.php');
//
// $_SERVER['HTTP_USER_AGENT'] = 'Mozilla/4.0';
// $agent = &Net_UserAgent_Mobile::factory();
//

require_once('Net/UserAgent/Mobile/Common.php');

/**
 * Non-Mobile Agent implementation
 *
 * Net_UserAgent_Mobile_NonMobile is a subclass of Net_UserAgent_Mobile,
 * whichimplements non-mobile or unimplemented user agents.
 *
 * @package Net_UserAgent_Mobile
 * @version $Revision: 1.3 $
 * @author  KUBO Atsuhiro <kubo@isite.co.jp>
 * @access  public
 * @see     Net_UserAgent_Mobile_Common()
 */
class Net_UserAgent_Mobile_NonMobile extends Net_UserAgent_Mobile_Common
{

    // }}}
    // {{{ isNonMobile()

    /**
     * returns true
     *
     * @return boolean
     * @access public
     */
    function isNonMobile()
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
        list($this->name, $this->version) =
            explode('/', $this->getUserAgent());
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
