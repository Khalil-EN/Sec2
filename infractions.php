<?php
session_start();
require 'connection.php';
require 'functions.php';

$user_data=check_login($con);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Infractions</title>
    <link rel="stylesheet" href="infractions.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <div class="page-background">
        <nav>
            <img src="Images/logo2.png" class="logo">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="#">Personal information</a></li>
                <li><a href="#">Infractions</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Support</a></li>
                <div class="dropdown">
                    <button onclick="myFunction()" class="dropbtn">Settings</button>
                    <div id="myDropdown" class="dropdown-content">
                      <a href="settings.html">Update account</a>
                      <a href="logout.php">Logout</a>
                      <a href="delete.php">Delete account</a>
                    </div>
                </div>
            </ul>
        </nav>
    </div>
    <div class="Test">
        <div class="safety-container">
            <img src="Images/rule4.png" class="safety">
        </div>
        <div class="text-container">
            <h1>Your Family Awaits, Drive Safely</h1>
        </div>
    </div>

    <div class="infractions-section">
        <div class="infractions-container">
            <h2>Infractions</h2>
            <p>List of traffic infractions and penalties:</p>
            <table class="infractions-table">
                <thead>
                    <tr>
                        <th>Infraction</th>
                        <th>Fine</th>
                        <th>Due Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $id=$user_data['id'];

                    $query = "SELECT * FROM infractions JOIN users2 on infractions.rfidtag=users2.rfidtag WHERE `id` = '$id'";
                    $result = mysqli_query($con, $query);

                    if ($result && mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>Traffic Violation " . htmlspecialchars($row['id_infraction']) . "</td>";
                            echo "<td>$30</td>"; // Assuming a fixed fine for simplicity
                            echo "<td>" . htmlspecialchars($row['date_paiement']) . "</td>";
                            echo "<td>" . ($row['status'] == 0 ? 'Unpaid' : 'Paid') . "</td>";
                            echo "<td>";
                            if ($row['status'] == 0) {
                                echo "<button onclick=\"location.href='payment_page.php?id=" . $row['id_infraction'] . "'\">Pay Now</button>";
                            } else {
                                echo "<button disabled>Paid</button>";
                            }
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>No infractions found</td></tr>";
                    }

                    mysqli_close($con);
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="footer">
        <div class="col-1">
            <div class="menu-title">
                <h3>MENU</h3>
            </div>
            <a href="accueil.html">Home</a>
            <a href="#">Personal information</a>
            <a href="#">Infractions</a>
            <a href="#">About us</a>
            <a href="#">Support</a>
        </div>
        <div class="col-2">
            <h3>Newsletter</h3>
            <form>
                <input type="email" placeholder="Your email address">
            </form>
            <form>
                <button>Subscribe now</button>
            </form>
        </div>
        <div class="col-3">
            <h3>CONTACT SUPPORT & SOCIAL MEDIA</h3>
            <p>contact@narsa.gov.ma</p>
            <div class="social-icons">
                <i class="fab fa-facebook"></i>
                <i class="fab fa-instagram"></i>
                <i class="fas fa-times"></i>
                <i class="fas fa-hippo"></i>
            </div>
        </div>
    </div>
    <script>
        /* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
    function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
    }

    // Close the dropdown menu if the user clicks outside of it
    window.onclick = function(event) {
        if (!event.target.matches('.dropbtn')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        } 
    }
    </script>
</body>
</html>