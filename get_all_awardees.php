<?php
require("dbconn.php");

try {
    $queryGetAllAwardees = "SELECT * FROM `academic_awardees`"; // Replace with your table name
    $awardees = mysqli_query($conn, $queryGetAllAwardees);
    
    ?>
    <style>
    /* Zebra striping for table rows */
    .awardees-table tbody tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    /* Style for table headers */
    .awardees-table th {
        background-color: #333;
        color: white;
        text-align: center;
        padding: 10px; /* Add padding to header cells */
    }

    /* Hover effect for table rows */
    .awardees-table tbody tr:hover {
        background-color: #ddd;
    }

    /* Add a subtle box shadow to the table */
    .awardees-table {
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        border-radius: 5px; /* Add rounded corners to the table */
        margin-top: 20px;
    }
</style>

    <?php if(mysqli_num_rows($awardees) == 0) { ?>
        <p>No academic awardees found</p>
    <?php } else { ?>
        <div class="table-responsive">
            <table class='table table-bordered table-striped awardees-table'>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>MI</th>
                        <th>Department</th>
                        <th>Year/Course</th>
                        <th>LG</th>
                        <th>GWA</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $i = 0;
                while ($row = mysqli_fetch_assoc($awardees)) {
                    $i++;
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row['lname']; ?></td>
                        <td><?php echo $row['fname']; ?></td>
                        <td><?php echo $row['minitial']; ?></td>
                        <td><?php echo $row['department']; ?></td>
                        <td><?php echo $row['yr_course']; ?></td>
                        <td><?php echo $row['lg']; ?></td>
                        <td><?php echo $row['gwa']; ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    <?php }
} catch (\Throwable $th) {
    echo $th->getMessage(); // Display the error message
}
?>
