<?php

namespace app\classes;

class Type
{
  private $dbcon;

  public function __construct()
  {
    $db = new Database();
    $this->dbcon = $db->getConnection();
  }

  public function create($data)
  {
    $sql = "INSERT INTO asset_type(id,name,checklist,user) VALUES(uuid(),?,?,?)";
    $stmt = $this->dbcon->prepare($sql);
    return $stmt->execute($data);
  }

  public function item_create($data)
  {
    $sql = "INSERT INTO asset_type_item(id,type_id,name,type,text,required,user) VALUES(uuid(),?,?,?,?,?,?)";
    $stmt = $this->dbcon->prepare($sql);
    return $stmt->execute($data);
  }

  public function update($data)
  {
    $sql = "UPDATE asset_type SET
    name = ?,
    checklist = ?,
    user = ?,
    status = ?,
    updated = NOW()
    WHERE id = ?";
    $stmt = $this->dbcon->prepare($sql);
    return $stmt->execute($data);
  }

  public function item_update($data)
  {
    $sql = "UPDATE asset_type_item SET
    name = ?,
    type = ?,
    text = ?,
    required = ?,
    user = ?,
    updated = NOW()
    WHERE id = ?";
    $stmt = $this->dbcon->prepare($sql);
    return $stmt->execute($data);
  }

  public function view($data)
  {
    $sql = "SELECT id,name,status
    FROM asset_type
    WHERE id = ?";
    $stmt = $this->dbcon->prepare($sql);
    $stmt->execute($data);
    return $stmt->fetch();
  }

  public function item_view($data)
  {
    $sql = "SELECT id,name,type,text,required
    FROM asset_type_item
    WHERE type_id = ?";
    $stmt = $this->dbcon->prepare($sql);
    $stmt->execute($data);
    return $stmt->fetchAll();
  }

  public function type_id($data)
  {
    $sql = "SELECT id
    FROM asset_type
    WHERE name = ?";
    $stmt = $this->dbcon->prepare($sql);
    $stmt->execute($data);
    $row = $stmt->fetch();
    return (!empty($row['id']) ? $row['id'] : "");
  }

  public function checklist_view($data)
  {
    $sql = "SELECT B.id,B.name
    FROM asset_type A
    LEFT JOIN asset_checklist B
    ON FIND_IN_SET(B.id, A.checklist)
    WHERE A.id = ?";
    $stmt = $this->dbcon->prepare($sql);
    $stmt->execute($data);
    return $stmt->fetchAll();
  }

  public function type_select($keyword)
  {
    $sql = "SELECT id,name text
    FROM asset_type
    WHERE status = 1 ";
    if (!empty($keyword)) {
      $sql .= " AND (name LIKE '%{$keyword}%') ";
    }
    $sql .= " ORDER BY created ASC";
    $stmt = $this->dbcon->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
  }
}
