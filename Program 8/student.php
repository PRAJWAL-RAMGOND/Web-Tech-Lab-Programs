<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cs110";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
 die("Connection failed: " . $conn->connect_error);
}
// Fetch student records
$sql = "SELECT id, name, age FROM students";
$result = $conn->query($sql);
$students = array();
if ($result->num_rows > 0) {
 while($row = $result->fetch_assoc()) {
 $students[] = $row;
 }
}
// Selection Sort function
function selectionSort(&$arr) {
 $n = count($arr);
 for ($i = 0; $i < $n - 1; $i++) {
 $minIndex = $i;
 for ($j = $i + 1; $j < $n; $j++) {
 if ($arr[$j]['id'] < $arr[$minIndex]['id']) {
 $minIndex = $j;
 }
 }
// Swap the minimum element with the first element
 if ($minIndex != $i) {
 $temp = $arr[$i];
 $arr[$i] = $arr[$minIndex];
 $arr[$minIndex] = $temp;
 }
 }
}
// Sort students by grade
selectionSort($students);
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Sorted Student Records</title>
 <style>
 body {
 font-family: Arial, sans-serif;
 margin: 20px;
 padding: 20px;
 background-color: #f4f4f415;
 }
 table {
 width: 100%;
 border-collapse: collapse;
 }
 table, th, td {
 border: 1px solid #dddddd31;
 }
 th, td {
 padding: 8px;
 text-align: left;
 }
 th {
 background-color: #f2f2f279;
 }
 </style>
</head>
<body>
 <h1>Sorted Student Records</h1>
 <table>
 <thead>
 <tr>
 <th>ID</th>
 <th>Name</th>
 <th>Age</th>
 </tr>
 </thead>
 <tbody>
 <?php foreach ($students as $student): ?>
 <tr>
 <td><?php echo htmlspecialchars($student['id']); ?></td>
 <td><?php echo htmlspecialchars($student['name']); ?></td>
 <td><?php echo htmlspecialchars($student['age']); ?></td>
</tr>
 <?php endforeach; ?>
 </tbody>
 </table>
</body>
</html>