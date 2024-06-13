<?php

namespace App\Models\Humas;

use CodeIgniter\Model;

class BeritaModel extends Model
{
    protected $table = 'berita';

    public function findAllWhereCustom($table, $joinTable, $joinCondition, $columnName, $columnValue, $columnName2, $columnValue2, $columnName3, $columnValue3, $page = null, $perPage = 0)
    {
        $offset = ($page - 1) * $perPage;

        $query = $this->db->table($table)
            ->select('*')
            ->join($joinTable, $joinCondition)
            ->where($columnName, $columnValue)
            ->where($columnName2, $columnValue2)
            ->orderBy($columnName3, $columnValue3)
            ->limit($perPage, $offset)
            ->get();

        return $query->getResultArray();
    }

    public function updateCustom($table, $columnName, $columnValue, $data)
    {
        $query = $this->db->table($table)
            ->where($columnName, $columnValue)
            ->update($data);

        if ($query) {
            return true;
        } else {
            return false;
        }
    }
}
