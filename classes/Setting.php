<?php

namespace app\classes;

class Setting
{
  private $dbcon;

  public function __construct()
  {
    $db = new Database();
    $this->dbcon = $db->getConnection();
  }

  public function update($data)
  {
    $sql = "UPDATE setting SET 
    name = ?,
    email = ?,
    email_password = ?,
    default_password = ?,
    user_update = ?,
    updated = NOW()
    WHERE 1";
    $stmt = $this->dbcon->prepare($sql);
    return $stmt->execute($data);
  }

  public function view()
  {
    $sql = "SELECT * FROM setting";
    $stmt = $this->dbcon->prepare($sql);
    $stmt->execute();
    return $stmt->fetch();
  }

  public function password_default()
  {
    $sql = "SELECT default_password FROM setting";
    $stmt = $this->dbcon->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetch();
    return (!empty($row['default_password']) ? $row['default_password'] : "");
  }
}
