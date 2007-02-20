--TEST--
Net_UserAgent_Mobile: Display
--SKIPIF--
<?php if (!@include 'Net/UserAgent/Mobile.php') print 'skip'; ?>
--FILE--
<?php
//
// Test for: Net/UserAgent/Mobile.php
// Parts tested: - Display
//

error_reporting(E_ALL);
require_once 'Net/UserAgent/Mobile.php';

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
                     ),
               array(
                     array('HTTP_USER_AGENT' => 'DoCoMo/1.0/P505i/c20/TB/W20H10'),
                     array(
                           'width' => 240,
                           'height' => 266,
                           'color' => true,
                           'depth' => 65536,
                           'width_bytes' => 20,
                           'height_bytes' => 10
                           )
                     ),
               array(
                     array('HTTP_USER_AGENT' => 'DoCoMo/1.0/SH505i2/c20/TB/W24H12'),
                     array(
                           'width' => 240,
                           'height' => 252,
                           'color' => true,
                           'depth' => 262144,
                           'width_bytes' => 24,
                           'height_bytes' => 12
                           )
                     ),
               array(
                     array('HTTP_USER_AGENT' => 'DoCoMo/1.0/F672i/c10/TB'),
                     array(
                           'width' => 160,
                           'height' => 120,
                           'color' => true,
                           'depth' => 65536
                           )
                     ),
               array(
                     array('HTTP_USER_AGENT' => 'DoCoMo/1.0/D252i/c10/TB/W25H12'),
                     array(
                           'width' => 176,
                           'height' => 198,
                           'color' => true,
                           'depth' => 262144,
                           'width_bytes' => 25,
                           'height_bytes' => 12
                           )
                     ),
               array(
                     array('HTTP_USER_AGENT' => 'DoCoMo/1.0/SH252i/c20/TB/W24H12'),
                     array(
                           'width' => 240,
                           'height' => 252,
                           'color' => true,
                           'depth' => 262144,
                           'width_bytes' => 24,
                           'height_bytes' => 12
                           )
                     ),
               array(
                     array('HTTP_USER_AGENT' => 'DoCoMo/1.0/D505iS/c20/TB/W20H10'),
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
                     array('HTTP_USER_AGENT' => 'DoCoMo/1.0/P505iS/c20/TB/W20H10'),
                     array(
                           'width' => 240,
                           'height' => 266,
                           'color' => true,
                           'depth' => 65536,
                           'width_bytes' => 20,
                           'height_bytes' => 10
                           )
                     ),
               array(
                     array('HTTP_USER_AGENT' => 'DoCoMo/1.0/P252i/c10/TB/W22H10'),
                     array(
                           'width' => 132,
                           'height' => 144,
                           'color' => true,
                           'depth' => 65536,
                           'width_bytes' => 22,
                           'height_bytes' => 10
                           )
                     ),
               array(
                     array('HTTP_USER_AGENT' => 'DoCoMo/1.0/N252i/c10/TB/W22H10'),
                     array(
                           'width' => 132,
                           'height' => 140,
                           'color' => true,
                           'depth' => 65536,
                           'width_bytes' => 22,
                           'height_bytes' => 10
                           )
                     ),
               array(
                     array('HTTP_USER_AGENT' => 'DoCoMo/1.0/N505iS/c20/TB/W20H10'),
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
                     array('HTTP_USER_AGENT' => 'DoCoMo/1.0/SO505iS/c20/TB/W20H10'),
                     array(
                           'width' => 240,
                           'height' => 256,
                           'color' => true,
                           'depth' => 262144,
                           'width_bytes' => 20,
                           'height_bytes' => 10
                           )
                     ),
               array(
                     array('HTTP_USER_AGENT' => 'DoCoMo/1.0/SH505iS/c20/TB/W24H12'),
                     array(
                           'width' => 240,
                           'height' => 252,
                           'color' => true,
                           'depth' => 262144,
                           'width_bytes' => 24,
                           'height_bytes' => 12
                           )
                     ),
               array(
                     array('HTTP_USER_AGENT' => 'DoCoMo/1.0/F505iGPS/c20/TB/W20H10'),
                     array(
                           'width' => 240,
                           'height' => 268,
                           'color' => true,
                           'depth' => 262144,
                           'width_bytes' => 20,
                           'height_bytes' => 10
                           )
                     ),
               array(
                     array('HTTP_USER_AGENT' => 'DoCoMo/2.0 F900i(c100;TB;W22H12)'),
                     array(
                           'width' => 230,
                           'height' => 242,
                           'color' => true,
                           'depth' => 262144,
                           'width_bytes' => 22,
                           'height_bytes' => 12
                           )
                     ),
               array(
                     array('HTTP_USER_AGENT' => 'DoCoMo/2.0 N900i(c100;TB;W24H12)'),
                     array(
                           'width' => 240,
                           'height' => 269,
                           'color' => true,
                           'depth' => 65536,
                           'width_bytes' => 24,
                           'height_bytes' => 12
                           )
                     ),
               array(
                     array('HTTP_USER_AGENT' => 'DoCoMo/2.0 P900i(c100;TB;W24H11)'),
                     array(
                           'width' => 240,
                           'height' => 266,
                           'color' => true,
                           'depth' => 65536,
                           'width_bytes' => 24,
                           'height_bytes' => 11
                           )
                     ),
               array(
                     array('HTTP_USER_AGENT' => 'DoCoMo/2.0 SH900i(c100;TB;W24H12)'),
                     array(
                           'width' => 240,
                           'height' => 252,
                           'color' => true,
                           'depth' => 262144,
                           'width_bytes' => 24,
                           'height_bytes' => 12
                           )
                     ),
               array(
                     array('HTTP_USER_AGENT' => 'DoCoMo/1.0/P651ps'),
                     array(
                           'width' => 96,
                           'height' => 87,
                           'color' => false,
                           'depth' => 4
                           )
                     ),
               array(
                     array('HTTP_USER_AGENT' => 'DoCoMo/1.0/SO213i/c10/TB'),
                     array(
                           'width' => 120,
                           'height' => 112,
                           'color' => true,
                           'depth' => 65536
                           )
                     ),
               array(
                     array('HTTP_USER_AGENT' => 'DoCoMo/2.0 F880iES(c100;TB;W20H08)'),
                     array(
                           'width' => 240,
                           'height' => 256,
                           'color' => true,
                           'depth' => 65536,
                           'width_bytes' => 20,
                           'height_bytes' => 8
                           )
                     ),
               array(
                     array('HTTP_USER_AGENT' => 'DoCoMo/1.0/SO213iS/c10/TB'),
                     array(
                           'width' => 120,
                           'height' => 112,
                           'color' => true,
                           'depth' => 65536
                           )
                     ),
               array(
                     array('HTTP_USER_AGENT' => 'DoCoMo/1.0/D253i/c10/TB/W17H09'),
                     array(
                           'width' => 176,
                           'height' => 198,
                           'color' => true,
                           'depth' => 262144,
                           'width_bytes' => 17,
                           'height_bytes' => 9
                           )
                     ),
               array(
                     array('HTTP_USER_AGENT' => 'DoCoMo/1.0/N253i/c10/TB/W20H10'),
                     array(
                           'width' => 160,
                           'height' => 180,
                           'color' => true,
                           'depth' => 65536,
                           'width_bytes' => 20,
                           'height_bytes' => 10
                           )
                     ),
               array(
                     array('HTTP_USER_AGENT' => 'DoCoMo/1.0/P253i/c10/TB/W22H10'),
                     array(
                           'width' => 132,
                           'height' => 144,
                           'color' => true,
                           'depth' => 65536,
                           'width_bytes' => 22,
                           'height_bytes' => 10
                           )
                     ),
               array(
                     array('HTTP_USER_AGENT' => 'DoCoMo/1.0/D253iWM/c10/TB/W27H08'),
                     array(
                           'width' => 220,
                           'height' => 144,
                           'color' => true,
                           'depth' => 262144,
                           'width_bytes' => 27,
                           'height_bytes' => 08
                           )
                     ),
               array(
                     array('HTTP_USER_AGENT' => 'DoCoMo/1.0/P213i/c10/TB/W22H10'),
                     array(
                           'width' => 132,
                           'height' => 144,
                           'color' => true,
                           'depth' => 65536,
                           'width_bytes' => 22,
                           'height_bytes' => 10
                           )
                     ),
               array(
                     array('HTTP_USER_AGENT' => 'DoCoMo/2.0 N900iL(c100;TB;W24H12)'),
                     array(
                           'width' => 240,
                           'height' => 269,
                           'color' => true,
                           'depth' => 262144,
                           'width_bytes' => 24,
                           'height_bytes' => 12
                           )
                     ),
               array(
                     array('HTTP_USER_AGENT' => 'DoCoMo/2.0 N900iG(c100;TB;W24H12)'),
                     array(
                           'width' => 240,
                           'height' => 269,
                           'color' => true,
                           'depth' => 262144,
                           'width_bytes' => 24,
                           'height_bytes' => 12
                           )
                     ),
               array(
                     array('HTTP_USER_AGENT' => 'DoCoMo/2.0 SH901iC(c100;TB;W24H12)'),
                     array(
                           'width' => 240,
                           'height' => 252,
                           'color' => true,
                           'depth' => 262144,
                           'width_bytes' => 24,
                           'height_bytes' => 12
                           )
                     ),
               array(
                     array('HTTP_USER_AGENT' => 'DoCoMo/2.0 F901iC(c100;TB;W23H12)'),
                     array(
                           'width' => 230,
                           'height' => 240,
                           'color' => true,
                           'depth' => 262144,
                           'width_bytes' => 23,
                           'height_bytes' => 12
                           )
                     ),
               array(
                     array('HTTP_USER_AGENT' => 'DoCoMo/1.0/N506iS/c20/TB/W20H11'),
                     array(
                           'width' => 240,
                           'height' => 295,
                           'color' => true,
                           'depth' => 262144,
                           'width_bytes' => 20,
                           'height_bytes' => 11
                           )
                     ),
               array(
                     array('HTTP_USER_AGENT' => 'DoCoMo/1.0/SO506i/c20/TB/W20H10'),
                     array(
                           'width' => 240,
                           'height' => 256,
                           'color' => true,
                           'depth' => 262144,
                           'width_bytes' => 20,
                           'height_bytes' => 10
                           )
                     ),
               array(
                     array('HTTP_USER_AGENT' => 'DoCoMo/1.0/P253iS/c10/TB/W22H10'),
                     array(
                           'width' => 132,
                           'height' => 144,
                           'color' => true,
                           'depth' => 65536,
                           'width_bytes' => 22,
                           'height_bytes' => 10
                           )
                     ),
               array(
                     array('HTTP_USER_AGENT' => 'DoCoMo/2.0 N901iC(c100;TB;W24H12)'),
                     array(
                           'width' => 240,
                           'height' => 270,
                           'color' => true,
                           'depth' => 65536,
                           'width_bytes' => 24,
                           'height_bytes' => 12
                           )
                     ),
               array(
                     array('HTTP_USER_AGENT' => 'DoCoMo/2.0 D901i(c100;TB;W23H12)'),
                     array(
                           'width' => 230,
                           'height' => 240,
                           'color' => true,
                           'depth' => 262144,
                           'width_bytes' => 23,
                           'height_bytes' => 12
                           )
                     ),
               array(
                     array('HTTP_USER_AGENT' => 'DoCoMo/2.0 P901i(c100;TB;W24H12)'),
                     array(
                           'width' => 240,
                           'height' => 270,
                           'color' => true,
                           'depth' => 65536,
                           'width_bytes' => 24,
                           'height_bytes' => 12
                           )
                     ),
               array(
                     array('HTTP_USER_AGENT' => 'DoCoMo/2.0 F700i(c100;TB;W23H12)'),
                     array(
                           'width' => 230,
                           'height' => 240,
                           'color' => true,
                           'depth' => 262144,
                           'width_bytes' => 23,
                           'height_bytes' => 12
                           )
                     ),
               array(
                     array('HTTP_USER_AGENT' => 'DoCoMo/2.0 SH700i(c100;TB;W24H12)'),
                     array(
                           'width' => 240,
                           'height' => 252,
                           'color' => true,
                           'depth' => 262144,
                           'width_bytes' => 24,
                           'height_bytes' => 12
                           )
                     ),
               array(
                     array('HTTP_USER_AGENT' => 'DoCoMo/2.0 N700i(c100;TB;W24H12)'),
                     array(
                           'width' => 240,
                           'height' => 270,
                           'color' => true,
                           'depth' => 65536,
                           'width_bytes' => 24,
                           'height_bytes' => 12
                           )
                     ),
               array(
                     array('HTTP_USER_AGENT' => 'DoCoMo/2.0 P700i(c100;TB;W24H12)'),
                     array(
                           'width' => 240,
                           'height' => 270,
                           'color' => true,
                           'depth' => 65536,
                           'width_bytes' => 24,
                           'height_bytes' => 12
                           )
                     ),
               array(
                     array('HTTP_USER_AGENT' => 'DoCoMo/1.0/SO506iS/c20/TB/W20H10'),
                     array(
                           'width' => 240,
                           'height' => 256,
                           'color' => true,
                           'depth' => 262144,
                           'width_bytes' => 20,
                           'height_bytes' => 10
                           )
                     ),
               array(
                     array('HTTP_USER_AGENT' => 'DoCoMo/2.0 SH901iS(c100;TB;W24H12)'),
                     array(
                           'width' => 240,
                           'height' => 252,
                           'color' => true,
                           'depth' => 262144,
                           'width_bytes' => 24,
                           'height_bytes' => 12
                           )
                     ),
               array(
                     array('HTTP_USER_AGENT' => 'DoCoMo/2.0 F901iS(c100;TB;W23H12)'),
                     array(
                           'width' => 230,
                           'height' => 240,
                           'color' => true,
                           'depth' => 262144,
                           'width_bytes' => 23,
                           'height_bytes' => 12
                           )
                     ),
               array(
                     array('HTTP_USER_AGENT' => 'DoCoMo/2.0 D901iS(c100;TB;W23H12)'),
                     array(
                           'width' => 230,
                           'height' => 240,
                           'color' => true,
                           'depth' => 262144,
                           'width_bytes' => 23,
                           'height_bytes' => 12
                           )
                     ),
               array(
                     array('HTTP_USER_AGENT' => 'DoCoMo/2.0 P901iS(c100;TB;W24H12)'),
                     array(
                           'width' => 240,
                           'height' => 270,
                           'color' => true,
                           'depth' => 65536,
                           'width_bytes' => 24,
                           'height_bytes' => 12
                           )
                     ),
               array(
                     array('HTTP_USER_AGENT' => 'DoCoMo/2.0 N901iS(c100;TB;W24H12)'),
                     array(
                           'width' => 240,
                           'height' => 270,
                           'color' => true,
                           'depth' => 65536,
                           'width_bytes' => 24,
                           'height_bytes' => 12
                           )
                     ),
               array(
                     array('HTTP_USER_AGENT' => 'DoCoMo/2.0 F700iS(c100;TB;W23H12)'),
                     array(
                           'width' => 230,
                           'height' => 240,
                           'color' => true,
                           'depth' => 262144,
                           'width_bytes' => 23,
                           'height_bytes' => 12
                           )
                     ),
               array(
                     array('HTTP_USER_AGENT' => 'DoCoMo/2.0 SH700iS(c100;TB;W24H12)'),
                     array(
                           'width' => 240,
                           'height' => 252,
                           'color' => true,
                           'depth' => 262144,
                           'width_bytes' => 24,
                           'height_bytes' => 12
                           )
                     ),
               array(
                     array('HTTP_USER_AGENT' => 'DoCoMo/2.0 SH851i(c100;TB;W24H12)'),
                     array(
                           'width' => 240,
                           'height' => 252,
                           'color' => true,
                           'depth' => 262144,
                           'width_bytes' => 24,
                           'height_bytes' => 12
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
    print strtolower(get_class($display)) . "\n";
    print $agent->getUserAgent() . "\n";
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
J-PHONE/2.0/J-DN02
120
117
1
256
1
net_useragent_mobile_display
KDDI-TS21 UP.Browser/6.0.2.276 (GUI) MMP/1.1
90
70
1
65536
1
net_useragent_mobile_display
KDDI-TS21 UP.Browser/6.0.2.276 (GUI) MMP/1.1
90
70

2
1
net_useragent_mobile_display
DoCoMo/1.0/D501i
96
72

2
1
net_useragent_mobile_display
DoCoMo/1.0/D502i
96
90
1
256
1
net_useragent_mobile_display
DoCoMo/1.0/N502i
118
128

4
1
net_useragent_mobile_display
DoCoMo/2.0 P2102V(c100;TB)
176
198
1
262144
1
net_useragent_mobile_display
DoCoMo/1.0/N251iS/c10/TB
132
140
1
65536
1
net_useragent_mobile_display
DoCoMo/1.0/F661i/c10/TB
132
136
1
65536
1
net_useragent_mobile_display
DoCoMo/1.0/D505i/c20/TC/W20H10
240
270
1
262144
20
10
1
net_useragent_mobile_display
DoCoMo/1.0/SO505i/c20/TB/W21H09
256
240
1
262144
21
9
1
net_useragent_mobile_display
Mozilla/3.0(DDIPOCKET;JRC/AH-J3001V,AH-J3002V/1.0/0100/c50)CNF/2.0
0
0

0
1
net_useragent_mobile_display
DoCoMo/1.0/P505i/c20/TB/W20H10
240
266
1
65536
20
10
1
net_useragent_mobile_display
DoCoMo/1.0/SH505i2/c20/TB/W24H12
240
252
1
262144
24
12
1
net_useragent_mobile_display
DoCoMo/1.0/F672i/c10/TB
160
120
1
65536
1
net_useragent_mobile_display
DoCoMo/1.0/D252i/c10/TB/W25H12
176
198
1
262144
25
12
1
net_useragent_mobile_display
DoCoMo/1.0/SH252i/c20/TB/W24H12
240
252
1
262144
24
12
1
net_useragent_mobile_display
DoCoMo/1.0/D505iS/c20/TB/W20H10
240
270
1
262144
20
10
1
net_useragent_mobile_display
DoCoMo/1.0/P505iS/c20/TB/W20H10
240
266
1
65536
20
10
1
net_useragent_mobile_display
DoCoMo/1.0/P252i/c10/TB/W22H10
132
144
1
65536
22
10
1
net_useragent_mobile_display
DoCoMo/1.0/N252i/c10/TB/W22H10
132
140
1
65536
22
10
1
net_useragent_mobile_display
DoCoMo/1.0/N505iS/c20/TB/W20H10
240
270
1
262144
20
10
1
net_useragent_mobile_display
DoCoMo/1.0/SO505iS/c20/TB/W20H10
240
256
1
262144
20
10
1
net_useragent_mobile_display
DoCoMo/1.0/SH505iS/c20/TB/W24H12
240
252
1
262144
24
12
1
net_useragent_mobile_display
DoCoMo/1.0/F505iGPS/c20/TB/W20H10
240
268
1
262144
20
10
1
net_useragent_mobile_display
DoCoMo/2.0 F900i(c100;TB;W22H12)
230
240
1
262144
22
12
1
net_useragent_mobile_display
DoCoMo/2.0 N900i(c100;TB;W24H12)
240
269
1
65536
24
12
1
net_useragent_mobile_display
DoCoMo/2.0 P900i(c100;TB;W24H11)
240
266
1
65536
24
11
1
net_useragent_mobile_display
DoCoMo/2.0 SH900i(c100;TB;W24H12)
240
252
1
262144
24
12
1
net_useragent_mobile_display
DoCoMo/1.0/P651ps
96
87

4
1
net_useragent_mobile_display
DoCoMo/1.0/SO213i/c10/TB
120
112
1
65536
1
net_useragent_mobile_display
DoCoMo/2.0 F880iES(c100;TB;W20H08)
240
256
1
65536
20
8
1
net_useragent_mobile_display
DoCoMo/1.0/SO213iS/c10/TB
120
112
1
65536
1
net_useragent_mobile_display
DoCoMo/1.0/D253i/c10/TB/W17H09
176
198
1
262144
17
9
1
net_useragent_mobile_display
DoCoMo/1.0/N253i/c10/TB/W20H10
160
180
1
65536
20
10
1
net_useragent_mobile_display
DoCoMo/1.0/P253i/c10/TB/W22H10
132
144
1
65536
22
10
1
net_useragent_mobile_display
DoCoMo/1.0/D253iWM/c10/TB/W27H08
220
144
1
262144
27
8
1
net_useragent_mobile_display
DoCoMo/1.0/P213i/c10/TB/W22H10
132
144
1
65536
22
10
1
net_useragent_mobile_display
DoCoMo/2.0 N900iL(c100;TB;W24H12)
240
269
1
65536
24
12
1
net_useragent_mobile_display
DoCoMo/2.0 N900iG(c100;TB;W24H12)
240
269
1
65536
24
12
1
net_useragent_mobile_display
DoCoMo/2.0 SH901iC(c100;TB;W24H12)
240
252
1
262144
24
12
1
net_useragent_mobile_display
DoCoMo/2.0 F901iC(c100;TB;W23H12)
230
240
1
262144
23
12
1
net_useragent_mobile_display
DoCoMo/1.0/N506iS/c20/TB/W20H11
240
295
1
262144
20
11
1
net_useragent_mobile_display
DoCoMo/1.0/SO506i/c20/TB/W20H10
240
256
1
262144
20
10
1
net_useragent_mobile_display
DoCoMo/1.0/P253iS/c10/TB/W22H10
132
144
1
65536
22
10
1
net_useragent_mobile_display
DoCoMo/2.0 N901iC(c100;TB;W24H12)
240
270
1
65536
24
12
1
net_useragent_mobile_display
DoCoMo/2.0 D901i(c100;TB;W23H12)
230
240
1
262144
23
12
1
net_useragent_mobile_display
DoCoMo/2.0 P901i(c100;TB;W24H12)
240
270
1
65536
24
12
1
net_useragent_mobile_display
DoCoMo/2.0 F700i(c100;TB;W23H12)
230
240
1
262144
23
12
1
net_useragent_mobile_display
DoCoMo/2.0 SH700i(c100;TB;W24H12)
240
252
1
262144
24
12
1
net_useragent_mobile_display
DoCoMo/2.0 N700i(c100;TB;W24H12)
240
270
1
65536
24
12
1
net_useragent_mobile_display
DoCoMo/2.0 P700i(c100;TB;W24H12)
240
270
1
65536
24
12
1
net_useragent_mobile_display
DoCoMo/1.0/SO506iS/c20/TB/W20H10
240
256
1
262144
20
10
1
net_useragent_mobile_display
DoCoMo/2.0 SH901iS(c100;TB;W24H12)
240
252
1
262144
24
12
1
net_useragent_mobile_display
DoCoMo/2.0 F901iS(c100;TB;W23H12)
230
240
1
262144
23
12
1
net_useragent_mobile_display
DoCoMo/2.0 D901iS(c100;TB;W23H12)
230
240
1
262144
23
12
1
net_useragent_mobile_display
DoCoMo/2.0 P901iS(c100;TB;W24H12)
240
270
1
65536
24
12
1
net_useragent_mobile_display
DoCoMo/2.0 N901iS(c100;TB;W24H12)
240
270
1
65536
24
12
1
net_useragent_mobile_display
DoCoMo/2.0 F700iS(c100;TB;W23H12)
230
240
1
262144
23
12
1
net_useragent_mobile_display
DoCoMo/2.0 SH700iS(c100;TB;W24H12)
240
252
1
262144
24
12
1
net_useragent_mobile_display
DoCoMo/2.0 SH851i(c100;TB;W24H12)
240
252
1
262144
24
12
