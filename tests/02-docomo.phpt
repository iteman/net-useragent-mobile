--TEST--
Net_UserAgent_Mobile: DoCoMo
--SKIPIF--
<?php if (!@include('Net/UserAgent/Mobile.php')) print 'skip'; ?>
--FILE--
<?php
//
// Test for: Net/UserAgent/Mobile.php
// Parts tested: - DoCoMo
//

error_reporting(E_ALL);
require_once('Net/UserAgent/Mobile.php');

$tests = array(
               // ua, version, html_version, model, cache_size, is_foma, vendor, series, options
               array('DoCoMo/1.0/D501i', '1.0', '1.0', 'D501i', 5, false, 'D', '501i'),
               array('DoCoMo/1.0/D502i', '1.0', '2.0', 'D502i', 5, false, 'D', '502i'),
               array('DoCoMo/1.0/D502i/c10', '1.0', '2.0', 'D502i', 10, false, 'D', '502i'),
               array('DoCoMo/1.0/D210i/c10', '1.0', '3.0', 'D210i', 10, false, 'D', '210i'),
               array('DoCoMo/1.0/SO503i/c10', '1.0', '3.0', 'SO503i', 10, false, 'SO', '503i'),
               array('DoCoMo/1.0/D211i/c10', '1.0', '3.0', 'D211i', 10, false, 'D', '211i'),
               array('DoCoMo/1.0/SH251i/c10', '1.0', '3.0', 'SH251i', 10, false, 'SH', '251i'),
               array('DoCoMo/1.0/R692i/c10', '1.0', '3.0', 'R692i', 10, false, 'R', '692i'),
               array('DoCoMo/2.0 P2101V(c100)', '2.0', '3.0', 'P2101V', 100, true, 'P', 'FOMA'),
               array('DoCoMo/2.0 N2001(c10)', '2.0', '3.0', 'N2001', 10, true, 'N', 'FOMA'),
               array('DoCoMo/2.0 N2002(c100)', '2.0', '3.0', 'N2002', 100, true, 'N', 'FOMA'),
               array('DoCoMo/2.0 D2101V(c100)', '2.0', '3.0', 'D2101V', 100, true, 'D', 'FOMA'),
               array('DoCoMo/2.0 P2002(c100)', '2.0', '3.0', 'P2002', 100, true, 'P', 'FOMA'),
               array('DoCoMo/2.0 MST_v_SH2101V(c100)', '2.0', '3.0', 'SH2101V', 100, true, 'SH', 'FOMA'),
               array('DoCoMo/2.0 T2101V(c100)', '2.0', '3.0', 'T2101V', 100, true, 'T', 'FOMA'),
               array('DoCoMo/1.0/D504i/c10', '1.0', '4.0', 'D504i', 10, false, 'D', '504i'),
               array('DoCoMo/1.0/D504i/c30/TD', '1.0', '4.0', 'D504i', 30, false, 'D', '504i', array('status' => 'TD')),
               array('DoCoMo/1.0/D504i/c10/TJ', '1.0', '4.0', 'D504i', 10, false, 'D', '504i', array('status' => 'TJ')),
               array('DoCoMo/1.0/F504i/c10/TB', '1.0', '4.0', 'F504i', 10, false, 'F', '504i', array('status' => 'TB')),
               array('DoCoMo/1.0/D251i/c10', '1.0', '4.0', 'D251i', 10, false, 'D', '251i'),
               array('DoCoMo/1.0/F251i/c10/TB', '1.0', '4.0', 'F251i', 10, false, 'F', '251i', array('status' => 'TB')),
               array('DoCoMo/1.0/F671iS/c10/TB', '1.0', '4.0', 'F671iS', 10, false, 'F', '671i', array('status' => 'TB')),
               array('DoCoMo/1.0/P503i/c10/serNMABH200331', '1.0', '3.0', 'P503i', 10, false, 'P', '503i', array('serial_number' => 'NMABH200331')),
               array('DoCoMo/2.0 N2001(c10;ser0123456789abcde;icc01234567890123456789)', '2.0', '3.0', 'N2001', 10, 1, 'N', 'FOMA', array('serial_number' => '0123456789abcde', 'card_id' => '01234567890123456789')),
               array('DoCoMo/1.0/eggy/c300/s32/kPHS-K', '1.0', '3.2', 'eggy', 300, false, null, null, array('bandwidth' => 32)),
               array('DoCoMo/1.0/P751v/c100/s64/kPHS-K', '1.0', '3.2', 'P751v', 100, false, 'P', null, array('bandwidth' => 64)),
               array('DoCoMo/1.0/P209is (Google CHTML Proxy/1.0)', '1.0', '2.0', 'P209is', 5, false, 'P', '209i', array('comment' => 'Google CHTML Proxy/1.0')),
               array('DoCoMo/1.0/F212i/c10/TB', '1.0', '4.0', 'F212i', 10, false, 'F', '212i', array('status' => 'TB')),
               array('DoCoMo/2.0 F2051(c100;TB)', '2.0', '4.0', 'F2051', 100, true, 'F', 'FOMA', array('status' => 'TB')),
               array('DoCoMo/2.0 N2051(c100;TB)', '2.0', '4.0', 'N2051', 100, true, 'N', 'FOMA', array('status' => 'TB')),
               array('DoCoMo/2.0 P2102V(c100;TB)', '2.0', '4.0', 'P2102V', 100, true, 'P', 'FOMA', array('status' => 'TB')),
               array('DoCoMo/1.0/N211iS/c10', '1.0', '3.0', 'N211iS', 10, false, 'N', '211i'),
               array('DoCoMo/1.0/P211iS/c10', '1.0', '3.0', 'P211iS', 10, false, 'P', '211i'),
               array('DoCoMo/1.0/N251iS/c10/TB', '1.0', '4.0', 'N251iS', 10, false, 'N', '251i', array('status' => 'TB')),
               array('DoCoMo/1.0/F661i/c10/TB', '1.0', '4.0', 'F661i', 10, false, 'F', '661i', array('status' => 'TB', 'is_gps' => true)),
               array('DoCoMo/1.0/D505i/c20/TC/W20H10', '1.0', '5.0', 'D505i', 20, false, 'D', '505i', array('status' => 'TC')),
               array('DoCoMo/1.0/SO505i/c20/TB/W21H09', '1.0', '5.0', 'SO505i', 20, false, 'SO', '505i', array('status' => 'TB')),

               );

