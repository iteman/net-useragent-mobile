--TEST--
Net_UserAgent_Mobile: compile
--SKIPIF--
<?php if (!@include('../Mobile.php')) print 'skip'; ?>
--FILE--
<?php
//
// Test for: Net/UserAgent/Mobile.php
// Parts tested: - compile
//

error_reporting(E_ALL);
require_once('../Mobile.php');

print "Testing compile ...\n";
?>
--POST--
--GET--
--EXPECT--
Testing compile ...
