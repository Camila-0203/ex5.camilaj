<?php
$nameError = '';
$emailError = '';
$isValid = true;

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);

    // Validate Name
    if (empty($name)) {
        $isValid = false;
    }

    // Validate Email
    if (empty($email)) {
        $emailError = 'Email is required.';
        $isValid = false;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = 'Please enter a valid email address.';
        $isValid = false;
    }

    // Redirect back to form with errors if validation fails
    if (!$isValid) {
        header("Location: form.html?nameError=$nameError&emailError=$emailError");
        exit();
    }

    // If valid, process the data (e.g., save to database)
    // For demonstration, we will just display a success message
    echo "Form submitted successfully!";
    echo "<br>Name: $name";
    echo "<br>Email: $email";
}
?>

