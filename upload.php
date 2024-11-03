<?php
// Yüklemelerin yapılacağı dizin
$uploadDirectory = "uploads/";
$fileName = basename($_FILES["file"]["name"]);
$targetFile = $uploadDirectory . $fileName;

// Eğer 'uploads' klasörü yoksa, otomatik olarak oluştur
if (!is_dir($uploadDirectory)) {
    mkdir($uploadDirectory, 0777, true); 
}

// Dosya yükleme işlemi
if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
    $domain = "https://durde.aksmm.com.tr"; // Domain adınızı güncelledim
    $fullURL = $domain . "/" . $targetFile; // Tam URL oluştur
    echo json_encode(["success" => true, "link" => $fullURL]); // Tam URL'yi döndür
} else {
    // Hata mesajı gönder
    echo json_encode(["success" => false, "message" => "Dosya yüklenirken bir hata oluştu."]);
}