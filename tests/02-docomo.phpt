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
               array('DoCoMo/1.0/F661i/c10/TB', '1.0', '4.0', 'F661i', 10, false, 'F', '661i', array('status' => 'TB')),
               array('DoCoMo/1.0/D505i/c20/TC/W20H10', '1.0', '5.0', 'D505i', 20, false, 'D', '505i', array('status' => 'TC'))
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
                     'DoCoMo/1.0/D505i/c20/TC/W20H10'
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
561: 1
562: net_useragent_mobile_common
563: net_useragent_mobile_docomo
564: 1
565: 
566: 
567: DoCoMo
568: DoCoMo/1.0/D505i/c20/TC/W20H10
569: 1.0
570: 5.0
571: D505i
572: 20
573: 
574: D
575: 505i
576: Testing status ...
577: TC
578: 1
579: net_useragent_mobile_common
580: net_useragent_mobile_docomo
581: DoCoMo
582: 1
583: 
584: 
585: 1
586: net_useragent_mobile_common
587: net_useragent_mobile_docomo
588: DoCoMo
589: 1
590: 
591: 
592: 1
593: net_useragent_mobile_common
594: net_useragent_mobile_docomo
595: DoCoMo
596: 1
597: 
598: 
599: 1
600: net_useragent_mobile_common
601: net_useragent_mobile_docomo
602: DoCoMo
603: 1
604: 
605: 
606: 1
607: net_useragent_mobile_common
608: net_useragent_mobile_docomo
609: DoCoMo
610: 1
611: 
612: 
613: 1
614: net_useragent_mobile_common
615: net_useragent_mobile_docomo
616: DoCoMo
617: 1
618: 
619: 
620: 1
621: net_useragent_mobile_common
622: net_useragent_mobile_docomo
623: DoCoMo
624: 1
625: 
626: 
627: 1
628: net_useragent_mobile_common
629: net_useragent_mobile_docomo
630: DoCoMo
631: 1
632: 
633: 
634: 1
635: net_useragent_mobile_common
636: net_useragent_mobile_docomo
637: DoCoMo
638: 1
639: 
640: 
641: 1
642: net_useragent_mobile_common
643: net_useragent_mobile_docomo
644: DoCoMo
645: 1
646: 
647: 
648: 1
649: net_useragent_mobile_common
650: net_useragent_mobile_docomo
651: DoCoMo
652: 1
653: 
654: 
655: 1
656: net_useragent_mobile_common
657: net_useragent_mobile_docomo
658: DoCoMo
659: 1
660: 
661: 
662: 1
663: net_useragent_mobile_common
664: net_useragent_mobile_docomo
665: DoCoMo
666: 1
667: 
668: 
669: 1
670: net_useragent_mobile_common
671: net_useragent_mobile_docomo
672: DoCoMo
673: 1
674: 
675: 
676: 1
677: net_useragent_mobile_common
678: net_useragent_mobile_docomo
679: DoCoMo
680: 1
681: 
682: 
683: 1
684: net_useragent_mobile_common
685: net_useragent_mobile_docomo
686: DoCoMo
687: 1
688: 
689: 
690: 1
691: net_useragent_mobile_common
692: net_useragent_mobile_docomo
693: DoCoMo
694: 1
695: 
696: 
697: 1
698: net_useragent_mobile_common
699: net_useragent_mobile_docomo
700: DoCoMo
701: 1
702: 
703: 
704: 1
705: net_useragent_mobile_common
706: net_useragent_mobile_docomo
707: DoCoMo
708: 1
709: 
710: 
711: 1
712: net_useragent_mobile_common
713: net_useragent_mobile_docomo
714: DoCoMo
715: 1
716: 
717: 
718: 1
719: net_useragent_mobile_common
720: net_useragent_mobile_docomo
721: DoCoMo
722: 1
723: 
724: 
725: 1
726: net_useragent_mobile_common
727: net_useragent_mobile_docomo
728: DoCoMo
729: 1
730: 
731: 
732: 1
733: net_useragent_mobile_common
734: net_useragent_mobile_docomo
735: DoCoMo
736: 1
737: 
738: 
739: 1
740: net_useragent_mobile_common
741: net_useragent_mobile_docomo
742: DoCoMo
743: 1
744: 
745: 
746: 1
747: net_useragent_mobile_common
748: net_useragent_mobile_docomo
749: DoCoMo
750: 1
751: 
752: 
753: 1
754: net_useragent_mobile_common
755: net_useragent_mobile_docomo
756: DoCoMo
757: 1
758: 
759: 
760: 1
761: net_useragent_mobile_common
762: net_useragent_mobile_docomo
763: DoCoMo
764: 1
765: 
766: 
767: 1
768: net_useragent_mobile_common
769: net_useragent_mobile_docomo
770: DoCoMo
771: 1
772: 
773: 
774: 1
775: net_useragent_mobile_common
776: net_useragent_mobile_docomo
777: DoCoMo
778: 1
779: 
780: 
781: 1
782: net_useragent_mobile_common
783: net_useragent_mobile_docomo
784: DoCoMo
785: 1
786: 
787: 
788: 1
789: net_useragent_mobile_common
790: net_useragent_mobile_docomo
791: DoCoMo
792: 1
793: 
794: 
795: 1
796: net_useragent_mobile_common
797: net_useragent_mobile_docomo
798: DoCoMo
799: 1
800: 
801: 
802: 1
803: net_useragent_mobile_common
804: net_useragent_mobile_docomo
805: DoCoMo
806: 1
807: 
808: 
809: 1
810: net_useragent_mobile_common
811: net_useragent_mobile_docomo
812: DoCoMo
813: 1
814: 
815: 
816: 1
817: net_useragent_mobile_common
818: net_useragent_mobile_docomo
819: DoCoMo
820: 1
821: 
822: 
823: 1
824: net_useragent_mobile_common
825: net_useragent_mobile_docomo
826: DoCoMo
827: 1
828: 
829: 
830: 1
831: net_useragent_mobile_common
832: net_useragent_mobile_docomo
833: DoCoMo
834: 1
835: 
836: 
837: 1
838: net_useragent_mobile_common
839: net_useragent_mobile_docomo
840: DoCoMo
841: 1
842: 
843: 
844: 1
845: net_useragent_mobile_common
846: net_useragent_mobile_docomo
847: DoCoMo
848: 1
849: 
850: 
851: 1
852: net_useragent_mobile_common
853: net_useragent_mobile_docomo
854: DoCoMo
855: 1
856: 
857: 
858: 1
859: net_useragent_mobile_common
860: net_useragent_mobile_docomo
861: DoCoMo
862: 1
863: 
864: 
865: 1
866: net_useragent_mobile_common
867: net_useragent_mobile_docomo
868: DoCoMo
869: 1
870: 
871: 
872: 1
873: net_useragent_mobile_common
874: net_useragent_mobile_docomo
875: DoCoMo
876: 1
877: 
878: 
879: 1
880: net_useragent_mobile_common
881: net_useragent_mobile_docomo
882: DoCoMo
883: 1
884: 
885: 
886: 1
887: net_useragent_mobile_common
888: net_useragent_mobile_docomo
889: DoCoMo
890: 1
891: 
892: 
893: 1
894: net_useragent_mobile_common
895: net_useragent_mobile_docomo
896: DoCoMo
897: 1
898: 
899: 
900: 1
901: net_useragent_mobile_common
902: net_useragent_mobile_docomo
903: DoCoMo
904: 1
905: 
906: 
907: 1
908: net_useragent_mobile_common
909: net_useragent_mobile_docomo
910: DoCoMo
911: 1
912: 
913: 
914: 1
915: net_useragent_mobile_common
916: net_useragent_mobile_docomo
917: DoCoMo
918: 1
919: 
920: 
921: 1
922: net_useragent_mobile_common
923: net_useragent_mobile_docomo
924: DoCoMo
925: 1
926: 
927: 
928: 1
929: net_useragent_mobile_common
930: net_useragent_mobile_docomo
931: DoCoMo
932: 1
933: 
934: 
935: 1
936: net_useragent_mobile_common
937: net_useragent_mobile_docomo
938: DoCoMo
939: 1
940: 
941: 
942: 1
943: net_useragent_mobile_common
944: net_useragent_mobile_docomo
945: DoCoMo
946: 1
947: 
948: 
949: 1
950: net_useragent_mobile_common
951: net_useragent_mobile_docomo
952: DoCoMo
953: 1
954: 
955: 
956: 1
957: net_useragent_mobile_common
958: net_useragent_mobile_docomo
959: DoCoMo
960: 1
961: 
962: 
963: 1
964: net_useragent_mobile_common
965: net_useragent_mobile_docomo
966: DoCoMo
967: 1
968: 
969: 
970: 1
971: net_useragent_mobile_common
972: net_useragent_mobile_docomo
973: DoCoMo
974: 1
975: 
976: 
977: 1
978: net_useragent_mobile_common
979: net_useragent_mobile_docomo
980: DoCoMo
981: 1
982: 
983: 
984: 1
985: net_useragent_mobile_common
986: net_useragent_mobile_docomo
987: DoCoMo
988: 1
989: 
990: 
991: 1
992: net_useragent_mobile_common
993: net_useragent_mobile_docomo
994: DoCoMo
995: 1
996: 
997: 
998: 1
999: net_useragent_mobile_common
1000: net_useragent_mobile_docomo
1001: DoCoMo
1002: 1
1003: 
1004: 
1005: 1
1006: net_useragent_mobile_common
1007: net_useragent_mobile_docomo
1008: DoCoMo
1009: 1
1010: 
1011: 
1012: 1
1013: net_useragent_mobile_common
1014: net_useragent_mobile_docomo
1015: DoCoMo
1016: 1
1017: 
1018: 
1019: 1
1020: net_useragent_mobile_common
1021: net_useragent_mobile_docomo
1022: DoCoMo
1023: 1
1024: 
1025: 
1026: 1
1027: net_useragent_mobile_common
1028: net_useragent_mobile_docomo
1029: DoCoMo
1030: 1
1031: 
1032: 
1033: 1
1034: net_useragent_mobile_common
1035: net_useragent_mobile_docomo
1036: DoCoMo
1037: 1
1038: 
1039: 
1040: 1
1041: net_useragent_mobile_common
1042: net_useragent_mobile_docomo
1043: DoCoMo
1044: 1
1045: 
1046: 
1047: 1
1048: net_useragent_mobile_common
1049: net_useragent_mobile_docomo
1050: DoCoMo
1051: 1
1052: 
1053: 
1054: 1
1055: net_useragent_mobile_common
1056: net_useragent_mobile_docomo
1057: DoCoMo
1058: 1
1059: 
1060: 
1061: 1
1062: net_useragent_mobile_common
1063: net_useragent_mobile_docomo
1064: DoCoMo
1065: 1
1066: 
1067: 
1068: 1
1069: net_useragent_mobile_common
1070: net_useragent_mobile_docomo
1071: DoCoMo
1072: 1
1073: 
1074: 
1075: 1
1076: net_useragent_mobile_common
1077: net_useragent_mobile_docomo
1078: DoCoMo
1079: 1
1080: 
1081: 
1082: 1
1083: net_useragent_mobile_common
1084: net_useragent_mobile_docomo
1085: DoCoMo
1086: 1
1087: 
1088: 
1089: 1
1090: net_useragent_mobile_common
1091: net_useragent_mobile_docomo
1092: DoCoMo
1093: 1
1094: 
1095: 
1096: 1
1097: net_useragent_mobile_common
1098: net_useragent_mobile_docomo
1099: DoCoMo
1100: 1
1101: 
1102: 
1103: 1
1104: net_useragent_mobile_common
1105: net_useragent_mobile_docomo
1106: DoCoMo
1107: 1
1108: 
1109: 
1110: 1
1111: net_useragent_mobile_common
1112: net_useragent_mobile_docomo
1113: DoCoMo
1114: 1
1115: 
1116: 
1117: 1
1118: net_useragent_mobile_common
1119: net_useragent_mobile_docomo
1120: DoCoMo
1121: 1
1122: 
1123: 
1124: 1
1125: net_useragent_mobile_common
1126: net_useragent_mobile_docomo
1127: DoCoMo
1128: 1
1129: 
1130: 
1131: 1
1132: net_useragent_mobile_common
1133: net_useragent_mobile_docomo
1134: DoCoMo
1135: 1
1136: 
1137: 
1138: 1
1139: net_useragent_mobile_common
1140: net_useragent_mobile_docomo
1141: DoCoMo
1142: 1
1143: 
1144: 
1145: 1
1146: net_useragent_mobile_common
1147: net_useragent_mobile_docomo
1148: DoCoMo
1149: 1
1150: 
1151: 
1152: 1
1153: net_useragent_mobile_common
1154: net_useragent_mobile_docomo
1155: DoCoMo
1156: 1
1157: 
1158: 
1159: 1
1160: net_useragent_mobile_common
1161: net_useragent_mobile_docomo
1162: DoCoMo
1163: 1
1164: 
1165: 
1166: 1
1167: net_useragent_mobile_common
1168: net_useragent_mobile_docomo
1169: DoCoMo
1170: 1
1171: 
1172: 
1173: 1
1174: net_useragent_mobile_common
1175: net_useragent_mobile_docomo
1176: DoCoMo
1177: 1
1178: 
1179: 
1180: 1
1181: net_useragent_mobile_common
1182: net_useragent_mobile_docomo
1183: DoCoMo
1184: 1
1185: 
1186: 
1187: 1
1188: net_useragent_mobile_common
1189: net_useragent_mobile_docomo
1190: DoCoMo
1191: 1
1192: 
1193: 
1194: 1
1195: net_useragent_mobile_common
1196: net_useragent_mobile_docomo
1197: DoCoMo
1198: 1
1199: 
1200: 
1201: 1
1202: net_useragent_mobile_common
1203: net_useragent_mobile_docomo
1204: DoCoMo
1205: 1
1206: 
1207: 
1208: 1
1209: net_useragent_mobile_common
1210: net_useragent_mobile_docomo
1211: DoCoMo
1212: 1
1213: 
1214: 
1215: 1
1216: net_useragent_mobile_common
1217: net_useragent_mobile_docomo
1218: DoCoMo
1219: 1
1220: 
1221: 
1222: 1
1223: net_useragent_mobile_common
1224: net_useragent_mobile_docomo
1225: DoCoMo
1226: 1
1227: 
1228: 
1229: 1
1230: net_useragent_mobile_common
1231: net_useragent_mobile_docomo
1232: DoCoMo
1233: 1
1234: 
1235: 
1236: 1
1237: net_useragent_mobile_common
1238: net_useragent_mobile_docomo
1239: DoCoMo
1240: 1
1241: 
1242: 
1243: 1
1244: net_useragent_mobile_common
1245: net_useragent_mobile_docomo
1246: DoCoMo
1247: 1
1248: 
1249: 
1250: 1
1251: net_useragent_mobile_common
1252: net_useragent_mobile_docomo
1253: DoCoMo
1254: 1
1255: 
1256: 
1257: 1
1258: net_useragent_mobile_common
1259: net_useragent_mobile_docomo
1260: DoCoMo
1261: 1
1262: 
1263: 
1264: 1
1265: net_useragent_mobile_common
1266: net_useragent_mobile_docomo
1267: DoCoMo
1268: 1
1269: 
1270: 
1271: 1
1272: net_useragent_mobile_common
1273: net_useragent_mobile_docomo
1274: DoCoMo
1275: 1
1276: 
1277: 
1278: 1
1279: net_useragent_mobile_common
1280: net_useragent_mobile_docomo
1281: DoCoMo
1282: 1
1283: 
1284: 
1285: 1
1286: net_useragent_mobile_common
1287: net_useragent_mobile_docomo
1288: DoCoMo
1289: 1
1290: 
1291: 
1292: 1
1293: net_useragent_mobile_common
1294: net_useragent_mobile_docomo
1295: DoCoMo
1296: 1
1297: 
1298: 
1299: 1
1300: net_useragent_mobile_common
1301: net_useragent_mobile_docomo
1302: DoCoMo
1303: 1
1304: 
1305: 
1306: 1
1307: net_useragent_mobile_common
1308: net_useragent_mobile_docomo
1309: DoCoMo
1310: 1
1311: 
1312: 
1313: 1
1314: net_useragent_mobile_common
1315: net_useragent_mobile_docomo
1316: DoCoMo
1317: 1
1318: 
1319: 
1320: 1
1321: net_useragent_mobile_common
1322: net_useragent_mobile_docomo
1323: DoCoMo
1324: 1
1325: 
1326: 
1327: 1
1328: net_useragent_mobile_common
1329: net_useragent_mobile_docomo
1330: DoCoMo
1331: 1
1332: 
1333: 
1334: 1
1335: net_useragent_mobile_common
1336: net_useragent_mobile_docomo
1337: DoCoMo
1338: 1
1339: 
1340: 
1341: 1
1342: net_useragent_mobile_common
1343: net_useragent_mobile_docomo
1344: DoCoMo
1345: 1
1346: 
1347: 
1348: 1
1349: net_useragent_mobile_common
1350: net_useragent_mobile_docomo
1351: DoCoMo
1352: 1
1353: 
1354: 
1355: 1
1356: net_useragent_mobile_common
1357: net_useragent_mobile_docomo
1358: DoCoMo
1359: 1
1360: 
1361: 
1362: 1
1363: net_useragent_mobile_common
1364: net_useragent_mobile_docomo
1365: DoCoMo
1366: 1
1367: 
1368: 
1369: 1
1370: net_useragent_mobile_common
1371: net_useragent_mobile_docomo
1372: DoCoMo
1373: 1
1374: 
1375: 
1376: 1
1377: net_useragent_mobile_common
1378: net_useragent_mobile_docomo
1379: DoCoMo
1380: 1
1381: 
1382: 
1383: 1
1384: net_useragent_mobile_common
1385: net_useragent_mobile_docomo
1386: DoCoMo
1387: 1
1388: 
1389: 
1390: 1
1391: net_useragent_mobile_common
1392: net_useragent_mobile_docomo
1393: DoCoMo
1394: 1
1395: 
1396: 
1397: 1
1398: net_useragent_mobile_common
1399: net_useragent_mobile_docomo
1400: DoCoMo
1401: 1
1402: 
1403: 
1404: 1
1405: net_useragent_mobile_common
1406: net_useragent_mobile_docomo
1407: DoCoMo
1408: 1
1409: 
1410: 
1411: 1
1412: net_useragent_mobile_common
1413: net_useragent_mobile_docomo
1414: DoCoMo
1415: 1
1416: 
1417: 
1418: 1
1419: net_useragent_mobile_common
1420: net_useragent_mobile_docomo
1421: DoCoMo
1422: 1
1423: 
1424: 
1425: 1
1426: net_useragent_mobile_common
1427: net_useragent_mobile_docomo
1428: DoCoMo
1429: 1
1430: 
1431: 
1432: 1
1433: net_useragent_mobile_common
1434: net_useragent_mobile_docomo
1435: DoCoMo
1436: 1
1437: 
1438: 
1439: 1
1440: net_useragent_mobile_common
1441: net_useragent_mobile_docomo
1442: DoCoMo
1443: 1
1444: 
1445: 
1446: 1
1447: net_useragent_mobile_common
1448: net_useragent_mobile_docomo
1449: DoCoMo
1450: 1
1451: 
1452: 
1453: 1
1454: net_useragent_mobile_common
1455: net_useragent_mobile_docomo
1456: DoCoMo
1457: 1
1458: 
1459: 
1460: 1
1461: net_useragent_mobile_common
1462: net_useragent_mobile_docomo
1463: DoCoMo
1464: 1
1465: 
1466: 
1467: 1
1468: net_useragent_mobile_common
1469: net_useragent_mobile_docomo
1470: DoCoMo
1471: 1
1472: 
1473: 
1474: 1
1475: net_useragent_mobile_common
1476: net_useragent_mobile_docomo
1477: DoCoMo
1478: 1
1479: 
1480: 
1481: 1
1482: net_useragent_mobile_common
1483: net_useragent_mobile_docomo
1484: DoCoMo
1485: 1
1486: 
1487: 
1488: 1
1489: net_useragent_mobile_common
1490: net_useragent_mobile_docomo
1491: DoCoMo
1492: 1
1493: 
1494: 
1495: 1
1496: net_useragent_mobile_common
1497: net_useragent_mobile_docomo
1498: DoCoMo
1499: 1
1500: 
1501: 
1502: 1
1503: net_useragent_mobile_common
1504: net_useragent_mobile_docomo
1505: DoCoMo
1506: 1
1507: 
1508: 
1509: 1
1510: net_useragent_mobile_common
1511: net_useragent_mobile_docomo
1512: DoCoMo
1513: 1
1514: 
1515: 
1516: 1
1517: net_useragent_mobile_common
1518: net_useragent_mobile_docomo
1519: DoCoMo
1520: 1
1521: 
1522: 
1523: 1
1524: net_useragent_mobile_common
1525: net_useragent_mobile_docomo
1526: DoCoMo
1527: 1
1528: 
1529: 
1530: 1
1531: net_useragent_mobile_common
1532: net_useragent_mobile_docomo
1533: DoCoMo
1534: 1
1535: 
1536: 
1537: 1
1538: net_useragent_mobile_common
1539: net_useragent_mobile_docomo
1540: DoCoMo
1541: 1
1542: 
1543: 
1544: 1
1545: net_useragent_mobile_common
1546: net_useragent_mobile_docomo
1547: DoCoMo
1548: 1
1549: 
1550: 
1551: 1
1552: net_useragent_mobile_common
1553: net_useragent_mobile_docomo
1554: DoCoMo
1555: 1
1556: 
1557: 
1558: 1
1559: net_useragent_mobile_common
1560: net_useragent_mobile_docomo
1561: DoCoMo
1562: 1
1563: 
1564: 
1565: 1
1566: net_useragent_mobile_common
1567: net_useragent_mobile_docomo
1568: DoCoMo
1569: 1
1570: 
1571: 
1572: 1
1573: net_useragent_mobile_common
1574: net_useragent_mobile_docomo
1575: DoCoMo
1576: 1
1577: 
1578: 
1579: 1
1580: net_useragent_mobile_common
1581: net_useragent_mobile_docomo
1582: DoCoMo
1583: 1
1584: 
1585: 
1586: 1
1587: net_useragent_mobile_common
1588: net_useragent_mobile_docomo
1589: DoCoMo
1590: 1
1591: 
1592: 
1593: 1
1594: net_useragent_mobile_common
1595: net_useragent_mobile_docomo
1596: DoCoMo
1597: 1
1598: 
1599: 
1600: 1
1601: net_useragent_mobile_error
1602: Net_UserAgent_Mobile Error: no match
1603: 1
1604: net_useragent_mobile_error
1605: Net_UserAgent_Mobile Error: no match
1606: 1
1607: net_useragent_mobile_error
1608: Net_UserAgent_Mobile Error: no match
