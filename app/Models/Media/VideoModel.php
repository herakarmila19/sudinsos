<?php

namespace App\Models\Media;

use CodeIgniter\Model;

class VideoModel extends Model
{
    protected $table = 'video';

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
