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
                           'width_bytes' => 20,
                           'height_bytes' => 10
                           )
                     )
               );

$line = 0;

++$line;
print "$line: " . "Testing Display ...\n";

foreach ($tests as $value1) {
    $_SERVER = $value1[0];
    $values = $value1[1];
    $agent = &Net_UserAgent_Mobile::factory();
    $display = $agent->getDisplay();
    ++$line;
    print "$line: " . is_object($display) . "\n";
    ++$line;
    print "$line: " . get_class($display) . "\n";
    foreach ($values as $key => $value) {
        switch ($key) {
        case 'width':
            ++$line;
            print "$line: " . $display->getWidth() . "\n";
            break;
        case 'height':
            ++$line;
            print "$line: " . $display->getHeight() . "\n";
            break;
        case 'color':
            ++$line;
            print "$line: " . $display->isColor() . "\n";
            break;
        case 'depth':
            ++$line;
            print "$line: " . $display->getDepth() . "\n";
            break;
        case 'width_bytes':
            ++$line;
            print "$line: " . $display->getWidthBytes() . "\n";
            break;
        case 'height_bytes':
            ++$line;
            print "$line: " . $display->getHeightBytes() . "\n";
            break;
        }
    }
}
?>
--POST--
--GET--
--EXPECT--
1: Testing Display ...
2: 1
3: net_useragent_mobile_display
4: 120
5: 117
6: 1
7: 256
8: 1
9: net_useragent_mobile_display
10: 90
11: 70
12: 1
13: 65536
14: 1
15: net_useragent_mobile_display
16: 90
17: 70
18: 
19: 2
20: 1
21: net_useragent_mobile_display
22: 96
23: 72
24: 
25: 2
26: 1
27: net_useragent_mobile_display
28: 96
29: 90
30: 1
31: 256
32: 1
33: net_useragent_mobile_display
34: 118
35: 128
36: 
37: 4
38: 1
39: net_useragent_mobile_display
40: 176
41: 198
42: 1
43: 262144
44: 1
45: net_useragent_mobile_display
46: 132
47: 140
48: 1
49: 65536
50: 1
51: net_useragent_mobile_display
52: 132
53: 136
54: 1
55: 65536
56: 1
57: net_useragent_mobile_display
58: 20
59: 10
