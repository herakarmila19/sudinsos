<?php

namespace App\Controllers\Backend;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\CustomModel;

class ApiController extends ResourceController
{
    use ResponseTrait;

    protected $custom;

    public function __construct()
    {
        $this->custom = new CustomModel();
    }

    public function data_berita()
    {
        $start = $_POST['start'];
        $limit = $_POST['length'];
        $search = $_POST["search"]["value"];
        $data = [];

        $where = "status = '1'";
        if ($search != "") {
            // $where = "status = '1' AND (judul LIKE '%" . $search . "%' OR publish_date LIKE '%" . $search . "%' OR publish_date LIKE '%" . $search . "%' OR publish LIKE '%" . $search . "%')";
            $where = "status = '1' AND (judul LIKE '%" . $search . "%' OR created_date LIKE '%" . $search . "%' OR publish LIKE '%" . $search . "%')";
        }

        $list = $this->custom->view_offset("berita", "*", $where, "created_date", "desc", $limit, $start);
        $recordsTotal = $this->custom->view("berita", "*", "status = '1'", "created_date", "desc", NULL);
        $count_filtered = $this->custom->view("berita", "*", $where, "created_date", "desc", NULL);

        foreach ($list->getResult() as $field) {
            $start++;
            $row = array();
            $row[] = $start;
            $row[] = $field->judul;
            $row[] = date('d M Y, H:i', strtotime($field->created_date));
            $row[] = $field->publish == 0 ? 'Draft' : 'Publish';
            // $row[] = date('d M Y, H:i', strtotime($field->publish_date));
            $row[] = '<a href="' . base_url('admin/berita/' . $field->id_berita) . '">Detail</a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $recordsTotal->getNumRows(),
            "recordsFiltered" => $count_filtered->getNumRows(),
            "data" => $data,
        );

        echo json_encode($output);
    }
}