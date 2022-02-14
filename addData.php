<?php
include("./partials/header.php");

include("./classes/project.classes.php");
include("./classes/user.classes.php");

$avProjects = Project::availableProjects();
$avStudents = User::availableStudents();


$prNPoints = Project::getPrNoPoints();
$stNPoints = User::getStNoPoints();

?>

<div class="form-container">

    <!-- თეზისის დამატება -->
    <div class="add-p-form">
        <form action="includes/addProject.inc.php" method="POST">
            <h3>თეზისის დამატება</h3>
            <label for="pname"></label>
            <input type="text" name="pname" placeholder="თეზისის სახელი" id="name" required>

            <input type="submit" name="submit" value="დამატება">

        </form>

        <form action="includes/setProject.inc.php" method="POST">
            <h3>თეზისის მინიჭება</h3>
            <select id="p_name" name="p_name">
                <option value="" disabled selected>თეზისი</option>
                <?php
                foreach ($avProjects as $value) {
                ?>
                    <option value="<?= $value["pr_name"] ?>"><?php echo $value["pr_name"] ?></option>
                <?php

                }
                ?>
            </select>

            <select id="st_name" name="st_id">
                <option value="" disabled selected>სტუდენტი</option>
                <?php
                foreach ($avStudents as $value) {
                ?>
                    <option value="<?= $value["id"] ?>"><?php echo $value["name"] . " " . $value["surname"] ?></option>
                <?php

                }
                ?>
            </select>

            <input type="submit" name="submit" value="მინიჭება">

        </form>
    </div>

    <!-- Points -->
    <div class="points">
        <form action="includes/points.inc.php" method="POST">
            <h3>შეფასება</h3>
            <select id="p_name" name="p_name">
                <option value="" disabled selected>თეზისი</option>
                <?php
                foreach ($prNPoints as $value) {
                ?>
                    <option value="<?= $value["pr_name"] ?>"><?php echo $value["pr_name"] ?></option>
                <?php

                }
                ?>
            </select>

            <select id="st_name" name="st_id">
                <option value="" disabled selected>სტუდენტი</option>
                <?php
                foreach ($stNPoints as $value) {
                ?>
                    <option value="<?= $value["id"] ?>"><?php echo $value["name"] . " " . $value["surname"] ?></option>
                <?php

                }
                ?>
            </select>

            <input type="number" id="points" name="points" min="0" max="100" placeholder="შეიყვანეთ ქულა">
            <input type="submit" name="submit" value="დასტური">
        </form>
    </div>

    <!-- სტუდენტის დამატება -->
    <div class="add-st-form">
        <form action="includes/user.inc.php" method="POST">
            <h3>სტუდენტის დამატება</h3>
            <label for="fname"></label>
            <input type="text" name="fname" placeholder="სახელი" id="fname">

            <label for="lname"></label>
            <input type="text" name="lname" placeholder="გვარი" id="lname">

            <label for="gender"></label>
            <select id="gender" name="gender">
                <option value="" disabled selected>სქესი</option>
                <option value="მდედრობითი">მდედრობითი</option>
                <option value="მამრობითი">მამრობითი</option>
            </select>

            <label for="id_n"></label>
            <input type="text" name="id_n" placeholder="პირადი ნომერი" id="id_n">

            <label for="b_day"></label>
            <input type="date" name="b_day" id="b_day">

            <label for="mobile"></label>
            <input type="text" name="mobile" placeholder="საკონტაქტო ნომერი" id="mobile">

            <label for="address"></label>
            <input type="text" name="address" placeholder="მისამართი" id="address">

            <input type="submit" name="submit" value="დამატება">

        </form>
    </div>
</div>

<a href="./includes/logout.inc.php" class="logout-btn">გამოსვლა</a>

<?php include("./partials/footer.php"); ?>