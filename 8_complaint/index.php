<!DOCTYPE html>
<html>
<head>
  <title>Complaint Form</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f1f4f9;
      padding: 40px;
    }

    h2 {
      text-align: center;
      color: #333;
    }

    form {
      background-color: #fff;
      padding: 25px 30px;
      max-width: 500px;
      margin: 0 auto;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    label {
      display: block;
      margin: 15px 0 5px;
      font-weight: bold;
    }

    input[type="text"],
    input[type="email"],
    textarea {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 6px;
    }

    input[type="submit"] {
      margin-top: 20px;
      padding: 12px;
      width: 100%;
      background-color: #007bff;
      color: #fff;
      border: none;
      border-radius: 6px;
      font-size: 16px;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #0056b3;
    }

    a {
      display: block;
      text-align: center;
      margin-top: 15px;
      color: #007bff;
      text-decoration: none;
    }

    .error {
      color: red;
      font-size: 14px;
    }
  </style>
</head>
<body>
  <h2>Submit Your Complaint</h2>
  <form action="submit.php" method="POST" onsubmit="return validateForm()">
    <label>Name:</label>
    <input type="text" name="name" required pattern="[A-Za-z\s]+" title="Only alphabets and spaces allowed">

    <label>Email:</label>
    <input type="email" name="email" required>

    <label>Subject:</label>
    <input type="text" name="subject" pattern="[A-Za-z\s]+" title="Only alphabets and spaces allowed">

    <label>Complaint:</label>
    <textarea name="message" rows="4" required id="complaintField"></textarea>
    <div class="error" id="errorMsg"></div>

    <input type="submit" value="Submit Complaint">
  </form>
  <a href="view.php">View Complaints</a>

  <script>
    function validateForm() {
      const complaint = document.getElementById("complaintField").value.trim();
      const errorMsg = document.getElementById("errorMsg");
      const alphabetRegex = /^[A-Za-z\s]+$/;

      if (!alphabetRegex.test(complaint)) {
        errorMsg.textContent = "Complaint should contain only alphabets and spaces!";
        return false;
      }

      errorMsg.textContent = "";
      return true;
    }
  </script>
</body>
</html>
