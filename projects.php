<?php
include("./partials/header.php");
include_once("./classes/project.classes.php");
$projects = Project::getProjects();
?>

<h1>ინფორმაცია თეზისებსა და მათი სტატუსის შესახებ</h1>
<table>
    <tr>
        <th>N</th>
        <th>თეზისის სახელი</th>
        <th>სტატუსი</th>
        <th>ქულა</th>
    </tr>
    <?php
    foreach ($projects as $value) {
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

<?php include("./partials/footer.php"); ?>