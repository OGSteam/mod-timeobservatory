<?php
global $data;
$nb = 1;
?>
<div class="header">
    <h2>Time Observatory </h2>


</div>
<div class="header">
    <h3>Formulaire de recherche</h3>
    <p style="color: red">
        <strong>ATTENTION, Mod en developpement, version préliminaire! </strong><BR/>


    </p>
    <form method="post" action="#">
        <table>
            <tr>
                <td class="c" colspan="2">Galaxie</td>
                <td class="c" colspan="2">System</td>
                <td class="c" colspan="3">Recherche</td>
                <td class="c" colspan="2">Filtre</td>
                <td class="c" colspan="2"></td>

            </tr>
            <tr>
                <td class="c">
                    Min
                </td>
                <th>
                    <input type="text" maxlength="1" size="3" name="gmin" value="<?php echo $data["form"]["gmin"]; ?>"/>
                </th>
                <td class="c">
                    Min
                </td>
                <th>
                    <input type="text" maxlength="3" size="3" name="smin" value="<?php echo $data["form"]["smin"]; ?>"/>
                </th>
                <td class="c">
                    Joueur
                </td>
                <th>
                    <?php if ($data["form"]["isplayername"]): ?>
                        <input type="checkbox" name="isplayername" checked>
                    <?php else : ?>
                        <input type="checkbox" name="isplayername">
                    <?php endif; ?>
                </th>
                <th>
                    <?php if ($data["form"]["isplayername"]): ?>
                        <input type="text" size="30" name="playername"
                               value="<?php echo $data["form"]["playername"]; ?>"/>
                    <?php else : ?>
                        <input type="text" size="30" name="playername"/>
                    <?php endif; ?>
                </th>
                <td class="c">
                    Age RE (En jour)
                </td>
                <th>
                    <input type="input" size="3" name="dayre" value="<?php echo $data["form"]["dayre"]; ?>"/>
                </th>
                <td class="c">
                    Mes RE uniquement!
                </td>
                <th>
                    <input type="checkbox" name="isplayerre" <?php if ($data["form"]["isplayerre"]) {
                        echo " checked ";
                    } ?>>
                </th>
            </tr>
            <tr>
                <td class="c">
                    Max
                </td>
                <th>
                    <input type="text" maxlength="1" size="3" name="gmax" value="<?php echo $data["form"]["gmax"]; ?>"/>
                </th>
                <td class="c">
                    Max
                </td>
                <th>
                    <input type="text" maxlength="3" size="3" name="smax" value="<?php echo $data["form"]["smax"]; ?>"/>
                </th>

                <td class="c">
                    Alliance
                </td>
                <th>
                    <?php if ($data["form"]["isallyname"]): ?>
                        <input type="checkbox" name="isallyname" checked>
                    <?php else : ?>
                        <input type="checkbox" name="isallyname">
                    <?php endif; ?>
                </th>
                <th>
                    <?php if ($data["form"]["isallyname"]): ?>
                        <input type="text" size="30" name="allyname" value="<?php echo $data["form"]["allyname"]; ?>"/>
                    <?php else : ?>
                        <input type="text" size="30" name="allyname"/>
                    <?php endif; ?>
                </th>
                <td class="c">
                    Limite Réponse
                </td>
                <th>
                    <input type="text" size="3" name="limite" value="<?php echo $data["form"]["limite"]; ?>"/>
                </th>
                <th colspan="2">
                    <input type="submit" value="Envoyer"/>
                </th>
            </tr>
        </table>
</div>

