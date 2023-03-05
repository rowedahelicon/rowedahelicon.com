<?php

$tz  = new DateTimeZone('America/New_York');
$age = DateTime::createFromFormat('d/m/Y', '12/06/1992', $tz)->diff(new DateTime('now', $tz))->y;

$GLOBALS['nav']['About'] = "About";
$GLOBALS['config']['title'] = "About the Crux";