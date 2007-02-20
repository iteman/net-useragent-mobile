--TEST--
Net_UserAgent_Mobile: AirH"PHONE
--SKIPIF--
<?php if (!@include 'Net/UserAgent/Mobile.php') print 'skip'; ?>
--FILE--
<?php
//
// Test for: Net/UserAgent/Mobile.php
// Parts tested: - AirH"PHONE
//

error_reporting(E_ALL);
require_once 'Net/UserAgent/Mobile.php';

$tests = array(
               // ua, name, vendor, model, model_version, browser_version, cache_size
               array('Mozilla/3.0(DDIPOCKET;JRC/AH-J3001V,AH-J3002V/1.0/0100/c50)CNF/2.0', 'WILLCOM', 'JRC', 'AH-J3001V,AH-J3002V', '1.0', '0100', 50),
               array('Mozilla/3.0(DDIPOCKET;KYOCERA/AH-K3001V/1.7.2.70.000000/0.1/C100) Opera 7.0', 'WILLCOM', 'KYOCERA', 'AH-K3001V', '1.7.2.70.000000', '0.1', 100),
               array('Mozilla/3.0(DDIPOCKET;JRC/AH-J3003S/1.0/0100/c50)CNF/2.0', 'WILLCOM', 'JRC', 'AH-J3003S', '1.0', '0100', 50),
               array('Mozilla/3.0(WILLCOM;SANYO/WX310SA/2;1/1/C128) NetFront/3.3,61.198.142.127', 'WILLCOM', 'SANYO', 'WX310SA', '2;1', '1', 128)
               );

print "Testing AirH\"PHONE ...\n";

foreach ($tests as $value) {
    $ua = array_shift($value);
    $data = $value;
    $agent = &Net_UserAgent_Mobile::factory($ua);
    print is_object($agent) . "\n";
    print strtolower(get_parent_class($agent)) . "\n";
    print strtolower(get_class($agent)) . "\n";
    print $agent->isAirHPhone() . "\n";
    print $agent->getName() . "\n";
    print $agent->getVendor() . "\n";
    print $agent->getModel() . "\n";
    print $agent->getModelVersion() . "\n";
    print $agent->getBrowserVersion() . "\n";
    print $agent->getCacheSize() . "\n";
    if ($agent->getCarrierShortName() != 'H') {
        print "Carrier short name isn't H\n";
    }
    if ($agent->getCarrierLongName() != 'AirH') {
        print "Carrier long name isn't AirH\n";
    }
}
?>
--POST--
--GET--
--EXPECT--
Testing AirH"PHONE ...
1
net_useragent_mobile_common
net_useragent_mobile_airhphone
1
WILLCOM
JRC
AH-J3001V,AH-J3002V
1.0
0100
50
1
net_useragent_mobile_common
net_useragent_mobile_airhphone
1
WILLCOM
KYOCERA
AH-K3001V
1.7.2.70.000000
0.1
100
1
net_useragent_mobile_common
net_useragent_mobile_airhphone
1
WILLCOM
JRC
AH-J3003S
1.0
0100
50
1
net_useragent_mobile_common
net_useragent_mobile_airhphone
1
WILLCOM
SANYO
WX310SA
2;1
1
128
