<?php
add_filter( 'json_schema_guru_iso_countries', 'json_schema_guru_default_countries', 1 );
function json_schema_guru_default_countries( $content ) {
	$content = array(
		'AF' => __( 'Afghanistan', 'jsg4u' ),
		'AX' => __( 'Åland Islands', 'jsg4u' ),
		'AL' => __( 'Albania', 'jsg4u' ),
		'DZ' => __( 'Algeria', 'jsg4u' ),
		'AS' => __( 'American Samoa', 'jsg4u' ),
		'AD' => __( 'Andorra', 'jsg4u' ),
		'AO' => __( 'Angola', 'jsg4u' ),
		'AI' => __( 'Anguilla', 'jsg4u' ),
		'AQ' => __( 'Antarctica', 'jsg4u' ),
		'AG' => __( 'Antigua and Barbuda', 'jsg4u' ),
		'AR' => __( 'Argentina', 'jsg4u' ),
		'AM' => __( 'Armenia', 'jsg4u' ),
		'AW' => __( 'Aruba', 'jsg4u' ),
		'AU' => __( 'Australia', 'jsg4u' ),
		'AT' => __( 'Austria', 'jsg4u' ),
		'AZ' => __( 'Azerbaijan', 'jsg4u' ),
		'BS' => __( 'Bahamas', 'jsg4u' ),
		'BH' => __( 'Bahrain', 'jsg4u' ),
		'BD' => __( 'Bangladesh', 'jsg4u' ),
		'BB' => __( 'Barbados', 'jsg4u' ),
		'BY' => __( 'Belarus', 'jsg4u' ),
		'BE' => __( 'Belgium', 'jsg4u' ),
		'BZ' => __( 'Belize', 'jsg4u' ),
		'BJ' => __( 'Benin', 'jsg4u' ),
		'BM' => __( 'Bermuda', 'jsg4u' ),
		'BT' => __( 'Bhutan', 'jsg4u' ),
		'BO' => __( 'Bolivia', 'jsg4u' ),
		'BQ' => __( 'Bonaire&#44; Sint Eustatius&#44; and Saba', 'jsg4u' ),
		'BA' => __( 'Bosnia and Herzegovina', 'jsg4u' ),
		'BW' => __( 'Botswana', 'jsg4u' ),
		'BV' => __( 'Bouvet Island', 'jsg4u' ),
		'BR' => __( 'Brazil', 'jsg4u' ),
		'IO' => __( 'British Indian Ocean Territory', 'jsg4u' ),
		'BN' => __( 'Brunei Darussalam', 'jsg4u' ),
		'BG' => __( 'Bulgaria', 'jsg4u' ),
		'BF' => __( 'Burkina faso', 'jsg4u' ),
		'BI' => __( 'Burundi', 'jsg4u' ),
		'KH' => __( 'Cambodia', 'jsg4u' ),
		'CM' => __( 'Cameroon', 'jsg4u' ),
		'CA' => __( 'Canada', 'jsg4u' ),
		'CV' => __( 'Cabo Berde', 'jsg4u' ),
		'KY' => __( 'Cayman Islands', 'jsg4u' ),
		'CF' => __( 'Central African Republic', 'jsg4u' ),
		'TD' => __( 'Chad', 'jsg4u' ),
		'CL' => __( 'Chile', 'jsg4u' ),
		'CN' => __( 'China', 'jsg4u' ),
		'CX' => __( 'Christmas Island', 'jsg4u' ),
		'CC' => __( 'Cocos &#40;Keeling&#41; Islands', 'jsg4u' ),
		'CO' => __( 'Columbia', 'jsg4u' ),
		'KM' => __( 'Comoros', 'jsg4u' ),
		'CG' => __( 'Congo', 'jsg4u' ),
		'CD' => __( 'Congo &#40;Democratic Republic of the&#41;', 'jsg4u' ),
		'CK' => __( 'Cook Islands', 'jsg4u' ),
		'CR' => __( 'Costa Rica', 'jsg4u' ),
		'CI' => __( 'Côte d&#39;Ivoire', 'jsg4u' ),
		'HR' => __( 'Croatia', 'jsg4u' ),
		'CU' => __( 'Cuba', 'jsg4u' ),
		'CW' => __( 'Curaçao', 'jsg4u' ),
		'CY' => __( 'Cyprus', 'jsg4u' ),
		'CZ' => __( 'Czech Republic', 'jsg4u' ),
		'DK' => __( 'Denmark', 'jsg4u' ),
		'DJ' => __( 'Djibouti', 'jsg4u' ),
		'DM' => __( 'Dominica', 'jsg4u' ),
		'DO' => __( 'Dominican Republic', 'jsg4u' ),
		'EC' => __( 'Ecuador', 'jsg4u' ),
		'EG' => __( 'Egypt', 'jsg4u' ),
		'SV' => __( 'El Salvador', 'jsg4u' ),
		'GQ' => __( 'Equatorial Guinea', 'jsg4u' ),
		'ER' => __( 'Eritrea', 'jsg4u' ),
		'EE' => __( 'Estonia', 'jsg4u' ),
		'ET' => __( 'Ethiopia', 'jsg4u' ),
		'FK' => __( 'Falkland Islands (Malvinas)', 'jsg4u' ),
		'FO' => __( 'Faroe Islands', 'jsg4u' ),
		'FJ' => __( 'Fiji', 'jsg4u' ),
		'FI' => __( 'Finland', 'jsg4u' ),
		'FR' => __( 'France', 'jsg4u' ),
		'GF' => __( 'French Guiana', 'jsg4u' ),
		'PF' => __( 'French Polynesia', 'jsg4u' ),
		'TF' => __( 'French Southern Territories', 'jsg4u' ),
		'GA' => __( 'Gabon', 'jsg4u' ),
		'GM' => __( 'Gambia', 'jsg4u' ),
		'GE' => __( 'Georgia', 'jsg4u' ),
		'DE' => __( 'Germany', 'jsg4u' ),
		'GH' => __( 'Ghana', 'jsg4u' ),
		'GI' => __( 'Gibraltar', 'jsg4u' ),
		'GR' => __( 'Greece', 'jsg4u' ),
		'GL' => __( 'Greenland', 'jsg4u' ),
		'GD' => __( 'Grenada', 'jsg4u' ),
		'GP' => __( 'Guadeloupe', 'jsg4u' ),
		'GU' => __( 'Guam', 'jsg4u' ),
		'GT' => __( 'Guatemala', 'jsg4u' ),
		'GG' => __( 'Guernsey', 'jsg4u' ),
		'GN' => __( 'Guinea', 'jsg4u' ),
		'GW' => __( 'Guinea-Bissau', 'jsg4u' ),
		'GY' => __( 'Guyana', 'jsg4u' ),
		'HT' => __( 'Haiti', 'jsg4u' ),
		'HM' => __( 'Heard Island and McDonald Islands', 'jsg4u' ),
		'VA' => __( 'Holy See', 'jsg4u' ),
		'HN' => __( 'Honduras', 'jsg4u' ),
		'HK' => __( 'Hong Kong', 'jsg4u' ),
		'HU' => __( 'Hungary', 'jsg4u' ),
		'IS' => __( 'Iceland', 'jsg4u' ),
		'IN' => __( 'India', 'jsg4u' ),
		'ID' => __( 'Indonesia', 'jsg4u' ),
		'IR' => __( 'Iran &#40;Islamic Republic of&#41;', 'jsg4u' ),
		'IQ' => __( 'Iraq', 'jsg4u' ),
		'IE' => __( 'Ireland', 'jsg4u' ),
		'IM' => __( 'Isle of Man', 'jsg4u' ),
		'IL' => __( 'Israel', 'jsg4u' ),
		'IT' => __( 'Italy', 'jsg4u' ),
		'JM' => __( 'Jamaica', 'jsg4u' ),
		'JP' => __( 'Japan', 'jsg4u' ),
		'JE' => __( 'Jersey', 'jsg4u' ),
		'JO' => __( 'Jordan', 'jsg4u' ),
		'KZ' => __( 'Kazakhstan', 'jsg4u' ),
		'KE' => __( 'Kenya', 'jsg4u' ),
		'KI' => __( 'Kiribati', 'jsg4u' ),
		'KP' => __( 'Korea &#40;Democratic People&#39;s Republic of&#41;', 'jsg4u' ),
		'KR' => __( 'Korea &#40;Republic of&#41;', 'jsg4u' ),
		'KW' => __( 'Kuwait', 'jsg4u' ),
		'KG' => __( 'Kyrgyzstan', 'jsg4u' ),
		'LA' => __( 'Lao People&#39;s Democratic Republic', 'jsg4u' ),
		'LV' => __( 'Latvia', 'jsg4u' ),
		'LB' => __( 'Lebanon', 'jsg4u' ),
		'LS' => __( 'Lesotho', 'jsg4u' ),
		'LR' => __( 'Liberia', 'jsg4u' ),
		'LY' => __( 'Libya', 'jsg4u' ),
		'LI' => __( 'Liechtenstein', 'jsg4u' ),
		'LT' => __( 'Lithuania', 'jsg4u' ),
		'LU' => __( 'Luxembourg', 'jsg4u' ),
		'MO' => __( 'Macao', 'jsg4u' ),
		'MK' => __( 'Macedonia &#40;the former Yugoslav Republic of&#41;', 'jsg4u' ),
		'MG' => __( 'Madagascar', 'jsg4u' ),
		'MW' => __( 'Malawi', 'jsg4u' ),
		'MY' => __( 'Malaysia', 'jsg4u' ),
		'MV' => __( 'Maldives', 'jsg4u' ),
		'ML' => __( 'Mali', 'jsg4u' ),
		'MT' => __( 'Malta', 'jsg4u' ),
		'MH' => __( 'Marshall Islands', 'jsg4u' ),
		'MQ' => __( 'Martinique', 'jsg4u' ),
		'MR' => __( 'Mauritania', 'jsg4u' ),
		'MU' => __( 'Mauritius', 'jsg4u' ),
		'YT' => __( 'Mayotte', 'jsg4u' ),
		'MX' => __( 'Mexico', 'jsg4u' ),
		'FM' => __( 'Micronesia &#40;Federated States of&#41;', 'jsg4u' ),
		'MD' => __( 'Moldova &#40;Republic of&#41;', 'jsg4u' ),
		'MC' => __( 'Monaco', 'jsg4u' ),
		'MN' => __( 'Mongolia', 'jsg4u' ),
		'ME' => __( 'Montenegro', 'jsg4u' ),
		'MS' => __( 'Montserrat', 'jsg4u' ),
		'MA' => __( 'Morocco', 'jsg4u' ),
		'MZ' => __( 'Mozambique', 'jsg4u' ),
		'MM' => __( 'Myanmar', 'jsg4u' ),
		'NA' => __( 'Namibia', 'jsg4u' ),
		'NR' => __( 'Nauru', 'jsg4u' ),
		'NP' => __( 'Nepal', 'jsg4u' ),
		'NL' => __( 'Netherlands', 'jsg4u' ),
		'NC' => __( 'New Caledonia', 'jsg4u' ),
		'NZ' => __( 'New Zealand', 'jsg4u' ),
		'NI' => __( 'Nicaragua', 'jsg4u' ),
		'NE' => __( 'Niger', 'jsg4u' ),
		'NG' => __( 'Nigeria', 'jsg4u' ),
		'NU' => __( 'Niue', 'jsg4u' ),
		'NF' => __( 'Norfolk Island', 'jsg4u' ),
		'MP' => __( 'Northern Mariana Islands', 'jsg4u' ),
		'NO' => __( 'Norway', 'jsg4u' ),
		'OM' => __( 'Oman', 'jsg4u' ),
		'PK' => __( 'Pakistan', 'jsg4u' ),
		'PW' => __( 'Palau', 'jsg4u' ),
		'PS' => __( 'Palestine&#44; State of', 'jsg4u' ),
		'PA' => __( 'Panama', 'jsg4u' ),
		'PG' => __( 'Papua New Guinea', 'jsg4u' ),
		'PY' => __( 'Paraguay', 'jsg4u' ),
		'PE' => __( 'Peru', 'jsg4u' ),
		'PH' => __( 'Philippines', 'jsg4u' ),
		'PN' => __( 'Pitcairn', 'jsg4u' ),
		'PL' => __( 'Poland', 'jsg4u' ),
		'PT' => __( 'Portugal', 'jsg4u' ),
		'PR' => __( 'Puerto Rico', 'jsg4u' ),
		'QA' => __( 'Qatar', 'jsg4u' ),
		'RE' => __( 'Réunion', 'jsg4u' ),
		'RO' => __( 'Romania', 'jsg4u' ),
		'RU' => __( 'Russian Federation', 'jsg4u' ),
		'RW' => __( 'Rwanda', 'jsg4u' ),
		'BL' => __( 'Saint Barthélemy', 'jsg4u' ),
		'SH' => __( 'Saint Helena&#44; Ascension&#44; and Tristan da Cunha', 'jsg4u' ),
		'KN' => __( 'Saint Kitts and Nevis', 'jsg4u' ),
		'LC' => __( 'Saint Lucia', 'jsg4u' ),
		'MF' => __( 'Saint Martin &#40;French part&#41;', 'jsg4u' ),
		'PM' => __( 'Saint Pierre and Miquelon', 'jsg4u' ),
		'VC' => __( 'Saint Vincent and the Grenadines', 'jsg4u' ),
		'WS' => __( 'Samoa', 'jsg4u' ),
		'SM' => __( 'San Marino', 'jsg4u' ),
		'ST' => __( 'Sao Tome and Principe', 'jsg4u' ),
		'SA' => __( 'Saudi Arabia', 'jsg4u' ),
		'SN' => __( 'Senegal', 'jsg4u' ),
		'RS' => __( 'Serbia', 'jsg4u' ),
		'SC' => __( 'Seychelles', 'jsg4u' ),
		'SL' => __( 'Sierra Leone', 'jsg4u' ),
		'SG' => __( 'Singapore', 'jsg4u' ),
		'SX' => __( 'Sint Maarten &#40;Dutch part&#41;', 'jsg4u' ),
		'SK' => __( 'Slovakia', 'jsg4u' ),
		'SI' => __( 'Slovenia', 'jsg4u' ),
		'SB' => __( 'Solomon Islands', 'jsg4u' ),
		'SO' => __( 'Somalia', 'jsg4u' ),
		'ZA' => __( 'South Africa', 'jsg4u' ),
		'GS' => __( 'South Georgia and the South Sandwich Islands', 'jsg4u' ),
		'SS' => __( 'South Sudan', 'jsg4u' ),
		'ES' => __( 'Spain', 'jsg4u' ),
		'LK' => __( 'Sri Lanka', 'jsg4u' ),
		'SD' => __( 'Sudan', 'jsg4u' ),
		'SR' => __( 'Suriname', 'jsg4u' ),
		'SJ' => __( 'Svalbard and Jan Mayen', 'jsg4u' ),
		'SZ' => __( 'Swaziland', 'jsg4u' ),
		'SE' => __( 'Sweden', 'jsg4u' ),
		'CH' => __( 'Switzerland', 'jsg4u' ),
		'SY' => __( 'Syrian Arab Republic', 'jsg4u' ),
		'TW' => __( 'Taiwan&#44; Province of China', 'jsg4u' ),
		'TJ' => __( 'Tajikistan', 'jsg4u' ),
		'TZ' => __( 'Tanzania&#44; United Republic of', 'jsg4u' ),
		'TH' => __( 'Thailand', 'jsg4u' ),
		'TL' => __( 'Timor-Leste', 'jsg4u' ),
		'TG' => __( 'Togo', 'jsg4u' ),
		'TK' => __( 'Tokelau', 'jsg4u' ),
		'TO' => __( 'Tonga', 'jsg4u' ),
		'TT' => __( 'Trinidad and Tobago', 'jsg4u' ),
		'TN' => __( 'Tunisia', 'jsg4u' ),
		'TR' => __( 'Turkey', 'jsg4u' ),
		'TM' => __( 'Turkmenistan', 'jsg4u' ),
		'TC' => __( 'Turks and Caicos Islands', 'jsg4u' ),
		'TV' => __( 'Tuvalu', 'jsg4u' ),
		'UG' => __( 'Uganda', 'jsg4u' ),
		'UA' => __( 'Ukraine', 'jsg4u' ),
		'AE' => __( 'United Arab Emirates', 'jsg4u' ),
		'GB' => __( 'United Kingdom of Great Britain and Northern Ireland', 'jsg4u' ),
		'US' => __( 'United States of America', 'jsg4u' ),
		'UM' => __( 'United States Minor Outlying Islands', 'jsg4u' ),
		'UY' => __( 'Uruguay', 'jsg4u' ),
		'UZ' => __( 'Uzbekistan', 'jsg4u' ),
		'VU' => __( 'Vanuatu', 'jsg4u' ),
		'VE' => __( 'Venezuela &#40;Bolivarian Republic of&#41;', 'jsg4u' ),
		'VN' => __( 'Viet Nam', 'jsg4u' ),
		'VG' => __( 'Virgin Islands &#40;British&#41;', 'jsg4u' ),
		'VI' => __( 'Virgin Islands &#40;U.S.&#41;', 'jsg4u' ),
		'WF' => __( 'Wallis and Futuna', 'jsg4u' ),
		'EH' => __( 'Western Sahara', 'jsg4u' ),
		'YE' => __( 'Yemen', 'jsg4u' ),
		'ZM' => __( 'Zambia', 'jsg4u' ),
		'ZW' => __( 'Zimbabwe', 'jsg4u' ),
	);	
	return $content;
}
/*
 add_filter( 'json_schema_guru_iso_countries', 'my_special_countries', 25 );
 function my_special_countries( $content ) {
	$new = array(
		'abc' => __( 'abc', 'jsg4u' ),
		'def' => __( 'def', 'jsg4u' ),
	);	
	return $content = array_merge( $content, $new );
 }
 */