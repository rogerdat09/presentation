<!DOCTYPE html>
<html>
<head>
    <title>Celebrity Match Generator</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="page-wrapper">

    <div class="card">
        <h1 class="main-title">Celebrity Match Generator</h1>

        <form action="process.php" method="POST">
            
            <label>What traits or personality do you like?</label>
            <input type="text" name="trait" placeholder="funny, romantic, athletic..." required>

            <label>Select your Gender</label>
            <select name="gender" required>
                <option value="">-- Choose --</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>

            <button type="submit">Find My Ideal Match 💘</button>
        </form>
    </div>

</div>

</body>
</html>