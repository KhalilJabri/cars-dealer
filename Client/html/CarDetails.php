<?php
session_start();

require_once '../relation/database.php';

$loggedIn = $_SESSION['loggedIn'] ?? false;

$isRentRequest = ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['_method'] ?? '') === 'rent');

if ($loggedIn) {
    if ($isRentRequest) {
      $id = $_POST['id'];
    
      $sql = 'INSERT INTO reservation (date_pick, date_drop, price, id_cli, id_voiture) values(date_pick = :date_pick, )';
    
      $stmt = $pdo->prepare($sql);
    
      $params = ['id' => $id];
    
      $stmt->execute($params);
    
      header('Location: ../CarList/carList.php');
    }
    header('Location: ./login.php');
    exit;
}


// Get id from query string
$id = $_GET['id'] ?? null;

// If id is null, redirect to index.php
if (!$id) {
    header('Location: ../CarList/carList.php');
    exit;
}

// SELECT statement with placeholder for id
$sql = 'SELECT * FROM voiture WHERE id = :id';

// Prepare the SELECT statement
$stmt = $pdo->prepare($sql);

// Params for prepared statement
$params = ['id' => $id];

// Execute the statement
$stmt->execute($params);

// Fetch the post from the database
$carDetail = $stmt->fetch();

// Fetch the post from the database
// $carDetail = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$carDetail) {
    // No rows found, redirect to carList
    header('Location: ../CarList/carList.php');
    exit();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CKEI</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Dancing+Script:wght@400..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/CarDetails.css">
    <script src="../js/CarDetails.js"></script>

</head>

<body>
    <header>
        <nav>
            <ul class="sidebar">
                <li onclick=hideSidebar()><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="26" viewBox="0 -960 960 960" width="26">
                            <path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z" />
                        </svg></a></li>
                <li><a href="../index.php">Home</a></li>
                <li><a href="#">Cars</a></li>
                <li><a href="../index.php#aboutUs">About Us</a></li>
                <?php if ($loggedIn) : ?>
                    <li class="hideOnMobile joinStyle"><a href="./login.php">Hello, <?= $_SESSION['user']['prenom'] ?></a></li>
                <?php else : ?>
                    <li class="hideOnMobile joinStyle"><a href="./login.php">Join us</a></li>
                <?php endif ?>
            </ul>

            <ul>
                <li><a href="#">C K E I</a></li>
                <li class="hideOnMobile"><a href="../index.php">Home</a></li>
                <li class="hideOnMobile"><a href="#">Cars</a></li>
                <li class="hideOnMobile"><a href="../index.php#aboutUs">About Us</a></li>
                <?php if ($loggedIn) : ?>
                    <li class="hideOnMobile joinStyle"><a href="./login.php">Hello, <?= $_SESSION['user']['prenom'] ?></a></li>
                <?php else : ?>
                    <li class="hideOnMobile joinStyle"><a href="./login.php">Join us</a></li>
                <?php endif ?>
                <li class="menu-button" onclick=showSidebar()><a href="#"><svg class="svgIcon" xmlns="http://www.w3.org/2000/svg" height="26" viewBox="0 -960 960 960" width="26">
                            <path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z" />
                        </svg></a></li>
            </ul>

        </nav>
    </header>

    <section>
        <div class="carContainer">
            <div class="firstObject">
                <div class="nameCarContainer">
                    <p id="nameCar"><?= $carDetail['marque'] ?> <?= $carDetail['model'] ?></p>

                </div>
                <div class="details">
                    <div class="imageContainer">
                        <img src=<?= $carDetail['picture'] ?> alt="car_Image" id="mainImage" />
                    </div>
                    <div class="moreDetails">
                        <div class="descContainer">
                            <p>Discover unparalleled luxury and performance with the Range Rover. Designed to excel both on and off the road, this iconic SUV combines advanced technology with timeless elegance.</p>
                        </div>
                        <div class="optionsContainer">
                            <div class="firstContainer">
                                <div class="option">
                                    <img src="../image/compteur-de-vitesse.png" />
                                    <p class="vitesseValue"><?= $carDetail['speed'] ?> Km/h</p>
                                </div>
                                <div class="option">
                                    <img src="../image/moteur-turbo.png" />
                                    <p class="turboValue"><?= $carDetail['turbo'] ?> KM</p>
                                </div>
                            </div>
                            <div class="secondContainer">
                                <div class="option">
                                    <img src="../image/manual-transmission.png" />
                                    <p class="transmissionValue"><?= $carDetail['transmission'] ?></p>
                                </div>
                                <div class="option">
                                    <img src="../image/gas-station.png" />
                                    <p class="gasValue"><?= $carDetail['gas'] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="information">
                <img src="../image/check.png" />
                <p>Instant Confirmation: This vehicule is available for renting now!</p>
            </div>
            <div class="secondObject">
                <div class="rentDetails">
                    <p>Rental Details</p>
                </div>
                <div class="dateTime">
                    <div class="startDate">
                        <label for="dateDebut" style="padding-bottom: 10px">pick-up date</label>
                        <input onblur=changePickUpDate() class="input-date" type="datetime-local" id="datePicker" name="dateDropOff" />
                    </div>
                    <div class="endDate">
                        <label for="dateDebut" style="padding-bottom: 10px">deposit date</label>
                        <input onblur=changeDepositDate() class="input-date" type="datetime-local" id="dateDeposit" name="dateDropOff" />
                    </div>
                </div>
            </div>
        </div>

        <div class="reservationForm">
            <div class="titlePrice">
                <p>Price Summary</p>
            </div>

            <div class="timeDetails">
                <div class="timePickUp">
                    <p class="timeTitle">pick-up</p>
                    <p id="timeTitlePickUp">March 11, 2024 at 8:30 AM</p>
                </div>
                <div class="timeDropOff">
                    <p class="timeTitle">drop-off</p>
                    <p id="timeTitleDropOff">March 31, 2024 at 8:30 AM</p>
                </div>
            </div>


            <hr class="xx" style="margin:30px auto 0;">
            <div>
                <div class="priceContainer">
                    <p class="priceLabel">Total Amount</p>
                    <p id="totalPrice"><?= $carDetail['prix'] ?> DT</p>
                </div>

                <form action="CarDetails.php" method="post">
                <div class="btnContainer">
                    <!-- <div class="btn">
                        <p>Book Now</p>
                    </div> -->
                        <input type="hidden" name="_method" value="rent">
                        <!-- <input type="hidden" name="id" value="<?= $carDetail['id'] ?>"> -->
                        <button type="submit" name="submit" style="cursor: pointer;background-color: #fd6435;border: 0px white; color: white;">Book Now</button>
                    </div>
                </form>

            </div>
        </div>

    </section>

</body>

</html>