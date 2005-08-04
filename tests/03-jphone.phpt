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
               array('J-PHONE/5.0/V801SA SA/0001JP Profile/MIDP-1.0 Configuration/CLDC-1.0 Ext-Profile/JSCL-1.1.0', '5.0', 'V801SA', true),
               array('Vodafone/1.0/V702NK/NKJ001 Series60/2.6 Nokia6630/2.39.148 Profile/MIDP-2.0 Configuration/CLDC-1.1', '1.0', 'V702NK', true, null, 'NK', 'NKJ001', array('Profile' => 'MIDP-1.0', 'Configuration' => 'CLDC-1.0')),
               array('Vodafone/1.0/V702NK/NKJ001/SN123456789012345 Series60/2.6 Nokia6630/2.39.148 Profile/MIDP-2.0 Configuration/CLDC-1.1', '1.0', 'V702NK', true, 'SN123456789012345', 'NK', 'J001', array('Profile' => 'MIDP-1.0', 'Configuration' => 'CLDC-1.0')),
               array('Vodafone/1.0/V802SE/SEJ001/SN123456789012345 Browser/SEMC-Browser/4.1 Profile/MIDP-2.0 Configuration/CLDC-1.1', '1.0', 'V802SE', true, 'SN123456789012345', 'SE', 'J001', array('Profile' => 'MIDP-2.0', 'Configuration' => 'CLDC-1.1')),
               array('Vodafone/1.0/V902SH/SHJ001 Browser/UP.Browser/7.0.2.1 Profile/MIDP-2.0 Configuration/CLDC-1.1 Ext-J-Profile/JSCL-1.2.2 Ext-V-Profile/VSCL-2.0.0', '1.0', 'V902SH', true, null, 'SH', 'J001', array('Profile' => 'MIDP-2.0', 'Configuration' => 'CLDC-1.1')),
               array('Vodafone/1.0/V802N/NJ001 Browser/UP.Browser/7.0.2.1.258 Profile/MIDP-2.0 Configuration/CLDC-1.1 Ext-J-Profile/JSCL-1.2.2 Ext-V-Profile/VSCL-2.0.0', '1.0', 'V802N', true, null, 'N', 'J001', array('Profile' => 'MIDP-2.0', 'Configuration' => 'CLDC-1.1')),
               array('MOT-V980/80.2F.2E. MIB/2.2.1 Profile/MIDP-2.0 Configuration/CLDC-1.1', '', 'V980', true, null, 'MOT', '80.2F.2E.', array('Profile' => 'MIDP-2.0', 'Configuration' => 'CLDC-1.1')),
               array('J-PHONE/3.0/V301SH', '3.0', 'V301SH', false)
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
    print strtolower(get_parent_class($agent)) . "\n";
    print strtolower(get_class($agent)) . "\n";
    print $agent->isDoCoMo() . "\n";
    print $agent->isVodafone() . "\n";
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
    if ($agent->getCarrierShortName() != 'V') {
        print "Carrier short name isn't V\n";
    }
    if ($agent->getCarrierLongName() != 'Vodafone') {
        print "Carrier long name isn't Vodafone\n";
    }
    if ($ua == 'J-PHONE/2.0/J-DN02') {
        if (!$agent->isTypeC() || $agent->isTypeP() || $agent->isTypeW()) {
            print "Invalid Type\n";
        }
    }
    if ($ua == 'J-PHONE/3.0/J-PE03_a') {
        if (!$agent->isTypeC() || $agent->isTypeP() || $agent->isTypeW()) {
            print "Invalid Type\n";
        }
    }
    if ($ua == 'J-PHONE/4.0/J-SH51/SNJSHA3029293 SH/0001aa Profile/MIDP-1.0 Configuration/CLDC-1.0 Ext-Profile/JSCL-1.1.0') {
        if (!$agent->isTypeP() || $agent->isTypeC() || $agent->isTypeW()) {
            print "Invalid Type\n";
        }
    }
    if ($ua == 'J-PHONE/5.0/V801SA') {
        if (!$agent->isTypeW() || $agent->isTypeC() || $agent->isTypeP()) {
            print "Invalid Type\n";
        }
    }
    if ($ua == 'Vodafone/1.0/V702NK/NKJ001 Series60/2.6 Nokia6630/2.39.148 Profile/MIDP-2.0 Configuration/CLDC-1.1') {
        if (!$agent->isType3GC() || $agent->isTypeC() || $agent->isTypeP() || $agent->isTypeW()) {
            print "Invalid Type\n";
        }
    }
}

