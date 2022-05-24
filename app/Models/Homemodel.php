<?php
namespace App\Models;
use CodeIgniter\Model;

class Homemodel extends Model
{

  public function insertData($data)
  {
    $db = \Config\Database::connect();

    $builder = $db->table('products');
    $result   = $builder->insert($data);

    return $result;
  }


  public function updateData($data, $id)
  {
    $db = \Config\Database::connect();

    $builder = $db->table('products')->where("id", $id);
    $result   = $builder->update($data);

    return $result;
  }

  public function getAllData()
  {
    $db = \Config\Database::connect();

    $builder = $db->table('products');
    $query   = $builder->get();
    return $query->getResult();
  }

  public function getSingleData($id)
  {
    $db = \Config\Database::connect();

    $builder = $db->table('products');
    $query   = $builder->where('id', $id)->get();
    return $query->getResult();
  }

  public function removeData($id)
  {
    $db = \Config\Database::connect();
    $builder = $db->table('products')->where('id', $id);
    $result = $builder->delete();

    return $result;
  }


}