<div>
    <h3>Résultat</h3>
    <table class="tableTimeobservatory">
        <theader>
            <tr>
                <th>

                </th>
                <th colspan="2">
                    coords
                </th>
                <th>
                    Acti
                </th>
                <th>
                    Date|Heure
                </th>
                <th>
                    Joueur
                </th>
                <th>
                    Alliance
                </th>

                <th>
                    Status
                </th>

                <th>
                    Pillage
                </th>
                <th>
                    Flotte
                </th>
                <th>
                    Defense
                </th>
                <th colspan="3">
                    Actions
                </th>

            </tr>
        </theader>
        <tbody>
        <?php foreach ($data["re"] as $row): ?>
            <tr class="idspy_<?php echo $row["id_spy"] ?> timeobstr" id_spy="<?php echo $row["id_spy"] ?>">
                <th>
                    <?php echo $nb; ?>
                    <?php $nb++; ?>
                </th>
                <td class="coord">
                    <?php echo $row["coordinates"]; ?>
                </td>
                <td>
                    <?php if (reIsMoon($row)): ?>
                        M
                    <?php else : ?>
                        P
                    <?php endif; ?>
                </td>
                <td class="acti">
                    <?php if ($row["activite"] == "0"): ?>

                    <?php else : ?>
                        <?php echo $row["activite"]; ?>
                    <?php endif; ?>

                </td>
                <?php $sincetime = time() - (int)$row["dateRE"]; ?>
                <td class="syncTimestamp" data="<?php echo $sincetime; ?>">

                </td>
                <td class="player">
                    <?php echo $row["player"]; ?>
                </td>
                <td class="ally">
                    <?php echo $row["ally"]; ?>
                </td>
                <td>
                    <?php echo $row["status"]; ?>
                </td>
                <td class="pillage">
                    <?php echo getPillage($row); ?>
                </td>
                <td class="flotte">
                    <?php echo getFlotte($row); ?>
                </td>
                <td class="def">
                    <?php echo getDef($row); ?>
                </td>
                <td class="img">
                    <img class="imgview" src="./mod/timeobservatory/img/voir.png"/>
                </td>
                <td class="img">
                    <img class="imghide" src="./mod/timeobservatory/img/hide.png"/>
                </td>
                <td class="img">
                    <img class="imgdelete" id_spy="<?php echo $row["id_spy"] ?>"
                         src="./mod/timeobservatory/img/delete.png"/>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>


    </table>
</div>

<div id="currentre" class="info infore">
        <span class="infocontent">
          info re
        </span>
</div>
<div id="currentraid" class="info inforaid" style="">
    <span class="infocontent">


    </span></div>
<?php foreach ($data["re"] as $row): ?>
<?php endforeach; ?>

