--TEST--
Net_UserAgent_Mobile: NonMobile
--SKIPIF--
<?php if (!@include('Net/UserAgent/Mobile.php')) print 'skip'; ?>
--FILE--
<?php
//
// Test for: Net/UserAgent/Mobile.php
// Parts tested: - NonMobile
//

error_reporting(E_ALL);
require_once('Net/UserAgent/Mobile.php');

$test_agents = array(
                     'Mozilla/2.0 (compatible; Ask Jeeves)',
                     'Mozilla/2.0 (compatible; MSIE 3.01; Windows 95)',
                     'Mozilla/2.0 (compatible; MSIE 3.02; Windows CE)',
                     'Mozilla/2.0 (compatible; MSIE 3.02; Windows CE; 240x320)',
                     'Mozilla/2.0 (compatible; MSIE 3.02; Windows CE; 240x320; PPC)',
                     'Mozilla/2.0 (compatible; MSIE 3.02; Windows CE; PPC; 240x320)',
                     'Mozilla/2.0 (compatible; T-H-U-N-D-E-R-S-T-O-N-E)',
                     'Mozilla/3.0 (DreamPassport/3.0)',
                     'Mozilla/3.0 (DreamPassport/3.15; SONICTEAM/PSOV2)',
                     'Mozilla/3.0 (DreamPassport/3.2)',
                     'Mozilla/3.0 (Slurp.so/Goo; slurp@inktomi.com; http://www.inktomi.com/slurp.html)',
                     'Mozilla/3.0 (Slurp/si; slurp@inktomi.com; http://www.inktomi.com/slurp.html)',
                     'Mozilla/3.0 (Win95; I)',
                     'Mozilla/3.0 (Windows 2000; U) Opera 6.05  [ja]',
                     'Mozilla/3.0 (aruyo/0.01;http://www.aaacafe.ne.jp/ ;support@aaacafe.ne.jp)',
                     'Mozilla/3.0 (compatible)',
                     'Mozilla/3.0 (compatible; Indy Library)',
                     'Mozilla/3.0 (compatible; NetMind-Minder/4.3.1J)',
                     'Mozilla/3.0 (compatible; NetPositive/2.2.1; BeOS)',
                     'Mozilla/3.0 (compatible; PerMan Surfer 3.0; Win95)',
                     'Mozilla/3.0 (compatible;)',
                     'Mozilla/3.01 (compatible;)',
                     'Mozilla/3.01 [ja] (Macintosh; I; 68K)',
                     'Mozilla/3.01Gold (Macintosh; I; 68K)',
                     'Mozilla/3.01Gold (Macintosh; I; 68K; SiteCoach 1.0)',
                     'Mozilla/4.0',
                     'Mozilla/4.0 (LINKS ARoMATIZED)',
                     'Mozilla/4.0 (PDA; SL-A300/1.0,Embedix/Qtopia/1.1.0) NetFront/3.0',
                     'Mozilla/4.0 (PDA; Windows CE/0.9.3) NetFront/3.0',
                     'Mozilla/4.0 (Windows NT 4.0)',
                     'Mozilla/4.0 (compatible',
                     'Mozilla/4.0 (compatible; MSIE 4.01; MSN 2.5; Windows 95)',
                     'Mozilla/4.0 (compatible; MSIE 4.01; Windows 95)',
                     'Mozilla/4.0 (compatible; MSIE 4.01; Windows 98)',
                     'Mozilla/4.0 (compatible; MSIE 4.01; Windows NT Windows CE)',
                     'Mozilla/4.0 (compatible; MSIE 4.01; Windows NT)',
                     'Mozilla/4.0 (compatible; MSIE 4.0; Windows 95)',
                     'Mozilla/4.0 (compatible; MSIE 4.5; Mac_PowerPC)',
                     'Mozilla/4.0 (compatible; MSIE 5.00; Windows 98)',
                     'Mozilla/4.0 (compatible; MSIE 5.01; MSN 2.5; Windows 98)',
                     'Mozilla/4.0 (compatible; MSIE 5.01; Windows 95)',
                     'Mozilla/4.0 (compatible; MSIE 5.01; Windows 98)',
                     'Mozilla/4.0 (compatible; MSIE 5.01; Windows 98; HKBN)',
                     'Mozilla/4.0 (compatible; MSIE 5.01; Windows 98; MSIECrawler)',
                     'Mozilla/4.0 (compatible; MSIE 5.01; Windows 98; MSOCD; AtHomeJP0109)',
                     'Mozilla/4.0 (compatible; MSIE 5.01; Windows 98; Q312461)',
                     'Mozilla/4.0 (compatible; MSIE 5.01; Windows 98; YComp 5.0.2.4)',
                     'Mozilla/4.0 (compatible; MSIE 5.01; Windows 98; istb 641)',
                     'Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)',
                     'Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0) LinkChecker 0.1',
                     'Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0) WebWasher 3.2',
                     'Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0; .NET CLR 1.0.3705)',
                     'Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0; DigExt)',
                     'Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0; NetCaptor 7.0.1)',
                     'Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0; T312461)',
                     'Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0; istb 641)',
                     'Mozilla/4.0 (compatible; MSIE 5.01; Windows NT)',
                     'Mozilla/4.0 (compatible; MSIE 5.01; Windows NT; Lunascape 0.99c)',
                     'Mozilla/4.0 (compatible; MSIE 5.01; Windows NT; Norfolk Southern Corp.)',
                     'Mozilla/4.0 (compatible; MSIE 5.01; Windows NT; nk-07102k)',
                     'Mozilla/4.0 (compatible; MSIE 5.0; AOL 7.0; Windows 98; DigExt)',
                     'Mozilla/4.0 (compatible; MSIE 5.0; Linux 2.2.18-0vl4.2 i686) Opera 6.0  [en]',
                     'Mozilla/4.0 (compatible; MSIE 5.0; Mac_PowerPC)',
                     'Mozilla/4.0 (compatible; MSIE 5.0; Mac_PowerPC; AtHomeJP191)',
                     'Mozilla/4.0 (compatible; MSIE 5.0; Mac_PowerPC;)',
                     'Mozilla/4.0 (compatible; MSIE 5.0; Win32)',
                     'Mozilla/4.0 (compatible; MSIE 5.0; Windows 2000) Opera 6.0  [ja]',
                     'Mozilla/4.0 (compatible; MSIE 5.0; Windows 2000) Opera 6.03  [en]',
                     'Mozilla/4.0 (compatible; MSIE 5.0; Windows 2000) Opera 6.03  [ja]',
                     'Mozilla/4.0 (compatible; MSIE 5.0; Windows 2000) Opera 6.05  [en]',
                     'Mozilla/4.0 (compatible; MSIE 5.0; Windows 2000) Opera 6.05  [ja]',
                     'Mozilla/4.0 (compatible; MSIE 5.0; Windows 95)',
                     'Mozilla/4.0 (compatible; MSIE 5.0; Windows 95; DigExt)',
                     'Mozilla/4.0 (compatible; MSIE 5.0; Windows 98)',
                     'Mozilla/4.0 (compatible; MSIE 5.0; Windows 98) Opera 5.12  [es]',
                     'Mozilla/4.0 (compatible; MSIE 5.0; Windows 98) Opera 6.03  [ja]',
                     'Mozilla/4.0 (compatible; MSIE 5.0; Windows 98) Opera 6.05  [en]',
                     'Mozilla/4.0 (compatible; MSIE 5.0; Windows 98) Opera 6.05  [ja]',
                     'Mozilla/4.0 (compatible; MSIE 5.0; Windows 98)::ELNSB50::0000211003200258031a018f000000000505000b00000000',
                     'Mozilla/4.0 (compatible; MSIE 5.0; Windows 98; DigExt)',
                     'Mozilla/4.0 (compatible; MSIE 5.0; Windows 98; DigExt; YComp 5.0.0.0)',
                     'Mozilla/4.0 (compatible; MSIE 5.0; Windows 98; Hotbar 3.0)',
                     'Mozilla/4.0 (compatible; MSIE 5.0; Windows ME) Opera 6.03  [ja]',
                     'Mozilla/4.0 (compatible; MSIE 5.0; Windows ME) Opera 6.05  [ja]',
                     'Mozilla/4.0 (compatible; MSIE 5.0; Windows NT 4.0) Opera 6.0  [ja]',
                     'Mozilla/4.0 (compatible; MSIE 5.0; Windows NT 4.0) Opera 6.01  [ja]',
                     'Mozilla/4.0 (compatible; MSIE 5.0; Windows NT 4.0) Opera 6.03  [ja]',
                     'Mozilla/4.0 (compatible; MSIE 5.0; Windows NT 4.0) Opera 6.05  [ja]',
                     'Mozilla/4.0 (compatible; MSIE 5.0; Windows NT 5.0)',
                     'Mozilla/4.0 (compatible; MSIE 5.0; Windows NT)',
                     'Mozilla/4.0 (compatible; MSIE 5.0; Windows NT; DigExt)',
                     'Mozilla/4.0 (compatible; MSIE 5.0; Windows NT; DigExt; DTS Agent',
                     'Mozilla/4.0 (compatible; MSIE 5.0; Windows XP) Opera 6.01  [de]',
                     'Mozilla/4.0 (compatible; MSIE 5.0; Windows XP) Opera 6.03  [ja]',
                     'Mozilla/4.0 (compatible; MSIE 5.0; Windows XP) Opera 6.04  [en]',
                     'Mozilla/4.0 (compatible; MSIE 5.0; Windows XP) Opera 6.04  [ja]',
                     'Mozilla/4.0 (compatible; MSIE 5.0; Windows XP) Opera 6.05  [ja]',
                     'Mozilla/4.0 (compatible; MSIE 5.12; Mac_PowerPC)',
                     'Mozilla/4.0 (compatible; MSIE 5.14; Mac_PowerPC)',
                     'Mozilla/4.0 (compatible; MSIE 5.16; Mac_PowerPC)',
                     'Mozilla/4.0 (compatible; MSIE 5.21; Mac_PowerPC)',
                     'Mozilla/4.0 (compatible; MSIE 5.22; Mac_PowerPC)',
                     'Mozilla/4.0 (compatible; MSIE 5.2; Mac_PowerPC)',
                     'Mozilla/4.0 (compatible; MSIE 5.2; Mac_PowerPC) OmniWeb/4.1.1-v424.6',
                     'Mozilla/4.0 (compatible; MSIE 5.5; AOL 6.0; Windows 98; Win 9x 4.90)',
                     'Mozilla/4.0 (compatible; MSIE 5.5; MSN 2.5; AOL 7.0; Windows 98)',
                     'Mozilla/4.0 (compatible; MSIE 5.5; MSN 2.5; Windows 98)',
                     'Mozilla/4.0 (compatible; MSIE 5.5; Windows 95)',
                     'Mozilla/4.0 (compatible; MSIE 5.5; Windows 95; T312461)',
                     'Mozilla/4.0 (compatible; MSIE 5.5; Windows 95; YComp 5.0.0.0)',
                     'Mozilla/4.0 (compatible; MSIE 5.5; Windows 95; ie5.5cd_t-zone_0005)',
                     'Mozilla/4.0 (compatible; MSIE 5.5; Windows 98)',
                     'Mozilla/4.0 (compatible; MSIE 5.5; Windows 98; .NET CLR 1.0.3705)',
                     'Mozilla/4.0 (compatible; MSIE 5.5; Windows 98; DigExt)',
                     'Mozilla/4.0 (compatible; MSIE 5.5; Windows 98; H010818)',
                     'Mozilla/4.0 (compatible; MSIE 5.5; Windows 98; MSIECrawler)',
                     'Mozilla/4.0 (compatible; MSIE 5.5; Windows 98; MSN 6.1; MSNbMSFT; MSNmja-jp; MSNc00)',
                     'Mozilla/4.0 (compatible; MSIE 5.5; Windows 98; MSOCD; AtHomeJP191)',
                     'Mozilla/4.0 (compatible; MSIE 5.5; Windows 98; Q312461)',
                     'Mozilla/4.0 (compatible; MSIE 5.5; Windows 98; Q312461; T312461)',
                     'Mozilla/4.0 (compatible; MSIE 5.5; Windows 98; T312461)',
                     'Mozilla/4.0 (compatible; MSIE 5.5; Windows 98; T312461; .NET CLR 1.0.3705)',
                     'Mozilla/4.0 (compatible; MSIE 5.5; Windows 98; T312461; istb 641)',
                     'Mozilla/4.0 (compatible; MSIE 5.5; Windows 98; T312461; istb 641; COM+ 1.0.2204)',
                     'Mozilla/4.0 (compatible; MSIE 5.5; Windows 98; Win 9x 4.90',
                     'Mozilla/4.0 (compatible; MSIE 5.5; Windows 98; Win 9x 4.90)',
                     'Mozilla/4.0 (compatible; MSIE 5.5; Windows 98; Win 9x 4.90; .NET CLR 1.0.3705)',
                     'Mozilla/4.0 (compatible; MSIE 5.5; Windows 98; Win 9x 4.90; Lunascape 0.98d)',
                     'Mozilla/4.0 (compatible; MSIE 5.5; Windows 98; Win 9x 4.90; MSOCD; AtHomeJP0109)',
                     'Mozilla/4.0 (compatible; MSIE 5.5; Windows 98; Win 9x 4.90; Q312461)',
                     'Mozilla/4.0 (compatible; MSIE 5.5; Windows 98; Win 9x 4.90; Q312461; T312461)',
                     'Mozilla/4.0 (compatible; MSIE 5.5; Windows 98; Win 9x 4.90; T312461)',
                     'Mozilla/4.0 (compatible; MSIE 5.5; Windows 98; Win 9x 4.90; T312461; .NET CLR 1.0.3705)',
                     'Mozilla/4.0 (compatible; MSIE 5.5; Windows 98; Win 9x 4.90; T312461; Lunascape 0',
                     '.99c)',
                     'Mozilla/4.0 (compatible; MSIE 5.5; Windows 98; Win 9x 4.90; Unithink)',
                     'Mozilla/4.0 (compatible; MSIE 5.5; Windows 98; Win 9x 4.90; telus.net_v5.0.1; Hotbar 4.0)',
                     'Mozilla/4.0 (compatible; MSIE 5.5; Windows 98; telus.net_v5.0.1)',
                     'Mozilla/4.0 (compatible; MSIE 5.5; Windows NT 4.0)',
                     'Mozilla/4.0 (compatible; MSIE 5.5; Windows NT 4.0; H010818)',
                     'Mozilla/4.0 (compatible; MSIE 5.5; Windows NT 4.0; H010818; CPT-IE401SP1; T312461)',
                     'Mozilla/4.0 (compatible; MSIE 5.5; Windows NT 4.0; SenseWave 1.0)',
                     'Mozilla/4.0 (compatible; MSIE 5.5; Windows NT 4.0; Suncorp Metway Ltd)',
                     'Mozilla/4.0 (compatible; MSIE 5.5; Windows NT 4.0; T312461)',
                     'Mozilla/4.0 (compatible; MSIE 5.5; Windows NT 4.0; T312461; .NET CLR 1.0.3705)',
                     'Mozilla/4.0 (compatible; MSIE 5.5; Windows NT 4.0; T312461; Lunascape 0.95a)',
                     'Mozilla/4.0 (compatible; MSIE 5.5; Windows NT 4.0; Yahoo! JAPAN Version Windows 95/NT CD-ROM Edition 1.0.)',
                     'Mozilla/4.0 (compatible; MSIE 5.5; Windows NT 5.0)',
                     'Mozilla/4.0 (compatible; MSIE 5.5; Windows NT 5.0; (R1 1.1))',
                     'Mozilla/4.0 (compatible; MSIE 5.5; Windows NT 5.0; (R1 1.1); (R1 1.3))',
                     'Mozilla/4.0 (compatible; MSIE 5.5; Windows NT 5.0; (R1 1.3))',
                     'Mozilla/4.0 (compatible; MSIE 5.5; Windows NT 5.0; .NET CLR 1.0.3705)',
                     'Mozilla/4.0 (compatible; MSIE 5.5; Windows NT 5.0; AIRF)',
                     'Mozilla/4.0 (compatible; MSIE 5.5; Windows NT 5.0; DigExt)',
                     'Mozilla/4.0 (compatible; MSIE 5.5; Windows NT 5.0; FORJEIS55SP1)',
                     'Mozilla/4.0 (compatible; MSIE 5.5; Windows NT 5.0; H010818)',
                     'Mozilla/4.0 (compatible; MSIE 5.5; Windows NT 5.0; Hotbar 3.0; istb 641)',
                     'Mozilla/4.0 (compatible; MSIE 5.5; Windows NT 5.0; Hotbar 4.1.7.0)',
                     'Mozilla/4.0 (compatible; MSIE 5.5; Windows NT 5.0; Lunascape 0.98c)',
                     'Mozilla/4.0 (compatible; MSIE 5.5; Windows NT 5.0; N_o_k_i_a)',
                     'Mozilla/4.0 (compatible; MSIE 5.5; Windows NT 5.0; Q312461)',
                     'Mozilla/4.0 (compatible; MSIE 5.5; Windows NT 5.0; Q312461; .NET CLR 1.0.3705)',
                     'Mozilla/4.0 (compatible; MSIE 5.5; Windows NT 5.0; T312461)',
                     'Mozilla/4.0 (compatible; MSIE 5.5; Windows NT 5.0; T312461; .NET CLR 1.0.3705)',
                     'Mozilla/4.0 (compatible; MSIE 5.5; Windows NT 5.0; T312461; Hewle'
                     );

