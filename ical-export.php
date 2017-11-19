<?php $kb_ical = fopen($fileName, 'w') or die('Datei kann nicht gespeichert werden!'); 

$eol = "\r\n";
$kb_ics_content =
'BEGIN:VCALENDAR'.$eol.
'VERSION:2.0'.$eol.
'PRODID:-//FCG ARCHE Augsburg//arche-augsburg.de//DE'.$eol.
'CALSCALE:GREGORIAN'.$eol.
'BEGIN:VEVENT'.$eol.
'DTSTART:'.$kb_start.$eol.
'DTEND:'.$kb_end.$eol.
'LOCATION:'.$kb_location.$eol.
'DTSTAMP:'.$kb_current_time.$eol.
'SUMMARY:'.$kb_title.$eol.
'URL;VALUE=URI:'.$kb_url.$eol.
'DESCRIPTION:'.$kb_description.$eol.
'UID:'.$kb_current_time.'-'.$kb_start.'-'.$kb_end.$eol.
'END:VEVENT'.$eol.
'END:VCALENDAR';
fwrite($kb_ical, $kb_ics_content);

fclose($kb_ical);
?>