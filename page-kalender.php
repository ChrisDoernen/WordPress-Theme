<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

<?php include (get_template_directory().'/head.php'); ?>
<link rel="stylesheet" href="<?php echo (get_template_directory_uri().'/css/calender.css');?>"/>

</head>

<body>
    <?php
        $calendarUrls = array (
            array ("https://termine.arche-augsburg.de/gottesdienste.ics", "Gottesdienste"),
            array ("https://termine.arche-augsburg.de/besonderegottesdienste.ics", "Besondere Gottesdienste"),
            array ("https://termine.arche-augsburg.de/minitreff.ics", "Mini-Treff"),
            array ("https://termine.arche-augsburg.de/archeyouth.ics", "ARCHE YOUTH"),
            array ("https://termine.arche-augsburg.de/baueinsaetze.ics", "Baueinsätze"),
            array ("https://termine.arche-augsburg.de/gebet.ics", "Gebet"),
            array ("https://termine.arche-augsburg.de/archekids.ics", "ARCHE-KIDS"),
            array ("https://termine.arche-augsburg.de/jubi.ics", "JuBi"),
            array ("https://termine.arche-augsburg.de/sklasse.ics", "S-Klasse"),
            array ("https://termine.arche-augsburg.de/ferienfeiertage.ics", "Ferien und Feiertage"),
            array ("https://termine.arche-augsburg.de/veranstaltungen.ics", "Veranstaltungen"),
            array ("https://termine.arche-augsburg.de/kurseseminare.ics", "Kurse und Seminare"),
            array ("https://termine.arche-augsburg.de/royalrangers.ics", "Royal Rangers"),
            array ("https://termine.arche-augsburg.de/lobpreis.ics", "Lobpreisteam"),
            //array ("https://termine.arche-augsburg.de/gesamtkalender.ics",""),
        );
    ?>
    <div class="site-container">
        <?if ($isMobilePhone == true || $isTablet == true){?>
	        <div id="calendar-note">
    	        <strong>Hinweis:</strong> Diese Ansicht ist für große Displays optimiert. Um den Kalender in voller Breite anzuzeigen, 
    	        rufe diese Seite auf einem Laptop oder Desktop PC auf. <span class="note-close">schließen</span>
    	    </div>
    	 <?}?>
        <div class="calendar__menu">
            <div class="calendar__menu-container">
                <div class="calendar__menu-trigger"><i class="menu-icon fa fa-bars"></i> KALENDER-OPTIONEN</div>
            
                <div class="calendar__menu-overlay hide">
                    <div class="calendar__menu-table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="table__col-calendar">
                                        Kalender
                                    </th>
                                    <th class="table__col-show">
                                        zeigen
                                    </th>
                                    <th class="table__col-ical">
                                        Kalender abonnieren *
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach($calendarUrls as $key => $value)
                                    {
                                     echo '<tr><td class="cal'.$key.'">'.$value[1].'</td><td><label class="switch">
                                          <input type="checkbox" checked>
                                          <span class="slider round" data-cal="cal'.$key.'"></span>
                                        </label></td><td><span class="copy-to-clipboard" data-cal="copy-target-'.$key.'" data-msg="msg-target-'.$key.'">iCal Link kopieren</span><span id="copy-target-'.$key.'">'.$value[0].'</span><span id="msg-target-'.$key.'" class="message-target"></span></td></tr>';   
                                    }
                                ?>
                            </tbody>
                        </table>
                        <div class="cal-note">* <i class="fa fa-info-circle"></i> Um einen Kalender zu abonnieren, kopiere den entsprechenden Link
                            und füge ihn in deiner Kalender-Anwendung ein.</div>
                    </div>
                </div>
            </div>
        </div>
    	<div class="page">
        	<?php
        	    $urlString = "";
        	    foreach($calendarUrls as $key => $value)
        	    {
        	        $urlString .= $value[0]." ";
        	    }
        	    
                $shortcodeString = "[iCal ".$urlString." listtype=15 day_links=0 show_views=0 show_month_nav=1]";
                echo do_shortcode( $shortcodeString ); 
            ?>
        </div>
    </div>
    
    <script type="text/javascript" src="<?php echo (get_template_directory_uri().'/js/calendar.js');?>"></script>
</body>