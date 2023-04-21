<?php

namespace app\classes;

class Query
{
  private $dbcon;

  public function __construct()
  {
    $db = new Database();
    $this->dbcon = $db->getConnection();
  }

  public function asset_type_item($data)
  {
    $sql = "SELECT id,name,type,text,required,
    (
      CASE
        WHEN required = 1 THEN ''
        WHEN required = 2 THEN 'required'
        WHEN required = 3 THEN 'readonly'
        ELSE NULL
      END
    ) required_name
    FROM asset_type_item
    WHERE type_id = ?
    AND status = 1 
    ORDER BY created ASC";
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

  public function user_select($keyword)
  {
    $sql = "SELECT A.login_id id,CONCAT('K.',A.first_name,' ',A.last_name) text
    FROM user_detail A
    LEFT JOIN user_login B
    ON A.login_id = B.id
    WHERE B.status = 1 ";
    if (!empty($keyword)) {
      $sql .= " AND (first_name LIKE '%{$keyword}%' OR last_name LIKE '%{$keyword}%' OR email LIKE '%{$keyword}%') ";
    }
    $sql .= " ORDER BY B.created ASC";
    $stmt = $this->dbcon->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
  }

  public function location_select($keyword)
  {
    $sql = "SELECT id,name text
    FROM asset_location
    WHERE status = 1 ";
    if (!empty($keyword)) {
      $sql .= " AND (name LIKE '%{$keyword}%') ";
    }
    $sql .= " ORDER BY created ASC";
    $stmt = $this->dbcon->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
  }

  public function brand_select($keyword)
  {
    $sql = "SELECT id,name text
    FROM asset_brand
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

  public function model_select($brand, $keyword)
  {
    $sql = "SELECT id,name text
    FROM asset_brand
    WHERE type = 2
    AND reference = '{$brand}' 
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
