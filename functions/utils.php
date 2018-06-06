<?php
/**
 * Created by PhpStorm.
 * Date: 20/05/2018
 * Time: 14:05
 */
if (!defined('IN_SPYOGAME')) die("Hacking Attemp!");
const IS_RES = 0;
const IS_FLOTTE = 1;
const IS_DEF = 2;
const IS_BAT = 3;
const IS_TECH = 4;



function getDataRe($data,$columns)
{
    $retour = 0;
    foreach ($columns as $column)
    {
        if ($data[$column] != '-1')
        {
            $retour+= (int)$data[$column];
        }
    }
    return numbers($retour);
}

function getPillage($data)
{
    $columns = array("metal","cristal","deuterium");
    return getDataRe($data,$columns);
}

function getflotteColumn()
{
    $columns = array("PT","GT","CLE","CLO","CR","VB","VC","REC","SE","BMD","DST","EDLM","TRA");
    return $columns;
}

function getflotte($data)
{
    $columns = getflotteColumn();
    return getDataRe($data,$columns);
}

function getDefColumn()
{
    $columns = array("LM","LLE","LLO","CG","AI","LP","PB","GB");
    return $columns;
}

function getDef($data)
{
    $columns = getDefColumn();
    return getDataRe($data,$columns);
}

function visibility($data)
{
    $retour =IS_RES ;

}

function numbers($nb)
{
    return number_format( (int)$nb,0,',','.' );
}


function reIsMoon($data)
{
    $retour = false;
    //par defaut on fixe une planete : du coup pas besoin de gerer la planete
    //$tabIsPlanete = array("M","C","D","CES","CEF","SAT");
    $tabIsMoon = array("BaLu","Pha","PoSa");
   foreach ($tabIsMoon as $elemPlanet)
   {
       if ((int)$data[$elemPlanet] > 0)
       {
           $retour = true;
       }
   }
    return $retour;

}

function getGWithCoord($coord)
{
$tcoord = explode(":",$coord );
return $tcoord;
}

function reRowClean($tRow)
{
    $retour = array();
    foreach ($tRow as $k => $v)
    {
        $v= ($v =="-1") ? 0 : (int)$v;
        $v =  numbers( $v);
        $retour[$k]=$v;
    }
    return $retour;

}