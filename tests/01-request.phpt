--TEST--
Net_UserAgent_Mobile: various way to make request
--SKIPIF--
<?php if (!@include('../Mobile.php')) print 'skip'; ?>
--FILE--
<?php
//
// Test for: Net/UserAgent/Mobile.php
// Parts tested: - various way to make request
//

error_reporting(E_ALL);
require_once('../Mobile.php');

print "Testing various way to make request ...\n";

$ua = 'Mozilla/1.0';
$agent = &Net_UserAgent_Mobile::factory($ua);

print is_object($agent) . "\n";
print strtolower(get_parent_class($agent)) . "\n";
print $agent->getUserAgent() . "\n";

$_SERVER['HTTP_USER_AGENT'] = $ua;
$agent = &Net_UserAgent_Mobile::factory();

print is_object($agent) . "\n";
print strtolower(get_parent_class($agent)) . "\n";
print $agent->getUserAgent() . "\n";
?>
--POST--
--GET--
--EXPECT--
Testing various way to make request ...
1
net_useragent_mobile_common
Mozilla/1.0
1
net_useragent_mobile_common
Mozilla/1.0
