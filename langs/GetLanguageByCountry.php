<?php
require __DIR__ . '/SxGeo.php';
$SxGeo = new SxGeo(__DIR__ . '/SxGeo.dat');

function getLanguageByCountry($ip)
{
  global $SxGeo;
  $ru_countries = ['RU', 'UA', 'BY', 'KZ'];

  if ( in_array($SxGeo->getCountry($ip), $ru_countries) ) {
    return 'ru';
  }

  return 'en';
}
