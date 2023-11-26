<?php
session_start();
include('includes/header.php');

// $selectedRaffle to a default if not set
$selectedRaffle = isset($_SESSION['selected_raffle']) ? $_SESSION['selected_raffle'] : 1;
/*
// Check if logged
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
*/
// raffle selection
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action'])) {
    $selectedRaffle = $_POST['raffle'];

    if ($_POST['action'] == 'select_raffle') {
        // update the selected raffle
        $_SESSION['selected_raffle'] = $selectedRaffle;
    } elseif ($_POST['action'] == 'draw_winner') {
        // draw a winner for the selected raffle
        $sql = "SELECT * FROM participants WHERE raffleId = $selectedRaffle";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $participants = [];
            while ($row = $result->fetch_assoc()) {
                $participants[] = $row['username'];
            }

            // pick a random participant
            $winner = $participants[array_rand($participants)];

            $insertSql = "INSERT INTO winners (raffleId, winnerUsername) VALUES ($selectedRaffle, '$winner')";
            if($conn->query($insertSql) == TRUE)
            {
                echo "<h3>The winner of the $selectedRaffle raffle is: $winner</h3>";
            }
            else
            {
                echo "Error: ". $insertSql . "<br>" . $conn -> error;
            }

        } else 
        {
            echo "No participants found for the selected raffle.";
        }
    }
}
?>

<section id="banner">
    <div class="container">
        <div class="row">
                <p class="promo-title">Welcome to Jubanski's Raffle Website!</p>
                <div class="row-banner">
                <p>Explore our exciting raffles and get a chance to win amazing prizes.</p>
                <a href="welcome.php"><img src="images/event-ticket.png" class="ticktes-btn">Buy Ticktes</a>
            </div>
        </div>
    </div>

    <img src="images/wave1.png" class="bottom-img">

</section>


<section id="services">
    <div class="container text-center">
        <h1 class="title">OUR FEATURES</h1>
    <div class="row text-center">
        <div class="col-md-4 services">
            <img src="images/raffle1.png" class="service-img">
            <h4>Create a Raffle</h4>
            <p>Create your own raffle will be a new feature on the future.</p>
        </div>
        <div class="col-md-4 services">
            <img src="images/raffle3.png" class="service-img">
            <h4>Add your participants</h4>
            <p>Add as many participants as you need.</p>
        </div>
        <div class="col-md-4 services">
            <img src="images/raffle2.png" class="service-img">
            <h4>Check the winner</h4>
            <p>Creck the Winner and leave it displayed for everybody to see it.</p>
        </div>
    </div>
    </div>
</section>



<script>
    function submitForm(action) {
        document.getElementById('action').value = action;
        document.getElementById('raffleForm').submit();
        event.preventDefault();
    }

    window.onload = function () {
        <?php if (isset($_SESSION['username'])) : ?>
            document.getElementById('drawWinner').removeAttribute('disabled');
        <?php else : ?>
            document.getElementById('drawWinner').setAttribute('disabled', 'disabled');
        <?php endif; ?>
    };

</script>




<section id="draw-winner" class="text-center py-5">
    <div class="container">
        <h1 class="title">RAFFLE DRAWING</h1>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="post" id="raffleForm" class="mb-3">
                    <div class="mb-3">
                        <label for="raffle">Select Raffle:</label>
                        <select name="raffle" required>
                            <option value="1" <?php echo ($selectedRaffle == 1) ? 'selected' : ''; ?>>Raffle 1</option>
                            <option value="2" <?php echo ($selectedRaffle == 2) ? 'selected' : ''; ?>>Raffle 2</option>
                        </select>
                    </div>
                    <input type="hidden" name="action" id="action" value="">
                    <input type="button" onclick="submitForm('select_raffle')" value="Select Raffle" class='btn btn-primary mr-2'>
                    <input id="drawWinner" type="button" onclick="submitForm('draw_winner')" value="Draw Winner" class='btn btn-primary'>
                </form>
            </div>
        </div>
    </div>
</section>


<section id="social-media">
    <div class="container text-center">
        <p>FIND US ON SOCIAL MEDIA</p>
        <div class="social-icons">
                <a href="https://www.facebook.com/"><img src="images/facebook.png"></a>
                <a href="https://www.instagram.com/"><img src="images/instagram.png"></a>
                <a href="https://www.linkedin.com/"><img src="images/linkedin.png"></a>
                <a href="https://twitter.com/"><img src="images/twitter.png"></a>
                <a href="https://www.whatsapp.com/"><img src="images/whatsapp.png"></a>
            </div>
    </div>
</section>
            
    
<?php
    include 'includes/footer.php';
?>