<?php

namespace app\classes;

class Validation
{
  public function alert($alert, $text, $url)
  {
    $_SESSION['alert'] = $alert;
    $_SESSION['text']  = $text;
    exit(header("location: {$url}"));
  }

  public function input($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  public function int($data)
  {
    $data = filter_var($this->input($data), FILTER_VALIDATE_INT);
    return $data;
  }

  public function bool($data)
  {
    $data = filter_var($this->input($data), FILTER_VALIDATE_BOOLEAN);
    return $data;
  }

  public function url($data)
  {
    $data = filter_var($this->input($data), FILTER_VALIDATE_URL);
    return $data;
  }

  public function email($data)
  {
    $regex = "/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix";
    $data = strtolower($data);
    $data = filter_var($this->input($data), FILTER_SANITIZE_EMAIL);
    $data = preg_match($regex, $data);
    return $data;
  }

  public function password($data)
  {
    $data = preg_match("@[A-Z]@", $data); // Upper
    $data = preg_match("@[a-z]@", $data); // Lower
    $data = preg_match("@[0-9]@", $data); // Number
    $data = preg_match("@[^\w]@", $data); // Special
    return $data;
  }


  public function picture_upload($tmp, $path)
  {
    $imageInfo   = (isset($tmp) ? getimagesize($tmp) : "");
    $imageWidth   = 1200;
    $imageHeight = (isset($imageInfo) ? round($imageWidth * $imageInfo[1] / $imageInfo[0]) : '');
    $imageType    = $imageInfo[2];

    if ($imageType === IMAGETYPE_PNG) {
      $imageResource = imagecreatefrompng($tmp);
      $imageX = imagesx($imageResource);
      $imageY = imagesy($imageResource);
      $imageTarget = imagecreatetruecolor($imageWidth, $imageHeight);
      imagecopyresampled($imageTarget, $imageResource, 0, 0, 0, 0, $imageWidth, $imageHeight, $imageX, $imageY);
      imagepng($imageTarget, $path);
    } elseif ($imageType === IMAGETYPE_JPEG) {
      $imageResource = imagecreatefromjpeg($tmp);
      $imageX = imagesx($imageResource);
      $imageY = imagesy($imageResource);
      $imageTarget = imagecreatetruecolor($imageWidth, $imageHeight);
      imagecopyresampled($imageTarget, $imageResource, 0, 0, 0, 0, $imageWidth, $imageHeight, $imageX, $imageY);
      imagejpeg($imageTarget, $path);
    } else {
      $imageResource = imagecreatefrompng($tmp);
      $imageX = imagesx($imageResource);
      $imageY = imagesy($imageResource);
      $imageTarget = imagecreatetruecolor($imageWidth, $imageHeight);
      imagecopyresampled($imageTarget, $imageResource, 0, 0, 0, 0, $imageWidth, $imageHeight, $imageX, $imageY);
      imagewebp($imageTarget, $path);
    }
  }

  public function picture_profile_unlink($data)
  {
    return unlink(__DIR__ . "/../assets/img/profile/{$data}");
  }

  public function line_notify($token, $message = null, $image = null, $stickerPid = null, $stickerId = null)
  {
    $message = (!empty($message) ? $message : "ไม่มีข้อความ");
    $image = (!empty($image) ? $image : "");
    if (!empty($image)) {
      $path = dirname(__FILE__) . "/assets/img/line/{$image}";
      $imageFile = curl_file_create($path);
    }
    $stickerPid = (!empty($stickerPid) ? $stickerPid : "");
    $stickerId = (!empty($stickerId) ? $stickerId : "");
    // $stickerPid = 11537;
    // $stickerId = 52002748;

    $data = array(
      "message" => $message,
      "imageFile" => $imageFile,
      "stickerPackageId" => $stickerPid,
      "stickerId" => $stickerId,
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://notify-api.line.me/api/notify");
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    $headers = array("Content-type: multipart/form-data", "Authorization: Bearer {$token}",);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($ch);
    curl_close($ch);

    return $result;
  }
}
