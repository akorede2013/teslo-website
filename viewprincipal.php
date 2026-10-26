
<?php

include 'connect.php';

/* =========================================
   SEARCH CUSTOMER
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
        "SELECT * FROM principal
         WHERE name LIKE '%$search%'
		   OR age LIKE '%$search%'
		     OR address LIKE '%$search%'
         OR position LIKE '%$search%'"
    );

} else {

    $sql = mysqli_query(
        $db_con,
        "SELECT * FROM principal"
    );

}

?>


<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>AL-AMIN ACADEMY | Principal</title>

    <link rel="stylesheet"
          href="css/style.css">

</head>


<body>


<!-- =========================================
     HEADER
========================================= -->

<header class="navbar">

    <div class="logo">

        <span>AL-AMIN</span>ACADEMY

    </div>


    <nav>

        <a href="index.php">
            Home
        </a>


        <a href="viewprincipal.php"
           class="add-customer-btn">

            principal

        </a>


        <a href="viewstudent.php">
            students
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

            <h1>principal Management</h1>

            <p>
                View and manage AL-AMIN principal records.
            </p>

        </div>


        <a href="createprincipal.php"
           class="add-principal-btn">

            + Add principal

        </a>

    </div>



    <!-- =====================================
         SEARCH
    ====================================== -->

    <div class="principal-search">

        <form method="GET"
              action="viewprincipal.php">

            <input
                type="text"
                name="search"
                placeholder="Search principal by name, age, address or position..."
                value="<?php echo htmlentities($search); ?>"
            >


            <button type="submit">
                Search
            </button>


            <?php if ($search != "") { ?>

                <a href="viewprincipal.php"
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
               Principal List
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
						
						 <th>address</th>

                        <th>position</th>

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
                                $row['address']
                            );

                            ?>

                        </td>


                        <td class="position">

                            â‚¦<?php

                            echo htmlentities(
                                $row['position']
                           );

                            ?>

                        </td>


                        <td>

                            <div class="action-buttons">


                                <a
                                    href="editprincipal.php?id=<?php echo $row['id']; ?>"
                                    class="edit-btn"
                                >

                                    Edit

                                </a>


                                <a
                                    href="deleteprincipal.php?id=<?php echo $row['id']; ?>"
                                    class="delete-btn"
                                    onclick="return confirm('Are you sure you want to delete this principal?');"
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

                            No principal records found.

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
