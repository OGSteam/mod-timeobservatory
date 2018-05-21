<?php
/**
 * Created by PhpStorm.
 * Date: 20/05/2018
 * Time: 08:25
 */
if (!defined('IN_SPYOGAME')) die("Hacking Attemp!");

function getAllRE()
{
    global $db;


    global $db;
    $requete = "select * from " . TABLE_PARSEDSPY . "  ";
    $requete .= "LEFT JOIN " . TABLE_UNIVERSE. " ON coordinates =  concat(galaxy, ':', system, ':', row)   ";
    $requete .= "  order by dateRE desc";
    $tResult=array();
    $result = $db->sql_query($requete);
    while ($row = $db->sql_fetch_assoc($result)) {
        $tResult[] = $row;
    }
    return $tResult;

}

