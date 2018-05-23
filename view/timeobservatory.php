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
        <strong>ATTENTION, Mod en developpement, version préliminaire! </strong><BR />
        les recherches par joueur /alliance et filtre "mes re uniquement " Non implémentées

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
            <td class="c" >
                Min
            </td>
            <th >
                <input type="text" maxlength="1" size="3" name="gmin" value="<?php echo $data["form"]["gmin"];?>" />
            </th>
            <td class="c" >
                Min
            </td>
            <th>
                <input type="text"  maxlength="3" size="3" name="smin" value="<?php echo $data["form"]["smin"];?>"/>
            </th>
            <td class="c" >
                Joueur
            </td>
            <th >
                <input type="checkbox"  name="isplayername">
            </th>

            <th>
                <input type="text"   size="30" name="playername" />
            </th>
            <td class="c" >
                Age RE (En jour)
            </td>
            <th >
                <input type="input"  size="3"  name="dayre" value="<?php echo $data["form"]["dayre"];?>"  />
            </th>
            <td class="c" >
                Mes RE uniquement!
            </td>
            <th >
                <input type="checkbox"  name="isplayerre">
            </th>
        </tr>
        <tr>
            <td class="c" >
                Max
            </td>
            <th >
                <input type="text"  maxlength="1" size="3" name="gmax" value="<?php echo $data["form"]["gmax"];?>"/>
            </th>
            <td class="c" >
                Max
            </td>
            <th>
                <input type="text" maxlength="3" size="3" name="smax" value="<?php echo $data["form"]["smax"];?>"/>
            </th>

            <td class="c" >
                Alliance
            </td>
            <th >
                <input type="checkbox"  name="isallyname">
            </th>
            <th>
                <input type="text"   size="30" name="allyname" />
            </th>
            <td class="c" >
                Limite Réponse
            </td>
            <th >
                <input type="text" size="3" name="limite" value="<?php echo $data["form"]["limite"];?>" />
            </th>
            <th colspan="2">
                <input type="submit" value="Envoyer" />
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
                    age
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
                    pillage
                </th>
                <th>
                    flotte
                </th>
                <th>
                    defense
                </th>

            </tr>
        </theader>
        <tbody>
        <?php foreach ($data["re"] as $row): ?>
            <tr>
                <th>
                    <?php echo $nb; ?>
                    <?php $nb++; ?>
                </th>
                <td class="coord">
                    <?php echo $row["coordinates"]; ?>
                </td>
                <td>
                    <?php if(reIsMoon($row)):?>
                        M
                    <?php else : ?>
                        P
                    <?php endif ; ?>
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

            </tr>
        <?php endforeach; ?>
        </tbody>


    </table>
</div>



<!--<p>Même si ton adversaire te semble une souris, surveille-le comme s'il était un lion</p>-->
