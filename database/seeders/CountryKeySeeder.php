<?php

namespace Database\Seeders;

use App\Models\CountryKey;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CountryKeySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countries = [
            [
                "name" => "Afghanistan", "phone_key" => "93", "code" => "AF"],
            [
                "name" => "Albania", "phone_key" => "355", "code" => "AL"],
            [
                "name" => "Algeria", "phone_key" => "213", "code" => "DZ"],
            [
                "name" => "American Samoa", "phone_key" => "1-684", "code" => "AS"],
            [
                "name" => "Andorra", "phone_key" => "376", "code" => "AD"],
            [
                "name" => "Angola", "phone_key" => "244", "code" => "AO"],
            [
                "name" => "Anguilla", "phone_key" => "1-264", "code" => "AI"],
            [
                "name" => "Antarctica", "phone_key" => "672", "code" => "AQ"],
            [
                "name" => "Antigua and Barbuda", "phone_key" => "1-268", "code" => "AG"],
            [
                "name" => "Argentina", "phone_key" => "54", "code" => "AR"],
            [
                "name" => "Armenia", "phone_key" => "374", "code" => "AM"],
            [
                "name" => "Aruba", "phone_key" => "297", "code" => "AW"],
            [
                "name" => "Australia", "phone_key" => "61", "code" => "AU"],
            [
                "name" => "Austria", "phone_key" => "43", "code" => "AT"],
            [
                "name" => "Azerbaijan", "phone_key" => "994", "code" => "AZ"],
            [
                "name" => "Bahamas", "phone_key" => "1-242", "code" => "BS"],
            [
                "name" => "Bahrain", "phone_key" => "973", "code" => "BH"],
            [
                "name" => "Bangladesh", "phone_key" => "880", "code" => "BD"],
            [
                "name" => "Barbados", "phone_key" => "1-246", "code" => "BB"],
            [
                "name" => "Belarus", "phone_key" => "375", "code" => "BY"],
            [
                "name" => "Belgium", "phone_key" => "32", "code" => "BE"],
            [
                "name" => "Belize", "phone_key" => "501", "code" => "BZ"],
            [
                "name" => "Benin", "phone_key" => "229", "code" => "BJ"],
            [
                "name" => "Bermuda", "phone_key" => "1-441", "code" => "BM"],
            [
                "name" => "Bhutan", "phone_key" => "975", "code" => "BT"],
            [
                "name" => "Bolivia", "phone_key" => "591", "code" => "BO"],
            [
                "name" => "Bosnia and Herzegovina", "phone_key" => "387", "code" => "BA"],
            [
                "name" => "Botswana", "phone_key" => "267", "code" => "BW"],
            [
                "name" => "Brazil", "phone_key" => "55", "code" => "BR"],
            [
                "name" => "British Indian Ocean Territory", "phone_key" => "246", "code" => "IO"],
            [
                "name" => "British Virgin Islands", "phone_key" => "1-284", "code" => "VG"],
            [
                "name" => "Brunei", "phone_key" => "673", "code" => "BN"],
            [
                "name" => "Bulgaria", "phone_key" => "359", "code" => "BG"],
            [
                "name" => "Burkina Faso", "phone_key" => "226", "code" => "BF"],
            [
                "name" => "Burundi", "phone_key" => "257", "code" => "BI"],
            [
                "name" => "Cambodia", "phone_key" => "855", "code" => "KH"],
            [
                "name" => "Cameroon", "phone_key" => "237", "code" => "CM"],
            [
                "name" => "Canada", "phone_key" => "1", "code" => "CA"],
            [
                "name" => "Cape Verde", "phone_key" => "238", "code" => "CV"],
            [
                "name" => "Cayman Islands", "phone_key" => "1-345", "code" => "KY"],
            [
                "name" => "Central African Republic", "phone_key" => "236", "code" => "CF"],
            [
                "name" => "Chad", "phone_key" => "235", "code" => "TD"],
            [
                "name" => "Chile", "phone_key" => "56", "code" => "CL"],
            [
                "name" => "China", "phone_key" => "86", "code" => "CN"],
            [
                "name" => "Christmas Island", "phone_key" => "61", "code" => "CX"],
            [
                "name" => "Cocos Islands", "phone_key" => "61", "code" => "CC"],
            [
                "name" => "Colombia", "phone_key" => "57", "code" => "CO"],
            [
                "name" => "Comoros", "phone_key" => "269", "code" => "KM"],
            [
                "name" => "Cook Islands", "phone_key" => "682", "code" => "CK"],
            [
                "name" => "Costa Rica", "phone_key" => "506", "code" => "CR"],
            [
                "name" => "Croatia", "phone_key" => "385", "code" => "HR"],
            [
                "name" => "Cuba", "phone_key" => "53", "code" => "CU"],
            [
                "name" => "Curacao", "phone_key" => "599", "code" => "CW"],
            [
                "name" => "Cyprus", "phone_key" => "357", "code" => "CY"],
            [
                "name" => "Czech Republic", "phone_key" => "420", "code" => "CZ"],
            [
                "name" => "Democratic Republic of the Congo", "phone_key" => "243", "code" => "CD"],
            [
                "name" => "Denmark", "phone_key" => "45", "code" => "DK"],
            [
                "name" => "Djibouti", "phone_key" => "253", "code" => "DJ"],
            [
                "name" => "Dominica", "phone_key" => "1-767", "code" => "DM"],
            [
                "name" => "Dominican Republic", "phone_key" => "1-849", "code" => "DO"],
            [
                "name" => "East Timor", "phone_key" => "670", "code" => "TL"],
            [
                "name" => "Ecuador", "phone_key" => "593", "code" => "EC"],
            [
                "name" => "Egypt", "phone_key" => "20", "code" => "EG"],
            [
                "name" => "El Salvador", "phone_key" => "503", "code" => "SV"],
            [
                "name" => "Equatorial Guinea", "phone_key" => "240", "code" => "GQ"],
            [
                "name" => "Eritrea", "phone_key" => "291", "code" => "ER"],
            [
                "name" => "Estonia", "phone_key" => "372", "code" => "EE"],
            [
                "name" => "Ethiopia", "phone_key" => "251", "code" => "ET"],
            [
                "name" => "Falkland Islands", "phone_key" => "500", "code" => "FK"],
            [
                "name" => "Faroe Islands", "phone_key" => "298", "code" => "FO"],
            [
                "name" => "Fiji", "phone_key" => "679", "code" => "FJ"],
            [
                "name" => "Finland", "phone_key" => "358", "code" => "FI"],
            [
                "name" => "France", "phone_key" => "33", "code" => "FR"],
            [
                "name" => "French Polynesia", "phone_key" => "689", "code" => "PF"],
            [
                "name" => "Gabon", "phone_key" => "241", "code" => "GA"],
            [
                "name" => "Gambia", "phone_key" => "220", "code" => "GM"],
            [
                "name" => "Georgia", "phone_key" => "995", "code" => "GE"],
            [
                "name" => "Germany", "phone_key" => "49", "code" => "DE"],
            [
                "name" => "Ghana", "phone_key" => "233", "code" => "GH"],
            [
                "name" => "Gibraltar", "phone_key" => "350", "code" => "GI"],
            [
                "name" => "Greece", "phone_key" => "30", "code" => "GR"],
            [
                "name" => "Greenland", "phone_key" => "299", "code" => "GL"],
            [
                "name" => "Grenada", "phone_key" => "1-473", "code" => "GD"],
            [
                "name" => "Guam", "phone_key" => "1-671", "code" => "GU"],
            [
                "name" => "Guatemala", "phone_key" => "502", "code" => "GT"],
            [
                "name" => "Guernsey", "phone_key" => "44-1481", "code" => "GG"],
            [
                "name" => "Guinea", "phone_key" => "224", "code" => "GN"],
            [
                "name" => "Guinea-Bissau", "phone_key" => "245", "code" => "GW"],
            [
                "name" => "Guyana", "phone_key" => "592", "code" => "GY"],
            [
                "name" => "Haiti", "phone_key" => "509", "code" => "HT"],
            [
                "name" => "Honduras", "phone_key" => "504", "code" => "HN"],
            [
                "name" => "Hong Kong", "phone_key" => "852", "code" => "HK"],
            [
                "name" => "Hungary", "phone_key" => "36", "code" => "HU"],
            [
                "name" => "Iceland", "phone_key" => "354", "code" => "IS"],
            [
                "name" => "India", "phone_key" => "91", "code" => "IN"],
            [
                "name" => "Indonesia", "phone_key" => "62", "code" => "ID"],
            [
                "name" => "Iran", "phone_key" => "98", "code" => "IR"],
            [
                "name" => "Iraq", "phone_key" => "964", "code" => "IQ"],
            [
                "name" => "Ireland", "phone_key" => "353", "code" => "IE"],
            [
                "name" => "Isle of Man", "phone_key" => "44-1624", "code" => "IM"],
            [
                "name" => "Israel", "phone_key" => "972", "code" => "IL"],
            [
                "name" => "Italy", "phone_key" => "39", "code" => "IT"],
            [
                "name" => "Ivory Coast", "phone_key" => "225", "code" => "CI"],
            [
                "name" => "Jamaica", "phone_key" => "1-876", "code" => "JM"],
            [
                "name" => "Japan", "phone_key" => "81", "code" => "JP"],
            [
                "name" => "Jersey", "phone_key" => "44-1534", "code" => "JE"],
            [
                "name" => "Jordan", "phone_key" => "962", "code" => "JO"],
            [
                "name" => "Kazakhstan", "phone_key" => "7", "code" => "KZ"],
            [
                "name" => "Kenya", "phone_key" => "254", "code" => "KE"],
            [
                "name" => "Kiribati", "phone_key" => "686", "code" => "KI"],
            [
                "name" => "Kosovo", "phone_key" => "383", "code" => "XK"],
            [
                "name" => "Kuwait", "phone_key" => "965", "code" => "KW"],
            [
                "name" => "Kyrgyzstan", "phone_key" => "996", "code" => "KG"],
            [
                "name" => "Laos", "phone_key" => "856", "code" => "LA"],
            [
                "name" => "Latvia", "phone_key" => "371", "code" => "LV"],
            [
                "name" => "Lebanon", "phone_key" => "961", "code" => "LB"],
            [
                "name" => "Lesotho", "phone_key" => "266", "code" => "LS"],
            [
                "name" => "Liberia", "phone_key" => "231", "code" => "LR"],
            [
                "name" => "Libya", "phone_key" => "218", "code" => "LY"],
            [
                "name" => "Liechtenstein", "phone_key" => "423", "code" => "LI"],
            [
                "name" => "Lithuania", "phone_key" => "370", "code" => "LT"],
            [
                "name" => "Luxembourg", "phone_key" => "352", "code" => "LU"],
            [
                "name" => "Macao", "phone_key" => "853", "code" => "MO"],
            [
                "name" => "Macedonia", "phone_key" => "389", "code" => "MK"],
            [
                "name" => "Madagascar", "phone_key" => "261", "code" => "MG"],
            [
                "name" => "Malawi", "phone_key" => "265", "code" => "MW"],
            [
                "name" => "Malaysia", "phone_key" => "60", "code" => "MY"],
            [
                "name" => "Maldives", "phone_key" => "960", "code" => "MV"],
            [
                "name" => "Mali", "phone_key" => "223", "code" => "ML"],
            [
                "name" => "Malta", "phone_key" => "356", "code" => "MT"],
            [
                "name" => "Marshall Islands", "phone_key" => "692", "code" => "MH"],
            [
                "name" => "Mauritania", "phone_key" => "222", "code" => "MR"],
            [
                "name" => "Mauritius", "phone_key" => "230", "code" => "MU"],
            [
                "name" => "Mayotte", "phone_key" => "262", "code" => "YT"],
            [
                "name" => "Mexico", "phone_key" => "52", "code" => "MX"],
            [
                "name" => "Micronesia", "phone_key" => "691", "code" => "FM"],
            [
                "name" => "Moldova", "phone_key" => "373", "code" => "MD"],
            [
                "name" => "Monaco", "phone_key" => "377", "code" => "MC"],
            [
                "name" => "Mongolia", "phone_key" => "976", "code" => "MN"],
            [
                "name" => "Montenegro", "phone_key" => "382", "code" => "ME"],
            [
                "name" => "Montserrat", "phone_key" => "1-664", "code" => "MS"],
            [
                "name" => "Morocco", "phone_key" => "212", "code" => "MA"],
            [
                "name" => "Mozambique", "phone_key" => "258", "code" => "MZ"],
            [
                "name" => "Myanmar", "phone_key" => "95", "code" => "MM"],
            [
                "name" => "Namibia", "phone_key" => "264", "code" => "NA"],
            [
                "name" => "Nauru", "phone_key" => "674", "code" => "NR"],
            [
                "name" => "Nepal", "phone_key" => "977", "code" => "NP"],
            [
                "name" => "Netherlands", "phone_key" => "31", "code" => "NL"],
            [
                "name" => "Netherlands Antilles", "phone_key" => "599", "code" => "AN"],
            [
                "name" => "New Caledonia", "phone_key" => "687", "code" => "NC"],
            [
                "name" => "New Zealand", "phone_key" => "64", "code" => "NZ"],
            [
                "name" => "Nicaragua", "phone_key" => "505", "code" => "NI"],
            [
                "name" => "Niger", "phone_key" => "227", "code" => "NE"],
            [
                "name" => "Nigeria", "phone_key" => "234", "code" => "NG"],
            [
                "name" => "Niue", "phone_key" => "683", "code" => "NU"],
            [
                "name" => "North Korea", "phone_key" => "850", "code" => "KP"],
            [
                "name" => "Northern Mariana Islands", "phone_key" => "1-670", "code" => "MP"],
            [
                "name" => "Norway", "phone_key" => "47", "code" => "NO"],
            [
                "name" => "Oman", "phone_key" => "968", "code" => "OM"],
            [
                "name" => "Pakistan", "phone_key" => "92", "code" => "PK"],
            [
                "name" => "Palau", "phone_key" => "680", "code" => "PW"],
            [
                "name" => "Palestine", "phone_key" => "970", "code" => "PS"],
            [
                "name" => "Panama", "phone_key" => "507", "code" => "PA"],
            [
                "name" => "Papua New Guinea", "phone_key" => "675", "code" => "PG"],
            [
                "name" => "Paraguay", "phone_key" => "595", "code" => "PY"],
            [
                "name" => "Peru", "phone_key" => "51", "code" => "PE"],
            [
                "name" => "Philippines", "phone_key" => "63", "code" => "PH"],
            [
                "name" => "Pitcairn", "phone_key" => "64", "code" => "PN"],
            [
                "name" => "Poland", "phone_key" => "48", "code" => "PL"],
            [
                "name" => "Portugal", "phone_key" => "351", "code" => "PT"],
            [
                "name" => "Puerto Rico", "phone_key" => "1-787", "code" => "PR"],
            [
                "name" => "Qatar", "phone_key" => "974", "code" => "QA"],
            [
                "name" => "Republic of the Congo", "phone_key" => "242", "code" => "CG"],
            [
                "name" => "Reunion", "phone_key" => "262", "code" => "RE"],
            [
                "name" => "Romania", "phone_key" => "40", "code" => "RO"],
            [
                "name" => "Russia", "phone_key" => "7", "code" => "RU"],
            [
                "name" => "Rwanda", "phone_key" => "250", "code" => "RW"],
            [
                "name" => "Saint Barthelemy", "phone_key" => "590", "code" => "BL"],
            [
                "name" => "Saint Helena", "phone_key" => "290", "code" => "SH"],
            [
                "name" => "Saint Kitts and Nevis", "phone_key" => "1-869", "code" => "KN"],
            [
                "name" => "Saint Lucia", "phone_key" => "1-758", "code" => "LC"],
            [
                "name" => "Saint Martin", "phone_key" => "590", "code" => "MF"],
            [
                "name" => "Saint Pierre and Miquelon", "phone_key" => "508", "code" => "PM"],
            [
                "name" => "Saint Vincent and the Grenadines", "phone_key" => "1-784", "code" => "VC"],
            [
                "name" => "Samoa", "phone_key" => "685", "code" => "WS"],
            [
                "name" => "San Marino", "phone_key" => "378", "code" => "SM"],
            [
                "name" => "Sao Tome and Principe", "phone_key" => "239", "code" => "ST"],
            [
                "name" => "Saudi Arabia", "phone_key" => "966", "code" => "SA"],
            [
                "name" => "Senegal", "phone_key" => "221", "code" => "SN"],
            [
                "name" => "Serbia", "phone_key" => "381", "code" => "RS"],
            [
                "name" => "Seychelles", "phone_key" => "248", "code" => "SC"],
            [
                "name" => "Sierra Leone", "phone_key" => "232", "code" => "SL"],
            [
                "name" => "Singapore", "phone_key" => "65", "code" => "SG"],
            [
                "name" => "Sint Maarten", "phone_key" => "1-721", "code" => "SX"],
            [
                "name" => "Slovakia", "phone_key" => "421", "code" => "SK"],
            [
                "name" => "Slovenia", "phone_key" => "386", "code" => "SI"],
            [
                "name" => "Solomon Islands", "phone_key" => "677", "code" => "SB"],
            [
                "name" => "Somalia", "phone_key" => "252", "code" => "SO"],
            [
                "name" => "South Africa", "phone_key" => "27", "code" => "ZA"],
            [
                "name" => "South Korea", "phone_key" => "82", "code" => "KR"],
            [
                "name" => "South Sudan", "phone_key" => "211", "code" => "SS"],
            [
                "name" => "Spain", "phone_key" => "34", "code" => "ES"],
            [
                "name" => "Sri Lanka", "phone_key" => "94", "code" => "LK"],
            [
                "name" => "Sudan", "phone_key" => "249", "code" => "SD"],
            [
                "name" => "Suriname", "phone_key" => "597", "code" => "SR"],
            [
                "name" => "Svalbard and Jan Mayen", "phone_key" => "47", "code" => "SJ"],
            [
                "name" => "Swaziland", "phone_key" => "268", "code" => "SZ"],
            [
                "name" => "Sweden", "phone_key" => "46", "code" => "SE"],
            [
                "name" => "Switzerland", "phone_key" => "41", "code" => "CH"],
            [
                "name" => "Syria", "phone_key" => "963", "code" => "SY"],
            [
                "name" => "Taiwan", "phone_key" => "886", "code" => "TW"],
            [
                "name" => "Tajikistan", "phone_key" => "992", "code" => "TJ"],
            [
                "name" => "Tanzania", "phone_key" => "255", "code" => "TZ"],
            [
                "name" => "Thailand", "phone_key" => "66", "code" => "TH"],
            [
                "name" => "Togo", "phone_key" => "228", "code" => "TG"],
            [
                "name" => "Tokelau", "phone_key" => "690", "code" => "TK"],
            [
                "name" => "Tonga", "phone_key" => "676", "code" => "TO"],
            [
                "name" => "Trinidad and Tobago", "phone_key" => "1-868", "code" => "TT"],
            [
                "name" => "Tunisia", "phone_key" => "216", "code" => "TN"],
            [
                "name" => "Turkey", "phone_key" => "90", "code" => "TR"],
            [
                "name" => "Turkmenistan", "phone_key" => "993", "code" => "TM"],
            [
                "name" => "Turks and Caicos Islands", "phone_key" => "1-649", "code" => "TC"],
            [
                "name" => "Tuvalu", "phone_key" => "688", "code" => "TV"],
            [
                "name" => "U.S. Virgin Islands", "phone_key" => "1-340", "code" => "VI"],
            [
                "name" => "Uganda", "phone_key" => "256", "code" => "UG"],
            [
                "name" => "Ukraine", "phone_key" => "380", "code" => "UA"],
            [
                "name" => "United Arab Emirates", "phone_key" => "971", "code" => "AE"],
            [
                "name" => "United Kingdom", "phone_key" => "44", "code" => "GB"],
            [
                "name" => "United States", "phone_key" => "1", "code" => "US"],
            [
                "name" => "Uruguay", "phone_key" => "598", "code" => "UY"],
            [
                "name" => "Uzbekistan", "phone_key" => "998", "code" => "UZ"],
            [
                "name" => "Vanuatu", "phone_key" => "678", "code" => "VU"],
            [
                "name" => "Vatican", "phone_key" => "379", "code" => "VA"],
            [
                "name" => "Venezuela", "phone_key" => "58", "code" => "VE"],
            [
                "name" => "Vietnam", "phone_key" => "84", "code" => "VN"],
            [
                "name" => "Wallis and Futuna", "phone_key" => "681", "code" => "WF"],
            [
                "name" => "Western Sahara", "phone_key" => "212", "code" => "EH"],
            [
                "name" => "Yemen", "phone_key" => "967", "code" => "YE"],
            [
                "name" => "Zambia", "phone_key" => "260", "code" => "ZM"],
            [
                "name" => "Zimbabwe", "phone_key" => "263", "code" => "ZW"]
        ];

        foreach ($countries as $country) {

            CountryKey::create([
                'name' => $country['name'],
                'code' => $country['code'],
                'phone_key' => '+' . $country['phone_key'],
                'flag' => strtolower($country['code']) . '.png',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

}
