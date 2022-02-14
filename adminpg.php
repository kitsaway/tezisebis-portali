<?php
include_once("./classes/user.classes.php");
$fetchedData = User::getUsers();
?>

<h1>ინფორმაცია სტუდენტებსა და მათი სტატუსის შესახებ</h1>
<table>
    <tr>
        <th>N</th>
        <th>პირადი ნომერი</th>
        <th>სახელი</th>
        <th>გვარი</th>
        <th>სტატუსი</th>
    </tr>

    <?php
    foreach ($fetchedData as $value) {
    ?>
        <tr>
            <?php
            foreach ($value as $key => $data) {
            ?>
                <td><?php echo $data ?></td>
            <?php
            }

            ?>
        </tr>
    <?php
    }
    ?>
</table>