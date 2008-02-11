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
 * @copyright  2003-2007 KUBO Atsuhiro <iteman@users.sourceforge.net>
 * @license    http://www.php.net/license/3_0.txt  PHP License 3.0
 * @version    CVS: $Id: Display.php,v 1.12 2008/02/11 12:43:16 kuboa Exp $
 * @since      File available since Release 0.1
 */

// {{{ Net_UserAgent_Mobile_Display

/**
 * Display information for Net_UserAgent_Mobile
 *
 * Net_UserAgent_Mobile_Display is a class for display information on
 * {@link Net_UserAgent_Mobile}. Handy for image resizing or dispatching.
 *
 * SYNOPSIS:
 * <code>
 * require_once 'Net/UserAgent/Mobile.php';
 *
 * $agent = Net_UserAgent_Mobile::factory();
 * $display = $agent->getDisplay();
 *
 * $width  = $display->getWidth();
 * $height = $display->getHeight();
 * list($width, $height) = $display->getSize();
 *
 * if ($display->isColor()) {
 *     $depth = $display->getDepth();
 * }
 *
 * // only available in DoCoMo 505i
 * $width_bytes  = $display->getWidthBytes();
 * $height_bytes = $display->getHeightBytes();
 * </code>
 *
 * USING EXTERNAL MAP FILE:
 * If the environment variable DOCOMO_MAP exists, the specified XML data will
 * be used for DoCoMo display information.
 *
 * ex) Please add the following code.
 * $_SERVER['DOCOMO_MAP'] = '/path/to/DoCoMoMap.xml';
 *
 * @category   Networking
 * @package    Net_UserAgent_Mobile
 * @author     KUBO Atsuhiro <iteman@users.sourceforge.net>
 * @copyright  2003-2007 KUBO Atsuhiro <iteman@users.sourceforge.net>
 * @license    http://www.php.net/license/3_0.txt  PHP License 3.0
 * @version    Release: @package_version@
 * @since      Class available since Release 0.1
 */
class Net_UserAgent_Mobile_Display
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

    /**
     * width of the display
     * @var integer
     */
    private $_width;

    /**
     * height of the display
     * @var integer
     */
    private $_height;

    /**
     * depth of the display
     * @var integer
     */
    private $_depth;

    /**
     * color capability of the display
     * @var boolean
     */
    private $_color;

    /**
     * width (bytes) of the display
     * @var integer
     */
    private $_widthBytes;

    /**
     * height (bytes) of the display
     * @var integer
     */
    private $_heightBytes;

    /**#@-*/

    /**#@+
     * @access public
     */

    // }}}
    // {{{ construct()

    /**
     * constructor
     *
     * @param array $data display infomation
     */
    public function __construct($data)
    {
        $this->_width  = (integer)@$data['width'];
        $this->_height = (integer)@$data['height'];
        $this->_depth  = (integer)@$data['depth'];
        $this->_color  = (boolean)@$data['color'];

        $this->_widthBytes  = (integer)@$data['width_bytes'];
        $this->_heightBytes = (integer)@$data['height_bytes'];
    }

    // }}}
    // {{{ calcSize()

    /**
     * returns width * height of the display
     *
     * @return integer
     */
    public function calcSize()
    {
        return $this->_width * $this->_height;
    }

    // }}}
    // {{{ getSize()

    /**
     * returns width with height of the display
     *
     * @return array
     */
    public function getSize()
    {
        return array($this->_width, $this->_height);
    }

    // }}}
    // {{{ getWidth()

    /**
     * returns width of the display
     *
     * @return integer
     */
    public function getWidth()
    {
        return $this->_width;
    }

    // }}}
    // {{{ getHeight()

    /**
     * returns height of the display
     *
     * @return integer
     */
    public function getHeight()
    {
        return $this->_height;
    }

    // }}}
    // {{{ getDepth()

    /**
     * returns depth of the display
     *
     * @return integer
     */
    public function getDepth()
    {
        return $this->_depth;
    }

    // }}}
    // {{{ isColor()

    /**
     * returns true if the display has color capability
     *
     * @return boolean
     */
    public function isColor()
    {
        return $this->_color;
    }

    // }}}
    // {{{ getWidthBytes()

    /**
     * returns width (bytes) of the display
     *
     * @return integer
     */
    public function getWidthBytes()
    {
        return $this->_widthBytes;
    }

    // }}}
    // {{{ getHeightBytes()

    /**
     * returns height (bytes) of the display
     *
     * @return integer
     */
    public function getHeightBytes()
    {
        return $this->_heightBytes;
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
