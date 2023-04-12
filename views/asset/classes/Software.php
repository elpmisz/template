<?php

namespace app\classes;

class Software
{
  private $dbcon;

  public function __construct()
  {
    $db = new Database();
    $this->dbcon = $db->getConnection();
  }

  public function create($data)
  {
    $sql = "INSERT INTO asset_software(id,name,user) VALUES(uuid(),?,?)";
    $stmt = $this->dbcon->prepare($sql);
    return $stmt->execute($data);
  }

  public function update($data)
  {
    $sql = "UPDATE asset_software SET
    name = ?,
    user = ?,
    status = ?,
    updated = NOW()
    WHERE id = ?";
    $stmt = $this->dbcon->prepare($sql);
    return $stmt->execute($data);
  }

  public function view($data)
  {
    $sql = "SELECT id,name,status
    FROM asset_software
    WHERE id = ?";
    $stmt = $this->dbcon->prepare($sql);
    $stmt->execute($data);
    return $stmt->fetch();
  }
}
