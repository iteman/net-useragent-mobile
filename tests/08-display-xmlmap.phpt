--TEST--
Net_UserAgent_Mobile: the XML map for Net_UserAgent_Mobile_Display
--SKIPIF--
<?php if (!@include('../Mobile.php')) print 'skip'; ?>
--FILE--
<?php
//
// Test for: Net/UserAgent/Mobile.php
// Parts tested: - the XML map for Net_UserAgent_Mobile_Display
//

error_reporting(E_ALL);
require_once('../Mobile.php');

$_SERVER['DOCOMO_MAP'] = 'DoCoMoMap.xml';

$tests = array(
               // ua, version, html_version, model, cache_size, is_foma, vendor, series, options
               array(array('HTTP_USER_AGENT' => 'DoCoMo/1.0/D501i'),
                     array('width' => 96, 'height' => 72, 'color' => 0, 'depth' => 2)),
               array(array('HTTP_USER_AGENT' => 'DoCoMo/1.0/D502i'),
                     array('width' => 96, 'height' => 90, 'color' => 1, 'depth' => 256)),
               array(array('HTTP_USER_AGENT' => 'DoCoMo/1.0/N502i'),
                     array('width' => 118, 'height' => 128, 'color' => 0, 'depth' => 4))
               );

print "Testing the XML map for Net_UserAgent_Mobile_Display ...\n";

foreach ($tests as $value1) {
    foreach ($value1[0] as $key2 => $value2) {
        $_SERVER[$key2] = $value2;
    }
    $agent = &Net_UserAgent_Mobile::factory();
    $display = $agent->getDisplay();
    print is_a($display, 'Net_UserAgent_Mobile_Display') . "\n";
    foreach ($value1[1] as $attributeName => $attributeValue) {
        switch ($attributeName) {
        case 'width':
            print (boolean)($display->getWidth() === $attributeValue) . "\n";
            break;
        case 'height':
            print (boolean)($display->getHeight() === $attributeValue) . "\n";
            break;
        case 'color':
            print (boolean)($display->isColor() === (boolean)$attributeValue) . "\n";
            break;
        case 'depth':
            print (boolean)($display->getDepth() === $attributeValue) . "\n";
            break;
        default:
            break;
        }
    }
}
?>
--POST--
--GET--
--EXPECT--
Testing the XML map for Net_UserAgent_Mobile_Display ...
1
1
1
1
1
1
1
1
1
1
1
1
1
1
1
