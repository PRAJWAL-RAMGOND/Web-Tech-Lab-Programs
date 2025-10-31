<?php
$visitorCountFile = 'visitorCount.txt';

if (!file_exists($visitorCountFile)) {
    $count = 1;
    file_put_contents($visitorCountFile, $count);
} else {
    $count = (int)file_get_contents($visitorCountFile);
    $count++;
    file_put_contents($visitorCountFile, $count);
}
?>
<html>
<head>
    <title>Visitor Counter</title>
    <style>
        body {
            background-color: black;
            color: white;
            font-family: "Lucida Console", "Courier New", monospace;
        }
        .container {
            display: flex;
            width: 100%;
        }
        .box {
            border: 1px solid cyan;
            width: 50%;
            border-radius: 20px;
            border-width: 5px;
            background-color: royalblue;
            margin: auto;
            padding: 20px;
            text-align: center;
        }
        h1, h2 {
            font-family: "Lucida Console", "Courier New", monospace;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="box">
            <h1>Welcome to Our Website</h1>
            <h2>Visitor Count: <?php echo $count; ?></h2>
        </div>
    </div>
</body>
</html> 