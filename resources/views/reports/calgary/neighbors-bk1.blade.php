<div class="section-title">
	<!-- <h3 class="colora text-center">Neighborhoods : <span class="colorb" >({{--$response[0]->name_mixed--}})</span></h3> -->
	<h3 class="colora text-center">Adjacent Neighborhoods<!--<span class="colorb" >({{--$response[0]->name_mixed--}})</span>--></h3>
</div>
<div class="col-xs-12">
	<div class="row">
	<table class="table table-bordered">
		<tr>
			<td class="col-xs-9 text-center">
				<div class="">
					<table class="table table-borderless compass-table" style="margin-bottom: 0;">
						<tr>
							<td colspan="3" class="text-center">
								<div class="compass-text top-text">
									@if (isset($response[1]) && isset($response[1]->name))
										{{$response[1]->name}}
									@else
										N/A
									@endif
								</div>
							</td>
						</tr>
						<tr>
							<td class="col-xs-4" style="vertical-align: middle;">
								<div class="compass-text left-text text-right">
									@if (isset($response[2]) && isset($response[2]->name))
										{{$response[2]->name}}
									@else
										N/A
									@endif
								</div>
							</td>
							<td class="col-xs-4">
								<div class="compass-icon text-center fillb">
									<svg version="1.0" xmlns="http://www.w3.org/2000/svg"
									width="200px" viewBox="0 0 1000.000000 1060.000000"
									preserveAspectRatio="xMidYMid meet">
									<metadata>
									Created by potrace 1.15, written by Peter Selinger 2001-2017
									</metadata>
									<g transform="translate(0.000000,1060.000000) scale(0.100000,-0.100000)"
									fill="#000000" stroke="none">
									<path d="M4780 10136 l0 -276 35 0 35 0 0 223 1 222 34 -60 c18 -33 78 -133
									132 -222 l98 -162 38 -1 37 0 0 275 0 275 -36 0 -36 0 3 -220 c2 -121 3 -220
									2 -220 -2 0 -18 30 -37 68 -19 37 -77 135 -128 217 l-94 150 -42 3 -42 3 0
									-275z"/>
									<path d="M5008 9555 c-3 -6 -16 -35 -27 -65 -24 -64 -33 -127 -61 -455 -22
									-264 -45 -459 -61 -533 l-10 -48 -152 -12 c-663 -51 -1344 -321 -1857 -735
									-150 -120 -358 -314 -447 -415 -173 -197 -354 -467 -491 -730 -210 -405 -274
									-631 -365 -1287 l-22 -160 -115 -12 c-63 -7 -367 -35 -675 -63 -596 -53 -659
									-60 -652 -66 9 -9 181 -24 497 -44 653 -40 879 -68 924 -114 18 -18 25 -46 40
									-176 66 -563 210 -1001 474 -1440 480 -798 1252 -1383 2112 -1600 202 -51 380
									-77 642 -96 100 -7 88 9 112 -154 52 -361 96 -837 96 -1045 0 -170 10 -240 34
									-232 14 5 20 71 46 502 11 193 28 422 36 510 16 171 50 395 62 407 4 4 68 12
									142 18 406 33 773 128 1151 300 728 331 1308 891 1669 1610 192 384 276 681
									344 1219 14 106 26 195 28 196 6 6 1407 134 1478 135 13 1 13 2 0 10 -9 5
									-115 16 -235 24 -121 9 -353 25 -515 36 -412 29 -695 62 -717 84 -10 9 -24 91
									-63 356 -46 314 -63 387 -131 591 -167 501 -464 997 -789 1319 -96 96 -280
									258 -385 342 -511 403 -1219 676 -1853 713 -114 7 -123 9 -127 29 -2 11 -32
									255 -65 541 -70 602 -64 553 -72 540z m1 -2472 l1 -1573 -59 0 c-51 0 -68 5
									-108 32 -83 55 -179 137 -207 176 -34 50 -35 121 -1 382 14 107 59 524 100
									925 123 1192 214 1986 247 2162 12 64 13 50 19 -232 3 -165 7 -1008 8 -1872z
									m341 1266 c311 -30 667 -123 974 -254 976 -417 1714 -1268 1966 -2265 50 -199
									76 -364 95 -617 l6 -83 -33 0 c-18 0 -49 3 -69 6 -36 6 -37 8 -48 63 -5 31
									-22 139 -36 241 -35 250 -58 358 -116 537 -63 192 -111 310 -207 498 -146 286
									-347 561 -582 795 -385 385 -855 667 -1368 819 -104 31 -278 67 -362 75 -118
									12 -396 58 -405 68 -2 1 -6 33 -10 69 l-7 67 43 -4 c24 -2 96 -8 159 -15z
									m-513 3 c9 -6 11 -24 5 -67 l-7 -59 -160 -19 c-659 -74 -1201 -294 -1717 -697
									-116 -91 -378 -354 -482 -485 -231 -290 -433 -647 -541 -955 -55 -160 -89
									-311 -141 -632 -26 -161 -47 -294 -48 -295 -1 0 -32 -4 -70 -8 l-69 -8 7 119
									c32 575 255 1181 625 1704 158 223 431 513 646 685 217 174 518 355 745 448
									296 122 638 222 890 262 94 15 298 19 317 7z m-14 -239 c-6 -155 -26 -374 -58
									-633 -19 -151 -44 -365 -55 -475 -12 -110 -39 -342 -60 -515 -21 -173 -44
									-376 -50 -450 -6 -74 -14 -164 -18 -199 l-7 -64 -85 58 c-133 90 -424 320
									-950 750 -580 475 -720 583 -720 556 0 -5 315 -398 701 -873 385 -474 695
									-864 687 -865 -7 -2 -533 -59 -1168 -128 -635 -68 -1176 -127 -1202 -131 l-48
									-6 5 44 c35 319 69 506 131 717 116 398 285 725 535 1036 530 660 1124 1024
									1929 1184 122 25 349 59 400 60 l35 1 -2 -67z m667 46 c421 -49 894 -241 1297
									-526 340 -240 684 -585 892 -893 289 -428 467 -953 517 -1524 l7 -78 -39 6
									c-21 3 -64 8 -94 11 -30 3 -210 23 -400 45 -190 22 -442 49 -560 60 -118 11
									-334 36 -480 55 -146 19 -357 41 -470 50 -198 16 -351 33 -359 41 -10 10 271
									367 774 984 472 579 614 760 598 760 -15 0 -86 -51 -173 -125 -131 -110 -1571
									-1247 -1575 -1243 -13 13 -231 2005 -251 2302 l-7 99 119 -7 c65 -4 157 -12
									204 -17z m1411 -1265 c-5 -31 -101 -131 -758 -788 -423 -421 -753 -759 -753
									-769 0 -10 29 -69 65 -132 l66 -113 -4 -132 -4 -132 616 -741 c338 -407 616
									-746 617 -753 1 -7 34 -52 73 -100 68 -82 118 -161 108 -170 -14 -15 -224 188
									-825 795 -369 374 -678 692 -684 707 -11 23 -16 25 -48 20 -49 -8 -167 -68
									-217 -110 -37 -32 -47 -36 -97 -36 -31 0 -56 5 -56 10 0 6 -30 10 -70 10 -65
									0 -72 -2 -107 -33 -73 -65 -247 -207 -254 -207 -3 0 -337 -265 -740 -589 -594
									-477 -735 -587 -743 -574 -6 12 2 25 35 53 82 70 1405 1395 1447 1448 23 30
									42 58 42 63 0 5 -29 58 -65 118 l-65 110 0 130 0 129 -36 49 c-55 72 -122 153
									-165 198 -47 48 -983 1203 -1027 1266 -16 24 -55 73 -86 109 -60 71 -114 160
									-96 160 6 0 21 -5 33 -12 30 -16 1276 -1249 1407 -1392 110 -121 131 -133 175
									-102 11 7 61 37 110 66 l90 52 95 -6 c107 -7 149 2 209 42 64 43 229 191 243
									218 7 13 333 276 723 584 391 308 717 566 725 575 22 23 27 18 21 -21z m-888
									-1549 c725 -62 3107 -325 3212 -355 l30 -8 -30 -3 c-16 -2 -824 -3 -1795 -3
									-977 -1 -1795 -5 -1832 -10 l-68 -9 0 74 0 74 68 75 c37 42 85 99 107 128 46
									62 32 60 308 37z m-1543 -428 c0 -56 -3 -67 -26 -88 -15 -13 -64 -72 -111
									-131 l-85 -108 -83 0 c-93 0 -318 21 -540 50 -130 17 -768 89 -1325 150 -96
									11 -364 38 -595 60 -400 39 -855 92 -910 106 -14 3 -25 10 -25 15 0 5 773 9
									1850 9 l1850 0 0 -63z m-2777 -103 c23 -4 42 -15 48 -26 6 -11 17 -77 25 -146
									65 -572 256 -1081 581 -1549 248 -359 601 -677 1045 -942 364 -217 899 -384
									1305 -408 131 -7 143 -13 143 -78 0 -86 -60 -93 -379 -40 -316 52 -593 137
									-908 279 -335 150 -650 372 -938 661 -454 453 -766 999 -919 1610 -45 178 -86
									465 -86 596 0 54 3 56 83 43z m6692 -76 c-19 -252 -48 -435 -100 -633 -300
									-1144 -1203 -2055 -2370 -2391 -214 -62 -576 -124 -724 -124 l-43 0 4 60 c2
									33 9 65 14 70 5 5 77 16 159 25 732 76 1303 335 1881 854 329 296 582 651 772
									1081 113 256 162 441 227 854 19 122 38 233 41 248 6 29 19 34 97 37 l48 1 -6
									-82z m-6212 36 c308 -31 1870 -204 1985 -219 l43 -6 -47 -67 c-82 -115 -202
									-269 -394 -502 -102 -124 -296 -362 -430 -530 -134 -168 -287 -357 -340 -420
									-99 -120 -170 -213 -170 -224 0 -24 181 113 274 208 53 54 1467 1199 1473
									1192 1 -1 12 -87 23 -192 12 -104 52 -466 91 -804 62 -548 149 -1372 149
									-1414 0 -32 -251 -18 -465 25 -291 60 -882 309 -1146 484 -295 196 -578 464
									-797 756 -325 433 -550 1011 -611 1574 -6 55 -13 117 -16 138 -4 29 -2 37 10
									37 8 0 174 -16 368 -36z m6027 6 c0 -62 -41 -345 -70 -481 -89 -418 -267 -836
									-482 -1133 -110 -151 -306 -386 -402 -481 -504 -500 -1384 -905 -1968 -905
									l-117 0 5 53 c2 28 8 113 14 187 15 197 44 443 105 900 84 631 125 1022 125
									1191 0 32 4 59 9 59 38 0 392 -275 1056 -819 575 -471 623 -509 685 -541 28
									-15 30 -18 -35 65 -22 28 -32 44 -22 36 28 -22 19 3 -10 30 -20 18 -24 19 -13
									4 14 -18 14 -19 -2 -7 -9 8 -15 19 -12 26 5 12 -24 44 -34 38 -3 -1 -7 5 -8
									14 -2 10 -13 27 -25 38 -21 20 -22 20 -8 1 13 -18 13 -19 -3 -6 -10 7 -16 16
									-14 20 7 11 -12 36 -26 36 -7 0 -13 5 -13 10 -1 20 -26 55 -37 52 -7 -1 -12 3
									-13 8 -2 21 -26 55 -38 52 -7 -1 -11 3 -10 9 1 6 -12 26 -29 45 -16 19 -24 25
									-17 14 13 -18 13 -19 -3 -6 -10 7 -15 17 -13 22 3 4 -229 290 -515 634 -286
									344 -512 620 -502 615 12 -8 328 23 1192 118 646 71 1192 130 1213 131 35 1
									37 -1 37 -29z m-2998 -408 c40 -32 94 -72 120 -90 34 -24 50 -43 58 -70 12
									-38 -40 -556 -221 -2217 -109 -1010 -132 -1185 -154 -1185 -3 0 -5 815 -5
									1810 l0 1810 64 0 c64 0 66 -1 138 -58z"/>
									</g>
									</svg>
								</div>
							</td>
							<td class="col-xs-4" style="vertical-align: middle;">
								<div class="compass-text right-text text-left">
									@if (isset($response[3]) && isset($response[3]->name))
										{{$response[3]->name}}
									@else
										N/A
									@endif
								</div>
							</td>
						</tr>
						<tr>
							<td colspan="3" class="text-center">
								<div class="compass-text bottom-text">
									@if (isset($response[4]) && isset($response[4]->name))
										{{$response[4]->name}}
									@else
										N/A
									@endif
								</div>
							</td>
						</tr>
					</table>
				</div>
			</td>
			<td class="col-xs-3 text-center welcome-text">
				<div class="fillb">
					<svg version="1.0" xmlns="http://www.w3.org/2000/svg"
					width="250px" viewBox="0 0 818.000000 352.000000"
					preserveAspectRatio="xMidYMid meet">
					<metadata>
					Created by potrace 1.15, written by Peter Selinger 2001-2017
					</metadata>
					<g transform="translate(0.000000,352.000000) scale(0.100000,-0.100000)"
					fill="#000000" stroke="none">
					<path d="M2069 3447 c-30 -23 -39 -56 -39 -145 0 -207 -63 -409 -175 -567 -72
					-101 -84 -108 -278 -175 -98 -34 -217 -73 -265 -87 -48 -13 -88 -26 -90 -28
					-2 -1 19 -35 45 -74 38 -57 52 -71 68 -67 11 3 32 8 46 11 26 6 28 4 58 -87
					17 -51 31 -96 31 -100 0 -4 -17 -8 -39 -10 -35 -3 -38 -5 -30 -25 l8 -23 276
					0 c213 0 275 3 275 13 0 6 14 41 30 76 l30 64 -51 156 -52 156 57 75 c147 195
					226 439 226 698 0 96 -2 105 -25 127 -27 27 -79 33 -106 12z"/>
					<path d="M4643 3405 c-47 -20 -57 -46 -49 -136 14 -166 81 -357 173 -492 48
					-72 164 -189 220 -225 l43 -27 0 -202 0 -203 -85 0 c-84 0 -91 -3 -79 -34 6
					-14 70 -16 622 -16 l616 0 -34 25 c-19 14 -46 25 -61 25 -26 0 -27 2 -17 28
					l11 28 39 -41 c61 -67 189 -115 306 -115 60 0 105 -29 133 -86 19 -41 21 -57
					17 -152 -4 -89 -11 -125 -42 -217 -36 -107 -56 -147 -56 -113 0 9 -14 28 -31
					42 -23 20 -42 26 -75 26 -50 0 -76 -11 -115 -46 l-25 -24 -13 24 c-32 59 -144
					63 -201 6 l-20 -20 0 25 c0 23 -4 25 -40 25 l-40 0 0 -190 0 -190 40 0 40 0 0
					110 c0 128 14 170 67 195 31 15 37 15 57 1 30 -19 36 -53 36 -192 l0 -114 39
					0 39 0 4 124 c3 117 5 126 28 151 54 58 111 53 129 -12 6 -21 11 -89 11 -150
					l0 -113 40 0 40 0 1 128 c0 70 3 120 6 112 3 -8 16 -26 28 -40 13 -14 28 -44
					35 -68 13 -51 62 -110 107 -128 42 -18 125 -18 166 0 32 13 87 62 87 76 0 5
					-14 13 -32 19 -29 10 -34 9 -60 -16 -57 -55 -150 -29 -177 48 l-10 29 155 0
					c175 0 166 -6 142 88 -12 48 -83 132 -112 132 -25 0 -26 15 -6 106 36 165 24
					337 -31 447 -17 33 -24 37 -57 37 -79 1 -612 88 -638 104 -74 49 -84 149 -22
					214 23 23 43 61 57 102 12 36 32 83 46 105 l24 40 1 -102 c0 -98 1 -103 23
					-107 31 -7 500 -76 514 -76 9 0 13 38 15 138 l3 137 28 -53 c29 -55 67 -186
					67 -229 0 -13 9 -45 21 -70 16 -36 19 -56 14 -87 -4 -23 -7 -53 -8 -68 0 -22
					-5 -28 -23 -28 -35 0 -73 -21 -67 -36 4 -11 33 -14 129 -14 69 0 124 4 124 9
					0 5 3 16 6 25 5 12 0 16 -17 16 -18 0 -20 3 -11 12 30 30 5 311 -39 440 -47
					141 -126 245 -222 293 -50 25 -55 25 -282 25 l-232 0 -61 -31 c-149 -74 -236
					-254 -263 -548 -9 -94 -9 -135 -1 -159 l11 -32 -135 0 -134 0 0 203 1 202 40
					25 c59 36 168 145 216 215 105 156 167 331 180 510 5 72 3 83 -17 108 -16 20
					-30 27 -56 27 -69 0 -88 -27 -98 -140 -12 -133 -71 -296 -144 -402 -39 -56
					-110 -129 -163 -167 l-42 -31 -192 0 -192 0 -39 28 c-21 16 -70 62 -107 102
					-112 121 -181 286 -206 493 -5 43 -14 84 -21 92 -21 25 -64 34 -97 20z"/>
					<path d="M6327 3396 c-174 -48 -230 -269 -101 -400 60 -60 156 -81 245 -55 90
					27 159 126 159 227 0 157 -150 271 -303 228z"/>
					<path d="M5247 3146 c-60 -16 -114 -60 -145 -117 -20 -37 -23 -55 -20 -115 4
					-84 33 -137 99 -181 51 -34 154 -44 209 -21 120 51 176 190 123 308 -46 102
					-158 155 -266 126z"/>
					<path d="M703 3081 c-59 -15 -121 -60 -150 -109 -24 -39 -28 -58 -28 -117 1
					-76 14 -111 62 -159 41 -42 100 -66 163 -66 153 0 262 144 220 289 -31 109
					-161 188 -267 162z"/>
					<path d="M3537 3074 c-69 -21 -131 -86 -153 -159 -58 -200 142 -370 331 -281
					60 28 87 56 114 116 58 128 -14 284 -148 324 -65 19 -81 19 -144 0z"/>
					<path d="M4245 3081 c-117 -30 -188 -120 -188 -236 0 -133 103 -235 236 -235
					208 0 317 249 174 398 -58 61 -151 91 -222 73z"/>
					<path d="M7585 3083 c-113 -25 -180 -91 -199 -196 -10 -52 17 -138 55 -181 60
					-69 179 -97 262 -63 150 64 187 280 64 383 -51 43 -132 68 -182 57z"/>
					<path d="M1440 3023 c-142 -75 -164 -270 -41 -374 67 -58 141 -72 222 -44 133
					47 191 204 121 327 -61 110 -191 149 -302 91z"/>
					<path d="M8138 2827 c-48 -72 -150 -171 -222 -215 l-61 -37 -255 -5 -255 -5
					-55 -28 c-61 -31 -136 -99 -181 -163 -71 -102 -159 -321 -159 -395 0 -69 82
					-104 133 -56 14 13 35 56 51 107 41 130 90 223 151 287 l54 58 1 -127 0 -128
					-85 0 c-47 0 -85 -4 -85 -9 0 -5 -3 -16 -6 -25 -5 -14 8 -16 110 -16 l116 0 0
					-660 0 -660 -3230 0 -3230 0 0 660 0 660 135 0 c75 0 135 4 135 9 0 35 -13 41
					-91 41 l-79 0 0 120 c0 72 4 120 10 120 16 0 96 -109 129 -177 18 -35 45 -106
					62 -156 17 -51 40 -100 51 -109 44 -38 119 -11 134 47 8 33 -47 198 -102 305
					-85 164 -191 265 -307 290 -34 8 -135 11 -287 8 -232 -3 -236 -3 -285 -30
					-102 -53 -171 -156 -201 -300 -28 -130 -2 -454 44 -548 31 -64 111 -66 143 -3
					15 30 15 39 -4 130 -15 72 -21 138 -21 248 -1 133 2 156 22 207 13 31 29 62
					37 68 13 11 15 -24 15 -276 l0 -289 -70 -458 c-39 -252 -70 -473 -70 -493 0
					-19 7 -48 15 -64 41 -79 179 -79 220 0 11 20 155 910 155 955 0 3 11 5 25 5
					l25 0 0 -465 c0 -521 -2 -508 70 -545 39 -20 47 -20 3353 -18 3146 3 3314 4
					3340 21 64 42 62 25 65 539 3 456 3 468 22 468 12 0 22 -9 25 -22 3 -13 34
					-216 70 -453 36 -236 67 -442 71 -457 3 -15 21 -41 40 -58 68 -59 176 -31 203
					53 9 27 -2 119 -64 525 l-75 493 0 304 0 304 78 40 c43 23 108 66 145 97 l67
					56 0 139 c0 76 -2 139 -4 139 -2 0 -19 -24 -38 -53z"/>
					<path d="M2454 2836 c-113 -52 -162 -191 -107 -301 74 -149 272 -175 380 -51
					41 46 56 96 51 166 -12 162 -174 256 -324 186z"/>
					<path d="M3774 2659 c-32 -36 -94 -59 -160 -59 -48 0 -74 6 -123 31 -62 31
					-63 31 -104 15 -23 -9 -76 -36 -118 -60 -58 -34 -79 -53 -87 -76 -13 -36 1
					-86 28 -100 27 -14 82 -12 105 3 49 34 75 49 75 44 0 -3 -22 -19 -48 -36 -79
					-50 -148 -38 -171 32 l-11 32 -83 1 c-99 1 -170 22 -233 71 -26 19 -47 33 -49
					31 -1 -2 -13 -25 -26 -53 -13 -27 -25 -53 -26 -56 -2 -4 13 -9 34 -12 56 -9
					133 -51 197 -107 51 -45 62 -50 104 -50 45 0 127 10 205 25 l37 7 0 -111 0
					-110 -94 -3 c-92 -3 -93 -3 -85 -25 l8 -23 760 0 761 0 -12 25 c-9 19 -19 25
					-45 25 l-33 0 0 63 0 62 20 -25 c31 -40 88 -161 101 -215 15 -65 43 -95 86
					-95 76 0 101 45 77 137 -19 75 -83 209 -135 284 -39 55 -45 59 -81 59 -28 0
					-53 9 -84 30 -59 41 -56 47 5 10 60 -37 103 -39 136 -5 60 59 18 121 -127 194
					-85 42 -121 50 -134 30 -14 -23 -90 -49 -147 -49 -63 0 -113 17 -163 55 -31
					23 -34 24 -76 11 -23 -8 -57 -20 -73 -26 -26 -11 -40 -9 -103 14 -88 31 -84
					31 -108 5z m211 -219 c-18 -20 -18 -21 3 -36 21 -14 22 -23 22 -150 l0 -134
					-55 0 -55 0 0 135 0 135 48 35 c54 40 62 43 37 15z"/>
					<path d="M2278 2441 c-72 -28 -112 -56 -172 -121 -86 -93 -166 -279 -166 -386
					0 -53 31 -84 83 -84 52 0 72 25 91 114 22 97 73 200 125 251 l41 39 0 -67 0
					-67 -45 0 c-34 0 -47 -5 -55 -19 -5 -11 -10 -22 -10 -25 0 -3 175 -6 390 -6
					l390 0 -12 25 c-10 22 -18 25 -60 25 l-48 0 0 60 c0 33 4 60 9 60 18 0 81 -87
					110 -151 16 -35 36 -95 44 -134 18 -80 41 -105 94 -105 43 0 83 37 83 78 0 49
					-49 202 -88 276 -67 127 -199 234 -311 252 -34 5 -47 2 -79 -19 -82 -57 -193
					-57 -275 -2 -42 29 -75 31 -139 6z"/>
					<path d="M6023 2430 c-57 -35 -77 -98 -49 -163 24 -59 47 -66 360 -113 335
					-51 372 -53 410 -23 33 26 56 69 56 106 0 34 -31 86 -62 107 -22 14 -590 106
					-655 106 -16 0 -42 -9 -60 -20z"/>
					<path d="M2550 1412 c0 -247 0 -249 23 -270 18 -17 36 -22 73 -22 62 0 76 10
					72 46 -3 25 -8 29 -38 32 -19 2 -38 9 -42 15 -4 7 -8 110 -8 230 l0 217 -40 0
					-40 0 0 -248z"/>
					<path d="M1320 1638 c0 -2 47 -115 103 -253 l104 -250 40 -3 40 -3 43 106 c24
					58 47 102 51 98 4 -5 25 -51 47 -103 l39 -95 40 -3 40 -3 105 256 106 255 -48
					0 -49 0 -41 -107 c-22 -60 -57 -150 -77 -201 -19 -51 -37 -92 -38 -90 -2 2
					-19 41 -38 86 l-34 84 43 110 c24 61 44 113 44 115 0 1 -18 3 -41 3 -44 0 -40
					5 -84 -114 l-18 -49 -29 81 -30 82 -39 0 c-21 0 -39 -3 -39 -7 0 -4 18 -56 41
					-116 l41 -108 -32 -79 c-18 -44 -35 -80 -39 -80 -4 0 -41 88 -82 195 l-74 195
					-47 0 c-27 0 -48 -1 -48 -2z"/>
					<path d="M4880 1385 l0 -255 40 0 40 0 0 110 0 110 125 0 125 0 0 -110 0 -110
					45 0 45 0 0 255 0 255 -45 0 -45 0 0 -105 0 -105 -125 0 -125 0 0 105 0 105
					-40 0 -40 0 0 -255z"/>
					<path d="M2208 1500 c-60 -32 -108 -112 -108 -179 0 -76 53 -161 117 -187 42
					-18 125 -18 166 0 32 13 87 62 87 76 0 5 -14 13 -32 19 -29 10 -34 9 -60 -16
					-57 -55 -150 -29 -177 48 l-10 29 156 0 156 0 -7 47 c-8 63 -34 110 -80 147
					-32 26 -47 31 -104 33 -52 3 -75 -1 -104 -17z m143 -56 c25 -12 59 -64 59 -89
					0 -3 -49 -5 -110 -5 -60 0 -110 3 -110 6 0 3 7 21 16 40 28 59 87 78 145 48z"/>
					<path d="M2837 1499 c-122 -64 -131 -270 -15 -347 81 -53 219 -36 264 33 19
					30 13 41 -27 50 -23 5 -36 2 -53 -14 -50 -47 -130 -32 -162 31 -23 45 -15 130
					16 163 31 33 79 41 118 21 17 -9 32 -21 34 -28 4 -10 13 -10 46 0 23 7 42 15
					42 18 0 17 -39 58 -71 75 -51 26 -141 25 -192 -2z"/>
					<path d="M3228 1491 c-64 -40 -92 -100 -86 -185 7 -118 79 -186 196 -186 113
					0 192 82 192 200 0 119 -79 200 -195 200 -50 0 -69 -5 -107 -29z m152 -56 c85
					-44 78 -198 -9 -235 -70 -29 -141 30 -141 117 0 54 21 98 58 117 35 19 56 20
					92 1z"/>
					<path d="M3735 1505 c-16 -9 -36 -23 -42 -32 -11 -15 -13 -14 -13 10 0 25 -3
					27 -40 27 l-40 0 0 -190 0 -190 40 0 40 0 0 110 c0 128 14 170 67 195 31 15
					37 15 57 1 30 -19 36 -53 36 -192 l0 -114 39 0 39 0 4 124 c3 117 5 126 28
					151 54 58 111 53 129 -12 6 -21 11 -89 11 -150 l0 -113 41 0 40 0 -3 166 -3
					166 -33 29 c-26 23 -42 29 -78 29 -50 0 -76 -11 -115 -46 l-25 -24 -13 24
					c-25 46 -107 61 -166 31z"/>
					<path d="M4348 1500 c-60 -32 -108 -112 -108 -179 0 -76 53 -161 117 -187 42
					-18 125 -18 166 0 32 13 87 62 87 76 0 5 -14 13 -32 19 -29 10 -34 9 -60 -16
					-57 -55 -150 -29 -177 48 l-10 29 156 0 156 0 -7 47 c-8 63 -34 110 -80 147
					-32 26 -47 31 -104 33 -52 3 -75 -1 -104 -17z m143 -56 c25 -12 59 -64 59 -89
					0 -3 -49 -5 -110 -5 -60 0 -110 3 -110 6 0 3 7 21 16 40 28 59 87 78 145 48z"/>
					<path d="M5458 1491 c-64 -40 -92 -100 -86 -185 7 -118 79 -186 196 -186 113
					0 192 82 192 200 0 119 -79 200 -195 200 -50 0 -69 -5 -107 -29z m152 -56 c85
					-44 78 -198 -9 -235 -70 -29 -141 30 -141 117 0 54 21 98 58 117 35 19 56 20
					92 1z"/>
					</g>
					</svg>
				</div>
				<h3>"You don’t buy The House; you buy the neighbourhood!"</h3>
			</td>
		</tr>
	</table>
	</div>
</div>