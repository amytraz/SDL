<!DOCTYPE html>
<html>
<head>
  <title>Toll Entry</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
  <h2>Toll Tax Entry</h2>
  <form action="submit.php" method="POST">
    <label>Vehicle Number:</label>
    <input type="text" name="vehicle_number" 
           required 
           pattern="[A-Z]{2}\d{2}[A-Z]{2}\d{4}" 
           title="Enter in format: MH12CE2024 (no spaces, all caps)">

    <label>Vehicle Type:</label>
    <select name="vehicle_type" required>
      <option value="">--Select Type--</option>
      <option value="Bike">Bike</option>
      <option value="Car">Car</option>
      <option value="Truck">Truck</option>
    </select>

    <input type="submit" value="Submit Toll">
  </form>
  <br>
  <a href="view.php">View Toll Records</a>
</div>
</body>
</html>
