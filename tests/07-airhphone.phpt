--TEST--
Net_UserAgent_Mobile: AirH"PHONE
--SKIPIF--
<?php if (!@include('Net/UserAgent/Mobile.php')) print 'skip'; ?>
--FILE--
<?php
//
// Test for: Net/UserAgent/Mobile.php
// Parts tested: - AirH"PHONE
//

error_reporting(E_ALL);
require_once('Net/UserAgent/Mobile.php');

$tests = array(
               // ua, name, vendor, model, model_version, browser_version
               array('Mozilla/3.0(DDIPOCKET;JRC/AH-J3001V,AH-J3002V/1.0/0100/c50)CNF/2.0', 'DDIPOCKET', 'JRC', 'AH-J3001V,AH-J3002V', '1.0', '0100', 50)
               );

$test_agents = array(
                     'Mozilla/3.0(DDIPOCKET;JRC/AH-J3001V,AH-J3002V/1.0/0100/c50)CNF/2.0'
                     );

$line = 0;

++$line;
print "$line: " . "Testing AirH\"PHONE ...\n";

foreach ($tests as $value) {
    $ua = array_shift($value);
    $data = $value;
    $agent = &Net_UserAgent_Mobile::factory($ua);
    ++$line;
    print "$line: " . is_object($agent) . "\n";
    ++$line;
    print "$line: " . get_parent_class($agent) . "\n";
    ++$line;
    print "$line: " . get_class($agent) . "\n";
    ++$line;
    print "$line: " . $agent->isAirHPhone() . "\n";
    ++$line;
    print "$line: " . $agent->getName() . "\n";
    ++$line;
    print "$line: " . $agent->getVendor() . "\n";
    ++$line;
    print "$line: " . $agent->getModel() . "\n";
    ++$line;
    print "$line: " . $agent->getModelVersion() . "\n";
    ++$line;
    print "$line: " . $agent->getBrowserVersion() . "\n";
    ++$line;
    print "$line: " . $agent->getCacheSize() . "\n";
}

foreach ($test_agents as $value) {
    $_SERVER['HTTP_USER_AGENT'] = $value;
    $agent = &Net_UserAgent_Mobile::factory();
    ++$line;
    print "$line: " . is_object($agent) . "\n";
    ++$line;
    print "$line: " . get_parent_class($agent) . "\n";
    ++$line;
    print "$line: " . get_class($agent) . "\n";
    ++$line;
    print "$line: " . $agent->isAirHPhone() . "\n";
}
?>
--POST--
--GET--
--EXPECT--
1: Testing AirH"PHONE ...
2: 1
3: net_useragent_mobile_common
4: net_useragent_mobile_airhphone
5: 1
6: DDIPOCKET
7: JRC
8: AH-J3001V,AH-J3002V
9: 1.0
10: 0100
11: 50
12: 1
13: net_useragent_mobile_common
14: net_useragent_mobile_airhphone
15: 1
