--TEST--
Net_UserAgent_Mobile: Display
--SKIPIF--
<?php if (!@include('Net/UserAgent/Mobile.php')) print 'skip'; ?>
--FILE--
<?php
//
// Test for: Net/UserAgent/Mobile.php
// Parts tested: - Display
//

error_reporting(E_ALL);
require_once('Net/UserAgent/Mobile.php');

$tests = array(
               array(
                     array(
                           'HTTP_X_JPHONE_DISPLAY' => '120*117',
                           'HTTP_USER_AGENT' => 'J-PHONE/2.0/J-DN02',
                           'HTTP_X_JPHONE_COLOR' => 'C256'
                           ),
                     array('width' => 120,
                           'height' => 117,
                           'color' => true,
                           'depth' => 256.
                           )
                     ),
               array(
                     array(
                           'HTTP_X_UP_DEVCAP_SCREENPIXELS' => '90,70',
                           'HTTP_USER_AGENT' => 'KDDI-TS21 UP.Browser/6.0.2.276 (GUI) MMP/1.1',
                           'HTTP_X_UP_DEVCAP_SCREENDEPTH' => '16,RGB565',
                           'HTTP_X_UP_DEVCAP_ISCOLOR' => '1'
                           ),
                     array(
                           'width' => 90,
                           'height' => 70,
                           'color' => true,
                           'depth' => pow(2, 16)
                           )
                     ),
               array(
                     array(
                           'HTTP_X_UP_DEVCAP_SCREENPIXELS' => '90,70',
                           'HTTP_USER_AGENT' => 'KDDI-TS21 UP.Browser/6.0.2.276 (GUI) MMP/1.1',
                           'HTTP_X_UP_DEVCAP_SCREENDEPTH' => '1',
                           'HTTP_X_UP_DEVCAP_ISCOLOR' => '0'
                           ),
                     array(
                           'width' => 90,
                           'height' => 70,
                           'color' => false,
                           'depth' => 2
                           )
                     ),
               array(
                     array('HTTP_USER_AGENT' => 'DoCoMo/1.0/D501i'),
                     array(
                           'width' => 96,
                           'height' => 72,
                           'color' => false,
                           'depth' => 2
                           )
                     ),
               array(
                     array('HTTP_USER_AGENT' => 'DoCoMo/1.0/D502i'),
                     array(
                           'width' => 96,
                           'height' => 90,
                           'color' => true,
                           'depth' => 256
                           )
                     ),
               array(
                     array('HTTP_USER_AGENT' => 'DoCoMo/1.0/N502i'),
                     array(
                           'width' => 118,
                           'height' => 128,
                           'color' => false,
                           'depth' => 4
                           )
                     ),
               array(
                     array('HTTP_USER_AGENT' => 'DoCoMo/2.0 P2102V(c100;TB)'),
                     array(
                           'width' => 176,
                           'height' => 198,
                           'color' => true,
                           'depth' => 262144
                           )
                     ),
               array(
                     array('HTTP_USER_AGENT' => 'DoCoMo/1.0/N251iS/c10/TB'),
                     array(
                           'width' => 132,
                           'height' => 140,
                           'color' => true,
                           'depth' => 65536
                           )
                     ),
               array(
                     array('HTTP_USER_AGENT' => 'DoCoMo/1.0/F661i/c10/TB'),
                     array(
                           'width' => 132,
                           'height' => 136,
                           'color' => true,
                           'depth' => 65536
                           )
                     ),
               array(
                     array('HTTP_USER_AGENT' => 'DoCoMo/1.0/D505i/c20/TC/W20H10'),
                     array(
                           'width' => 240,
                           'height' => 270,
                           'color' => true,
                           'depth' => 262144,
                           'width_bytes' => 20,
                           'height_bytes' => 10
                           )
                     ),
               array(
                     array('HTTP_USER_AGENT' => 'DoCoMo/1.0/SO505i/c20/TB/W21H09'),
                     array(
                           'width' => 256,
                           'height' => 240,
                           'color' => true,
                           'depth' => 262144,
                           'width_bytes' => 21,
                           'height_bytes' => 9
                           )
                     ),
               array(
                     array('HTTP_USER_AGENT' => 'Mozilla/3.0(DDIPOCKET;JRC/AH-J3001V,AH-J3002V/1.0/0100/c50)CNF/2.0'),
                     array(
                           'width' => 0,
                           'height' => 0,
                           'color' => false,
                           'depth' => 0
                           )
                     )
               );

print "Testing Display ...\n";

foreach ($tests as $value1) {
    $_SERVER = $value1[0];
    $values = $value1[1];
    $agent = &Net_UserAgent_Mobile::factory();
    $display = $agent->getDisplay();
    print is_object($display) . "\n";
    print get_class($display) . "\n";
    foreach ($values as $key => $value) {
        switch ($key) {
        case 'width':
            print $display->getWidth() . "\n";
            break;
        case 'height':
            print $display->getHeight() . "\n";
            break;
        case 'color':
            print $display->isColor() . "\n";
            break;
        case 'depth':
            print $display->getDepth() . "\n";
            break;
        case 'width_bytes':
            print $display->getWidthBytes() . "\n";
            break;
        case 'height_bytes':
            print $display->getHeightBytes() . "\n";
            break;
        }
    }
}
?>
--POST--
--GET--
--EXPECT--
Testing Display ...
1
net_useragent_mobile_display
120
117
1
256
1
net_useragent_mobile_display
90
70
1
65536
1
net_useragent_mobile_display
90
70

2
1
net_useragent_mobile_display
96
72

2
1
net_useragent_mobile_display
96
90
1
256
1
net_useragent_mobile_display
118
128

4
1
net_useragent_mobile_display
176
198
1
262144
1
net_useragent_mobile_display
132
140
1
65536
1
net_useragent_mobile_display
132
136
1
65536
1
net_useragent_mobile_display
240
270
1
262144
20
10
1
net_useragent_mobile_display
256
240
1
262144
21
9
1
net_useragent_mobile_display
0
0

0
