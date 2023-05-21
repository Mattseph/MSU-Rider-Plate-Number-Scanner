<?php

if (filter_has_var(INPUT_GET, 'plate_number')) {
    $plate_number = htmlspecialchars($_GET['plate_number']);
}
$platenumberQuery = "SELECT * FROM rider, registered_rider_profile WHERE plate_number = :plate_number AND rider.rider_id = registered_rider_profile.rider_id";

$platenumberStatement = $pdo->prepare($platenumberQuery);
$platenumberStatement->bindParam(":plate_number", $plate_number);

if ($platenumberStatement->rowCount() === 1) {
    $rider = $platenumberStatement->fetch(PDO::FETCH_ASSOC);
    
    $clean_rider_no = filter_var($rider['rider_no'], FILTER_SANITIZE_NUMBER_INT);
    $rider_no = filter_var($clean_rider_no, FILTER_VALIDATE_INT);
    $name = htmlspecialchars($rider['last_name'] . ', ' . $rider["first_name"] . $rider['mid_name'] ?? ' ' . $rider['suffix']);
    $designation = htmlspecialchars($rider['designation']);
    $official_reciept = htmlspecialchars($rider['official_reciept']);
    $or_expiration_date = htmlspecialchars($rider['or_expiration_date']);
    $certificate_of_registration = htmlspecialchars($rider['certificate_of_registration']);
    $licenseNumber = htmlspecialchars($rider["drivers_license"]);
    $license_expiration_date = htmlspecialchars($rider['license_expiration_date']);
    $contact_number = htmlspecialchars($rider['contact_number']);
    $img_url = htmlspecialchars($rider['img_url']);
    $status = htmlspecialchars("Accredited");
} else {
    $status = "Non-Accredited Driver";
}
