<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
            padding: 20px;
        }
        .box {
            padding: 20px;
            border: 2px solid #FFFFFF; /* White border */
            color: white;
            min-height: 100px; /* Or any other height */
        }
        /* Individual background color for each box */
        .box1 { background-color: #8A564B; }
        .box2 { background-color: #7B7D8D; }
        .box3 { background-color: #4E4E4E; }
        .box4 { background-color: #646F4B; }
        .box5 { background-color: #A55194; }
        .box6 { background-color: #7B7D8D; }
        /* Add other styles here as needed */
    </style>
</head>
<body>

<h1>Exam Data</h1>
<div class="container">
    <?php
        // Function to fetch data from the API
        function fetchData() {
            $url = "https://demotrade.efintradeplus.com/ExamAPI/examdata";
            $response = file_get_contents($url);
            $data = json_decode($response, true);

            // Loop through the data and create HTML elements
            foreach ($data as $key => $value) {
                $boxNumber = substr($key, -1); // Extract the last character for box number
                $textAfterNumber = substr($value, strpos($value, " ") + 1); // Extract text after the number
                $boxClass = "box box" . $boxNumber; // Assign class for individual box styling

                // Output the box with specific class for styling
                echo "<div class='{$boxClass}'>";
                echo "<h2>ช่องที่ {$boxNumber}</h2>";
                echo "<p>{$textAfterNumber}</p>"; // Display the text after the number
                echo "</div>";
            }
        }

        // Call the fetchData function
        fetchData();
    ?>
</div>

</body>
</html>