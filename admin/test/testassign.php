<table border="1">
        <tr>
            <th>Name</th>
            <th>No IC</th>
            <th>Phone Number</th>
            <th>Staff</th>
        </tr>
<?php
    $conn = mysqli_connect("localhost", "root", "", "test") or die("Connection Failed");
    $query = "SELECT s.*, c.name FROM customer c, staff s WHERE s.sid=c.name";
    $result = mysqli_query($conn, $query);
    while($row = mysqli_fetch_assoc($result)){
        ?>
            <tr>
                <td><?php echo $row['custname']?></td>
                <td><?php echo $row['custic']?></td>
                <td><?php echo $row['custphone']?></td>
                <td><?php echo $row['staff_name']?></td>
            </tr>
        <?php
    }
?>
