<?php
$imagePath = '../assets/Same-Site-Cookie.png';

if (file_exists($imagePath)) {
    // Get the image MIME type
    $mimeType = mime_content_type($imagePath);

    // Set the appropriate headers
    header("Content-Type: $mimeType");
    header('Content-Length: ' . filesize($imagePath));

    // Read and output the image
    readfile($imagePath);
} else {
    http_response_code(404);
    echo "Image not found.";
}
exit;
