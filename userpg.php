
<fieldset>
    <legend>სტუდენტის პერსონალური ინფორმაცია</legend>
    <label>სახელი, გვარი: <?php echo $user['name'];?></label>
    <label>პირადი ნომერი: <?php echo $user['surname'];?></label>
    <label>დაბადების თარიღი: <?php echo $user['date_of_birth'];?></label>
    <label>სქესი: <?php echo $user['gender'];?></label>
</fieldset>

<fieldset>
    <legend>სტუდენტის საკონტაქტო ინფორმაცია</legend>
    <label>ფაქტიური მისამართი: <?php echo $user['address'];?></label>
    <label>რეგისტრაციის მისამართი: <?php echo $user['address'];?></label>
    <label>მობილური: <?php echo $user['mobile'];?></label>
</fieldset>

<a href="./includes/logout.inc.php" class="logout-btn">გამოსვლა</a>