$line = 0;

++$line;
print "$line: " ."Testing NonMobile ...\n";

$ua = 'Mozilla/1.0';
$agent = &Net_UserAgent_Mobile::factory($ua);

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
    print "$line: " . $agent->isDoCoMo() . "\n";
    ++$line;
    print "$line: " . $agent->isJPhone() . "\n";
    ++$line;
    print "$line: " . $agent->isEZweb() . "\n";
}
?>
--POST--
--GET--
--EXPECT--
1: Testing NonMobile ...
2: 1
3: net_useragent_mobile_common
4: net_useragent_mobile_nonmobile
5: 
6: 
7: 
8: 1
9: net_useragent_mobile_common
10: net_useragent_mobile_nonmobile
11: 
12: 
13: 
14: 1
15: net_useragent_mobile_common
16: net_useragent_mobile_nonmobile
17: 
18: 
19: 
20: 1
21: net_useragent_mobile_common
22: net_useragent_mobile_nonmobile
23: 
24: 
25: 
26: 1
27: net_useragent_mobile_common
28: net_useragent_mobile_nonmobile
29: 
30: 
31: 
32: 1
33: net_useragent_mobile_common
34: net_useragent_mobile_nonmobile
35: 
36: 
37: 
38: 1
39: net_useragent_mobile_common
40: net_useragent_mobile_nonmobile
41: 
42: 
43: 
44: 1
45: net_useragent_mobile_common
46: net_useragent_mobile_nonmobile
47: 
48: 
49: 
50: 1
51: net_useragent_mobile_common
52: net_useragent_mobile_nonmobile
53: 
54: 
55: 
56: 1
57: net_useragent_mobile_common
58: net_useragent_mobile_nonmobile
59: 
60: 
61: 
62: 1
63: net_useragent_mobile_common
64: net_useragent_mobile_nonmobile
65: 
66: 
67: 
68: 1
69: net_useragent_mobile_common
70: net_useragent_mobile_nonmobile
71: 
72: 
73: 
74: 1
75: net_useragent_mobile_common
76: net_useragent_mobile_nonmobile
77: 
78: 
79: 
80: 1
81: net_useragent_mobile_common
82: net_useragent_mobile_nonmobile
83: 
84: 
85: 
86: 1
87: net_useragent_mobile_common
88: net_useragent_mobile_nonmobile
89: 
90: 
91: 
92: 1
93: net_useragent_mobile_common
94: net_useragent_mobile_nonmobile
95: 
96: 
97: 
98: 1
99: net_useragent_mobile_common
100: net_useragent_mobile_nonmobile
101: 
102: 
103: 
104: 1
105: net_useragent_mobile_common
106: net_useragent_mobile_nonmobile
107: 
108: 
109: 
110: 1
111: net_useragent_mobile_common
112: net_useragent_mobile_nonmobile
113: 
114: 
115: 
116: 1
117: net_useragent_mobile_common
118: net_useragent_mobile_nonmobile
119: 
120: 
121: 
122: 1
123: net_useragent_mobile_common
124: net_useragent_mobile_nonmobile
125: 
126: 
127: 
128: 1
129: net_useragent_mobile_common
130: net_useragent_mobile_nonmobile
131: 
132: 
133: 
134: 1
135: net_useragent_mobile_common
136: net_useragent_mobile_nonmobile
137: 
138: 
139: 
140: 1
141: net_useragent_mobile_common
142: net_useragent_mobile_nonmobile
143: 
144: 
145: 
146: 1
147: net_useragent_mobile_common
148: net_useragent_mobile_nonmobile
149: 
150: 
151: 
152: 1
153: net_useragent_mobile_common
154: net_useragent_mobile_nonmobile
155: 
156: 
157: 
158: 1
159: net_useragent_mobile_common
160: net_useragent_mobile_nonmobile
161: 
162: 
163: 
164: 1
165: net_useragent_mobile_common
166: net_useragent_mobile_nonmobile
167: 
168: 
169: 
170: 1
171: net_useragent_mobile_common
172: net_useragent_mobile_nonmobile
173: 
174: 
175: 
176: 1
177: net_useragent_mobile_common
178: net_useragent_mobile_nonmobile
179: 
180: 
181: 
182: 1
183: net_useragent_mobile_common
184: net_useragent_mobile_nonmobile
185: 
186: 
187: 
188: 1
189: net_useragent_mobile_common
190: net_useragent_mobile_nonmobile
191: 
192: 
193: 
194: 1
195: net_useragent_mobile_common
196: net_useragent_mobile_nonmobile
197: 
198: 
199: 
200: 1
201: net_useragent_mobile_common
202: net_useragent_mobile_nonmobile
203: 
204: 
205: 
206: 1
207: net_useragent_mobile_common
208: net_useragent_mobile_nonmobile
209: 
210: 
211: 
212: 1
213: net_useragent_mobile_common
214: net_useragent_mobile_nonmobile
215: 
216: 
217: 
218: 1
219: net_useragent_mobile_common
220: net_useragent_mobile_nonmobile
221: 
222: 
223: 
224: 1
225: net_useragent_mobile_common
226: net_useragent_mobile_nonmobile
227: 
228: 
229: 
230: 1
231: net_useragent_mobile_common
232: net_useragent_mobile_nonmobile
233: 
234: 
235: 
236: 1
237: net_useragent_mobile_common
238: net_useragent_mobile_nonmobile
239: 
240: 
241: 
242: 1
243: net_useragent_mobile_common
244: net_useragent_mobile_nonmobile
245: 
246: 
247: 
248: 1
249: net_useragent_mobile_common
250: net_useragent_mobile_nonmobile
251: 
252: 
253: 
254: 1
255: net_useragent_mobile_common
256: net_useragent_mobile_nonmobile
257: 
258: 
259: 
260: 1
261: net_useragent_mobile_common
262: net_useragent_mobile_nonmobile
263: 
264: 
265: 
266: 1
267: net_useragent_mobile_common
268: net_useragent_mobile_nonmobile
269: 
270: 
271: 
272: 1
273: net_useragent_mobile_common
274: net_useragent_mobile_nonmobile
275: 
276: 
277: 
278: 1
279: net_useragent_mobile_common
280: net_useragent_mobile_nonmobile
281: 
282: 
283: 
284: 1
285: net_useragent_mobile_common
286: net_useragent_mobile_nonmobile
287: 
288: 
289: 
290: 1
291: net_useragent_mobile_common
292: net_useragent_mobile_nonmobile
293: 
294: 
295: 
296: 1
297: net_useragent_mobile_common
298: net_useragent_mobile_nonmobile
299: 
300: 
301: 
302: 1
303: net_useragent_mobile_common
304: net_useragent_mobile_nonmobile
305: 
306: 
307: 
308: 1
309: net_useragent_mobile_common
310: net_useragent_mobile_nonmobile
311: 
312: 
313: 
314: 1
315: net_useragent_mobile_common
316: net_useragent_mobile_nonmobile
317: 
318: 
319: 
320: 1
321: net_useragent_mobile_common
322: net_useragent_mobile_nonmobile
323: 
324: 
325: 
326: 1
327: net_useragent_mobile_common
328: net_useragent_mobile_nonmobile
329: 
330: 
331: 
332: 1
333: net_useragent_mobile_common
334: net_useragent_mobile_nonmobile
335: 
336: 
337: 
338: 1
339: net_useragent_mobile_common
340: net_useragent_mobile_nonmobile
341: 
342: 
343: 
344: 1
345: net_useragent_mobile_common
346: net_useragent_mobile_nonmobile
347: 
348: 
349: 
350: 1
351: net_useragent_mobile_common
352: net_useragent_mobile_nonmobile
353: 
354: 
355: 
356: 1
357: net_useragent_mobile_common
358: net_useragent_mobile_nonmobile
359: 
360: 
361: 
362: 1
363: net_useragent_mobile_common
364: net_useragent_mobile_nonmobile
365: 
366: 
367: 
368: 1
369: net_useragent_mobile_common
370: net_useragent_mobile_nonmobile
371: 
372: 
373: 
374: 1
375: net_useragent_mobile_common
376: net_useragent_mobile_nonmobile
377: 
378: 
379: 
380: 1
381: net_useragent_mobile_common
382: net_useragent_mobile_nonmobile
383: 
384: 
385: 
386: 1
387: net_useragent_mobile_common
388: net_useragent_mobile_nonmobile
389: 
390: 
391: 
392: 1
393: net_useragent_mobile_common
394: net_useragent_mobile_nonmobile
395: 
396: 
397: 
398: 1
399: net_useragent_mobile_common
400: net_useragent_mobile_nonmobile
401: 
402: 
403: 
404: 1
405: net_useragent_mobile_common
406: net_useragent_mobile_nonmobile
407: 
408: 
409: 
410: 1
411: net_useragent_mobile_common
412: net_useragent_mobile_nonmobile
413: 
414: 
415: 
416: 1
417: net_useragent_mobile_common
418: net_useragent_mobile_nonmobile
419: 
420: 
421: 
422: 1
423: net_useragent_mobile_common
424: net_useragent_mobile_nonmobile
425: 
426: 
427: 
428: 1
429: net_useragent_mobile_common
430: net_useragent_mobile_nonmobile
431: 
432: 
433: 
434: 1
435: net_useragent_mobile_common
436: net_useragent_mobile_nonmobile
437: 
438: 
439: 
440: 1
441: net_useragent_mobile_common
442: net_useragent_mobile_nonmobile
443: 
444: 
445: 
446: 1
447: net_useragent_mobile_common
448: net_useragent_mobile_nonmobile
449: 
450: 
451: 
452: 1
453: net_useragent_mobile_common
454: net_useragent_mobile_nonmobile
455: 
456: 
457: 
458: 1
459: net_useragent_mobile_common
460: net_useragent_mobile_nonmobile
461: 
462: 
463: 
464: 1
465: net_useragent_mobile_common
466: net_useragent_mobile_nonmobile
467: 
468: 
469: 
470: 1
471: net_useragent_mobile_common
472: net_useragent_mobile_nonmobile
473: 
474: 
475: 
476: 1
477: net_useragent_mobile_common
478: net_useragent_mobile_nonmobile
479: 
480: 
481: 
482: 1
483: net_useragent_mobile_common
484: net_useragent_mobile_nonmobile
485: 
486: 
487: 
488: 1
489: net_useragent_mobile_common
490: net_useragent_mobile_nonmobile
491: 
492: 
493: 
494: 1
495: net_useragent_mobile_common
496: net_useragent_mobile_nonmobile
497: 
498: 
499: 
500: 1
501: net_useragent_mobile_common
502: net_useragent_mobile_nonmobile
503: 
504: 
505: 
506: 1
507: net_useragent_mobile_common
508: net_useragent_mobile_nonmobile
509: 
510: 
511: 
512: 1
513: net_useragent_mobile_common
514: net_useragent_mobile_nonmobile
515: 
516: 
517: 
518: 1
519: net_useragent_mobile_common
520: net_useragent_mobile_nonmobile
521: 
522: 
523: 
524: 1
525: net_useragent_mobile_common
526: net_useragent_mobile_nonmobile
527: 
528: 
529: 
530: 1
531: net_useragent_mobile_common
532: net_useragent_mobile_nonmobile
533: 
534: 
535: 
536: 1
537: net_useragent_mobile_common
538: net_useragent_mobile_nonmobile
539: 
540: 
541: 
542: 1
543: net_useragent_mobile_common
544: net_useragent_mobile_nonmobile
545: 
546: 
547: 
548: 1
549: net_useragent_mobile_common
550: net_useragent_mobile_nonmobile
551: 
552: 
553: 
554: 1
555: net_useragent_mobile_common
556: net_useragent_mobile_nonmobile
557: 
558: 
559: 
560: 1
561: net_useragent_mobile_common
562: net_useragent_mobile_nonmobile
563: 
564: 
565: 
566: 1
567: net_useragent_mobile_common
568: net_useragent_mobile_nonmobile
569: 
570: 
571: 
572: 1
573: net_useragent_mobile_common
574: net_useragent_mobile_nonmobile
575: 
576: 
577: 
578: 1
579: net_useragent_mobile_common
580: net_useragent_mobile_nonmobile
581: 
582: 
583: 
584: 1
585: net_useragent_mobile_common
586: net_useragent_mobile_nonmobile
587: 
588: 
589: 
590: 1
591: net_useragent_mobile_common
592: net_useragent_mobile_nonmobile
593: 
594: 
595: 
596: 1
597: net_useragent_mobile_common
598: net_useragent_mobile_nonmobile
599: 
600: 
601: 
602: 1
603: net_useragent_mobile_common
604: net_useragent_mobile_nonmobile
605: 
606: 
607: 
608: 1
609: net_useragent_mobile_common
610: net_useragent_mobile_nonmobile
611: 
612: 
613: 
614: 1
615: net_useragent_mobile_common
616: net_useragent_mobile_nonmobile
617: 
618: 
619: 
620: 1
621: net_useragent_mobile_common
622: net_useragent_mobile_nonmobile
623: 
624: 
625: 
626: 1
627: net_useragent_mobile_common
628: net_useragent_mobile_nonmobile
629: 
630: 
631: 
632: 1
633: net_useragent_mobile_common
634: net_useragent_mobile_nonmobile
635: 
636: 
637: 
638: 1
639: net_useragent_mobile_common
640: net_useragent_mobile_nonmobile
641: 
642: 
643: 
644: 1
645: net_useragent_mobile_common
646: net_useragent_mobile_nonmobile
647: 
648: 
649: 
650: 1
651: net_useragent_mobile_common
652: net_useragent_mobile_nonmobile
653: 
654: 
655: 
656: 1
657: net_useragent_mobile_common
658: net_useragent_mobile_nonmobile
659: 
660: 
661: 
662: 1
663: net_useragent_mobile_common
664: net_useragent_mobile_nonmobile
665: 
666: 
667: 
668: 1
669: net_useragent_mobile_common
670: net_useragent_mobile_nonmobile
671: 
672: 
673: 
674: 1
675: net_useragent_mobile_common
676: net_useragent_mobile_nonmobile
677: 
678: 
679: 
680: 1
681: net_useragent_mobile_common
682: net_useragent_mobile_nonmobile
683: 
684: 
685: 
686: 1
687: net_useragent_mobile_common
688: net_useragent_mobile_nonmobile
689: 
690: 
691: 
692: 1
693: net_useragent_mobile_common
694: net_useragent_mobile_nonmobile
695: 
696: 
697: 
698: 1
699: net_useragent_mobile_common
700: net_useragent_mobile_nonmobile
701: 
702: 
703: 
704: 1
705: net_useragent_mobile_common
706: net_useragent_mobile_nonmobile
707: 
708: 
709: 
710: 1
711: net_useragent_mobile_common
712: net_useragent_mobile_nonmobile
713: 
714: 
715: 
716: 1
717: net_useragent_mobile_common
718: net_useragent_mobile_nonmobile
719: 
720: 
721: 
722: 1
723: net_useragent_mobile_common
724: net_useragent_mobile_nonmobile
725: 
726: 
727: 
728: 1
729: net_useragent_mobile_common
730: net_useragent_mobile_nonmobile
731: 
732: 
733: 
734: 1
735: net_useragent_mobile_common
736: net_useragent_mobile_nonmobile
737: 
738: 
739: 
740: 1
741: net_useragent_mobile_common
742: net_useragent_mobile_nonmobile
743: 
744: 
745: 
746: 1
747: net_useragent_mobile_common
748: net_useragent_mobile_nonmobile
749: 
750: 
751: 
752: 1
753: net_useragent_mobile_common
754: net_useragent_mobile_nonmobile
755: 
756: 
757: 
758: 1
759: net_useragent_mobile_common
760: net_useragent_mobile_nonmobile
761: 
762: 
763: 
764: 1
765: net_useragent_mobile_common
766: net_useragent_mobile_nonmobile
767: 
768: 
769: 
770: 1
771: net_useragent_mobile_common
772: net_useragent_mobile_nonmobile
773: 
774: 
775: 
776: 1
777: net_useragent_mobile_common
778: net_useragent_mobile_nonmobile
779: 
780: 
781: 
782: 1
783: net_useragent_mobile_common
784: net_useragent_mobile_nonmobile
785: 
786: 
787: 
788: 1
789: net_useragent_mobile_common
790: net_useragent_mobile_nonmobile
791: 
792: 
793: 
794: 1
795: net_useragent_mobile_common
796: net_useragent_mobile_nonmobile
797: 
798: 
799: 
800: 1
801: net_useragent_mobile_common
802: net_useragent_mobile_nonmobile
803: 
804: 
805: 
806: 1
807: net_useragent_mobile_common
808: net_useragent_mobile_nonmobile
809: 
810: 
811: 
812: 1
813: net_useragent_mobile_common
814: net_useragent_mobile_nonmobile
815: 
816: 
817: 
818: 1
819: net_useragent_mobile_common
820: net_useragent_mobile_nonmobile
821: 
822: 
823: 
824: 1
825: net_useragent_mobile_common
826: net_useragent_mobile_nonmobile
827: 
828: 
829: 
830: 1
831: net_useragent_mobile_common
832: net_useragent_mobile_nonmobile
833: 
834: 
835: 
836: 1
837: net_useragent_mobile_common
838: net_useragent_mobile_nonmobile
839: 
840: 
841: 
842: 1
843: net_useragent_mobile_common
844: net_useragent_mobile_nonmobile
845: 
846: 
847: 
848: 1
849: net_useragent_mobile_common
850: net_useragent_mobile_nonmobile
851: 
852: 
853: 
854: 1
855: net_useragent_mobile_common
856: net_useragent_mobile_nonmobile
857: 
858: 
859: 
860: 1
861: net_useragent_mobile_common
862: net_useragent_mobile_nonmobile
863: 
864: 
865: 
866: 1
867: net_useragent_mobile_common
868: net_useragent_mobile_nonmobile
869: 
870: 
871: 
872: 1
873: net_useragent_mobile_common
874: net_useragent_mobile_nonmobile
875: 
876: 
877: 
878: 1
879: net_useragent_mobile_common
880: net_useragent_mobile_nonmobile
881: 
882: 
883: 
884: 1
885: net_useragent_mobile_common
886: net_useragent_mobile_nonmobile
887: 
888: 
889: 
890: 1
891: net_useragent_mobile_common
892: net_useragent_mobile_nonmobile
893: 
894: 
895: 
896: 1
897: net_useragent_mobile_common
898: net_useragent_mobile_nonmobile
899: 
900: 
901: 
902: 1
903: net_useragent_mobile_common
904: net_useragent_mobile_nonmobile
905: 
906: 
907: 
908: 1
909: net_useragent_mobile_common
910: net_useragent_mobile_nonmobile
911: 
912: 
913: 
914: 1
915: net_useragent_mobile_common
916: net_useragent_mobile_nonmobile
917: 
918: 
919: 
920: 1
921: net_useragent_mobile_common
922: net_useragent_mobile_nonmobile
923: 
924: 
925: 
926: 1
927: net_useragent_mobile_common
928: net_useragent_mobile_nonmobile
929: 
930: 
931: 
932: 1
933: net_useragent_mobile_common
934: net_useragent_mobile_nonmobile
935: 
936: 
937: 
938: 1
939: net_useragent_mobile_common
940: net_useragent_mobile_nonmobile
941: 
942: 
943: 
944: 1
945: net_useragent_mobile_common
946: net_useragent_mobile_nonmobile
947: 
948: 
949: 
950: 1
951: net_useragent_mobile_common
952: net_useragent_mobile_nonmobile
953: 
954: 
955: 
956: 1
957: net_useragent_mobile_common
958: net_useragent_mobile_nonmobile
959: 
960: 
961: 
962: 1
963: net_useragent_mobile_common
964: net_useragent_mobile_nonmobile
965: 
966: 
967: 
968: 1
969: net_useragent_mobile_common
970: net_useragent_mobile_nonmobile
971: 
972: 
973: 
974: 1
975: net_useragent_mobile_common
976: net_useragent_mobile_nonmobile
977: 
978: 
979: 
980: 1
981: net_useragent_mobile_common
982: net_useragent_mobile_nonmobile
983: 
984: 
985: 
986: 1
987: net_useragent_mobile_common
988: net_useragent_mobile_nonmobile
989: 
990: 
991: 
