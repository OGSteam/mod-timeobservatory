<?php
/**
 * Created by PhpStorm.
 * Date: 20/05/2018
 * Time: 14:05
 */
if (!defined('IN_SPYOGAME')) die("Hacking Attemp!");
const IS_RES = 0; // on ne voit rien (retouce uniquement )
const IS_FLOTTE = 1; // ress + flotte
const IS_DEF = 2; // ress + flotte + def
const IS_BAT = 3;// ress + flotte + def + bat
const IS_TECH = 4;// on ne voit tout


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


function getTechnoColumn()
{
    $columns = array("Esp","Ordi","Armes","Bouclier","Protection","Protection","NRJ","Hyp","RC","RI","PH","Laser","Ions","Plasma","RRI","Graviton","Astrophysique");
    return $columns;
}

function getBatColumn()
{
    $columns = array("M","C","D","CES","CEF","UdR","NRJ","UdN","CSp","HM","PH","HC","HD","Lab","Ter","DdR","Silo","BaLu","Pha","PoSa");
    return $columns;
}


function getDef($data)
{
    $columns = getDefColumn();
    return getDataRe($data,$columns);
}

function visibility($data)
{
    $retour =IS_RES ; // par defaut
    // techno
    $column =  getTechnoColumn();
    if(isNotEmpty($data, $column))
    {
        return IS_TECH;
    }
    $column =  getBatColumn();
    if(isNotEmpty($data, $column))
    {
        return IS_BAT;
    }
    $column =  getDefColumn();
    if(isNotEmpty($data, $column))
    {
        return IS_DEF;
    }
    $column =  getflotteColumn();
    if(isNotEmpty($data, $column))
    {
        return IS_FLOTTE;
    }


    return $retour;
}

function isNotEmpty($data, $column)
{
    $retour = false;
    foreach ($column as $item)
    {
        if ((int)$data[$item] > 0)
        {
            return true;
        }
    }
    return $retour;
}



function numbers($nb)
{
    return number_format( (int)$nb,0,',','.' );
}


function reIsMoon($data)
{
 // si construction uniquement sur lune
        $tabIsMoon = array("BaLu","Pha","PoSa");
    foreach ($tabIsMoon as $elemPlanet)
    {
        if ((int)$data[$elemPlanet] > 0)
        {
            return true;
        }
    }
    // si construction uniquement sur planete
    $tabIsPlanete = array("M","C","D","CES","CEF","SAT");
      foreach ($tabIsPlanete as $elemPlanet)
    {
        if ((int)$data[$elemPlanet] > 0)
        {
            return false;
        }
    }
    // si pas de lune dans le ss
    if ($data["moon"] == "0")
    {
        return false;
    }

   // verification sur la concordance nom planete et nom dans ss
    if ($data["planet_name"] == $data["name"])
    {
        return false;

    }
    else
    {
        return true;
    }

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