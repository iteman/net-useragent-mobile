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
// $Id: DoCoMoDisplayMap.php,v 1.17 2004/03/20 13:29:09 kuboa Exp $
//

/**
 * Display infomation mapping for DoCoMo
 *
 * @package  Net_UserAgent_Mobile
 * @category Networking
 * @author   KUBO Atsuhiro <kubo@isite.co.jp>
 * @access   public
 * @version  $Revision: 1.17 $
 * @see      Net_UserAgent_Mobile_Display
 * @link     http://www.nttdocomo.co.jp/p_s/imode/spec/ryouiki.html
 */
class Net_UserAgent_Mobile_DoCoMoDisplayMap
{

    /**
     * returns display infomation of the model
     *
     * @param string $model name of the model
     * @return array
     * @access public
     * @static
     */
    function get($model)
    {
        static $display_map;
        if (!isset($display_map)) {
            $display_map = array(

                                 // i-mode compliant HTML 1.0
                                 'D501i' => array(
                                                  'width'  => 96,
                                                  'height' => 72,
                                                  'depth'  => 2,
                                                  'color'  => false
                                                  ),
                                 'F501i' => array(
                                                  'width'  => 112,
                                                  'height' => 84,
                                                  'depth'  => 2,
                                                  'color'  => false
                                                  ),
                                 'N501i' => array(
                                                  'width'  => 118,
                                                  'height' => 128,
                                                  'depth'  => 2,
                                                  'color'  => false
                                                  ),
                                 'P501i' => array(
                                                  'width'  => 96,
                                                  'height' => 120,
                                                  'depth'  => 2,
                                                  'color'  => false
                                                  ),

                                 // i-mode compliant HTML 2.0
                                 'D502i' => array(
                                                  'width'  => 96,
                                                  'height' => 90,
                                                  'depth'  => 256,
                                                  'color'  => true
                                                  ),
                                 'F502i' => array(
                                                  'width'  => 96,
                                                  'height' => 91,
                                                  'depth'  => 256,
                                                  'color'  => true
                                                  ),
                                 'N502i' => array(
                                                  'width'  => 118,
                                                  'height' => 128,
                                                  'depth'  => 4,
                                                  'color'  => false
                                                  ),
                                 'P502i' => array(
                                                  'width'  => 96,
                                                  'height' => 117,
                                                  'depth'  => 4,
                                                  'color'  => false
                                                  ),
                                 'NM502i' => array(
                                                   'width'  => 111,
                                                   'height' => 106,
                                                   'depth'  => 2,
                                                   'color'  => false
                                                   ),
                                 'SO502i' => array(
                                                   'width'  => 120,
                                                   'height' => 120,
                                                   'depth'  => 4,
                                                   'color'  => false
                                                   ),
                                 'F502it' => array(
                                                   'width'  => 96,
                                                   'height' => 91,
                                                   'depth'  => 256,
                                                   'color'  => true
                                                   ),
                                 'N502it' => array(
                                                   'width'  => 118,
                                                   'height' => 128,
                                                   'depth ' => 256,
                                                   'color'  => true
                                                   ),
                                 'SO502iWM' => array(
                                                     'width'  => 120,
                                                     'height' => 113,
                                                     'depth'  => 256,
                                                     'color'  => true
                                                     ),
                                 'SH821i' => array(
                                                   'width'  => 96,
                                                   'height' => 78,
                                                   'depth'  => 256,
                                                   'color'  => true
                                                   ),
                                 'N821i' => array(
                                                  'width'  => 118,
                                                  'height' => 128,
                                                  'depth'  => 4,
                                                  'color'  => false
                                                  ),
                                 'P821i' => array(
                                                  'width'  => 118,
                                                  'height' => 128,
                                                  'depth'  => 4,
                                                  'color'  => false
                                                  ),
                                 'D209i' => array(
                                                  'width'  => 96,
                                                  'height' => 90,
                                                  'depth'  => 256,
                                                  'color'  => true
                                                  ),
                                 'ER209i' => array(
                                                   'width'  => 120,
                                                   'height' => 72,
                                                   'depth'  => 2,
                                                   'color'  => false
                                                   ),
                                 'F209i' => array(
                                                  'width'  => 96,
                                                  'height' => 91,
                                                  'depth'  => 256,
                                                  'color'  => true
                                                  ),
                                 'KO209i' => array(
                                                   'width'  => 96,
                                                   'height' => 96,
                                                   'depth'  => 256,
                                                   'color'  => true
                                                   ),
                                 'N209i' => array(
                                                  'width'  => 108,
                                                  'height' => 82,
                                                  'depth'  => 4,
                                                  'color'  => false
                                                  ),
                                 'P209i' => array(
                                                  'width'  => 96,
                                                  'height' => 87,
                                                  'depth'  => 4,
                                                  'color'  => false
                                                  ),
                                 'P209iS' => array(
                                                   'width'  => 96,
                                                   'height' => 87,
                                                   'depth'  => 256,
                                                   'color'  => true
                                                   ),
                                 'R209i' => array(
                                                  'width'  => 96,
                                                  'height' => 72,
                                                  'depth'  => 4,
                                                  'color'  => false
                                                  ),
                                 'R691i' => array(
                                                  'width'  => 96,
                                                  'height' => 72,
                                                  'depth'  => 4,
                                                  'color'  => false
                                                  ),
                                 'F671i' => array(
                                                  'width'  => 120,
                                                  'height' => 126,
                                                  'depth'  => 256,
                                                  'color'  => true
                                                  ),
                                 'F210i' => array(
                                                  'width'  => 96,
                                                  'height' => 113,
                                                  'depth'  => 256,
                                                  'color'  => true
                                                  ),
                                 'N210i' => array(
                                                  'width'  => 118,
                                                  'height' => 113,
                                                  'depth'  => 256,
                                                  'color'  => true
                                                  ),
                                 'P210i' => array(
                                                  'width'  => 96,
                                                  'height' => 91,
                                                  'depth'  => 256,
                                                  'color'  => true
                                                  ),
                                 'KO210i' => array(
                                                   'width'  => 96,
                                                   'height' => 96,
                                                   'depth'  => 256,
                                                   'color'  => true
                                                   ),

                                 // i-mode compliant HTML 3.0
                                 'F503i' => array(
                                                  'width'  => 120,
                                                  'height' => 130,
                                                  'depth'  => 256,
                                                  'color'  => true
                                                  ),
                                 'F503iS' => array(
                                                   'width'  => 120,
                                                   'height' => 130,
                                                   'depth'  => 4096,
                                                   'color'  => true
                                                   ),
                                 'P503i' => array(
                                                  'width'  => 120,
                                                  'height' => 130,
                                                  'depth'  => 256,
                                                  'color'  => true
                                                  ),
                                 'P503iS' => array(
                                                   'width'  => 120,
                                                   'height' => 130,
                                                   'depth'  => 256,
                                                   'color'  => true
                                                   ),
                                 'N503i' => array(
                                                  'width'  => 118,
                                                  'height' => 128,
                                                  'depth'  => 4096,
                                                  'color'  => true
                                                  ),
                                 'N503iS' => array(
                                                   'width'  => 118,
                                                   'height' => 128,
                                                   'depth'  => 4096,
                                                   'color'  => true
                                                   ),
                                 'SO503i' => array(
                                                   'width'  => 120,
                                                   'height' => 113,
                                                   'depth'  => 65536,
                                                   'color'  => true
                                                   ),
                                 'SO503iS' => array(
                                                    'width'  => 120,
                                                    'height' => 113,
                                                    'depth'  => 65536,
                                                    'color'  => true
                                                    ),
                                 'D503i' => array(
                                                  'width'  => 132,
                                                  'height' => 126,
                                                  'depth'  => 4096,
                                                  'color'  => true
                                                  ),
                                 'D503iS' => array(
                                                   'width'  => 132,
                                                   'height' => 126,
                                                   'depth'  => 4096,
                                                   'color'  => true
                                                   ),
                                 'D210i' => array(
                                                  'width'  => 96,
                                                  'height' => 91,
                                                  'depth'  => 256,
                                                  'color'  => true
                                                  ),
                                 'SO210i' => array(
                                                   'width'  => 120,
                                                   'height' => 113,
                                                   'depth'  => 256,
                                                   'color'  => true
                                                   ),
                                 'F211i' => array(
                                                  'width'  => 96,
                                                  'height' => 113,
                                                  'depth'  => 4096,
                                                  'color'  => true
                                                  ),
                                 'D211i' => array(
                                                  'width'  => 100,
                                                  'height' => 91,
                                                  'depth'  => 4096,
                                                  'color'  => true
                                                  ),
                                 'N211i' => array(
                                                  'width'  => 118,
                                                  'height' => 128,
                                                  'depth'  => 4096,
                                                  'color'  => true
                                                  ),
                                 'N211iS' => array(
                                                   'width'  => 118,
                                                   'height' => 128,
                                                   'depth'  => 4096,
                                                   'color'  => true
                                                   ),
                                 'P211i' => array(
                                                  'width'  => 120,
                                                  'height' => 130,
                                                  'depth'  => 65536,
                                                  'color'  => true
                                                  ),
                                 'P211iS' => array(
                                                   'width'  => 120,
                                                   'height' => 130,
                                                   'depth'  => 65536,
                                                   'color'  => true
                                                   ),
                                 'SO211i' => array(
                                                   'width'  => 120,
                                                   'height' => 112,
                                                   'depth'  => 4096,
                                                   'color'  => true
                                                   ),
                                 'R211i' => array(
                                                  'width'  => 96,
                                                  'height' => 98,
                                                  'depth'  => 4096,
                                                  'color'  => true
                                                  ),
                                 'SH251i' => array(
                                                   'width'  => 120,
                                                   'height' => 130,
                                                   'depth'  => 65536,
                                                   'color'  => true
                                                   ),
                                 'SH251iS' => array(
                                                    'width'  => 176,
                                                    'height' => 187,
                                                    'depth'  => 65536,
                                                    'color'  => true
                                                    ),
                                 'R692i' => array(
                                                  'width'  => 96,
                                                  'height' => 98,
                                                  'depth'  => 4096,
                                                  'color'  => true
                                                  ),

                                 // i-mode compliant HTML 3.0
                                 // (FOMA 2001/2002/2101V)
                                 'N2001' => array(
                                                  'width'  => 118,
                                                  'height' => 128,
                                                  'depth'  => 4096,
                                                  'color'  => true
                                                  ),
                                 'N2002' => array(
                                                  'width'  => 118,
                                                  'height' => 128,
                                                  'depth'  => 65536,
                                                  'color'  => true
                                                  ),
                                 'P2002' => array(
                                                  'width'  => 118,
                                                  'height' => 128,
                                                  'depth'  => 65536,
                                                  'color'  => true
                                                  ),
                                 'D2101V' => array(
                                                   'width'  => 120,
                                                   'height' => 130,
                                                   'depth'  => 262144,
                                                   'color'  => true
                                                   ),
                                 'P2101V' => array(
                                                   'width'  => 163,
                                                   'height' => 182,
                                                   'depth'  => 262144,
                                                   'color'  => true
                                                   ),
                                 'SH2101V' => array(
                                                    'width'  => 800,
                                                    'height' => 600,
                                                    'depth'  => 65536,
                                                    'color'  => true
                                                    ),
                                 'T2101V' => array(
                                                   'width'  => 176,
                                                   'height' => 144,
                                                   'depth'  => 262144,
                                                   'color'  => true
                                                   ),

                                 // i-mode compliant HTML 4.0
                                 'D504i' => array(
                                                  'width'  => 132,
                                                  'height' => 144,
                                                  'depth'  => 262144,
                                                  'color'  => true
                                                  ),
                                 'F504i' => array(
                                                  'width'  => 132,
                                                  'height' => 136,
                                                  'depth'  => 65536,
                                                  'color'  => true
                                                  ),
                                 'F504iS' => array(
                                                   'width'  => 132,
                                                   'height' => 136,
                                                   'depth'  => 65536,
                                                   'color'  => true
                                                   ),
                                 'N504i' => array(
                                                  'width'  => 160,
                                                  'height' => 180,
                                                  'depth'  => 65536,
                                                  'color'  => true
                                                  ),
                                 'N504iS' => array(
                                                   'width'  => 160,
                                                   'height' => 180,
                                                   'depth'  => 65536,
                                                   'color'  => true
                                                   ),
                                 'SO504i' => array(
                                                   'width'  => 120,
                                                   'height' => 112,
                                                   'depth'  => 65536,
                                                   'color'  => true
                                                   ),
                                 'P504i' => array(
                                                  'width'  => 132,
                                                  'height' => 144,
                                                  'depth'  => 65536,
                                                  'color'  => true
                                                  ),
                                 'P504iS' => array(
                                                   'width'  => 132,
                                                   'height' => 144,
                                                   'depth'  => 65536,
                                                   'color'  => true
                                                   ),
                                 'D251i' => array(
                                                  'width'  => 132,
                                                  'height' => 144,
                                                  'depth'  => 262144,
                                                  'color'  => true
                                                  ),
                                 'D251iS' => array(
                                                   'width'  => 132,
                                                   'height' => 144,
                                                   'depth'  => 262144,
                                                   'color'  => true
                                                   ),
                                 'F251i' => array(
                                                  'width'  => 132,
                                                  'height' => 140,
                                                  'depth'  => 65536,
                                                  'color'  => true
                                                  ),
                                 'N251i' => array(
                                                  'width'  => 132,
                                                  'height' => 140,
                                                  'depth'  => 65536,
                                                  'color'  => true
                                                  ),
                                 'N251iS' => array(
                                                   'width'  => 132,
                                                   'height' => 140,
                                                   'depth'  => 65536,
                                                   'color'  => true
                                                   ),
                                 'P251iS' => array(
                                                   'width'  => 132,
                                                   'height' => 144,
                                                   'depth'  => 65536,
                                                   'color'  => true
                                                   ),
                                 'F671iS' => array(
                                                   'width'  => 160,
                                                   'height' => 120,
                                                   'depth'  => 65536,
                                                   'color'  => true
                                                   ),
                                 'F212i' => array(
                                                  'width'  => 132,
                                                  'height' => 136,
                                                  'depth'  => 65536,
                                                  'color'  => true
                                                  ),
                                 'SO212i' => array(
                                                   'width'  => 120,
                                                   'height' => 112,
                                                   'depth'  => 65536,
                                                   'color'  => true
                                                   ),
                                 'F661i' => array(
                                                  'width'  => 132,
                                                  'height' => 136,
                                                  'depth'  => 65536,
                                                  'color'  => true
                                                  ),
                                 'F672i' => array(
                                                  'width'  => 160,
                                                  'height' => 120,
                                                  'depth'  => 65536,
                                                  'color'  => true
                                                  ),

                                 // i-mode compliant HTML 4.0
                                 // (FOMA 2051/2102V/2701)
                                 'F2051' => array(
                                                  'width'  => 176,
                                                  'height' => 182,
                                                  'depth'  => 65536,
                                                  'color'  => true
                                                  ),
                                 'N2051' => array(
                                                  'width'  => 176,
                                                  'height' => 198,
                                                  'depth'  => 65536,
                                                  'color'  => true
                                                  ),
                                 'P2102V' => array(
                                                   'width'  => 176,
                                                   'height' => 198,
                                                   'depth'  => 262144,
                                                   'color'  => true
                                                   ),
                                 'P2102V' => array(
                                                   'width'  => 176,
                                                   'height' => 198,
                                                   'depth'  => 262144,
                                                   'color'  => true
                                                   ),
                                 'F2102V' => array(
                                                   'width'  => 176,
                                                   'height' => 182,
                                                   'depth'  => 65536,
                                                   'color'  => true
                                                   ),
                                 'N2102V' => array(
                                                   'width'  => 176,
                                                   'height' => 198,
                                                   'depth'  => 65536,
                                                   'color'  => true
                                                   ),
                                 'N2701' => array(
                                                  'width'  => 176,
                                                  'height' => 198,
                                                  'depth'  => 65536,
                                                  'color'  => true
                                                  ),

                                 // i-mode compliant HTML 5.0 (505i etc.)
                                 'D505i' => array(
                                                  'width'  => 240,
                                                  'height' => 270,
                                                  'depth'  => 262144,
                                                  'color'  => true
                                                  ),
                                 'SO505i' => array(
                                                   'width'  => 256,
                                                   'height' => 240,
                                                   'depth'  => 262144,
                                                   'color'  => true
                                                   ),
                                 'SH505i' => array(
                                                   'width'  => 240,
                                                   'height' => 252,
                                                   'depth'  => 262144,
                                                   'color'  => true
                                                   ),
                                 'N505i' => array(
                                                  'width'  => 240,
                                                  'height' => 270,
                                                  'depth'  => 262144,
                                                  'color'  => true
                                                  ),
                                 'F505i' => array(
                                                  'width'  => 240,
                                                  'height' => 268,
                                                  'depth'  => 262144,
                                                  'color'  => true
                                                  ),
                                 'P505i' => array(
                                                  'width'  => 240,
                                                  'height' => 266,
                                                  'depth'  => 65536,
                                                  'color'  => true
                                                  ),
                                 'D505iS' => array(
                                                   'width'  => 240,
                                                   'height' => 270,
                                                   'depth'  => 262144,
                                                   'color'  => true
                                                   ),
                                 'P505iS' => array(
                                                   'width'  => 240,
                                                   'height' => 266,
                                                   'depth'  => 65536,
                                                   'color'  => true
                                                   ),
                                 'N505iS' => array(
                                                   'width'  => 240,
                                                   'height' => 270,
                                                   'depth'  => 262144,
                                                   'color'  => true
                                                  ),
                                 'SO505iS' => array(
                                                    'width'  => 240,
                                                    'height' => 256,
                                                    'depth'  => 262144,
                                                    'color'  => true
                                                    ),
                                 'SH505iS' => array(
                                                    'width'  => 240,
                                                    'height' => 252,
                                                    'depth'  => 262144,
                                                    'color'  => true
                                                    ),
                                 'F505iGPS' => array(
                                                     'width'  => 240,
                                                     'height' => 268,
                                                     'depth'  => 262144,
                                                     'color'  => true
                                                     ),
                                 'D252i' => array(
                                                  'width'  => 176,
                                                  'height' => 198,
                                                  'depth'  => 262144,
                                                  'color'  => true
                                                  ),
                                 'SH252i' => array(
                                                   'width'  => 240,
                                                   'height' => 252,
                                                   'depth'  => 262144,
                                                   'color'  => true
                                                   ),
                                 'P252i' => array(
                                                  'width'  => 132,
                                                  'height' => 144,
                                                  'depth'  => 65536,
                                                  'color'  => true
                                                  ),
                                 'N252i' => array(
                                                  'width'  => 132,
                                                  'height' => 140,
                                                  'depth'  => 65536,
                                                  'color'  => true
                                                  ),

                                 // i-mode compliant HTML 5.0
                                 // (FOMA 900i)
                                 'F900i' => array(
                                                  'width'  => 230,
                                                  'height' => 240,
                                                  'depth'  => 262144,
                                                  'color'  => true
                                                  ),
                                 'N900i' => array(
                                                  'width'  => 240,
                                                  'height' => 269,
                                                  'depth'  => 65536,
                                                  'color'  => true
                                                  ),
                                 'P900i' => array(
                                                  'width'  => 240,
                                                  'height' => 266,
                                                  'depth'  => 65536,
                                                  'color'  => true
                                                  ),
                                 'SH900i' => array(
                                                   'width'  => 240,
                                                   'height' => 252,
                                                   'depth'  => 262144,
                                                   'color'  => true
                                                   )
                                 );
        }

        return @$display_map[$model];
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
