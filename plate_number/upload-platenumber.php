<?php

if (filter_has_var(INPUT_POST, 'plate_number')) {
    $plate_number = htmlspecialchars($_POST['plate_number']);
}
$riderQuery = "SELECT * FROM rider, registered_rider_profile WHERE plate_number = :plate_number AND rider.rider_id = registered_rider_profile.rider_id";

$riderStatement = $pdo->prepare($riderQuery);
$riderStatement->bindParam(":plate_number", $plate_number);

if ($riderStatement->rowCount() === 1) {
    $rider = $riderStatement->fetch(PDO::FETCH_ASSOC);

    $clean_rider_no = filter_var($rider['rider_no'], FILTER_SANITIZE_NUMBER_INT);
    $rider_no = filter_var($clean_rider_no, FILTER_VALIDATE_INT);
    $name = htmlspecialchars($rider['last_name'] . ', ' . $rider["first_name"] . $ride['mid_name'] ?? ' ' . $rider['suffix']);
    $designation = htmlspecialchars($rider['designation']);
    $official_reciept = htmlspecialchars($rider['official_reciept']);
    $or_expiration_date = htmlspecialchars($rider['or_expiration_date']);
    $certificate_of_registration = htmlspecialchars($rider['certificate_of_registration']);
    $licenseNumber = htmlspecialchars($rider["drivers_license"]);
    $license_expiration_date = htmlspecialchars($rider['license_expiration_date']);
    $contact_number = htmlspecialchars($rider['contact_number']);
    $img_url = htmlspecialchars($rider['img_url']);
    $status = htmlspecialchars("Accredited");

    // Prepare the response array
    $response = [
        'rider_no' => $rider_no,
        'name' => $name,
        'designation' => $designation,
        'official_reciept' => $official_reciept,
        'or_expiration_date' => $or_expiration_date,
        'certificate_of_registration' => $certificate_of_registration,
        'licenseNumber' => $licenseNumber,
        'license_expiration_date' => $license_expiration_date,
        'contact_number' => $contact_number,
        'img_url' => $img_url,
        'status' => $status
    ];

    $jsonResponse = json_encode($response);
    echo $jsonResponse;
} else {
    // Handle the case when no matching driver is found
    $response = [
        'error' => 'Not Accredited Driver'
    ];

    // Convert the response array to JSON format
    $jsonResponse = json_encode($response);

    // Send the JSON response back to the JavaScript code
    echo $jsonResponse;
}
