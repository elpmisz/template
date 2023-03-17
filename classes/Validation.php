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
    $imageInfo   = (isset($tmp) ? getimagesize($tmp) : '');
    $imageWidth   = 800;
    $imageHeight = (isset($imageInfo) ? round($imageWidth * $imageInfo[1] / $imageInfo[0]) : '');
    $imageType    = $imageInfo[2];

    if ($imageType === IMAGETYPE_PNG) {
      $imageResource = imagecreatefrompng($tmp);
      $imageX = imagesx($imageResource);
      $imageY = imagesy($imageResource);
      $imageTarget = imagecreatetruecolor($imageWidth, $imageHeight);
      imagecopyresampled($imageTarget, $imageResource, 0, 0, 0, 0, $imageWidth, $imageHeight, $imageX, $imageY);
      imagewebp($imageTarget, $path, 100);
      imagedestroy($imageTarget);
    } else {
      $imageResource = imagecreatefromjpeg($tmp);
      $imageX = imagesx($imageResource);
      $imageY = imagesy($imageResource);
      $imageTarget = imagecreatetruecolor($imageWidth, $imageHeight);
      imagecopyresampled($imageTarget, $imageResource, 0, 0, 0, 0, $imageWidth, $imageHeight, $imageX, $imageY);
      imagewebp($imageTarget, $path, 100);
      imagedestroy($imageTarget);
    }
  }

  public function picture_profile_unlink($data)
  {
    return unlink(__DIR__ . "/../assets/img/profile/{$data}");
  }

  public function line_notify($text, $token)
  {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://notify-api.line.me/api/notify");
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, "message={$text}");
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    $headers = ["Content-type: application/x-www-form-urlencoded", "Authorization: Bearer {$token}",];
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($ch);
    curl_close($ch);

    return $result;
  }
}
