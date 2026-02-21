<?php
$traitInput = strtolower($_POST['trait']);
$gender = $_POST['gender'];

/* Convert input into array (allows multiple traits like funny, smart) */
$userTraits = array_map('trim', explode(",", $traitInput));

/* =========================
   MALE CELEBRITIES (5)
   ========================= */
$males = [

    "Benhard Awanon" => [
        "keywords" => ["hardworking","determined","responsible","ambitious","focused"],
        "description" => "Hardworking, determined, and always focused on success.",
        "image" => "images/benhard.jpg"
    ],

    "Jipre Baluyot" => [
        "keywords" => ["stylish","fashionable","charming","elegant","trendy"],
        "description" => "Stylish, elegant, and always turning heads.",
        "image" => "images/jipre.jpg"
    ],

    "Junsoy Love Jun" => [
        "keywords" => ["romantic","love","sweet","affectionate"],
        "description" => "A true romantic who believes deeply in love.",
        "image" => "images/junsoy.jpg"
    ],

    "Ala Wa Balo" => [
        "keywords" => ["funny","humorous","witty","jokes","playful"],
        "description" => "Witty, humorous, and always making people laugh.",
        "image" => "images/wabalo.jpg"
    ],

    "Justine Nabunturan" => [
        "keywords" => ["athletic","sports","fit","strong"],
        "description" => "Competitive, athletic, and driven.",
        "image" => "images/nabunturan.jpg"
    ]
];


/* =========================
   FEMALE CELEBRITIES (5)
   ========================= */
$females = [

    "Jupiter Dionaldo" => [
        "keywords" => ["witty","humorous","funny","clever","playful"],
        "description" => "Witty, humorous, and always keeping people laughing.",
        "image" => "images/jupeta.jpg"
    ],

    "Mima Otlum" => [
        "keywords" => ["well-spoken","articulate","knowledgeable","eloquent","creative"],
        "description" => "Well-spoken, articulate, and impressively creative.",
        "image" => "images/otlum.jpg"
    ],

    "Kap Niño Barzaga" => [
        "keywords" => ["sexy","charming","alluring","confident","bold"],
        "description" => "Sexy, charming, and naturally captivating.",
        "image" => "images/kap.jpg"
    ],

    "Tomboy na nag-iiscramble" => [
        "keywords" => ["strong","independent","athletic","bold","confident"],
        "description" => "Strong, independent, and always ready for action.",
        "image" => "images/scrambol.jpg"
    ],

    "Diwata" => [
        "keywords" => ["business-minded","entrepreneurial","strategic","focused","leader"],
        "description" => "Business-minded, strategic, and always thinking ahead.",
        "image" => "images/diwata.jpg"
    ]
];


/* =========================
   SELECT OPPOSITE GENDER
   ========================= */
if ($gender == "male") {
    $targetGroup = $females;
} else {
    $targetGroup = $males;
}


/* =========================
   MATCHING SYSTEM
   ========================= */
$bestMatch = null;
$highestScore = 0;

foreach ($targetGroup as $name => $info) {
    $score = 0;

    foreach ($userTraits as $trait) {
        foreach ($info['keywords'] as $keyword) {
            if (strpos($trait, $keyword) !== false) {
                $score++;
            }
        }
    }

    if ($score > $highestScore) {
        $highestScore = $score;
        $bestMatch = $name;
    }
}

/* If no keyword matched, pick random */
if ($bestMatch == null) {
    $bestMatch = array_rand($targetGroup);
}

$description = $targetGroup[$bestMatch]['description'];
$image = $targetGroup[$bestMatch]['image'];

/* Compatibility Percentage */
$compatibility = rand(75, 100);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Your Match</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>Your Ideal Match Is:</h1>

    <h2><?php echo $bestMatch; ?></h2>

    <img src="<?php echo $image; ?>" class="celebrity-img">

    <p><?php echo $description; ?></p>

    <h3>Compatibility: <?php echo $compatibility; ?>%</h3>

    <p><strong>Traits You Like:</strong> <?php echo htmlspecialchars($traitInput); ?></p>
    <p><strong>Your Gender:</strong> <?php echo ucfirst($gender); ?></p>

    <a href="index.php" class="btn">Try Again</a>
</div>

</body>
</html>