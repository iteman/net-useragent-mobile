--TEST--
Net_UserAgent_Mobile: J-PHONE
--SKIPIF--
<?php if (!@include('../Mobile.php')) print 'skip'; ?>
--FILE--
<?php
//
// Test for: Net/UserAgent/Mobile.php
// Parts tested: - J-PHONE
//

error_reporting(E_ALL);
require_once('../Mobile.php');

$tests = array(
               // ua, version, model, packet_compliant, serial_number, vendor, vendor_version, java_infos
               array('J-PHONE/2.0/J-DN02', '2.0', 'J-DN02', false),
               array('J-PHONE/3.0/J-PE03_a', '3.0', 'J-PE03_a', false),
               array('J-PHONE/4.0/J-SH51/SNJSHA3029293 SH/0001aa Profile/MIDP-1.0 Configuration/CLDC-1.0 Ext-Profile/JSCL-1.1.0', '4.0', 'J-SH51', true, 'JSHA3029293', 'SH', '0001aa', array('Profile' => 'MIDP-1.0', 'Configuration' => 'CLDC-1.0', 'Ext-Profile' => 'JSCL-1.1.0')),
               array('J-PHONE/4.0/J-SH51/SNXXXXXXXXX SH/0001a Profile/MIDP-1.0 Configuration/CLDC-1.0 Ext-Profile/JSCL-1.1.0', '4.0', 'J-SH51', true, 'XXXXXXXXX', 'SH', '0001a', array('Profile' => 'MIDP-1.0', 'Configuration' => 'CLDC-1.0', 'Ext-Profile' => 'JSCL-1.1.0')),
               );

$test_error_agents = array(
                           'J-PHONE/4.0/J-SH51_a/ZNJSHA5081372 SH/0001aa Profile/MIDP-1.0 Configuration/CLDC-1.0 Ext-Profile/JSCL-1.1.0'
                           );
print "Testing J-PHONE ...\n";

foreach ($tests as $value1) {
    $ua = array_shift($value1);
    $data = $value1;
    $agent = &Net_UserAgent_Mobile::factory($ua);
    print is_object($agent) . "\n";
    print get_parent_class($agent) . "\n";
    print get_class($agent) . "\n";
    print $agent->isDoCoMo() . "\n";
    print $agent->isJPhone() . "\n";
    print $agent->isEZweb() . "\n";
    print $agent->getName() . "\n";
    print $agent->getUserAgent() . "\n";
    print $agent->getVersion() . "\n";
    print $agent->getModel() . "\n";
    print $agent->isPacketCompliant() . "\n";
    if (count($data) == 7) {
        print $agent->getSerialNumber() . "\n";
        print $agent->getVendor() . "\n";
        print $agent->getVendorVersion() . "\n";
        $java_info = $agent->getJavaInfo();
        foreach ($data[6] as $key2 => $value2) {
            print "Testing $key2 ...\n";
            switch ($key2) {
            case 'Profile':
                print $java_info['Profile'] . "\n";
                break;
            case 'Configuration':
                print $java_info['Configuration'] . "\n";
                break;
            case 'Ext-Profile':
                print $java_info['Ext-Profile']  . "\n";
                break;
            }
        }
    }
}

foreach ($test_error_agents as $value) {
    $_SERVER['HTTP_USER_AGENT'] = $value;
    $agent = &Net_UserAgent_Mobile::factory();
    print is_object($agent) . "\n";
    print get_class($agent) . "\n";
    if (Net_UserAgent_Mobile::isError($agent)) {
        print $agent->getMessage() . "\n";
    }
}
?>
--POST--
--GET--
--EXPECT--
Testing J-PHONE ...
1
net_useragent_mobile_common
net_useragent_mobile_jphone

1

J-PHONE
J-PHONE/2.0/J-DN02
2.0
J-DN02

1
net_useragent_mobile_common
net_useragent_mobile_jphone

1

J-PHONE
J-PHONE/3.0/J-PE03_a
3.0
J-PE03_a

1
net_useragent_mobile_common
net_useragent_mobile_jphone

1

J-PHONE
J-PHONE/4.0/J-SH51/SNJSHA3029293 SH/0001aa Profile/MIDP-1.0 Configuration/CLDC-1.0 Ext-Profile/JSCL-1.1.0
4.0
J-SH51
1
JSHA3029293
SH
0001aa
Testing Profile ...
MIDP-1.0
Testing Configuration ...
CLDC-1.0
Testing Ext-Profile ...
JSCL-1.1.0
1
net_useragent_mobile_common
net_useragent_mobile_jphone

1

J-PHONE
J-PHONE/4.0/J-SH51/SNXXXXXXXXX SH/0001a Profile/MIDP-1.0 Configuration/CLDC-1.0 Ext-Profile/JSCL-1.1.0
4.0
J-SH51
1
XXXXXXXXX
SH
0001a
Testing Profile ...
MIDP-1.0
Testing Configuration ...
CLDC-1.0
Testing Ext-Profile ...
JSCL-1.1.0
1
net_useragent_mobile_error
Net_UserAgent_Mobile Error: no match
