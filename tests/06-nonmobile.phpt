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
                     'Mozilla/4.0 (compatible; MSIE 5.5; Windows 98; Win 9x 4.90; T312461; Lunascape 0.99c)',
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
print "$line: " . "Testing NonMobile ...\n";

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
    ++$line;
    print "$line: " . $agent->isNonMobile() . "\n";
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
9: 1
10: net_useragent_mobile_common
11: net_useragent_mobile_nonmobile
12: 
13: 
14: 
15: 1
16: 1
17: net_useragent_mobile_common
18: net_useragent_mobile_nonmobile
19: 
20: 
21: 
22: 1
23: 1
24: net_useragent_mobile_common
25: net_useragent_mobile_nonmobile
26: 
27: 
28: 
29: 1
30: 1
31: net_useragent_mobile_common
32: net_useragent_mobile_nonmobile
33: 
34: 
35: 
36: 1
37: 1
38: net_useragent_mobile_common
39: net_useragent_mobile_nonmobile
40: 
41: 
42: 
43: 1
44: 1
45: net_useragent_mobile_common
46: net_useragent_mobile_nonmobile
47: 
48: 
49: 
50: 1
51: 1
52: net_useragent_mobile_common
53: net_useragent_mobile_nonmobile
54: 
55: 
56: 
57: 1
58: 1
59: net_useragent_mobile_common
60: net_useragent_mobile_nonmobile
61: 
62: 
63: 
64: 1
65: 1
66: net_useragent_mobile_common
67: net_useragent_mobile_nonmobile
68: 
69: 
70: 
71: 1
72: 1
73: net_useragent_mobile_common
74: net_useragent_mobile_nonmobile
75: 
76: 
77: 
78: 1
79: 1
80: net_useragent_mobile_common
81: net_useragent_mobile_nonmobile
82: 
83: 
84: 
85: 1
86: 1
87: net_useragent_mobile_common
88: net_useragent_mobile_nonmobile
89: 
90: 
91: 
92: 1
93: 1
94: net_useragent_mobile_common
95: net_useragent_mobile_nonmobile
96: 
97: 
98: 
99: 1
100: 1
101: net_useragent_mobile_common
102: net_useragent_mobile_nonmobile
103: 
104: 
105: 
106: 1
107: 1
108: net_useragent_mobile_common
109: net_useragent_mobile_nonmobile
110: 
111: 
112: 
113: 1
114: 1
115: net_useragent_mobile_common
116: net_useragent_mobile_nonmobile
117: 
118: 
119: 
120: 1
121: 1
122: net_useragent_mobile_common
123: net_useragent_mobile_nonmobile
124: 
125: 
126: 
127: 1
128: 1
129: net_useragent_mobile_common
130: net_useragent_mobile_nonmobile
131: 
132: 
133: 
134: 1
135: 1
136: net_useragent_mobile_common
137: net_useragent_mobile_nonmobile
138: 
139: 
140: 
141: 1
142: 1
143: net_useragent_mobile_common
144: net_useragent_mobile_nonmobile
145: 
146: 
147: 
148: 1
149: 1
150: net_useragent_mobile_common
151: net_useragent_mobile_nonmobile
152: 
153: 
154: 
155: 1
156: 1
157: net_useragent_mobile_common
158: net_useragent_mobile_nonmobile
159: 
160: 
161: 
162: 1
163: 1
164: net_useragent_mobile_common
165: net_useragent_mobile_nonmobile
166: 
167: 
168: 
169: 1
170: 1
171: net_useragent_mobile_common
172: net_useragent_mobile_nonmobile
173: 
174: 
175: 
176: 1
177: 1
178: net_useragent_mobile_common
179: net_useragent_mobile_nonmobile
180: 
181: 
182: 
183: 1
184: 1
185: net_useragent_mobile_common
186: net_useragent_mobile_nonmobile
187: 
188: 
189: 
190: 1
191: 1
192: net_useragent_mobile_common
193: net_useragent_mobile_nonmobile
194: 
195: 
196: 
197: 1
198: 1
199: net_useragent_mobile_common
200: net_useragent_mobile_nonmobile
201: 
202: 
203: 
204: 1
205: 1
206: net_useragent_mobile_common
207: net_useragent_mobile_nonmobile
208: 
209: 
210: 
211: 1
212: 1
213: net_useragent_mobile_common
214: net_useragent_mobile_nonmobile
215: 
216: 
217: 
218: 1
219: 1
220: net_useragent_mobile_common
221: net_useragent_mobile_nonmobile
222: 
223: 
224: 
225: 1
226: 1
227: net_useragent_mobile_common
228: net_useragent_mobile_nonmobile
229: 
230: 
231: 
232: 1
233: 1
234: net_useragent_mobile_common
235: net_useragent_mobile_nonmobile
236: 
237: 
238: 
239: 1
240: 1
241: net_useragent_mobile_common
242: net_useragent_mobile_nonmobile
243: 
244: 
245: 
246: 1
247: 1
248: net_useragent_mobile_common
249: net_useragent_mobile_nonmobile
250: 
251: 
252: 
253: 1
254: 1
255: net_useragent_mobile_common
256: net_useragent_mobile_nonmobile
257: 
258: 
259: 
260: 1
261: 1
262: net_useragent_mobile_common
263: net_useragent_mobile_nonmobile
264: 
265: 
266: 
267: 1
268: 1
269: net_useragent_mobile_common
270: net_useragent_mobile_nonmobile
271: 
272: 
273: 
274: 1
275: 1
276: net_useragent_mobile_common
277: net_useragent_mobile_nonmobile
278: 
279: 
280: 
281: 1
282: 1
283: net_useragent_mobile_common
284: net_useragent_mobile_nonmobile
285: 
286: 
287: 
288: 1
289: 1
290: net_useragent_mobile_common
291: net_useragent_mobile_nonmobile
292: 
293: 
294: 
295: 1
296: 1
297: net_useragent_mobile_common
298: net_useragent_mobile_nonmobile
299: 
300: 
301: 
302: 1
303: 1
304: net_useragent_mobile_common
305: net_useragent_mobile_nonmobile
306: 
307: 
308: 
309: 1
310: 1
311: net_useragent_mobile_common
312: net_useragent_mobile_nonmobile
313: 
314: 
315: 
316: 1
317: 1
318: net_useragent_mobile_common
319: net_useragent_mobile_nonmobile
320: 
321: 
322: 
323: 1
324: 1
325: net_useragent_mobile_common
326: net_useragent_mobile_nonmobile
327: 
328: 
329: 
330: 1
331: 1
332: net_useragent_mobile_common
333: net_useragent_mobile_nonmobile
334: 
335: 
336: 
337: 1
338: 1
339: net_useragent_mobile_common
340: net_useragent_mobile_nonmobile
341: 
342: 
343: 
344: 1
345: 1
346: net_useragent_mobile_common
347: net_useragent_mobile_nonmobile
348: 
349: 
350: 
351: 1
352: 1
353: net_useragent_mobile_common
354: net_useragent_mobile_nonmobile
355: 
356: 
357: 
358: 1
359: 1
360: net_useragent_mobile_common
361: net_useragent_mobile_nonmobile
362: 
363: 
364: 
365: 1
366: 1
367: net_useragent_mobile_common
368: net_useragent_mobile_nonmobile
369: 
370: 
371: 
372: 1
373: 1
374: net_useragent_mobile_common
375: net_useragent_mobile_nonmobile
376: 
377: 
378: 
379: 1
380: 1
381: net_useragent_mobile_common
382: net_useragent_mobile_nonmobile
383: 
384: 
385: 
386: 1
387: 1
388: net_useragent_mobile_common
389: net_useragent_mobile_nonmobile
390: 
391: 
392: 
393: 1
394: 1
395: net_useragent_mobile_common
396: net_useragent_mobile_nonmobile
397: 
398: 
399: 
400: 1
401: 1
402: net_useragent_mobile_common
403: net_useragent_mobile_nonmobile
404: 
405: 
406: 
407: 1
408: 1
409: net_useragent_mobile_common
410: net_useragent_mobile_nonmobile
411: 
412: 
413: 
414: 1
415: 1
416: net_useragent_mobile_common
417: net_useragent_mobile_nonmobile
418: 
419: 
420: 
421: 1
422: 1
423: net_useragent_mobile_common
424: net_useragent_mobile_nonmobile
425: 
426: 
427: 
428: 1
429: 1
430: net_useragent_mobile_common
431: net_useragent_mobile_nonmobile
432: 
433: 
434: 
435: 1
436: 1
437: net_useragent_mobile_common
438: net_useragent_mobile_nonmobile
439: 
440: 
441: 
442: 1
443: 1
444: net_useragent_mobile_common
445: net_useragent_mobile_nonmobile
446: 
447: 
448: 
449: 1
450: 1
451: net_useragent_mobile_common
452: net_useragent_mobile_nonmobile
453: 
454: 
455: 
456: 1
457: 1
458: net_useragent_mobile_common
459: net_useragent_mobile_nonmobile
460: 
461: 
462: 
463: 1
464: 1
465: net_useragent_mobile_common
466: net_useragent_mobile_nonmobile
467: 
468: 
469: 
470: 1
471: 1
472: net_useragent_mobile_common
473: net_useragent_mobile_nonmobile
474: 
475: 
476: 
477: 1
478: 1
479: net_useragent_mobile_common
480: net_useragent_mobile_nonmobile
481: 
482: 
483: 
484: 1
485: 1
486: net_useragent_mobile_common
487: net_useragent_mobile_nonmobile
488: 
489: 
490: 
491: 1
492: 1
493: net_useragent_mobile_common
494: net_useragent_mobile_nonmobile
495: 
496: 
497: 
498: 1
499: 1
500: net_useragent_mobile_common
501: net_useragent_mobile_nonmobile
502: 
503: 
504: 
505: 1
506: 1
507: net_useragent_mobile_common
508: net_useragent_mobile_nonmobile
509: 
510: 
511: 
512: 1
513: 1
514: net_useragent_mobile_common
515: net_useragent_mobile_nonmobile
516: 
517: 
518: 
519: 1
520: 1
521: net_useragent_mobile_common
522: net_useragent_mobile_nonmobile
523: 
524: 
525: 
526: 1
527: 1
528: net_useragent_mobile_common
529: net_useragent_mobile_nonmobile
530: 
531: 
532: 
533: 1
534: 1
535: net_useragent_mobile_common
536: net_useragent_mobile_nonmobile
537: 
538: 
539: 
540: 1
541: 1
542: net_useragent_mobile_common
543: net_useragent_mobile_nonmobile
544: 
545: 
546: 
547: 1
548: 1
549: net_useragent_mobile_common
550: net_useragent_mobile_nonmobile
551: 
552: 
553: 
554: 1
555: 1
556: net_useragent_mobile_common
557: net_useragent_mobile_nonmobile
558: 
559: 
560: 
561: 1
562: 1
563: net_useragent_mobile_common
564: net_useragent_mobile_nonmobile
565: 
566: 
567: 
568: 1
569: 1
570: net_useragent_mobile_common
571: net_useragent_mobile_nonmobile
572: 
573: 
574: 
575: 1
576: 1
577: net_useragent_mobile_common
578: net_useragent_mobile_nonmobile
579: 
580: 
581: 
582: 1
583: 1
584: net_useragent_mobile_common
585: net_useragent_mobile_nonmobile
586: 
587: 
588: 
589: 1
590: 1
591: net_useragent_mobile_common
592: net_useragent_mobile_nonmobile
593: 
594: 
595: 
596: 1
597: 1
598: net_useragent_mobile_common
599: net_useragent_mobile_nonmobile
600: 
601: 
602: 
603: 1
604: 1
605: net_useragent_mobile_common
606: net_useragent_mobile_nonmobile
607: 
608: 
609: 
610: 1
611: 1
612: net_useragent_mobile_common
613: net_useragent_mobile_nonmobile
614: 
615: 
616: 
617: 1
618: 1
619: net_useragent_mobile_common
620: net_useragent_mobile_nonmobile
621: 
622: 
623: 
624: 1
625: 1
626: net_useragent_mobile_common
627: net_useragent_mobile_nonmobile
628: 
629: 
630: 
631: 1
632: 1
633: net_useragent_mobile_common
634: net_useragent_mobile_nonmobile
635: 
636: 
637: 
638: 1
639: 1
640: net_useragent_mobile_common
641: net_useragent_mobile_nonmobile
642: 
643: 
644: 
645: 1
646: 1
647: net_useragent_mobile_common
648: net_useragent_mobile_nonmobile
649: 
650: 
651: 
652: 1
653: 1
654: net_useragent_mobile_common
655: net_useragent_mobile_nonmobile
656: 
657: 
658: 
659: 1
660: 1
661: net_useragent_mobile_common
662: net_useragent_mobile_nonmobile
663: 
664: 
665: 
666: 1
667: 1
668: net_useragent_mobile_common
669: net_useragent_mobile_nonmobile
670: 
671: 
672: 
673: 1
674: 1
675: net_useragent_mobile_common
676: net_useragent_mobile_nonmobile
677: 
678: 
679: 
680: 1
681: 1
682: net_useragent_mobile_common
683: net_useragent_mobile_nonmobile
684: 
685: 
686: 
687: 1
688: 1
689: net_useragent_mobile_common
690: net_useragent_mobile_nonmobile
691: 
692: 
693: 
694: 1
695: 1
696: net_useragent_mobile_common
697: net_useragent_mobile_nonmobile
698: 
699: 
700: 
701: 1
702: 1
703: net_useragent_mobile_common
704: net_useragent_mobile_nonmobile
705: 
706: 
707: 
708: 1
709: 1
710: net_useragent_mobile_common
711: net_useragent_mobile_nonmobile
712: 
713: 
714: 
715: 1
716: 1
717: net_useragent_mobile_common
718: net_useragent_mobile_nonmobile
719: 
720: 
721: 
722: 1
723: 1
724: net_useragent_mobile_common
725: net_useragent_mobile_nonmobile
726: 
727: 
728: 
729: 1
730: 1
731: net_useragent_mobile_common
732: net_useragent_mobile_nonmobile
733: 
734: 
735: 
736: 1
737: 1
738: net_useragent_mobile_common
739: net_useragent_mobile_nonmobile
740: 
741: 
742: 
743: 1
744: 1
745: net_useragent_mobile_common
746: net_useragent_mobile_nonmobile
747: 
748: 
749: 
750: 1
751: 1
752: net_useragent_mobile_common
753: net_useragent_mobile_nonmobile
754: 
755: 
756: 
757: 1
758: 1
759: net_useragent_mobile_common
760: net_useragent_mobile_nonmobile
761: 
762: 
763: 
764: 1
765: 1
766: net_useragent_mobile_common
767: net_useragent_mobile_nonmobile
768: 
769: 
770: 
771: 1
772: 1
773: net_useragent_mobile_common
774: net_useragent_mobile_nonmobile
775: 
776: 
777: 
778: 1
779: 1
780: net_useragent_mobile_common
781: net_useragent_mobile_nonmobile
782: 
783: 
784: 
785: 1
786: 1
787: net_useragent_mobile_common
788: net_useragent_mobile_nonmobile
789: 
790: 
791: 
792: 1
793: 1
794: net_useragent_mobile_common
795: net_useragent_mobile_nonmobile
796: 
797: 
798: 
799: 1
800: 1
801: net_useragent_mobile_common
802: net_useragent_mobile_nonmobile
803: 
804: 
805: 
806: 1
807: 1
808: net_useragent_mobile_common
809: net_useragent_mobile_nonmobile
810: 
811: 
812: 
813: 1
814: 1
815: net_useragent_mobile_common
816: net_useragent_mobile_nonmobile
817: 
818: 
819: 
820: 1
821: 1
822: net_useragent_mobile_common
823: net_useragent_mobile_nonmobile
824: 
825: 
826: 
827: 1
828: 1
829: net_useragent_mobile_common
830: net_useragent_mobile_nonmobile
831: 
832: 
833: 
834: 1
835: 1
836: net_useragent_mobile_common
837: net_useragent_mobile_nonmobile
838: 
839: 
840: 
841: 1
842: 1
843: net_useragent_mobile_common
844: net_useragent_mobile_nonmobile
845: 
846: 
847: 
848: 1
849: 1
850: net_useragent_mobile_common
851: net_useragent_mobile_nonmobile
852: 
853: 
854: 
855: 1
856: 1
857: net_useragent_mobile_common
858: net_useragent_mobile_nonmobile
859: 
860: 
861: 
862: 1
863: 1
864: net_useragent_mobile_common
865: net_useragent_mobile_nonmobile
866: 
867: 
868: 
869: 1
870: 1
871: net_useragent_mobile_common
872: net_useragent_mobile_nonmobile
873: 
874: 
875: 
876: 1
877: 1
878: net_useragent_mobile_common
879: net_useragent_mobile_nonmobile
880: 
881: 
882: 
883: 1
884: 1
885: net_useragent_mobile_common
886: net_useragent_mobile_nonmobile
887: 
888: 
889: 
890: 1
891: 1
892: net_useragent_mobile_common
893: net_useragent_mobile_nonmobile
894: 
895: 
896: 
897: 1
898: 1
899: net_useragent_mobile_common
900: net_useragent_mobile_nonmobile
901: 
902: 
903: 
904: 1
905: 1
906: net_useragent_mobile_common
907: net_useragent_mobile_nonmobile
908: 
909: 
910: 
911: 1
912: 1
913: net_useragent_mobile_common
914: net_useragent_mobile_nonmobile
915: 
916: 
917: 
918: 1
919: 1
920: net_useragent_mobile_common
921: net_useragent_mobile_nonmobile
922: 
923: 
924: 
925: 1
926: 1
927: net_useragent_mobile_common
928: net_useragent_mobile_nonmobile
929: 
930: 
931: 
932: 1
933: 1
934: net_useragent_mobile_common
935: net_useragent_mobile_nonmobile
936: 
937: 
938: 
939: 1
940: 1
941: net_useragent_mobile_common
942: net_useragent_mobile_nonmobile
943: 
944: 
945: 
946: 1
947: 1
948: net_useragent_mobile_common
949: net_useragent_mobile_nonmobile
950: 
951: 
952: 
953: 1
954: 1
955: net_useragent_mobile_common
956: net_useragent_mobile_nonmobile
957: 
958: 
959: 
960: 1
961: 1
962: net_useragent_mobile_common
963: net_useragent_mobile_nonmobile
964: 
965: 
966: 
967: 1
968: 1
969: net_useragent_mobile_common
970: net_useragent_mobile_nonmobile
971: 
972: 
973: 
974: 1
975: 1
976: net_useragent_mobile_common
977: net_useragent_mobile_nonmobile
978: 
979: 
980: 
981: 1
982: 1
983: net_useragent_mobile_common
984: net_useragent_mobile_nonmobile
985: 
986: 
987: 
988: 1
989: 1
990: net_useragent_mobile_common
991: net_useragent_mobile_nonmobile
992: 
993: 
994: 
995: 1
996: 1
997: net_useragent_mobile_common
998: net_useragent_mobile_nonmobile
999: 
1000: 
1001: 
1002: 1
1003: 1
1004: net_useragent_mobile_common
1005: net_useragent_mobile_nonmobile
1006: 
1007: 
1008: 
1009: 1
1010: 1
1011: net_useragent_mobile_common
1012: net_useragent_mobile_nonmobile
1013: 
1014: 
1015: 
1016: 1
1017: 1
1018: net_useragent_mobile_common
1019: net_useragent_mobile_nonmobile
1020: 
1021: 
1022: 
1023: 1
1024: 1
1025: net_useragent_mobile_common
1026: net_useragent_mobile_nonmobile
1027: 
1028: 
1029: 
1030: 1
1031: 1
1032: net_useragent_mobile_common
1033: net_useragent_mobile_nonmobile
1034: 
1035: 
1036: 
1037: 1
1038: 1
1039: net_useragent_mobile_common
1040: net_useragent_mobile_nonmobile
1041: 
1042: 
1043: 
1044: 1
1045: 1
1046: net_useragent_mobile_common
1047: net_useragent_mobile_nonmobile
1048: 
1049: 
1050: 
1051: 1
1052: 1
1053: net_useragent_mobile_common
1054: net_useragent_mobile_nonmobile
1055: 
1056: 
1057: 
1058: 1
1059: 1
1060: net_useragent_mobile_common
1061: net_useragent_mobile_nonmobile
1062: 
1063: 
1064: 
1065: 1
1066: 1
1067: net_useragent_mobile_common
1068: net_useragent_mobile_nonmobile
1069: 
1070: 
1071: 
1072: 1
1073: 1
1074: net_useragent_mobile_common
1075: net_useragent_mobile_nonmobile
1076: 
1077: 
1078: 
1079: 1
1080: 1
1081: net_useragent_mobile_common
1082: net_useragent_mobile_nonmobile
1083: 
1084: 
1085: 
1086: 1
1087: 1
1088: net_useragent_mobile_common
1089: net_useragent_mobile_nonmobile
1090: 
1091: 
1092: 
1093: 1
1094: 1
1095: net_useragent_mobile_common
1096: net_useragent_mobile_nonmobile
1097: 
1098: 
1099: 
1100: 1
1101: 1
1102: net_useragent_mobile_common
1103: net_useragent_mobile_nonmobile
1104: 
1105: 
1106: 
1107: 1
1108: 1
1109: net_useragent_mobile_common
1110: net_useragent_mobile_nonmobile
1111: 
1112: 
1113: 
1114: 1
1115: 1
1116: net_useragent_mobile_common
1117: net_useragent_mobile_nonmobile
1118: 
1119: 
1120: 
1121: 1
1122: 1
1123: net_useragent_mobile_common
1124: net_useragent_mobile_nonmobile
1125: 
1126: 
1127: 
1128: 1
1129: 1
1130: net_useragent_mobile_common
1131: net_useragent_mobile_nonmobile
1132: 
1133: 
1134: 
1135: 1
1136: 1
1137: net_useragent_mobile_common
1138: net_useragent_mobile_nonmobile
1139: 
1140: 
1141: 
1142: 1
1143: 1
1144: net_useragent_mobile_common
1145: net_useragent_mobile_nonmobile
1146: 
1147: 
1148: 
1149: 1
