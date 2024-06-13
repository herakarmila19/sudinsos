<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomModel extends Model
{
    public function findAllCustom($table, $columnSort = '', $sort = '')
    {
        $query = $this->db->table($table)
            ->select('*')
            ->orderBy($columnSort, $sort)
            ->get();

        return $query->getResult();
    }

    public function findAllWhereCustom($table, $columnSort = '', $sort = '', $columnWhere = '', $where = '')
    {
        $query = $this->db->table($table)
            ->select('*')
            ->orderBy($columnSort, $sort)
            ->where($columnWhere, $where)
            ->get();

        return $query->getResult();
    }

    public function findAllWhereCustomDua($table, $columnSort = '', $sort = '', $columnWhere = '', $where = '', $columnWhereDua = '', $whereDua = '')
    {
        $query = $this->db->table($table)
            ->select('*')
            ->orderBy($columnSort, $sort)
            ->where($columnWhere, $where)
            ->where($columnWhereDua, $whereDua)
            ->get();

        return $query->getResult();
    }

    public function whereCustom($table, $columnName, $columnValue)
    {
        $query = $this->db->table($table)
            ->select('*')
            ->where($columnName, $columnValue)
            ->get();

        return $query->getFirstRow();
    }

    public function countAllCustom($table)
    {
        $query = $this->db->table($table)
            ->countAllResults();

        return $query;
    }

    public function sumAllCustom($table, $columnName)
    {
        $query = $this->db->table($table)
            ->selectSum($columnName)
            ->get();

        return $query->getRow();
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

    public function view($table, $select, $where = NULL, $order = NULL, $sort = NULL, $limit = NULL)
    {
        $query = $this->db->table($table)->select($select);

        if ($where != NULL) {
            $query = $query->where($where);
        }

        if ($order != NULL || $sort != NULL) {
            $query = $query->orderBy($order, $sort);
        }

        $query = $query->get($limit);

        return $query;
    }

    public function view_offset($table, $select, $where = NULL, $order = NULL, $sort = NULL, $limit = NULL, $offset = NULL)
    {
        $query = $this->db->table($table)->select($select);

        if ($where != NULL) {
            $query = $query->where($where);
        }

        if ($order != NULL || $sort != NULL) {
            $query = $query->orderBy($order, $sort);
        }

        $query = $query->get($limit, $offset);

        return $query;
    }

    // Kecamatan
    public function findAllLikeCustom($table, $columnSort = '', $sort = '', $columnSort2 = '', $sort2 = '', $columnWhere = '', $where = '', $columnLike = '', $like = '')
    {
        $query = $this->db->table($table)
            ->select('*')
            ->orderBy($columnSort, $sort)
            ->orderBy($columnSort2, $sort2)
            ->where($columnWhere, $where)
            ->like($columnLike, $like)
            ->get();

        return $query->getResult();
    }
}