<?php foreach ($data["re"] as $row): ?>
    <div id="infore_<?php echo $row["id_spy"] ?>" style="display: none;">
        <span class="infocontent">
          <table style="width:100%;">
              <tr>
                  <td colspan="4">
                      Ressources sur <?php echo $row["planet_name"]; ?> [<?php echo $row["coordinates"]; ?>
                      ] (joueur '<?php echo $row["player"]; ?>') <br/> le <?php echo $row["dateRE"]; ?>

                      <a href="#"
                         onclick="window.open('index.php?action=show_reportspy&amp;galaxy=<?php echo explode(":", $row["coordinates"])[0]; ?>&amp;system=<?php echo explode(":", $row["coordinates"])[1]; ?>&amp;row=<?php echo explode(":", $row["coordinates"])[2]; ?>','_blank','width=640, height=480, toolbar=0, location=0, directories=0, status=0, scrollbars=1, resizable=1, copyhistory=0, menuBar=0');return(false)">[Version Complete]</a>


                  </td>
              </tr>
             <tr>
                    <td class="l" colspan="4">Ressources</td>
                </tr>
               <tr>
                    <td>Métal:</td>
                    <th><?php echo $row["metal"] ?></th>
                    <td>Cristal:</td>
                    <th><?php echo $row["cristal"] ?></th>
                </tr>
                <tr>
                    <td>Deutérium:</td>
                    <th><?php echo $row["deuterium"] ?></th>
                    <td>Energie:</td>
                    <th><?php echo $row["energie"] ?></th>
                </tr>
                <tr>
                    <td class="l" colspan="4">flotte</td>
                </tr>
                <tr>
                    <td>PT:</td>
                    <th><?php echo $row["PT"] ?></th>
                    <td>GT:</td>
                    <th><?php echo $row["GT"] ?></th>
                </tr>
               <tr>
                    <td>CLE:</td>
                    <th><?php echo $row["CLE"] ?></th>
                    <td>CLO:</td>
                    <th><?php echo $row["CLO"] ?></th>
                </tr>
               <tr>
                    <td>CR:</td>
                    <th><?php echo $row["CR"] ?></th>
                    <td>VB:</td>
                    <th><?php echo $row["VB"] ?></th>
                </tr>
               <tr>
                    <td>VC:</td>
                    <th><?php echo $row["VC"] ?></th>
                    <td>REC:</td>
                    <th><?php echo $row["REC"] ?></th>
                </tr>
               <tr>
                    <td>SE:</td>
                    <th><?php echo $row["SE"] ?></th>
                    <td>Cristal:</td>
                    <th><?php echo $row["BMD"] ?></th>
                </tr>
                <tr>
                    <td>DST:</td>
                    <th><?php echo $row["DST"] ?></th>
                    <td>EDLM:</td>
                    <th><?php echo $row["EDLM"] ?></th>
                </tr>
              <tr>
                    <td>SAT:</td>
                    <th><?php echo $row["DST"] ?></th>
                    <td>TRA:</td>
                    <th><?php echo $row["EDLM"] ?></th>
                </tr>
                <tr>
                    <td>DST:</td>
                    <th><?php echo $row["DST"] ?></th>
                    <td>EDLM:</td>
                    <th><?php echo $row["EDLM"] ?></th>
                </tr>
                    <td class="l" colspan="4">Défense</td>
              </tr>
              <tr>
                    <td>Lanceur de missiles:</td>
                    <th><?php echo $row["LM"] ?></th>
                    <td>Artillerie laser légère:</td>
                    <th><?php echo $row["LLE"] ?></th>
               <tr>
                    <td>Artillerie laser lourde:</td>
                    <th><?php echo $row["LLO"] ?></th>
                    <td>Canon de Gauss:</td>
                    <th><?php echo $row["CG"] ?></th>
               <tr>
                    <td>Artillerie à ions:</td>
                    <th><?php echo $row["AI"] ?></th>
                    <td>Lanceur de plasma:</td>
                    <th><?php echo $row["LP"] ?></th>
               <tr>
                    <td>Petit bouclier :</td>
                    <th><?php echo $row["PB"] ?></th>
                    <td>Grand bouclier:</td>
                    <th><?php echo $row["GB"] ?></th>
               <tr>
                    <td>Missile interception:</td>
                    <th><?php echo $row["MIC"] ?></th>
                    <td>Missile interplanetaire:</td>
                    <th><?php echo $row["MIP"] ?></th>
                 <tr>
                 <tr>
                    <td class="l" colspan="4">Bâtiments</td>
                </tr>
                    <td>Mine de métal:</td>
                    <th><?php echo $row["M"] ?></th>
                    <td>Mine de cristal:</td>
                    <th><?php echo $row["C"] ?></th>
              </tr>
              <tr>
                    <td>Synthétiseur de deutérium:</td>
                    <th><?php echo $row["D"] ?></th>
                    <td>Activite:</td>
                    <th>
                        <?php if ($row["activite"] > 0) : ?>
                            <?php echo $row["activite"] ?>
                        <?php else : ?>
                            -
                        <?php endif; ?>

                    </th>
                </tr>

               <tr>
                    <td class="l" colspan="4">Recherche</td>
                </tr>
              <tr>


                    <td>Espionnage:</td>
                    <th><?php echo $row["Esp"] ?></th>
                    <td>Armes:</td>
                      <th><?php echo $row["Armes"] ?></th>
                </tr>
                <tr>

                    <td>Bouclier:</td>
                    <th><?php echo $row["Bouclier"] ?></th>
                    <td>Protection:</td>
                    <th><?php echo $row["Protection"] ?></th>
                 </tr>
                <tr>
                    <td>impulsion:</td>
                    <th><?php echo $row["RI"] ?></th>
                    <td>combustion:</td>
                    <th><?php echo $row["RC"] ?></th>
                </tr>
                <tr>
                    <td>Hyperespace:</td>
                    <th><?php echo $row["PH"] ?></th>
                    <td></td>
                    <th></th>
                </tr>

          </table>


    </div>
    <div id="inforaid_<?php echo $row["id_spy"] ?>" style="display: none;">
    <span class="infocontent">
        <h1>inforaid : <?php echo $row["player"]; ?></h1>
        <p>Content 1</p>
        <p>content 2 </p>

    </span></div>
<?php endforeach; ?>


<!--<p>Même si ton adversaire te semble une souris, surveille-le comme s'il était un lion</p>-->
