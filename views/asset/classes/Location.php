<?php

namespace app\classes;

class Location
{
  private $dbcon;

  public function __construct()
  {
    $db = new Database();
    $this->dbcon = $db->getConnection();
  }

  public function create($data)
  {
    $sql = "INSERT INTO asset_location(id,name,user) VALUES(uuid(),?,?)";
    $stmt = $this->dbcon->prepare($sql);
    return $stmt->execute($data);
  }

  public function update($data)
  {
    $sql = "UPDATE asset_location SET
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
    FROM asset_location
    WHERE id = ?";
    $stmt = $this->dbcon->prepare($sql);
    $stmt->execute($data);
    return $stmt->fetch();
  }
}
