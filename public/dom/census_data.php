<?php


// example of how to use basic selector to retrieve HTML contents
include('../simple_html_dom.php');
 
// // get DOM from URL or file
// $html = file_get_html('https://www12.statcan.gc.ca/census-recensement/2016/dp-pd/prof/details/page.cfm?Lang=E&Geo1=DA&Code1=48111327&Geo2=CSD&Code2=4811061&SearchText=T6R2B1&SearchType=Begins&SearchPR=01&B1=All&TABID=2&type=0');

// // find all div tags with id=gbar
// foreach($html->find('th#L2032') as $e)
//     echo $e->innertext . '<br>';

// // find all div tags with id=gbar
// foreach($html->find('th#L2032') as $e)
//     echo $e->next_sibling () . '<br>';

// get DOM from URL or file
$html = file_get_html('./a.html');

// print_r(simplexml_load_string(file_get_contents('./a.html')));

print_r($html->find('table'));

die;
// Average total income of economic families in 2015
foreach($html->find('th#L14017') as $e)
    echo $e->innertext . '<br>';
foreach($html->find('th#L14017') as $e)
    echo $e->next_sibling() . '<br>';

// With children in a census family
foreach($html->find('th#L6004') as $e)
    echo $e->innertext . '<br>';

foreach($html->find('th#L6004') as $e)
    echo $e->next_sibling () . '<br>';

// Median age of the population
foreach($html->find('th#L2033') as $e)
    echo $e->innertext . '<br>';

foreach($html->find('th#L2033') as $e)
    echo $e->next_sibling () . '<br>';

// Age distribution 

// Age groups and average age of the population - 100% data
foreach($html->find('th#L2000') as $e)
    echo $e->innertext . '<br>';

foreach($html->find('th#L2000') as $e)
    echo $e->next_sibling () . '<br>';

// Total - Highest certificate, diploma or degree for the population aged 25 to 64 years in private households - 25% sample data
foreach($html->find('th#L28015') as $e)
    echo $e->innertext . '<br>';

foreach($html->find('th#L28015') as $e)
    echo $e->next_sibling () . '<br>';

// No certificate, diploma or degree
foreach($html->find('th#L28016') as $e)
    echo $e->innertext . '<br>';

foreach($html->find('th#L28016') as $e)
    echo $e->next_sibling () . '<br>';

// Secondary (high) school diploma or equivalency certificate
foreach($html->find('th#L28017') as $e)
    echo $e->innertext . '<br>';

foreach($html->find('th#L28017') as $e)
    echo $e->next_sibling () . '<br>';

// Postsecondary certificate, diploma or degree
foreach($html->find('th#L28018') as $e)
    echo $e->innertext . '<br>';

foreach($html->find('th#L28018') as $e)
    echo $e->next_sibling () . '<br>';

// Apprenticeship or trades certificate or diploma
foreach($html->find('th#L28019') as $e)
    echo $e->innertext . '<br>';

foreach($html->find('th#L28019') as $e)
    echo $e->next_sibling () . '<br>';

// College, CEGEP or other non-university certificate or diploma
foreach($html->find('th#L28022') as $e)
    echo $e->innertext . '<br>';

foreach($html->find('th#L28022') as $e)
    echo $e->next_sibling () . '<br>';

// University certificate
// ?

// Bachelor's degree L28025
foreach($html->find('th#L28025') as $e)
    echo $e->innertext . '<br>';

foreach($html->find('th#L28025') as $e)
    echo $e->next_sibling () . '<br>';
?>