$test_agents = array(
                     'DoCoMo/1.0/633S/c20',
                     'DoCoMo/1.0/641P/c10',
                     'DoCoMo/1.0/641S/c10',
                     'DoCoMo/1.0/642S/c20',
                     'DoCoMo/1.0/Agent',
                     'DoCoMo/1.0/D209i',
                     'DoCoMo/1.0/D209i/c10',
                     'DoCoMo/1.0/D210i/c10',
                     'DoCoMo/1.0/D211i/c10',
                     'DoCoMo/1.0/D251i/c10',
                     'DoCoMo/1.0/D501i',
                     'DoCoMo/1.0/D501i/c5',
                     'DoCoMo/1.0/D502i',
                     'DoCoMo/1.0/D502i/c10',
                     'DoCoMo/1.0/D503i',
                     'DoCoMo/1.0/D503i/c10',
                     'DoCoMo/1.0/D503i/c5',
                     'DoCoMo/1.0/D503iS/c10',
                     'DoCoMo/1.0/D503iS/c5',
                     'DoCoMo/1.0/D504i/c10',
                     'DoCoMo/1.0/ER209i',
                     'DoCoMo/1.0/ER209i/c15',
                     'DoCoMo/1.0/F209i',
                     'DoCoMo/1.0/F209i/c10',
                     'DoCoMo/1.0/F210i/c10',
                     'DoCoMo/1.0/F211i/c10',
                     'DoCoMo/1.0/F251i/c10/TB',
                     'DoCoMo/1.0/F501i',
                     'DoCoMo/1.0/F502i',
                     'DoCoMo/1.0/F502i/c10',
                     'DoCoMo/1.0/F502it',
                     'DoCoMo/1.0/F502it/c10',
                     'DoCoMo/1.0/F503i',
                     'DoCoMo/1.0/F503i/c10',
                     'DoCoMo/1.0/F503i/c32',
                     'DoCoMo/1.0/F503iS',
                     'DoCoMo/1.0/F503iS/c10',
                     'DoCoMo/1.0/F504i/c10/TB',
                     'DoCoMo/1.0/F504i/c10/TJ',
                     'DoCoMo/1.0/F671i/c10',
                     'DoCoMo/1.0/GigaCode (http://gigacode.net/)',
                     'DoCoMo/1.0/KO209i',
                     'DoCoMo/1.0/KO210i',
                     'DoCoMo/1.0/KO210i/c10',
                     'DoCoMo/1.0/N209i',
                     'DoCoMo/1.0/N209i/c08',
                     'DoCoMo/1.0/N210i',
                     'DoCoMo/1.0/N210i/c10',
                     'DoCoMo/1.0/N211i/c10',
                     'DoCoMo/1.0/N501i',
                     'DoCoMo/1.0/N502i',
                     'DoCoMo/1.0/N502i/c08',
                     'DoCoMo/1.0/N502it',
                     'DoCoMo/1.0/N502it/c10',
                     'DoCoMo/1.0/N503i',
                     'DoCoMo/1.0/N503i/c10',
                     'DoCoMo/1.0/N503i/c30',
                     'DoCoMo/1.0/N503i/c5',
                     'DoCoMo/1.0/N503i/c5/serNNEBJ608187',
                     'DoCoMo/1.0/N503iS',
                     'DoCoMo/1.0/N503iS/c10',
                     'DoCoMo/1.0/N503iS/c5',
                     'DoCoMo/1.0/N504i/c10',
                     'DoCoMo/1.0/N504i/c10/TB',
                     'DoCoMo/1.0/N504i/c10/TJ',
                     'DoCoMo/1.0/N504i/c10/TJ/c0',
                     'DoCoMo/1.0/N821i',
                     'DoCoMo/1.0/N821i/c08',
                     'DoCoMo/1.0/NM502i',
                     'DoCoMo/1.0/NM502i/c10',
                     'DoCoMo/1.0/P209i',
                     'DoCoMo/1.0/P209i/c10',
                     'DoCoMo/1.0/P209is',
                     'DoCoMo/1.0/P209is (Google CHTML Proxy/1.0)',
                     'DoCoMo/1.0/P209is/c10',
                     'DoCoMo/1.0/P210i',
                     'DoCoMo/1.0/P210i/c10',
                     'DoCoMo/1.0/P211i/c10',
                     'DoCoMo/1.0/P501i',
                     'DoCoMo/1.0/P502i',
                     'DoCoMo/1.0/P502i/c10',
                     'DoCoMo/1.0/P502i/c10 (Google CHTML Proxy/1.0)',
                     'DoCoMo/1.0/P502i_mEB-PD555',
                     'DoCoMo/1.0/P503i',
                     'DoCoMo/1.0/P503i/c10',
                     'DoCoMo/1.0/P503i/c10/',
                     'DoCoMo/1.0/P503iS',
                     'DoCoMo/1.0/P503iS/c10',
                     'DoCoMo/1.0/P503iS/c10/serNMAUA482012',
                     'DoCoMo/1.0/P504i/c10',
                     'DoCoMo/1.0/P504i/c10/TB',
                     'DoCoMo/1.0/P751v/c100/s64/kPHS-K',
                     'DoCoMo/1.0/P821i',
                     'DoCoMo/1.0/P821i/c08',
                     'DoCoMo/1.0/PacketMeter/c10',
                     'DoCoMo/1.0/R209i',
                     'DoCoMo/1.0/R211i/c10',
                     'DoCoMo/1.0/R691i',
                     'DoCoMo/1.0/SH251i/c10',
                     'DoCoMo/1.0/SH712m/c10',
                     'DoCoMo/1.0/SH821i',
                     'DoCoMo/1.0/SH821i/c10',
                     'DoCoMo/1.0/SO210i/c10',
                     'DoCoMo/1.0/SO211i/c10',
                     'DoCoMo/1.0/SO502i',
                     'DoCoMo/1.0/SO502iWM/c10',
                     'DoCoMo/1.0/SO503i',
                     'DoCoMo/1.0/SO503i/c10',
                     'DoCoMo/1.0/SO503i/c10/serNSOBD506895',
                     'DoCoMo/1.0/SO503i/c10/serNSOBD597705',
                     'DoCoMo/1.0/SO503iS/c10',
                     'DoCoMo/1.0/SO504i/c10',
                     'DoCoMo/1.0/SO504i/c10/TB',
                     'DoCoMo/1.0/TEST/c10',
                     'DoCoMo/1.0/TF502i',
                     'DoCoMo/1.0/X503i/c10',
                     'DoCoMo/1.0/eggy/c300/s32/kPHS-K',
                     'DoCoMo/1.0/eggy/c300/s64/kPHS-K',
                     'DoCoMo/1.0/ex_idisplay/c10',
                     'DoCoMo/1.0/ex_ps_test00/c10',
                     'DoCoMo/1.0/iYappo',
                     'DoCoMo/1.0/p503is/c10',
                     'DoCoMo/1.0/test',
                     'DoCoMo/1.0/test/c10',
                     'DoCoMo/1.0/test/c10/TB',
                     'DoCoMo/1.1/P711m/c10',
                     'DoCoMo/2.0 D2101V(c100)',
                     'DoCoMo/2.0 MST_v_P2101V(c100)',
                     'DoCoMo/2.0 N2001(c10)',
                     'DoCoMo/2.0 N2001(c10;ser350200000307969;icc8981100000200188565F)',
                     'DoCoMo/2.0 N2002(c100)',
                     'DoCoMo/2.0 P2002(c100)',
                     'DoCoMo/2.0 P2101V',
                     'DoCoMo/2.0 P2101V(c100)',
                     'DoCoMo/2.0/N502i',
                     'DoCoMo/2.0/N502it',
                     'DoCoMo/2.0/N503i',
                     'DoCoMo/3.0/N503',
                     'DoCoMo/2.0 F2051(c100;TB)',
                     'DoCoMo/2.0 N2051(c100;TB)',
                     'DoCoMo/2.0 P2102V(c100;TB)',
                     'DoCoMo/1.0/N211iS/c10',
                     'DoCoMo/1.0/P211iS/c10',
                     'DoCoMo/1.0/N251iS/c10/TB',
                     'DoCoMo/1.0/F661i/c10/TB',
                     'DoCoMo/1.0/D505i/c20/TC/W20H10',
                     'DoCoMo/1.0/SO505i/c20/TB/W21H09'
                     );

