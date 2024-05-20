<?php
    session_start();
    
    require_once '../relation/database.php';

    $loggedIn= $_SESSION['loggedIn'] ?? false;

    try {
        // Prepare a SELECT statement
        $stmt = $pdo->prepare('SELECT * FROM voiture;');
        
        // Execute the statement
        $stmt->execute();
        
        // Fetch the results
        $carList = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($carList);
    } catch (PDOException $e) {
        echo "Query failed: " . $e->getMessage();
        exit();
    }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./carList.css">
    <link rel="stylesheet" href="./fontawesome-free-6.5.1-web/css/fontawesome.css">
    <link rel="stylesheet" href="./fontawesome-free-6.5.1-web/css/brands.css">
    <link rel="stylesheet" href="./fontawesome-free-6.5.1-web/css/solid.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arvo:wght@400;700&family=Krona+One&family=Poppins:wght@100;300;500&family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <title>CarList</title>
</head>

<body>
    <nav>
        <ul class="sidebar">
            <li onclick=hideSidebar()><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="26" viewBox="0 -960 960 960" width="26">
                        <path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z" />
                    </svg></a></li>
            <li><a href="../index.php">Home</a></li>
            <li><a href="#">Cars</a></li>
            <!-- <li><a href="#">Contacs Us</a></li> -->
            <!-- <li><a href="#">Register</a></li> -->
            <li><a href="../html/login.php">Login</a></li>
        </ul>

        <ul>
            <li><a href="#">C K E I</a></li>
            <li class="hideOnMobile"><a href="../index.php">Home</a></li>
            <li class="hideOnMobile"><a href="#">Cars</a></li>
            <li><a href="../index.php#aboutUs">About Us</a></li>
            <!-- <li class="hideOnMobile"><a href="#">Register</a></li> -->
            <?php if($loggedIn): ?>
                    <li class="hideOnMobile joinStyle"><a href="../html/login.php">Hello, <?=$_SESSION['user']['prenom'] ?></a></li>
                    <?php else: ?>
                        <li class="hideOnMobile joinStyle"><a href="../html/login.php">Join us</a></li>
                <?php endif ?>
            <li class="menu-button" onclick=showSidebar()><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="26" viewBox="0 -960 960 960" width="26">
                        <path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z" />
                    </svg></a></li>
        </ul>

    </nav>
    <header class="carListHeader">
        <h2 class="CarListHeaderTitle">List Of Vehicles</h2>
    </header>
    <!--CarDetails-->
    <?php foreach ($carList as $car) : ?>
    <div class="CarlistContainer">
      <!-- <div class="md my-4">
        <div class="rounded-lg shadow-md">
          <div class="p-4">
            <h2 class="text-xl font-semibold"><?= $post['title'] ?></h2>
            <p class="text-gray-700 text-lg mt-2"><?= $post['body'] ?></p>
          </div>
        </div>
      </div> -->
        <div class="carImg">
            <img src=<?= $car['picture'] ?>  alt="">
            <h4 class="carPrice"><?= $car['prix'] ?> <span style="font-size: 14px; color: #a2a2a2;">/day</span></h4>
        </div>
        <div class="carDetails">
            <h3 class="CarBrand"><?= $car['marque'] ?> <?= $car['model'] ?></h3>
            <p class="CarDescription">Discover unparalleled luxury and performance with the Range Rover. Designed to
                excel both on and off the road, this iconic SUV combines advanced technology with timeless elegance.
            </p>
            <div class="iconContainer">
                <div class="iconInfo">
                    <i class="fa-solid fa-gauge" style="color: #ED7F10; height: 24px; width:28px; "></i>
                    <p class="CarInfo"><?= $car['speed'] ?> km/h</p>
                </div>
                <div class="iconInfo">
                    <i class="fa-solid fa-route" style="color: #ED7F10; height: 24px; width:28px; "></i>
                    <p class="CarInfo"><?= $car['turbo'] ?> km</p>
                </div>
                <div class="iconInfo">
                    <i class="fa-solid fa-gears" style="color: #ED7F10; height: 24px; width:28px; "></i>
                    <p class="CarInfo"><?= $car['transmission'] ?></p>
                </div>
                <div class="iconInfo">
                    <i class="fa-solid fa-gas-pump" style="color: #ED7F10; height: 24px; width:28px; "></i>
                    <p class="CarInfo">PULP</p>
                </div>
            </div>
            <div class="buttonContainer">
                <button type="submit" class="button"><a href="../html/CarDetails.php?id=<?= $car['id'] ?>">Rent Car</a></button>
            </div>
        </div>
        
    </div>
    <?php endforeach; ?>
    <hr class="seperateLine">
    <!-- <div class="CarlistContainer">
        <div class="carImg">
            <img src="./Image/Range_Rover_-_New-removebg-preview.png" alt="">
            <h4 class="carPrice">100dt <span style="font-size: 14px; color: #a2a2a2;">/day</span></h4>
        </div>
        <div class="carDetails">
            <h3 class="CarBrand">Range Rover</h3>
            <p class="CarDescription">Discover unparalleled luxury and performance with the Range Rover. Designed to
                excel both on and off the road, this iconic SUV combines advanced technology with timeless elegance.
            </p>
            <div class="iconContainer">
                <div class="iconInfo">
                    <i class="fa-solid fa-gauge" style="color: #ED7F10; height: 24px; width:28px; "></i>
                    <p class="CarInfo">217 to 250 km/h</p>
                </div>
                <div class="iconInfo">
                    <i class="fa-solid fa-route" style="color: #ED7F10; height: 24px; width:28px; "></i>
                    <p class="CarInfo">100km</p>
                </div>
                <div class="iconInfo">
                    <i class="fa-solid fa-gears" style="color: #ED7F10; height: 24px; width:28px; "></i>
                    <p class="CarInfo">Manual</p>
                </div>
                <div class="iconInfo">
                    <i class="fa-solid fa-gas-pump" style="color: #ED7F10; height: 24px; width:28px; "></i>
                    <p class="CarInfo">PULP</p>
                </div>
            </div>
            <div class="buttonContainer">
                <button type="submit" class="button"><a href="#">Rent Car</a></button>
            </div>
        </div>
    </div>
    <hr class="seperateLine">
    <div class="CarlistContainer">
        <div class="carImg">
            <img src="./Image/Range_Rover_-_New-removebg-preview.png" alt="">
            <h4 class="carPrice">100dt <span style="font-size: 14px; color: #a2a2a2;">/day</span></h4>
        </div>
        <div class="carDetails">
            <h3 class="CarBrand">Range Rover</h3>
            <p class="CarDescription">Discover unparalleled luxury and performance with the Range Rover. Designed to
                excel both on and off the road, this iconic SUV combines advanced technology with timeless elegance.
            </p>
            <div class="iconContainer">
                <div class="iconInfo">
                    <i class="fa-solid fa-gauge" style="color: #ED7F10; height: 24px; width:28px; "></i>
                    <p class="CarInfo">217 to 250 km/h</p>
                </div>
                <div class="iconInfo">
                    <i class="fa-solid fa-route" style="color: #ED7F10; height: 24px; width:28px; "></i>
                    <p class="CarInfo">100km</p>
                </div>
                <div class="iconInfo">
                    <i class="fa-solid fa-gears" style="color: #ED7F10; height: 24px; width:28px; "></i>
                    <p class="CarInfo">Manual</p>
                </div>
                <div class="iconInfo">
                    <i class="fa-solid fa-gas-pump" style="color: #ED7F10; height: 24px; width:28px; "></i>
                    <p class="CarInfo">PULP</p>
                </div>
            </div>
            <div class="buttonContainer">
                <button type="submit" class="button"><a href="#">Rent Car</a></button>
            </div>
        </div>
    </div>
    <hr class="seperateLine">
    <div class="CarlistContainer">
        <div class="carImg">
            <img src="./Image/Range_Rover_-_New-removebg-preview.png" alt="">
            <h4 class="carPrice">100dt <span style="font-size: 14px; color: #a2a2a2;">/day</span></h4>
        </div>
        <div class="carDetails">
            <h3 class="CarBrand">Range Rover</h3>
            <p class="CarDescription">Discover unparalleled luxury and performance with the Range Rover. Designed to
                excel both on and off the road, this iconic SUV combines advanced technology with timeless elegance.
            </p>
            <div class="iconContainer">
                <div class="iconInfo">
                    <i class="fa-solid fa-gauge" style="color: #ED7F10; height: 24px; width:28px; "></i>
                    <p class="CarInfo">217 to 250 km/h</p>
                </div>
                <div class="iconInfo">
                    <i class="fa-solid fa-route" style="color: #ED7F10; height: 24px; width:28px; "></i>
                    <p class="CarInfo">100km</p>
                </div>
                <div class="iconInfo">
                    <i class="fa-solid fa-gears" style="color: #ED7F10; height: 24px; width:28px; "></i>
                    <p class="CarInfo">Manual</p>
                </div>
                <div class="iconInfo">
                    <i class="fa-solid fa-gas-pump" style="color: #ED7F10; height: 24px; width:28px; "></i>
                    <p class="CarInfo">PULP</p>
                </div>
            </div>
            <div class="buttonContainer">
                <button type="submit" class="button"><a href="#">Rent Car</a></button>
            </div>
        </div>
    </div> -->
    <!---End CarDetails-->

    <!--Footer-->
    <div class="footer">
        <div class="column1"><img src="./Image/[removal.ai]_d14459c6-e324-470d-96a3-ec08f3f4a5a5-wepik-modern-carepair-car-service-logo-20240406132152myht.png" alt="">
            <h3>CKEI Rental</h3>
        </div>
        <div class="column2"> <i class="fa-solid fa-location-dot" style="color: #ED7F10; height: 22px; width:24px;"></i>Level 1, Omran Residence <br>La petite Ariana </div>
        <div class="column3"><i class="fa-solid fa-phone-volume" style="color: #ED7F10; height: 22px; width:24px;"></i><b> +21692724386</b><br><br>
            <a href="mailto:mhatli.chaima94@gmail.com"><i class="fa-regular fa-envelope" style="color: #ED7F10; height: 22px; width:24px;"></i>CKEI.95@gmail.com</a>
        </div>
    </div>



    <!--EndFooter-->



</body>

<script src="./fontawesome-free-6.5.1-web/js/brands.js"></script>
<script src="./fontawesome-free-6.5.1-web/js/fontawesome.js"></script>
<script src="./fontawesome-free-6.5.1-web/js/solid.js"></script>

</html>