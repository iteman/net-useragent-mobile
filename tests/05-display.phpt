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

