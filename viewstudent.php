
<?php

include 'connect.php';

/* =========================================
   SEARCH student
========================================= */

$search = "";

if (isset($_GET['search'])) {

    $search = mysqli_real_escape_string(
        $db_con,
        $_GET['search']
    );

}


/* =========================================
   CUSTOMER QUERY
========================================= */

if ($search != "") {

    $sql = mysqli_query(
        $db_con,
        "SELECT * FROM students
         WHERE name LIKE '%$search%'
		   OR age LIKE '%$search%'
		    OR class LIKE '%$search%'
         OR address LIKE '%$search%'
         OR email LIKE '%$search%'"
    );

} else {

    $sql = mysqli_query(
        $db_con,
        "SELECT * FROM students"
    );

}

?>


<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>AL-AMIN ACADEMY | Students</title>

    <link rel="stylesheet"
          href="css/style.css">

</head>


<body>


<!-- =========================================
     HEADER
========================================= -->

<header class="navbar">

    <div class="logo">

        <span>AL-AMIN ACADEMY</span>

    </div>


    <nav>

        <a href="index.php">
            Home
        </a>


        <a href="viewstudent.php"
           class="add-student-btn">

            Student

        </a>


        <a href="viewprincipal.php">
            principal
        </a>


        <a href="viewteacher.php">
            teacher
        </a>


        <a href="#"
           class="logout">

            Logout

        </a>

    </nav>

</header>



<!-- =========================================
     CUSTOMER SECTION
========================================= -->

<main class="customer-page">


    <div class="customer-header">

        <div>

            <h1>school Management</h1>

            <p>
                View and manage school student records.
            </p>

        </div>


        <a href="createstudent.php"
           class="add-student-btn">

            + Add student

        </a>

    </div>



    <!-- =====================================
         SEARCH
    ====================================== -->

    <div class="student-search">

        <form method="GET"
              action="viewstudent.php">

            <input
                type="text"
                name="search"
                placeholder="Search student by name, age, address,class or email..."
                value="<?php echo htmlentities($search); ?>"
            >


            <button type="submit">
                Search
            </button>


            <?php if ($search != "") { ?>

                <a href="viewstudent.php"
                   class="clear-search">

                    Clear

                </a>

            <?php } ?>

        </form>

    </div>



    <!-- =====================================
         CUSTOMER TABLE
    ====================================== -->

    <div class="customer-table-card">


        <!-- CUSTOMER LIST HEADER -->

        <div class="table-title">

            <h2>
                student List
            </h2>


            <a href="exportcustomer.php<?php
                echo ($search != "")
                    ? '?search=' . urlencode($search)
                    : '';
            ?>"
               class="export-excel-btn">

                ðŸ“Š Export Excel

            </a>

        </div>


        <?php if ($search != "") { ?>

            <p class="search-result-text">

                Search results for:

                <strong>
                    <?php echo htmlentities($search); ?>
                </strong>

            </p>

        <?php } ?>


        <div class="table-responsive">

            <table class="customer-table">

                <thead>

                    <tr>

                        <th>#</th>

                        <th>Name</th>

                        <th>Age</th>
						
						 <th>class</th>

                        <th>Address</th>

                        <th>email</th>

                        <th>Action</th>

                    </tr>

                </thead>


                <tbody>


                <?php

                $cnt = 1;

                if (mysqli_num_rows($sql) > 0) {

                    while ($row = mysqli_fetch_array($sql)) {

                ?>


                    <tr>

                        <td>

                            <?php echo $cnt; ?>

                        </td>


                        <td class="Student-name">

                            <?php

                            echo htmlentities(
                                $row['name']
                            );

                            ?>

                        </td>


                        <td>

                            <?php

                            echo htmlentities(
                                $row['age']
                            );

                            ?>

                        </td>


                        <td>

                            <?php

                            echo htmlentities(
                                $row['class']
                            );

                            ?>

                        </td>


                        <td class="balance">

                            â‚¦<?php

                            echo htmlentities(
                                $row['address']
                            );

                            ?>

                        </td>


                        <td class="balance">

                            â‚¦<?php

                            echo htmlentities(
                                $row['email']
                           );

                            ?>

                        </td>


                        <td>

                            <div class="action-buttons">


                                <a
                                    href="editstudent.php?id=<?php echo $row['id']; ?>"
                                    class="edit-btn"
                                >

                                    Edit

                                </a>


                                <a
                                    href="deletestudent.php?id=<?php echo $row['id']; ?>"
                                    class="delete-btn"
                                    onclick="return confirm('Are you sure you want to delete this student?');"
                                >

                                    Delete

                                </a>


                            </div>

                        </td>

                    </tr>

                <?php

                        $cnt++;

                    }

                } else {

                ?>


                    <tr>

                        <td
                            colspan="6"
                            class="no-customer"
                        >

                            No students records found.

                        </td>

                    </tr>


                <?php } ?>


                </tbody>

            </table>

        </div>

    </div>


</main>



<!-- =========================================
     FOOTER
========================================= -->

<footer>

    <p>

        &copy; 2026 AL-AMIN Management System

    </p>

</footer>


</body>

</html>
