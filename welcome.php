<?php
session_start();
include('includes/header.php');

// $selectedRaffle to a default if not set
$selectedRaffle = isset($_SESSION['selected_raffle']) ? $_SESSION['selected_raffle'] : 1;

if (isset($_GET['registration']) && $_GET['registration'] === 'success') 
{
    echo "Registration successful!";
}

// check if logged
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// raffle selection
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['raffle'])) {
    $selectedRaffle = $_POST['raffle'];

    // store raffle in the session
    $_SESSION['selected_raffle'] = $selectedRaffle;
}

// participant registration
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username'])) {
    $participantName = $_POST['username'];

    // selected raffle
    $selectedRaffle = $_SESSION['selected_raffle'];

    // insert participant to database
    $sql = "INSERT INTO participants (username, raffleId) VALUES ('$participantName', $selectedRaffle)";
    $result = $conn->query($sql);

    if ($result) {
        //echo "Registration successful!";
        header("Location: welcome.php?registration=success");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    exit();
}
?>


<h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <table class="table">
                <thead>
                    <tr>
                        <th>Raffle Selection</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><p>Select a raffle to participate in.</p></tr>
                    <tr>
                        <td>
                            <form id="raffleForm" class="mb-3">
                                <div class="mb-3">
                                    <label for="raffle">Select Raffle:</label>
                                    <select name="raffle" required>
                                        <option value="1">Raffle 1</option>
                                        <option value="2">Raffle 2</option>
                                    </select>
                                </div>
                                <input type="submit" value="Select Raffle" class="btn btn-primary">  
                            </form>
                        </td>
                        
                    </tr>
                </tbody>
            </table>        
            

<?php
    // Display the raffle registration form if a raffle is selected
    if (isset($_SESSION['selected_raffle'])) {
        echo "<h3>Register for Raffle {$_SESSION['selected_raffle']}</h3>";
        echo "<form method='post'>";
        echo "<div class='mb-3'>";
        echo "Participant Name: <input type='text' name='username' class='form-control' required>";
        echo "</div>";
        echo "<input type='submit' value='Register' class='btn btn-primary'>";
        echo "</form>";
        echo "<br>";
    }
?>

        </div>
    </div>
</div>

<script>
        $(document).ready(function() {
            // Handle the AJAX request for raffle selection
            $('#raffleForm').submit(function() {
                var selectedRaffle = $('select[name="raffle"]').val();

                // Sending the data
                $.ajax({
                    type: 'POST',
                    url: 'welcome.php',
                    data: { raffle: selectedRaffle },
                    success: function(response) {
                        console.log(response);
                        location.reload(true);
                    },
                    error: function(error) {
                        console.error(error);
                    }
                });

                return false; // Prevent the form from submitting traditionally
            });
        });
</script>


<?php
    include 'includes/footer.php';
?>