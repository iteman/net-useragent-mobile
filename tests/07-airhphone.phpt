--TEST--
Net_UserAgent_Mobile: AirH"PHONE
--SKIPIF--
<?php if (!@include('../Mobile.php')) print 'skip'; ?>
--FILE--
<?php
//
// Test for: Net/UserAgent/Mobile.php
// Parts tested: - AirH"PHONE
//

error_reporting(E_ALL);
require_once('../Mobile.php');

$tests = array(
               // ua, name, vendor, model, model_version, browser_version
               array('Mozilla/3.0(DDIPOCKET;JRC/AH-J3001V,AH-J3002V/1.0/0100/c50)CNF/2.0', 'DDIPOCKET', 'JRC', 'AH-J3001V,AH-J3002V', '1.0', '0100', 50)
               );

$test_agents = array(
                     'Mozilla/3.0(DDIPOCKET;JRC/AH-J3001V,AH-J3002V/1.0/0100/c50)CNF/2.0'
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
}

foreach ($test_agents as $value) {
    $_SERVER['HTTP_USER_AGENT'] = $value;
    $agent = &Net_UserAgent_Mobile::factory();
    print is_object($agent) . "\n";
    print strtolower(get_parent_class($agent)) . "\n";
    print strtolower(get_class($agent)) . "\n";
    print $agent->isAirHPhone() . "\n";
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
DDIPOCKET
JRC
AH-J3001V,AH-J3002V
1.0
0100
50
1
net_useragent_mobile_common
net_useragent_mobile_airhphone
1
