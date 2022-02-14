<?php
include("./partials/header.php");
include_once("./classes/project.classes.php");

$stud_id = $_SESSION["user"];
$pInfo = Project::getStudentProject($stud_id);
?>

<table>
  <tr>
    <th>თეზისის სახელი</th>
    <th>სტატუსი</th>
    <th>ქულა</th>
  </tr>

  <?php
  foreach ($pInfo as $value) {
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

<?php
if (!isset($_SESSION["fileUploaded"])) {
?>
  <form action="includes/upload.inc.php" method="post" enctype="multipart/form-data" class="upload-form" id="upload">
    აარჩიეთ ასატვირთი ფაილი:
    <input type="file" name="fileToUpload" id="fileToUpload" required>
    <input id="uploadBtn" type="submit" value="დასტური" name="submit">
  </form>
<?php
} else {
?>
  <form action="includes/upload.inc.php" method="post" enctype="multipart/form-data" class="upload-form" id="upload">
    თეზისი ჩაბარებულია შესაფასებლად!
    <input type="file" name="fileToUpload" id="fileToUpload" disabled>
    <input id="uploadBtn" type="submit" value="დასტური" name="submit" disabled>
  <?php
}

  ?>

  <?php include("./partials/footer.php"); ?>