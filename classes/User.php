<?php

namespace app\classes;

class User
{
  private $dbcon;

  public function __construct()
  {
    $db = new Database();
    $this->dbcon = $db->getConnection();
  }

  public function status($data)
  {
    $sql = "SELECT COUNT(*) FROM user_login WHERE username = ? AND status = 0";
    $stmt = $this->dbcon->prepare($sql);
    $stmt->execute($data);
    return $stmt->fetchColumn();
  }

  public function password($data)
  {
    $sql = "SELECT password FROM user_login WHERE username = ?";
    $stmt = $this->dbcon->prepare($sql);
    $stmt->execute($data);
    $row = $stmt->fetch();
    return (isset($row['password']) ? $row['password'] : "");
  }

  public function login_id($data)
  {
    $sql = "SELECT id
    FROM user_login
    WHERE username = ?";
    $stmt = $this->dbcon->prepare($sql);
    $stmt->execute($data);
    $row = $stmt->fetch();
    return (isset($row['id']) ? $row['id'] : "");
  }

  public function user_duplicate($data)
  {
    $sql = "SELECT COUNT(*) FROM user_login WHERE username = ?";
    $stmt = $this->dbcon->prepare($sql);
    $stmt->execute($data);
    return $stmt->fetchColumn();
  }

  public function view($data)
  {
    $sql = "SELECT *,CONCAT(B.first_name,' ',B.last_name) fullname
    FROM user_login A 
    LEFT JOIN user_detail B
    ON A.id = B.login_id
    WHERE A.id = ?";
    $stmt = $this->dbcon->prepare($sql);
    $stmt->execute($data);
    return $stmt->fetch();
  }

  public function login_create($data)
  {
    $sql = "INSERT INTO user_login(id,username,password) VALUES(uuid(),?,?)";
    $stmt = $this->dbcon->prepare($sql);
    return $stmt->execute($data);
  }

  public function user_create($data)
  {
    $sql = "INSERT INTO user_detail(id,login_id) VALUES(uuid(),?)";
    $stmt = $this->dbcon->prepare($sql);
    return $stmt->execute($data);
  }

  public function username($data)
  {
    $sql = "SELECT COUNT(*) FROM user_login WHERE username = ?";
    $stmt = $this->dbcon->prepare($sql);
    $stmt->execute($data);
    return $stmt->fetchColumn();
  }

  public function update($data)
  {
    $sql = "UPDATE user_detail SET
    first_name = ?,
    last_name = ?,
    email = ?,
    contact = ?,
    user_update = ?,
    updated = NOW()
    WHERE login_id = ?";
    $stmt = $this->dbcon->prepare($sql);
    return $stmt->execute($data);
  }

  public function user_level($data)
  {
    $sql = "UPDATE user_login SET
    level = ?,
    updated = NOW()
    WHERE id = ?";
    $stmt = $this->dbcon->prepare($sql);
    return $stmt->execute($data);
  }

  public function picture_profile_name($data)
  {
    $sql = "SELECT picture FROM user_detail WHERE login_id = ?";
    $stmt = $this->dbcon->prepare($sql);
    $stmt->execute($data);
    $row = $stmt->fetch();
    return (isset($row['picture']) ? $row['picture'] : "");
  }

  public function picture_profile_update($data)
  {
    $sql = "UPDATE user_detail SET
    picture = ?,
    user_update = ?,
    updated = NOW()
    WHERE login_id = ?";
    $stmt = $this->dbcon->prepare($sql);
    return $stmt->execute($data);
  }

  public function password_change($data)
  {
    $sql = "UPDATE user_login SET
    password = ?,
    updated = NOW()
    WHERE id = ?";
    $stmt = $this->dbcon->prepare($sql);
    return $stmt->execute($data);
  }
}
