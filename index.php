<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="accueil.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <div class="page-background">
        <nav>
            <img src="Images/logo2.png"  class="logo">
            
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Personnal information</a></li>
                <li><a href="infractions.php">Infractions</a></li>
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
        <div class = "safety-container">
            <img src="Images/rule4.png" class="safety">
        </div>
        <div class ="text-container">
             <h1>Your Family Awaits, Drive Safely</h1>
        </div>
    </div>
    <div class="text-container2">
        <div class="Content">
            <h1 >Welcome <?php $input= $user_data['first_name'];
            $safe_input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
            echo $safe_input; ?></h1>
        </div>
    
        <p class="intro-paragraph">
            Driving safely is crucial for your well-being and the safety of others on the road. Adhering to traffic regulations, such as respecting traffic lights and signs, is essential to prevent accidents and ensure a smooth flow of traffic. Always be mindful of your speed, avoid distractions, and never drive under the influence. Here are some important tips to help you drive safely and responsibly.
        </p>
    
        <div class="safety-tips-section">
            <h2>Driving Safety Tips</h2>
            <div class="tip-block">
                <h3>+ Always Wear Your Seatbelt</h3>
                <p>Wearing a seatbelt significantly reduces the risk of injury or death in case of an accident.</p>
            </div>
            <div class="tip-block">
                <h3>+ Follow the Speed Limit</h3>
                <p>Speed limits are set for your safety. Always adhere to them to avoid accidents and fines.</p>
            </div>
            <div class="tip-block">
                <h3>+ Do Not Use Your Phone While Driving</h3>
                <p>Using your phone while driving distracts you and increases the risk of accidents. Use hands-free devices if necessary.</p>
            </div>
            <div class="tip-block">
                <h3>+ Avoid Driving Under the Influence of Alcohol or Drugs</h3>
                <p>Alcohol and drugs impair your ability to drive safely. Always have a designated driver if you plan to consume them.</p>
            </div>
            <div class="tip-block">
                <h3>+ Keep a Safe Distance from the Car in Front of You</h3>
                <p>Maintaining a safe distance gives you more time to react to sudden stops or changes in traffic.</p>
            </div>
            <div class="tip-block">
                <h3>+ Be Aware of Weather Conditions and Adjust Your Driving Accordingly</h3>
                <p>Weather conditions can affect road safety. Adjust your driving speed and be extra cautious in adverse weather.</p>
            </div>
            <div class="tip-block">
                <h3>+ Use Your Turn Signals to Indicate Your Intentions to Other Drivers</h3>
                <p>Signaling helps prevent accidents by informing other drivers of your intended actions.</p>
            </div>
            <div class="tip-block">
                <h3>+ Stay Focused and Avoid Distractions</h3>
                <p>Keep your attention on the road and avoid distractions such as eating, adjusting the radio, or talking excessively with passengers.</p>
            </div>
        </div>
    </div>


    <div class="footer">
        <div class="col-1">
            <div class="menu-title">
                <h3>MENU</h3>
            </div>
            <a>> Home</a>
            <a>> Personnal information</a>
            <a>> Infractions</a>
            <a>> About us</a>
            <a>> Support</a>
        </div>
        <div class="col-2">
            <h3>Newsletter</h3>
            <form >
                <input type="email" placeholder="Your email adress" >
            </form>
            <form>
                <button>Subscribe now</button>
            </form>
        </div>
        <div class="col-3">
            <h3>CONTACT SUPPORT & SOCAIL MEDIA</h3>
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