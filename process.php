<?php

if (!isset($_POST['trait']) || !isset($_POST['gender'])) {
    header("Location: index.php");
    exit();
}

$traitInput = trim($_POST['trait']);
$gender = $_POST['gender'];

if (!preg_match("/^[A-Za-z\s,-]+$/", $traitInput)) {
    header("Location: index.php?error=Only letters, spaces, comma, and dash allowed.");
    exit();
}

$traitInput = strtolower($traitInput);
$userTraits = array_map('trim', explode(",", $traitInput));

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

$targetGroup = ($gender == "male") ? $females : $males;

$bestMatch = null;
$highestScore = 0;

foreach ($targetGroup as $name => $info) {
    $score = 0;
    foreach ($userTraits as $trait) {
        foreach ($info['keywords'] as $keyword) {
            if (strpos($trait, $keyword) !== false) $score++;
        }
    }
    if ($score > $highestScore) {
        $highestScore = $score;
        $bestMatch = $name;
    }
}

if ($bestMatch == null) {
    $bestMatch = array_rand($targetGroup);
}

$description = $targetGroup[$bestMatch]['description'];
$image = $targetGroup[$bestMatch]['image'];
$compatibility = rand(75, 100);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Your Match</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="result-wrapper">

    <h1 class="main-title">Your Ideal Match</h1>

    <div class="result-card">

        <div class="result-image">
            <img src="<?php echo $image; ?>" class="celebrity-img">
        </div>

        <div class="result-info">
            <h2><?php echo $bestMatch; ?></h2>
            <div class="compatibility">Compatibility: <?php echo $compatibility; ?>%</div>
            <div class="description"><?php echo $description; ?></div>

            <div class="traits">
                <?php 
                    foreach ($userTraits as $trait) {
                        $cleanTrait = htmlspecialchars(trim($trait));
                        if(!empty($cleanTrait)) echo "<span>$cleanTrait</span>";
                    }
                ?>
            </div>

            <div class="details">
                <p><strong>Your Gender:</strong> <?php echo ucfirst($gender); ?></p>
            </div>

            <a href="index.php" class="btn">Try Again 🔁</a>
        </div>

    </div>

</div>

</body>
</html>