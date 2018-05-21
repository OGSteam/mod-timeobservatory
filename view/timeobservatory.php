<?php
global $data;
$nb = 1;
?>
    <table class="timeobservatory">
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
                <td>
                    <?php echo $row["coordinates"]; ?>
                </td>
                <td>
                    <?php if(reIsMoon($row)):?>
                        M
                    <?php else : ?>
                        P
                    <?php endif ; ?>
                </td>
                <td>
                    <?php if ($row["activite"] == "0"): ?>
                        -
                    <?php else : ?>
                        <?php echo $row["activite"]; ?>
                    <?php endif; ?>

                </td>
                <?php $sincetime = time() - (int)$row["dateRE"]; ?>
                <td class="syncTimestamp" data="<?php echo $sincetime; ?>">

                </td>
                <td>
                    <?php echo $row["player"]; ?>
                </td>
                <td>
                    <?php echo $row["ally"]; ?>
                </td>
                <td>
                    <?php echo $row["status"]; ?>
                </td>
                <td>
                    <?php echo getPillage($row); ?>
                </td>
                <td>
                    <?php echo getFlotte($row); ?>
                </td>
                <td>
                    <?php echo getDef($row); ?>
                </td>

            </tr>
        <?php endforeach; ?>
        </tbody>


    </table>
