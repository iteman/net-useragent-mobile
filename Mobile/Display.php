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
// $Id: Display.php,v 1.2 2003/02/24 15:56:33 kuboa Exp $
//
// SYNOPSIS:
// require_once('Net/UserAgent/Mobile.php');
//
// $agent = &Net_UserAgent_Mobile::factory();
// $display = $agent->getDisplay();
//
// $width  = $display->getWidth();
// $height = $display->getHeight();
// list($width, $height) = $display->getSize();
//
// if ($display->isColor()) {
//     $depth = $display->getDepth();
// }
//

/**
 * Display information for Net_UserAgent_Mobile
 *
 * Net_UserAgent_Mobile_Display is a class for display information on
 * Net_UserAgent_Mobile. Handy for image resizing or dispatching.
 *
 * @package Net_UserAgent_Mobile
 * @version $Revision: 1.2 $
 * @author  KUBO Atsuhiro <kubo@isite.co.jp>
 * @access  public
 */
class Net_UserAgent_Mobile_Display
{

    // {{{ properties

    /**
     * width of the display
     * @var integer
     * @access private
     */
    var $_width;

    /**
     * height of the display
     * @var integer
     * @access private
     */
    var $_height;

    /**
     * depth of the display
     * @var integer
     * @access public
     */
    var $_depth;

    /**
     * color capability of the display
     * @var boolean
     * @access private
     */
    var $_color;

    // }}}
    // {{{ constructor

    /**
     * Constructor
     *
     * @param array $data display infomation
     */
    function Net_UserAgent_Mobile_Display($data)
    {
        $this->_width  = $data['width'];
        $this->_height = $data['height'];
        $this->_depth  = $data['depth'];
        $this->_color  = $data['color'];
    }

    // }}}
    // {{{ calcSize()

    /**
     * returns width * height of the display
     *
     * @return integer
     * @access public
     */
    function calcSize()
    {
        return $this->_width * $this->_height;
    }

    // }}}
    // {{{ getSize()

    /**
     * returns width with height of the display
     *
     * @return array
     * @access public
     */
    function getSize()
    {
        return array($this->_width, $this->_height);
    }

    // }}}
    // {{{ getWidth()

    /**
     * returns width of the display
     *
     * @return integer
     * @access public
     */
    function getWidth()
    {
        return $this->_width;
    }

    // }}}
    // {{{ getHeight()

    /**
     * returns height of the display
     *
     * @return integer
     * @access public
     */
    function getHeight()
    {
        return $this->_height;
    }

    // }}}
    // {{{ getDepth()

    /**
     * returns depth of the display
     *
     * @return integer
     * @access public
     */
    function getDepth()
    {
        return $this->_depth;
    }

    // }}}
    // {{{ isColor()

    /**
     * returns true if the display has color capability
     *
     * @return boolean
     * @access public
     */
    function isColor()
    {
        return $this->_color;
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