$test_error_agents = array(
                           'DoCoMo/1.0/SO504i/abc/TB',
                           'DoCoMo/2.0 N2001(c10;ser35020000030796;icc8981100000200188565F)',
                           'DoCoMo/2.0 N2001(c10;ser350200000307969;icc8981100000200188565)'
                           );

$line = 0;

++$line;
print "$line: " . "Testing DoCoMo ...\n";

foreach ($tests as $value1) {
    $ua = array_shift($value1);
    $data = $value1;
    $agent = &Net_UserAgent_Mobile::factory($ua);
    ++$line;
    print "$line: " . is_object($agent) . "\n";
    ++$line;
    print "$line: " . get_parent_class($agent) . "\n";
    ++$line;
    print "$line: " . get_class($agent) . "\n";
    ++$line;
    print "$line: " . $agent->isDoCoMo() . "\n";
    ++$line;
    print "$line: " . $agent->isJPhone() . "\n";
    ++$line;
    print "$line: " . $agent->isEZweb() . "\n";
    ++$line;
    print "$line: " . $agent->getName() . "\n";
    ++$line;
    print "$line: " . $agent->getUserAgent() . "\n";
    ++$line;
    print "$line: " . $agent->getVersion() . "\n";
    ++$line;
    print "$line: " . $agent->getHTMLVersion() . "\n";
    ++$line;
    print "$line: " . $agent->getModel() . "\n";
    ++$line;
    print "$line: " . $agent->getCacheSize() . "\n";
    ++$line;
    print "$line: " . $agent->isFOMA() . "\n";
    ++$line;
    print "$line: " . $agent->getVendor() . "\n";
    ++$line;
    print "$line: " . $agent->getSeries() . "\n";
    if (count($data) == 8) {
        foreach ($data[7] as $key2 => $value2) {
            ++$line;
            print "$line: " . "Testing $key2 ...\n";
            switch ($key2) {
            case 'status':
                ++$line;
                print "$line: " . $agent->getStatus() . "\n";
                break;
            case 'serial_number':
                ++$line;
                print "$line: " . $agent->getSerialNumber() . "\n";
                break;
            case 'card_id':
                ++$line;
                print "$line: " . $agent->getCardID() . "\n";
                break;
            case 'bandwidth':
                ++$line;
                print "$line: " . $agent->getBandwidth() . "\n";
                break;
            case 'comment':
                ++$line;
                print "$line: " . $agent->getComment() . "\n";
                break;
            case 'is_gps':
                ++$line;
                print "$line: " . $agent->isGPS() . "\n";
                break;
            }
        }
    }
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
    print "$line: " . $agent->getName() . "\n";
    ++$line;
    print "$line: " . $agent->isDoCoMo() . "\n";
    ++$line;
    print "$line: " . $agent->isJPhone() . "\n";
    ++$line;
    print "$line: " . $agent->isEZweb() . "\n";
}

