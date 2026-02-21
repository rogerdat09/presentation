<!DOCTYPE html>
<html>
<head>
    <title>Celebrity Match Generator</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>Celebrity Match Generator</h1>

    <form action="process.php" method="POST">
        
        <label>Enter the traits or personality you like:</label><br>
        <input type="text" name="trait" placeholder="e.g. funny, romantic, athletic" required><br><br>

        <label>Select your Gender:</label><br>
        <select name="gender" required>
            <option value="">-- Select Gender --</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select><br><br>

        <input type="submit" value="Find My Ideal Match">
    </form>
</div>

</body>
</html>