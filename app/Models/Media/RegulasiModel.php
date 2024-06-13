<?php

namespace App\Models\Media;

use CodeIgniter\Model;

class RegulasiModel extends Model
{
    protected $table = 'regulasi';

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
