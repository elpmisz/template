<?php

namespace app\classes;

class Checklist
{
  private $dbcon;

  public function __construct()
  {
    $db = new Database();
    $this->dbcon = $db->getConnection();
  }

  public function create($data)
  {
    $sql = "INSERT INTO asset_checklist(id,name,type,reference,user) VALUES(uuid(),?,?,?,?)";
    $stmt = $this->dbcon->prepare($sql);
    return $stmt->execute($data);
  }

  public function update($data)
  {
    $sql = "UPDATE asset_checklist SET
    name = ?,
    type = ?,
    reference = ?,
    user = ?,
    status = ?,
    updated = NOW()
    WHERE id = ?";
    $stmt = $this->dbcon->prepare($sql);
    return $stmt->execute($data);
  }

  public function view($data)
  {
    $sql = "SELECT A.id,A.name,A.type,A.reference,B.name reference_name,A.status
    FROM asset_checklist A 
    LEFT JOIN asset_checklist B
    ON A.reference = B.id
    WHERE A.id = ?";
    $stmt = $this->dbcon->prepare($sql);
    $stmt->execute($data);
    return $stmt->fetch();
  }

  public function reference($keyword)
  {
    $sql = "SELECT id,name text
    FROM asset_checklist
    WHERE type = 1 
    AND status = 1 ";
    if (!empty($keyword)) {
      $sql .= " AND (name LIKE '%{$keyword}%') ";
    }
    $sql .= " ORDER BY created ASC";
    $stmt = $this->dbcon->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
  }
}
