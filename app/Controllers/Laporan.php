<?php

namespace App\Controllers;

// use App\Models\MemberModel;
use App\Models\PenjualanModel;
// use App\Models\PulsaModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Laporan extends BaseController
{
    protected $penjualanModel;
    public function __construct()
    {

        $this->penjualanModel = new PenjualanModel();
        // $this->memberModel = new MemberModel();
        // $this->pulsaModel = new PulsaModel();
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $data = [
            'title' => 'Penjualan Pulsa | Laporan',
            'penjualan' => $this->penjualanModel->getPenjualan(),
            'LaporanRange' => $this->penjualanModel->getPemasukkanPerRange()
        ];
        return view('laporan/index', $data);
    }

    public function export()
    {
        $export = new PenjualanModel();
        $dataExport = $export->getPenjualan();

        $spreadsheet = new Spreadsheet();
        // tulisan headre/nama kolom
        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Tgl Beli')
            ->setCellValue('B1', 'Nama Pelanggan')
            ->setCellValue('C1', 'No Hp')
            ->setCellValue('D1', 'Jenis Pelanggan')
            ->setCellValue('E1', 'Pulsa')
            ->setCellValue('F1', 'Jumlah bayar')
            ->setCellValue('G1', 'Status');

        $column = 2;
        //tulis data penjualan ke Cell
        foreach ($dataExport as $data) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $column, $data['tgl'])
                ->setCellValue('B' . $column, $data['nama'])
                ->setCellValue('C' . $column, $data['no_hp'])
                ->setCellValue('D' . $column, $data['jenis_pelanggan'])
                ->setCellValue('E' . $column, $data['operator'] . ' - ' . $data['nominal'])
                ->setCellValue('F' . $column, $data['jumlah_bayar'])
                ->setCellValue('G' . $column, $data['status']);
            $column++;
        }
        //tulis dalam format .xlsx 
        $writer = new Xlsx($spreadsheet);
        $fileName = 'Laporan Penjualan';

        //Redirect hasil generate xlsx ke web clint
        header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $fileName . '.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        // return view('laporan/export');
    }
}