foreach ($test_error_agents as $value) {
    $_SERVER['HTTP_USER_AGENT'] = $value;
    $agent = &Net_UserAgent_Mobile::factory();
    print is_object($agent) . "\n";
    print strtolower(get_class($agent)) . "\n";
    if (Net_UserAgent_Mobile::isError($agent)) {
        print $agent->getMessage() . "\n";
    }
}

print "Testing getMsname() method ...\n";
$_SERVER['HTTP_USER_AGENT'] = 'Vodafone/1.0/V702NK/NKJ001 Series60/2.6 Nokia6630/2.39.148 Profile/MIDP-2.0 Configuration/CLDC-1.1';
$_SERVER['HTTP_X_JPHONE_MSNAME'] = 'V702NK';
$agent = &Net_UserAgent_Mobile::factory();
print $agent->getMsname() . "\n";
?>
--POST--
--GET--
--EXPECT--
Testing J-PHONE ...
1
net_useragent_mobile_common
net_useragent_mobile_vodafone

1
1

J-PHONE
J-PHONE/2.0/J-DN02
2.0
J-DN02

1
net_useragent_mobile_common
net_useragent_mobile_vodafone

1
1

J-PHONE
J-PHONE/3.0/J-PE03_a
3.0
J-PE03_a

1
net_useragent_mobile_common
net_useragent_mobile_vodafone

1
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
net_useragent_mobile_vodafone

1
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
net_useragent_mobile_common
net_useragent_mobile_vodafone

1
1

J-PHONE
J-PHONE/5.0/V801SA SA/0001JP Profile/MIDP-1.0 Configuration/CLDC-1.0 Ext-Profile/JSCL-1.1.0
5.0
V801SA
1
1
net_useragent_mobile_common
net_useragent_mobile_vodafone

1
1

Vodafone
Vodafone/1.0/V702NK/NKJ001 Series60/2.6 Nokia6630/2.39.148 Profile/MIDP-2.0 Configuration/CLDC-1.1
1.0
V702NK
1

NK
J001
Testing Profile ...
MIDP-2.0
Testing Configuration ...
CLDC-1.1
1
net_useragent_mobile_common
net_useragent_mobile_vodafone

1
1

Vodafone
Vodafone/1.0/V702NK/NKJ001/SN123456789012345 Series60/2.6 Nokia6630/2.39.148 Profile/MIDP-2.0 Configuration/CLDC-1.1
1.0
V702NK
1
123456789012345
NK
J001
Testing Profile ...
MIDP-2.0
Testing Configuration ...
CLDC-1.1
1
net_useragent_mobile_common
net_useragent_mobile_vodafone

1
1

Vodafone
Vodafone/1.0/V802SE/SEJ001/SN123456789012345 Browser/SEMC-Browser/4.1 Profile/MIDP-2.0 Configuration/CLDC-1.1
1.0
V802SE
1
123456789012345
SE
J001
Testing Profile ...
MIDP-2.0
Testing Configuration ...
CLDC-1.1
1
net_useragent_mobile_common
net_useragent_mobile_vodafone

1
1

Vodafone
Vodafone/1.0/V902SH/SHJ001 Browser/UP.Browser/7.0.2.1 Profile/MIDP-2.0 Configuration/CLDC-1.1 Ext-J-Profile/JSCL-1.2.2 Ext-V-Profile/VSCL-2.0.0
1.0
V902SH
1

SH
J001
Testing Profile ...
MIDP-2.0
Testing Configuration ...
CLDC-1.1
1
net_useragent_mobile_common
net_useragent_mobile_vodafone

1
1

Vodafone
Vodafone/1.0/V802N/NJ001 Browser/UP.Browser/7.0.2.1.258 Profile/MIDP-2.0 Configuration/CLDC-1.1 Ext-J-Profile/JSCL-1.2.2 Ext-V-Profile/VSCL-2.0.0
1.0
V802N
1

N
J001
Testing Profile ...
MIDP-2.0
Testing Configuration ...
CLDC-1.1
1
net_useragent_mobile_common
net_useragent_mobile_vodafone

1
1


MOT-V980/80.2F.2E. MIB/2.2.1 Profile/MIDP-2.0 Configuration/CLDC-1.1

V980
1

MOT
80.2F.2E.
Testing Profile ...
MIDP-2.0
Testing Configuration ...
CLDC-1.1
1
net_useragent_mobile_common
net_useragent_mobile_vodafone

1
1

J-PHONE
J-PHONE/3.0/V301SH
3.0
V301SH

1
net_useragent_mobile_error
Net_UserAgent_Mobile Error: no match
Testing getMsname() method ...
V702NK
