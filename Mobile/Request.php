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
// $Id: Request.php,v 1.1 2003/02/19 16:28:42 kuboa Exp $
//

class Net_UserAgent_Mobile_Request
{
    function &factory($stuff = null)
    {
        if ($stuff === null) {
            $request = &new Net_UserAgent_Mobile_Request_Env($_SERVER);
        } else {
            $request =
                &new Net_UserAgent_Mobile_Request_Env(array(
                                                            'HTTP_USER_AGENT' => $stuff)
                                                      );
        }
        return $request;
    }
}

class Net_UserAgent_Mobile_Request_Env
{
    var $_env;

    function Net_UserAgent_Mobile_Request_Env($env)
    {
        $this->_env = $env;
    }

    function get($header)
    {
        $header = strtr($header, '-', '_');
        return $this->_env[ 'HTTP_' . strtoupper($header) ];
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
