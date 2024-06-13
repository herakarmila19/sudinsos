<?php

namespace App\Models;

use CodeIgniter\Model;

class VisitorModel extends Model
{
    protected $table = 'visitor';

    public function sumAllCustom($columnName)
    {
        $query = $this->db->table($this->table)
            ->selectSum($columnName)
            ->get();

        return $query->getRow();
    }

    public function whereCustom($table, $columnName, $columnValue, $columnNameTwo, $columnValueTwo)
    {
        $query = $this->db->table($table)
            ->select('*')
            ->where($columnName, $columnValue)
            ->where($columnNameTwo, $columnValueTwo)
            ->get();

        return $query->getFirstRow();
    }

    public function insertCustom($table, $data)
    {
        $query = $this->db->table($table)
            ->insert($data);

        if ($query) {
            return true;
        } else {
            return false;
        }
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

    public function hitungPengunjung()
    {
        $url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $cekIp = $this->whereCustom('visitor', 'ip_address', $_SERVER['REMOTE_ADDR'], 'url', $url);

        if (isset($cekIp) and $cekIp->url == $url) {
            if (date('Y-m-d') != date('Y-m-d', strtotime($cekIp->tanggal))) {
                $this->updateCustom(
                    'visitor',
                    'id_visitor',
                    $cekIp->id_visitor,
                    [
                        'ip_address' => $_SERVER['REMOTE_ADDR'],
                        'tanggal' => date('Y-m-d H:i:s'),
                        'jumlah' => $cekIp->jumlah + 1
                    ]
                );
            }
        } else {
            $this->insertCustom('visitor', [
                'ip_address' => $_SERVER['REMOTE_ADDR'],
                'url' => $url,
                'tanggal' => date('Y-m-d H:i:s'),
                'jumlah' => 1
            ]);
        }
    }
}