foreach ($test_error_agents as $value) {
    $_SERVER['HTTP_USER_AGENT'] = $value;
    $agent = &Net_UserAgent_Mobile::factory();
    ++$line;
    print "$line: " . is_object($agent) . "\n";
    ++$line;
    print "$line: " . get_class($agent) . "\n";
    if (Net_UserAgent_Mobile::isError($agent)) {
        ++$line;
        print "$line: " . $agent->getMessage() . "\n";
    }
}
?>
--POST--
--GET--
--EXPECT--
1: Testing DoCoMo ...
2: 1
3: net_useragent_mobile_common
4: net_useragent_mobile_docomo
5: 1
6: 
7: 
8: DoCoMo
9: DoCoMo/1.0/D501i
10: 1.0
11: 1.0
12: D501i
13: 5
14: 
15: D
16: 501i
17: 1
18: net_useragent_mobile_common
19: net_useragent_mobile_docomo
20: 1
21: 
22: 
23: DoCoMo
24: DoCoMo/1.0/D502i
25: 1.0
26: 2.0
27: D502i
28: 5
29: 
30: D
31: 502i
32: 1
33: net_useragent_mobile_common
34: net_useragent_mobile_docomo
35: 1
36: 
37: 
38: DoCoMo
39: DoCoMo/1.0/D502i/c10
40: 1.0
41: 2.0
42: D502i
43: 10
44: 
45: D
46: 502i
47: 1
48: net_useragent_mobile_common
49: net_useragent_mobile_docomo
50: 1
51: 
52: 
53: DoCoMo
54: DoCoMo/1.0/D210i/c10
55: 1.0
56: 3.0
57: D210i
58: 10
59: 
60: D
61: 210i
62: 1
63: net_useragent_mobile_common
64: net_useragent_mobile_docomo
65: 1
66: 
67: 
68: DoCoMo
69: DoCoMo/1.0/SO503i/c10
70: 1.0
71: 3.0
72: SO503i
73: 10
74: 
75: SO
76: 503i
77: 1
78: net_useragent_mobile_common
79: net_useragent_mobile_docomo
80: 1
81: 
82: 
83: DoCoMo
84: DoCoMo/1.0/D211i/c10
85: 1.0
86: 3.0
87: D211i
88: 10
89: 
90: D
91: 211i
92: 1
93: net_useragent_mobile_common
94: net_useragent_mobile_docomo
95: 1
96: 
97: 
98: DoCoMo
99: DoCoMo/1.0/SH251i/c10
100: 1.0
101: 3.0
102: SH251i
103: 10
104: 
105: SH
106: 251i
107: 1
108: net_useragent_mobile_common
109: net_useragent_mobile_docomo
110: 1
111: 
112: 
113: DoCoMo
114: DoCoMo/1.0/R692i/c10
115: 1.0
116: 3.0
117: R692i
118: 10
119: 
120: R
121: 692i
122: 1
123: net_useragent_mobile_common
124: net_useragent_mobile_docomo
125: 1
126: 
127: 
128: DoCoMo
129: DoCoMo/2.0 P2101V(c100)
130: 2.0
131: 3.0
132: P2101V
133: 100
134: 1
135: P
136: FOMA
137: 1
138: net_useragent_mobile_common
139: net_useragent_mobile_docomo
140: 1
141: 
142: 
143: DoCoMo
144: DoCoMo/2.0 N2001(c10)
145: 2.0
146: 3.0
147: N2001
148: 10
149: 1
150: N
151: FOMA
152: 1
153: net_useragent_mobile_common
154: net_useragent_mobile_docomo
155: 1
156: 
157: 
158: DoCoMo
159: DoCoMo/2.0 N2002(c100)
160: 2.0
161: 3.0
162: N2002
163: 100
164: 1
165: N
166: FOMA
167: 1
168: net_useragent_mobile_common
169: net_useragent_mobile_docomo
170: 1
171: 
172: 
173: DoCoMo
174: DoCoMo/2.0 D2101V(c100)
175: 2.0
176: 3.0
177: D2101V
178: 100
179: 1
180: D
181: FOMA
182: 1
183: net_useragent_mobile_common
184: net_useragent_mobile_docomo
185: 1
186: 
187: 
188: DoCoMo
189: DoCoMo/2.0 P2002(c100)
190: 2.0
191: 3.0
192: P2002
193: 100
194: 1
195: P
196: FOMA
197: 1
198: net_useragent_mobile_common
199: net_useragent_mobile_docomo
200: 1
201: 
202: 
203: DoCoMo
204: DoCoMo/2.0 MST_v_SH2101V(c100)
205: 2.0
206: 3.0
207: SH2101V
208: 100
209: 1
210: SH
211: FOMA
212: 1
213: net_useragent_mobile_common
214: net_useragent_mobile_docomo
215: 1
216: 
217: 
218: DoCoMo
219: DoCoMo/2.0 T2101V(c100)
220: 2.0
221: 3.0
222: T2101V
223: 100
224: 1
225: T
226: FOMA
227: 1
228: net_useragent_mobile_common
229: net_useragent_mobile_docomo
230: 1
231: 
232: 
233: DoCoMo
234: DoCoMo/1.0/D504i/c10
235: 1.0
236: 4.0
237: D504i
238: 10
239: 
240: D
241: 504i
242: 1
243: net_useragent_mobile_common
244: net_useragent_mobile_docomo
245: 1
246: 
247: 
248: DoCoMo
249: DoCoMo/1.0/D504i/c30/TD
250: 1.0
251: 4.0
252: D504i
253: 30
254: 
255: D
256: 504i
257: Testing status ...
258: TD
259: 1
260: net_useragent_mobile_common
261: net_useragent_mobile_docomo
262: 1
263: 
264: 
265: DoCoMo
266: DoCoMo/1.0/D504i/c10/TJ
267: 1.0
268: 4.0
269: D504i
270: 10
271: 
272: D
273: 504i
274: Testing status ...
275: TJ
276: 1
277: net_useragent_mobile_common
278: net_useragent_mobile_docomo
279: 1
280: 
281: 
282: DoCoMo
283: DoCoMo/1.0/F504i/c10/TB
284: 1.0
285: 4.0
286: F504i
287: 10
288: 
289: F
290: 504i
291: Testing status ...
292: TB
293: 1
294: net_useragent_mobile_common
295: net_useragent_mobile_docomo
296: 1
297: 
298: 
299: DoCoMo
300: DoCoMo/1.0/D251i/c10
301: 1.0
302: 4.0
303: D251i
304: 10
305: 
306: D
307: 251i
308: 1
309: net_useragent_mobile_common
310: net_useragent_mobile_docomo
311: 1
312: 
313: 
314: DoCoMo
315: DoCoMo/1.0/F251i/c10/TB
316: 1.0
317: 4.0
318: F251i
319: 10
320: 
321: F
322: 251i
323: Testing status ...
324: TB
325: 1
326: net_useragent_mobile_common
327: net_useragent_mobile_docomo
328: 1
329: 
330: 
331: DoCoMo
332: DoCoMo/1.0/F671iS/c10/TB
333: 1.0
334: 4.0
335: F671iS
336: 10
337: 
338: F
339: 671i
340: Testing status ...
341: TB
342: 1
343: net_useragent_mobile_common
344: net_useragent_mobile_docomo
345: 1
346: 
347: 
348: DoCoMo
349: DoCoMo/1.0/P503i/c10/serNMABH200331
350: 1.0
351: 3.0
352: P503i
353: 10
354: 
355: P
356: 503i
357: Testing serial_number ...
358: NMABH200331
359: 1
360: net_useragent_mobile_common
361: net_useragent_mobile_docomo
362: 1
363: 
364: 
365: DoCoMo
366: DoCoMo/2.0 N2001(c10;ser0123456789abcde;icc01234567890123456789)
367: 2.0
368: 3.0
369: N2001
370: 10
371: 1
372: N
373: FOMA
374: Testing serial_number ...
375: 0123456789abcde
376: Testing card_id ...
377: 01234567890123456789
378: 1
379: net_useragent_mobile_common
380: net_useragent_mobile_docomo
381: 1
382: 
383: 
384: DoCoMo
385: DoCoMo/1.0/eggy/c300/s32/kPHS-K
386: 1.0
387: 3.2
388: eggy
389: 300
390: 
391: 
392: 
393: Testing bandwidth ...
394: 32
395: 1
396: net_useragent_mobile_common
397: net_useragent_mobile_docomo
398: 1
399: 
400: 
401: DoCoMo
402: DoCoMo/1.0/P751v/c100/s64/kPHS-K
403: 1.0
404: 3.2
405: P751v
406: 100
407: 
408: P
409: 
410: Testing bandwidth ...
411: 64
412: 1
413: net_useragent_mobile_common
414: net_useragent_mobile_docomo
415: 1
416: 
417: 
418: DoCoMo
419: DoCoMo/1.0/P209is (Google CHTML Proxy/1.0)
420: 1.0
421: 2.0
422: P209is
423: 5
424: 
425: P
426: 209i
427: Testing comment ...
428: Google CHTML Proxy/1.0
429: 1
430: net_useragent_mobile_common
431: net_useragent_mobile_docomo
432: 1
433: 
434: 
435: DoCoMo
436: DoCoMo/1.0/F212i/c10/TB
437: 1.0
438: 4.0
439: F212i
440: 10
441: 
442: F
443: 212i
444: Testing status ...
445: TB
446: 1
447: net_useragent_mobile_common
448: net_useragent_mobile_docomo
449: 1
450: 
451: 
452: DoCoMo
453: DoCoMo/2.0 F2051(c100;TB)
454: 2.0
455: 4.0
456: F2051
457: 100
458: 1
459: F
460: FOMA
461: Testing status ...
462: TB
463: 1
464: net_useragent_mobile_common
465: net_useragent_mobile_docomo
466: 1
467: 
468: 
469: DoCoMo
470: DoCoMo/2.0 N2051(c100;TB)
471: 2.0
472: 4.0
473: N2051
474: 100
475: 1
476: N
477: FOMA
478: Testing status ...
479: TB
480: 1
481: net_useragent_mobile_common
482: net_useragent_mobile_docomo
483: 1
484: 
485: 
486: DoCoMo
487: DoCoMo/2.0 P2102V(c100;TB)
488: 2.0
489: 4.0
490: P2102V
491: 100
492: 1
493: P
494: FOMA
495: Testing status ...
496: TB
497: 1
498: net_useragent_mobile_common
499: net_useragent_mobile_docomo
500: 1
501: 
502: 
503: DoCoMo
504: DoCoMo/1.0/N211iS/c10
505: 1.0
506: 3.0
507: N211iS
508: 10
509: 
510: N
511: 211i
512: 1
513: net_useragent_mobile_common
514: net_useragent_mobile_docomo
515: 1
516: 
517: 
518: DoCoMo
519: DoCoMo/1.0/P211iS/c10
520: 1.0
521: 3.0
522: P211iS
523: 10
524: 
525: P
526: 211i
527: 1
528: net_useragent_mobile_common
529: net_useragent_mobile_docomo
530: 1
531: 
532: 
533: DoCoMo
534: DoCoMo/1.0/N251iS/c10/TB
535: 1.0
536: 4.0
537: N251iS
538: 10
539: 
540: N
541: 251i
542: Testing status ...
543: TB
544: 1
545: net_useragent_mobile_common
546: net_useragent_mobile_docomo
547: 1
548: 
549: 
550: DoCoMo
551: DoCoMo/1.0/F661i/c10/TB
552: 1.0
553: 4.0
554: F661i
555: 10
556: 
557: F
558: 661i
559: Testing status ...
560: TB
561: Testing is_gps ...
562: 1
563: 1
564: net_useragent_mobile_common
565: net_useragent_mobile_docomo
566: 1
567: 
568: 
569: DoCoMo
570: DoCoMo/1.0/D505i/c20/TC/W20H10
571: 1.0
572: 5.0
573: D505i
574: 20
575: 
576: D
577: 505i
578: Testing status ...
579: TC
580: 1
581: net_useragent_mobile_common
582: net_useragent_mobile_docomo
583: 1
584: 
585: 
586: DoCoMo
587: DoCoMo/1.0/SO505i/c20/TB/W21H09
588: 1.0
589: 5.0
590: SO505i
591: 20
592: 
593: SO
594: 505i
595: Testing status ...
596: TB
597: 1
598: net_useragent_mobile_common
599: net_useragent_mobile_docomo
600: DoCoMo
601: 1
602: 
603: 
604: 1
605: net_useragent_mobile_common
606: net_useragent_mobile_docomo
607: DoCoMo
608: 1
609: 
610: 
611: 1
612: net_useragent_mobile_common
613: net_useragent_mobile_docomo
614: DoCoMo
615: 1
616: 
617: 
618: 1
619: net_useragent_mobile_common
620: net_useragent_mobile_docomo
621: DoCoMo
622: 1
623: 
624: 
625: 1
626: net_useragent_mobile_common
627: net_useragent_mobile_docomo
628: DoCoMo
629: 1
630: 
631: 
632: 1
633: net_useragent_mobile_common
634: net_useragent_mobile_docomo
635: DoCoMo
636: 1
637: 
638: 
639: 1
640: net_useragent_mobile_common
641: net_useragent_mobile_docomo
642: DoCoMo
643: 1
644: 
645: 
646: 1
647: net_useragent_mobile_common
648: net_useragent_mobile_docomo
649: DoCoMo
650: 1
651: 
652: 
653: 1
654: net_useragent_mobile_common
655: net_useragent_mobile_docomo
656: DoCoMo
657: 1
658: 
659: 
660: 1
661: net_useragent_mobile_common
662: net_useragent_mobile_docomo
663: DoCoMo
664: 1
665: 
666: 
667: 1
668: net_useragent_mobile_common
669: net_useragent_mobile_docomo
670: DoCoMo
671: 1
672: 
673: 
674: 1
675: net_useragent_mobile_common
676: net_useragent_mobile_docomo
677: DoCoMo
678: 1
679: 
680: 
681: 1
682: net_useragent_mobile_common
683: net_useragent_mobile_docomo
684: DoCoMo
685: 1
686: 
687: 
688: 1
689: net_useragent_mobile_common
690: net_useragent_mobile_docomo
691: DoCoMo
692: 1
693: 
694: 
695: 1
696: net_useragent_mobile_common
697: net_useragent_mobile_docomo
698: DoCoMo
699: 1
700: 
701: 
702: 1
703: net_useragent_mobile_common
704: net_useragent_mobile_docomo
705: DoCoMo
706: 1
707: 
708: 
709: 1
710: net_useragent_mobile_common
711: net_useragent_mobile_docomo
712: DoCoMo
713: 1
714: 
715: 
716: 1
717: net_useragent_mobile_common
718: net_useragent_mobile_docomo
719: DoCoMo
720: 1
721: 
722: 
723: 1
724: net_useragent_mobile_common
725: net_useragent_mobile_docomo
726: DoCoMo
727: 1
728: 
729: 
730: 1
731: net_useragent_mobile_common
732: net_useragent_mobile_docomo
733: DoCoMo
734: 1
735: 
736: 
737: 1
738: net_useragent_mobile_common
739: net_useragent_mobile_docomo
740: DoCoMo
741: 1
742: 
743: 
744: 1
745: net_useragent_mobile_common
746: net_useragent_mobile_docomo
747: DoCoMo
748: 1
749: 
750: 
751: 1
752: net_useragent_mobile_common
753: net_useragent_mobile_docomo
754: DoCoMo
755: 1
756: 
757: 
758: 1
759: net_useragent_mobile_common
760: net_useragent_mobile_docomo
761: DoCoMo
762: 1
763: 
764: 
765: 1
766: net_useragent_mobile_common
767: net_useragent_mobile_docomo
768: DoCoMo
769: 1
770: 
771: 
772: 1
773: net_useragent_mobile_common
774: net_useragent_mobile_docomo
775: DoCoMo
776: 1
777: 
778: 
779: 1
780: net_useragent_mobile_common
781: net_useragent_mobile_docomo
782: DoCoMo
783: 1
784: 
785: 
786: 1
787: net_useragent_mobile_common
788: net_useragent_mobile_docomo
789: DoCoMo
790: 1
791: 
792: 
793: 1
794: net_useragent_mobile_common
795: net_useragent_mobile_docomo
796: DoCoMo
797: 1
798: 
799: 
800: 1
801: net_useragent_mobile_common
802: net_useragent_mobile_docomo
803: DoCoMo
804: 1
805: 
806: 
807: 1
808: net_useragent_mobile_common
809: net_useragent_mobile_docomo
810: DoCoMo
811: 1
812: 
813: 
814: 1
815: net_useragent_mobile_common
816: net_useragent_mobile_docomo
817: DoCoMo
818: 1
819: 
820: 
821: 1
822: net_useragent_mobile_common
823: net_useragent_mobile_docomo
824: DoCoMo
825: 1
826: 
827: 
828: 1
829: net_useragent_mobile_common
830: net_useragent_mobile_docomo
831: DoCoMo
832: 1
833: 
834: 
835: 1
836: net_useragent_mobile_common
837: net_useragent_mobile_docomo
838: DoCoMo
839: 1
840: 
841: 
842: 1
843: net_useragent_mobile_common
844: net_useragent_mobile_docomo
845: DoCoMo
846: 1
847: 
848: 
849: 1
850: net_useragent_mobile_common
851: net_useragent_mobile_docomo
852: DoCoMo
853: 1
854: 
855: 
856: 1
857: net_useragent_mobile_common
858: net_useragent_mobile_docomo
859: DoCoMo
860: 1
861: 
862: 
863: 1
864: net_useragent_mobile_common
865: net_useragent_mobile_docomo
866: DoCoMo
867: 1
868: 
869: 
870: 1
871: net_useragent_mobile_common
872: net_useragent_mobile_docomo
873: DoCoMo
874: 1
875: 
876: 
877: 1
878: net_useragent_mobile_common
879: net_useragent_mobile_docomo
880: DoCoMo
881: 1
882: 
883: 
884: 1
885: net_useragent_mobile_common
886: net_useragent_mobile_docomo
887: DoCoMo
888: 1
889: 
890: 
891: 1
892: net_useragent_mobile_common
893: net_useragent_mobile_docomo
894: DoCoMo
895: 1
896: 
897: 
898: 1
899: net_useragent_mobile_common
900: net_useragent_mobile_docomo
901: DoCoMo
902: 1
903: 
904: 
905: 1
906: net_useragent_mobile_common
907: net_useragent_mobile_docomo
908: DoCoMo
909: 1
910: 
911: 
912: 1
913: net_useragent_mobile_common
914: net_useragent_mobile_docomo
915: DoCoMo
916: 1
917: 
918: 
919: 1
920: net_useragent_mobile_common
921: net_useragent_mobile_docomo
922: DoCoMo
923: 1
924: 
925: 
926: 1
927: net_useragent_mobile_common
928: net_useragent_mobile_docomo
929: DoCoMo
930: 1
931: 
932: 
933: 1
934: net_useragent_mobile_common
935: net_useragent_mobile_docomo
936: DoCoMo
937: 1
938: 
939: 
940: 1
941: net_useragent_mobile_common
942: net_useragent_mobile_docomo
943: DoCoMo
944: 1
945: 
946: 
947: 1
948: net_useragent_mobile_common
949: net_useragent_mobile_docomo
950: DoCoMo
951: 1
952: 
953: 
954: 1
955: net_useragent_mobile_common
956: net_useragent_mobile_docomo
957: DoCoMo
958: 1
959: 
960: 
961: 1
962: net_useragent_mobile_common
963: net_useragent_mobile_docomo
964: DoCoMo
965: 1
966: 
967: 
968: 1
969: net_useragent_mobile_common
970: net_useragent_mobile_docomo
971: DoCoMo
972: 1
973: 
974: 
975: 1
976: net_useragent_mobile_common
977: net_useragent_mobile_docomo
978: DoCoMo
979: 1
980: 
981: 
982: 1
983: net_useragent_mobile_common
984: net_useragent_mobile_docomo
985: DoCoMo
986: 1
987: 
988: 
989: 1
990: net_useragent_mobile_common
991: net_useragent_mobile_docomo
992: DoCoMo
993: 1
994: 
995: 
996: 1
997: net_useragent_mobile_common
998: net_useragent_mobile_docomo
999: DoCoMo
1000: 1
1001: 
1002: 
1003: 1
1004: net_useragent_mobile_common
1005: net_useragent_mobile_docomo
1006: DoCoMo
1007: 1
1008: 
1009: 
1010: 1
1011: net_useragent_mobile_common
1012: net_useragent_mobile_docomo
1013: DoCoMo
1014: 1
1015: 
1016: 
1017: 1
1018: net_useragent_mobile_common
1019: net_useragent_mobile_docomo
1020: DoCoMo
1021: 1
1022: 
1023: 
1024: 1
1025: net_useragent_mobile_common
1026: net_useragent_mobile_docomo
1027: DoCoMo
1028: 1
1029: 
1030: 
1031: 1
1032: net_useragent_mobile_common
1033: net_useragent_mobile_docomo
1034: DoCoMo
1035: 1
1036: 
1037: 
1038: 1
1039: net_useragent_mobile_common
1040: net_useragent_mobile_docomo
1041: DoCoMo
1042: 1
1043: 
1044: 
1045: 1
1046: net_useragent_mobile_common
1047: net_useragent_mobile_docomo
1048: DoCoMo
1049: 1
1050: 
1051: 
1052: 1
1053: net_useragent_mobile_common
1054: net_useragent_mobile_docomo
1055: DoCoMo
1056: 1
1057: 
1058: 
1059: 1
1060: net_useragent_mobile_common
1061: net_useragent_mobile_docomo
1062: DoCoMo
1063: 1
1064: 
1065: 
1066: 1
1067: net_useragent_mobile_common
1068: net_useragent_mobile_docomo
1069: DoCoMo
1070: 1
1071: 
1072: 
1073: 1
1074: net_useragent_mobile_common
1075: net_useragent_mobile_docomo
1076: DoCoMo
1077: 1
1078: 
1079: 
1080: 1
1081: net_useragent_mobile_common
1082: net_useragent_mobile_docomo
1083: DoCoMo
1084: 1
1085: 
1086: 
1087: 1
1088: net_useragent_mobile_common
1089: net_useragent_mobile_docomo
1090: DoCoMo
1091: 1
1092: 
1093: 
1094: 1
1095: net_useragent_mobile_common
1096: net_useragent_mobile_docomo
1097: DoCoMo
1098: 1
1099: 
1100: 
1101: 1
1102: net_useragent_mobile_common
1103: net_useragent_mobile_docomo
1104: DoCoMo
1105: 1
1106: 
1107: 
1108: 1
1109: net_useragent_mobile_common
1110: net_useragent_mobile_docomo
1111: DoCoMo
1112: 1
1113: 
1114: 
1115: 1
1116: net_useragent_mobile_common
1117: net_useragent_mobile_docomo
1118: DoCoMo
1119: 1
1120: 
1121: 
1122: 1
1123: net_useragent_mobile_common
1124: net_useragent_mobile_docomo
1125: DoCoMo
1126: 1
1127: 
1128: 
1129: 1
1130: net_useragent_mobile_common
1131: net_useragent_mobile_docomo
1132: DoCoMo
1133: 1
1134: 
1135: 
1136: 1
1137: net_useragent_mobile_common
1138: net_useragent_mobile_docomo
1139: DoCoMo
1140: 1
1141: 
1142: 
1143: 1
1144: net_useragent_mobile_common
1145: net_useragent_mobile_docomo
1146: DoCoMo
1147: 1
1148: 
1149: 
1150: 1
1151: net_useragent_mobile_common
1152: net_useragent_mobile_docomo
1153: DoCoMo
1154: 1
1155: 
1156: 
1157: 1
1158: net_useragent_mobile_common
1159: net_useragent_mobile_docomo
1160: DoCoMo
1161: 1
1162: 
1163: 
1164: 1
1165: net_useragent_mobile_common
1166: net_useragent_mobile_docomo
1167: DoCoMo
1168: 1
1169: 
1170: 
1171: 1
1172: net_useragent_mobile_common
1173: net_useragent_mobile_docomo
1174: DoCoMo
1175: 1
1176: 
1177: 
1178: 1
1179: net_useragent_mobile_common
1180: net_useragent_mobile_docomo
1181: DoCoMo
1182: 1
1183: 
1184: 
1185: 1
1186: net_useragent_mobile_common
1187: net_useragent_mobile_docomo
1188: DoCoMo
1189: 1
1190: 
1191: 
1192: 1
1193: net_useragent_mobile_common
1194: net_useragent_mobile_docomo
1195: DoCoMo
1196: 1
1197: 
1198: 
1199: 1
1200: net_useragent_mobile_common
1201: net_useragent_mobile_docomo
1202: DoCoMo
1203: 1
1204: 
1205: 
1206: 1
1207: net_useragent_mobile_common
1208: net_useragent_mobile_docomo
1209: DoCoMo
1210: 1
1211: 
1212: 
1213: 1
1214: net_useragent_mobile_common
1215: net_useragent_mobile_docomo
1216: DoCoMo
1217: 1
1218: 
1219: 
1220: 1
1221: net_useragent_mobile_common
1222: net_useragent_mobile_docomo
1223: DoCoMo
1224: 1
1225: 
1226: 
1227: 1
1228: net_useragent_mobile_common
1229: net_useragent_mobile_docomo
1230: DoCoMo
1231: 1
1232: 
1233: 
1234: 1
1235: net_useragent_mobile_common
1236: net_useragent_mobile_docomo
1237: DoCoMo
1238: 1
1239: 
1240: 
1241: 1
1242: net_useragent_mobile_common
1243: net_useragent_mobile_docomo
1244: DoCoMo
1245: 1
1246: 
1247: 
1248: 1
1249: net_useragent_mobile_common
1250: net_useragent_mobile_docomo
1251: DoCoMo
1252: 1
1253: 
1254: 
1255: 1
1256: net_useragent_mobile_common
1257: net_useragent_mobile_docomo
1258: DoCoMo
1259: 1
1260: 
1261: 
1262: 1
1263: net_useragent_mobile_common
1264: net_useragent_mobile_docomo
1265: DoCoMo
1266: 1
1267: 
1268: 
1269: 1
1270: net_useragent_mobile_common
1271: net_useragent_mobile_docomo
1272: DoCoMo
1273: 1
1274: 
1275: 
1276: 1
1277: net_useragent_mobile_common
1278: net_useragent_mobile_docomo
1279: DoCoMo
1280: 1
1281: 
1282: 
1283: 1
1284: net_useragent_mobile_common
1285: net_useragent_mobile_docomo
1286: DoCoMo
1287: 1
1288: 
1289: 
1290: 1
1291: net_useragent_mobile_common
1292: net_useragent_mobile_docomo
1293: DoCoMo
1294: 1
1295: 
1296: 
1297: 1
1298: net_useragent_mobile_common
1299: net_useragent_mobile_docomo
1300: DoCoMo
1301: 1
1302: 
1303: 
1304: 1
1305: net_useragent_mobile_common
1306: net_useragent_mobile_docomo
1307: DoCoMo
1308: 1
1309: 
1310: 
1311: 1
1312: net_useragent_mobile_common
1313: net_useragent_mobile_docomo
1314: DoCoMo
1315: 1
1316: 
1317: 
1318: 1
1319: net_useragent_mobile_common
1320: net_useragent_mobile_docomo
1321: DoCoMo
1322: 1
1323: 
1324: 
1325: 1
1326: net_useragent_mobile_common
1327: net_useragent_mobile_docomo
1328: DoCoMo
1329: 1
1330: 
1331: 
1332: 1
1333: net_useragent_mobile_common
1334: net_useragent_mobile_docomo
1335: DoCoMo
1336: 1
1337: 
1338: 
1339: 1
1340: net_useragent_mobile_common
1341: net_useragent_mobile_docomo
1342: DoCoMo
1343: 1
1344: 
1345: 
1346: 1
1347: net_useragent_mobile_common
1348: net_useragent_mobile_docomo
1349: DoCoMo
1350: 1
1351: 
1352: 
1353: 1
1354: net_useragent_mobile_common
1355: net_useragent_mobile_docomo
1356: DoCoMo
1357: 1
1358: 
1359: 
1360: 1
1361: net_useragent_mobile_common
1362: net_useragent_mobile_docomo
1363: DoCoMo
1364: 1
1365: 
1366: 
1367: 1
1368: net_useragent_mobile_common
1369: net_useragent_mobile_docomo
1370: DoCoMo
1371: 1
1372: 
1373: 
1374: 1
1375: net_useragent_mobile_common
1376: net_useragent_mobile_docomo
1377: DoCoMo
1378: 1
1379: 
1380: 
1381: 1
1382: net_useragent_mobile_common
1383: net_useragent_mobile_docomo
1384: DoCoMo
1385: 1
1386: 
1387: 
1388: 1
1389: net_useragent_mobile_common
1390: net_useragent_mobile_docomo
1391: DoCoMo
1392: 1
1393: 
1394: 
1395: 1
1396: net_useragent_mobile_common
1397: net_useragent_mobile_docomo
1398: DoCoMo
1399: 1
1400: 
1401: 
1402: 1
1403: net_useragent_mobile_common
1404: net_useragent_mobile_docomo
1405: DoCoMo
1406: 1
1407: 
1408: 
1409: 1
1410: net_useragent_mobile_common
1411: net_useragent_mobile_docomo
1412: DoCoMo
1413: 1
1414: 
1415: 
1416: 1
1417: net_useragent_mobile_common
1418: net_useragent_mobile_docomo
1419: DoCoMo
1420: 1
1421: 
1422: 
1423: 1
1424: net_useragent_mobile_common
1425: net_useragent_mobile_docomo
1426: DoCoMo
1427: 1
1428: 
1429: 
1430: 1
1431: net_useragent_mobile_common
1432: net_useragent_mobile_docomo
1433: DoCoMo
1434: 1
1435: 
1436: 
1437: 1
1438: net_useragent_mobile_common
1439: net_useragent_mobile_docomo
1440: DoCoMo
1441: 1
1442: 
1443: 
1444: 1
1445: net_useragent_mobile_common
1446: net_useragent_mobile_docomo
1447: DoCoMo
1448: 1
1449: 
1450: 
1451: 1
1452: net_useragent_mobile_common
1453: net_useragent_mobile_docomo
1454: DoCoMo
1455: 1
1456: 
1457: 
1458: 1
1459: net_useragent_mobile_common
1460: net_useragent_mobile_docomo
1461: DoCoMo
1462: 1
1463: 
1464: 
1465: 1
1466: net_useragent_mobile_common
1467: net_useragent_mobile_docomo
1468: DoCoMo
1469: 1
1470: 
1471: 
1472: 1
1473: net_useragent_mobile_common
1474: net_useragent_mobile_docomo
1475: DoCoMo
1476: 1
1477: 
1478: 
1479: 1
1480: net_useragent_mobile_common
1481: net_useragent_mobile_docomo
1482: DoCoMo
1483: 1
1484: 
1485: 
1486: 1
1487: net_useragent_mobile_common
1488: net_useragent_mobile_docomo
1489: DoCoMo
1490: 1
1491: 
1492: 
1493: 1
1494: net_useragent_mobile_common
1495: net_useragent_mobile_docomo
1496: DoCoMo
1497: 1
1498: 
1499: 
1500: 1
1501: net_useragent_mobile_common
1502: net_useragent_mobile_docomo
1503: DoCoMo
1504: 1
1505: 
1506: 
1507: 1
1508: net_useragent_mobile_common
1509: net_useragent_mobile_docomo
1510: DoCoMo
1511: 1
1512: 
1513: 
1514: 1
1515: net_useragent_mobile_common
1516: net_useragent_mobile_docomo
1517: DoCoMo
1518: 1
1519: 
1520: 
1521: 1
1522: net_useragent_mobile_common
1523: net_useragent_mobile_docomo
1524: DoCoMo
1525: 1
1526: 
1527: 
1528: 1
1529: net_useragent_mobile_common
1530: net_useragent_mobile_docomo
1531: DoCoMo
1532: 1
1533: 
1534: 
1535: 1
1536: net_useragent_mobile_common
1537: net_useragent_mobile_docomo
1538: DoCoMo
1539: 1
1540: 
1541: 
1542: 1
1543: net_useragent_mobile_common
1544: net_useragent_mobile_docomo
1545: DoCoMo
1546: 1
1547: 
1548: 
1549: 1
1550: net_useragent_mobile_common
1551: net_useragent_mobile_docomo
1552: DoCoMo
1553: 1
1554: 
1555: 
1556: 1
1557: net_useragent_mobile_common
1558: net_useragent_mobile_docomo
1559: DoCoMo
1560: 1
1561: 
1562: 
1563: 1
1564: net_useragent_mobile_common
1565: net_useragent_mobile_docomo
1566: DoCoMo
1567: 1
1568: 
1569: 
1570: 1
1571: net_useragent_mobile_common
1572: net_useragent_mobile_docomo
1573: DoCoMo
1574: 1
1575: 
1576: 
1577: 1
1578: net_useragent_mobile_common
1579: net_useragent_mobile_docomo
1580: DoCoMo
1581: 1
1582: 
1583: 
1584: 1
1585: net_useragent_mobile_common
1586: net_useragent_mobile_docomo
1587: DoCoMo
1588: 1
1589: 
1590: 
1591: 1
1592: net_useragent_mobile_common
1593: net_useragent_mobile_docomo
1594: DoCoMo
1595: 1
1596: 
1597: 
1598: 1
1599: net_useragent_mobile_common
1600: net_useragent_mobile_docomo
1601: DoCoMo
1602: 1
1603: 
1604: 
1605: 1
1606: net_useragent_mobile_common
1607: net_useragent_mobile_docomo
1608: DoCoMo
1609: 1
1610: 
1611: 
1612: 1
1613: net_useragent_mobile_common
1614: net_useragent_mobile_docomo
1615: DoCoMo
1616: 1
1617: 
1618: 
1619: 1
1620: net_useragent_mobile_common
1621: net_useragent_mobile_docomo
1622: DoCoMo
1623: 1
1624: 
1625: 
1626: 1
1627: net_useragent_mobile_error
1628: Net_UserAgent_Mobile Error: no match
1629: 1
1630: net_useragent_mobile_error
1631: Net_UserAgent_Mobile Error: no match
1632: 1
1633: net_useragent_mobile_error
1634: Net_UserAgent_Mobile Error: no match
