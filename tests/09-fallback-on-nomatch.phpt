--TEST--
Net_UserAgent_Mobile: fallback on no match
--SKIPIF--
<?php if (!@include 'Net/UserAgent/Mobile.php') print 'skip'; ?>
--FILE--
<?php
//
// Test for: Net/UserAgent/Mobile.php
// Parts tested: - fallback on no match
//

error_reporting(E_ALL);
require_once 'Net/UserAgent/Mobile.php';

print "Testing fallback on no match ...\n";

$ua = 'DoCoMo/1.0/SO504i/abc/TB';
$agent = &Net_UserAgent_Mobile::factory($ua);

print is_a($agent, 'Net_UserAgent_Mobile_Error') . "\n";
print ($agent->getCode() == NET_USERAGENT_MOBILE_ERROR_NOMATCH) . "\n";

$GLOBALS['_NET_USERAGENT_MOBILE_FALLBACK_ON_NOMATCH'] = true;
$agent = &Net_UserAgent_Mobile::factory($ua);

print is_a($agent, 'Net_UserAgent_Mobile_NonMobile') . "\n";
?>
--POST--
--GET--
--EXPECT--
Testing fallback on no match ...
1
1
1
