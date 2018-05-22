<?php
global $data;
$nb = 1;
?>
<div class="header">
    <h2>Time Observatory </h2>

</div>
<div>



</div>
<div>
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
        <?php foreach ($data as $row): ?>
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
