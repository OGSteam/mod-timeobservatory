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

function getREbyFilter($form)
{
    //$form["gmax"]= (isset($pub_gmax)) ? (int)$pub_gmax : 9;
    //$form["gmin"]= (isset($pub_gmin)) ? (int)$pub_gmin :1;
    //$form["smax"]= (isset($pub_smax)) ? (int)$pub_smax :499;
    //$form["smin"]= (isset($pub_smin)) ? (int)$pub_smin :1;
    //$form["dayre"]= (isset($pub_dayre)) ? (int)$pub_dayre :999;
    //$form["limite"]


    global $db, $user_data;
    $requete = "select * from " . TABLE_PARSEDSPY . "  ";
    $requete .= "LEFT JOIN " . TABLE_UNIVERSE. " ON coordinates =  concat(galaxy, ':', system, ':', row)   ";
    $requete .= "WHERE ";
    //coord
    $requete .= "`galaxy` >= ".$form["gmin"]." ";
    $requete .= " AND `galaxy` <= ".$form["gmax"]." ";
    $requete .= " AND `system` >= ".$form["smin"]." ";
    $requete .= " AND `system` <= ".$form["smax"]." ";
    //age
    $since = (int)(time() - $form["dayre"] * 24 * 60 * 60 );
    $requete .= " AND `dateRE` >  ".$since." ";
    ///mes re
    if ($form["isplayerre"])
    {
        $requete .= " AND `sender_id` =  ".$user_data['user_id']." ";
    }



    ///filtre playername
    if ($form["isplayername"])
    {
        $requete .= " AND `player` like '%".$form["playername"]."%' ";
    }
    ///filtre allyname
    if ($form["isallyname"])
    {
        $requete .= " AND `ally` like '%".$form["allyname"]."%' ";
    }

    $requete .= "  order by dateRE desc ";
    $requete .= "  LIMIT  ".$form["limite"]."  ";
    $tResult=array();
    $result = $db->sql_query($requete);

    while ($row = $db->sql_fetch_assoc($result)) {
        // filtre nombre
        if (($form["flottemin"] != 0) ||  ($form["flottemax"] != 0))
        {
            // il faut ne garder que les fltottes entre les deux
            $nbFlotte  = 0;

            $nbFlotte = ($row["PT"]=="-1") ? 0 : (int)$row["PT"];
            $nbFlotte += ($row["GT"]=="-1") ? 0 : (int)$row["GT"];
            $nbFlotte += ($row["CLE"]=="-1") ? 0 : (int)$row["CLE"];
            $nbFlotte += ($row["CLO"]=="-1" )? 0 : (int)$row["CLO"];
            $nbFlotte += ($row["CR"]=="-1") ? 0 : (int)$row["CR"];
            $nbFlotte += ($row["VC"]=="-1") ? 0 : (int)$row["VC"];
            $nbFlotte += ($row["REC"]=="-1") ? 0 : (int)$row["REC"];
            $nbFlotte += ($row["SE"]=="-1" )? 0 : (int)$row["SE"];
            $nbFlotte += ($row["BMD"]=="-1") ? 0 : (int)$row["BMD"];
            $nbFlotte += ($row["DST"]=="-1") ? 0 : (int)$row["DST"];
            $nbFlotte += ($row["EDLM"]=="-1") ? 0 : (int)$row["EDLM"];
            $nbFlotte += ($row["TRA"]=="-1") ? 0 : (int)$row["TRA"];

            if ($nbFlotte >= $form["flottemin"] && $nbFlotte <= $form["flottemax"] )
            {
                $tResult[] = $row;
            }



        }
        else
        {

            $tResult[] = $row;
        }


    }
        return $tResult;

}

