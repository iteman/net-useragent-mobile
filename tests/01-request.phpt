--TEST--
Net_UserAgent_Mobile: various way to make request
--SKIPIF--
<?php if (!@include('Net/UserAgent/Mobile.php')) print 'skip'; ?>
--FILE--
<?php
//
// Test for: Net/UserAgent/Mobile.php
// Parts tested: - various way to make request
//

error_reporting(E_ALL);
require_once('Net/UserAgent/Mobile.php');

$line = 0;

++$line;
print "$line: " ."Testing various way to make request ...\n";

$ua = 'Mozilla/1.0';
$agent = &Net_UserAgent_Mobile::factory($ua);

++$line;
print "$line: " .is_object($agent) . "\n";
++$line;
print "$line: ". get_parent_class($agent) . "\n";
++$line;
print "$line: ". $agent->getUserAgent() . "\n";

$_SERVER['HTTP_USER_AGENT'] = $ua;
$agent = &Net_UserAgent_Mobile::factory();

++$line;
print  "$line: " .is_object($agent) . "\n";
++$line;
print  "$line: " .get_parent_class($agent) . "\n";
++$line;
print  "$line: " .$agent->getUserAgent() . "\n";
?>
--POST--
--GET--
--EXPECT--
1: Testing various way to make request ...
2: 1
3: net_useragent_mobile_common
4: Mozilla/1.0
5: 1
6: net_useragent_mobile_common
7: Mozilla/1.0
