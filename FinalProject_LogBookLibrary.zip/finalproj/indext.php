<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['studentname']) && !isset($_POST['editEntry'])) {
        $studentname = htmlspecialchars($_POST["studentname"]);
        $id = htmlspecialchars($_POST["id"]);
        $timein = htmlspecialchars($_POST["timein"]);
        $purpose = htmlspecialchars($_POST["purpose"]);
        $type = htmlspecialchars($_POST["type"]);

        $validStudentname = "student123";
        $validId = "id123";

        if ($studentname == $validStudentname && $id == $validId) {
            echo "Logbook successful! $studentname.";
        } else {
            echo "Logbook successful! $studentname ";
        }

        $file = fopen("info_data.txt", "a");
        if ($file) {
            $line = "$studentname, $id, $timein, $purpose, $type\n";
            fwrite($file, $line);
            fclose($file);
        } else {
            echo "Error opening file!";
        }
    }

    if (isset($_POST['delete'])) {
        $deleteIndex = intval($_POST['deleteIndex']);
        $lines = file("info_data.txt", FILE_IGNORE_NEW_LINES);
        if (isset($lines[$deleteIndex])) {
            unset($lines[$deleteIndex]);
            file_put_contents("info_data.txt", implode("\n", $lines) . "\n");
        }
    }

    if (isset($_POST['editEntry'])) {
        $editIndex = intval($_POST['editIndex']);
        $newStudentname = htmlspecialchars($_POST["newStudentname"]);
        $newId = htmlspecialchars($_POST["newId"]);
        $newTimein = htmlspecialchars($_POST["newTimein"]);
        $newPurpose = htmlspecialchars($_POST["newPurpose"]);
        $newType = htmlspecialchars($_POST["newType"]);

        $lines = file("info_data.txt", FILE_IGNORE_NEW_LINES);
        if (isset($lines[$editIndex])) {
            $lines[$editIndex] = "$newStudentname, $newId, $newTimein, $newPurpose, $newType";
            file_put_contents("info_data.txt", implode("\n", $lines) . "\n");
        }
    }
}

$searchQuery = "";
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['search'])) {
    $searchQuery = trim(htmlspecialchars($_GET['search']));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGBOOK LIBRARY</title>
    <link rel="stylesheet" href='design.css'/>
    <style>
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            padding-top: 60px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.4);
        }
        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="outer-container">
        <div class="container">
            <div class="col">
                <img src="dorsulogo.jpg" alt="Dorsu Logo">
            </div>
            <div class="col">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                    <h2>LOGBOOK LIBRARY</h2>
                    <label for="studentname">Name:</label>
                    <input type="text" id="studentname" name="studentname" required>
                    <label for="id">ID:</label>
                    <input type="text" id="id" name="id" required>
                    <label for="timein">Date:</label>
                    <input type="text" id="timein" name="timein" required>
                    <label for="purpose">Time:</label>
                    <input type="text" id="purpose" name="purpose" required>
                    <label for="type">Type:</label>
                    <input type="text" id="type" name="type" required>
                    <input type="submit" value="Submit">
                </form>
            </div>
        </div>
    </div>
    <div class="outer-container">
        <div class="container">
            <div class="col2">
                <div class="row">
                    <h3>Logbook Library Entries</h3>
                    <form method="get" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                        <input type="text" name="search" value="<?php echo htmlspecialchars($searchQuery); ?>" placeholder="Search...">
                        <input type="submit" value="Search">
                    </form> 
                </div>
                <div class="row">
                <?php
                $file2 = fopen("info_data.txt", "r");
                if ($file2) {
                    echo "<table>";
                    echo "<tr><th>Name</th><th>ID</th><th>Date</th><th>Time</th><th>Type</th><th>Actions</th></tr>";

                    $index = 0;
                    while (($line = fgets($file2)) !== false) {
                        $parts = array_map('trim', explode(",", $line));
                        if (count($parts) == 5) {
                            if ($searchQuery === "" || stripos($line, $searchQuery) !== false) {
                                echo "<tr>";
                                foreach ($parts as $part) {
                                    echo "<td>" . htmlspecialchars($part) . "</td>";
                                }
                                echo "<td>
                                        <form method='post' action='" . htmlspecialchars($_SERVER['PHP_SELF']) . "' style='display:inline;'>
                                            <input type='hidden' name='deleteIndex' value='$index'>
                                            <input type='submit' name='delete' value='Delete'>
                                        </form>
                                        <button onclick=\"document.getElementById('editModal$index').style.display='block'\">Edit</button>
                                      </td>";
                                echo "</tr>";

                                echo "<div id='editModal$index' class='modal'>
                                        <div class='modal-content'>
                                            <span class='close' onclick=\"document.getElementById('editModal$index').style.display='none'\">&times;</span>
                                            <form method='post' action='" . htmlspecialchars($_SERVER['PHP_SELF']) . "'>
                                                <input type='hidden' name='editIndex' value='$index'>
                                                <label for='newStudentname'>Name:</label>
                                                <input type='text' name='newStudentname' value='" . htmlspecialchars($parts[0]) . "' required><br>
                                                <label for='newId'>ID:</label>
                                                <input type='text' name='newId' value='" . htmlspecialchars($parts[1]) . "' required><br>
                                                <label for='newTimein'>Date:</label>
                                                <input type='text' name='newTimein' value='" . htmlspecialchars($parts[2]) . "' required><br>
                                                <label for='newPurpose'>Time:</label>
                                                <input type='text' name='newPurpose' value='" . htmlspecialchars($parts[3]) . "' required><br>
                                                <label for='newType'>Type:</label>
                                                <input type='text' name='newType' value='" . htmlspecialchars($parts[4]) . "' required><br>
                                                <input type='submit' name='editEntry' value='Save'>
                                            </form>
                                        </div>
                                      </div>";
                            }
                        }
                        $index++;
                    }
                    echo "</table>";
                    fclose($file2);
                } else {
                    echo "Error reading file!";
                }
                ?>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        var modals = document.getElementsByClassName('modal');
        var closeButtons = document.getElementsByClassName('close');

        for (var i = 0; i < closeButtons.length; i++) {
            closeButtons[i].onclick = function() {
                var modal = this.parentElement.parentElement;
                modal.style.display = "none";
            }
        }

        window.onclick = function(event) {
            if (event.target.classList.contains('modal')) {
                event.target.style.display = "none";
            }
        }
    </script>
</body>
</html>
