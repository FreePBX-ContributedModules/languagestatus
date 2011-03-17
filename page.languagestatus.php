<?php
// Copyright (C) 2011 Mikael Carlsson (mickecarlsson at gmail dot com)
//
// This program is free software; you can redistribute it and/or
// modify it under the terms of the GNU General Public License
// as published by the Free Software Foundation, version 2
// of the License.
//
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.


$language = $_COOKIE['lang'];
if($language != "en_US") {

 $supported_modules = array(
  "announcement",
  "asterisk-cli",
  "asteriskinfo",
  "backup",
  "blacklist",
  "callback",
  "callforward",
  "callwaiting",
  "cidlookup",
  "conferences",
  "customappsreg",
  "dashboard",
  "daynight",
  "dictate",
  "disa",
  "donotdisturb",
  "dundicheck",
  "fax",
  "featurecodeadmin",
  "findmefollow",
  "iaxsettings",
  "infoservices",
  "irc",
  "ivr",
  "javassh",
  "languages",
  "logfiles",
  "manager",
  "miscapps",
  "miscdests",
  "music",
  "outroutemsg",
  "paging",
  "parking",
  "pbdirectory",
  "phonebook",
  "phpagiconf",
  "phpinfo",
  "pinsets",
  "printextensions",
  "queueprio",
  "queues",
  "recordings",
  "restart",
  "ringgroups",
  "sipsettings",
  "speeddial",
  "timeconditions",
  "vmblast",
  "voicemail",
  );

 if (file_exists($amp_conf['AMPWEBROOT']."/admin/i18n/${language}/LC_MESSAGES/amp.po" ))
 {
 $module = "amp";
 $result = check_translate_status($amp_conf['AMPWEBROOT']."/admin/i18n/",$language,$module);
 $total = $result[0] -1;
 $total_translated = $result[1] -1;
 $total_untranslated = $total - $total_translated;
 echo "<h1>Translation status for ".$_COOKIE['lang']."</h1>";
 echo "<table border = 1><tr><td>";
 echo "Application/Module</td><td>Strings</td><td>Translated</td><td>Not translated</td></tr>";
 echo "<td>core</td><td align =\"right\">".$total."</td><td align =\"right\">".$total_translated."</td><td align =\"right\">".$total_untranslated."</td></tr>";

 $module = "ari";
 $result = check_translate_status($amp_conf['AMPWEBROOT']."/recordings/locale/",$language,$module);
  if($result[0] != "0") { 
   $total = $result[0] -1;
   } else { 
    $total = "0"; 
   };
  if($result[1] != "0") {
   $total_translated = $result[1] -1;
   } else {
    $total_translated = "0";
   }
   $total_untranslated = $total - $total_translated;  
 echo "<td>ari</td><td align =\"right\">".$total."</td><td align =\"right\">".$total_translated."</td><td align =\"right\">".$total_untranslated."</td></tr>";

 foreach($supported_modules as $langmodule) {
  $result = check_translate_status($amp_conf['AMPWEBROOT']."/admin/modules/$langmodule/i18n/",$language,$langmodule);
  if($result[0] != "0") { 
   $total = $result[0] -1;
   } else { 
    $total = "0"; 
   };
  if($result[1] != "0") {
   $total_translated = $result[1] -1;
   } else {
    $total_translated = "0";
   }
   $total_untranslated = $total - $total_translated;
   echo "<td>".$langmodule."</td><td align =\"right\">".$total."</td><td align =\"right\">".$total_translated."</td><td align =\"right\">".$total_untranslated."</td></tr>";
  }
  echo "</table>";
  } 
 }
 else {
  echo "<h1>Language Status</h1><br>Select language in the language selection";
  }
?>
