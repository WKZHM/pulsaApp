<?php

namespace App\Models;

use CodeIgniter\Model;

class PenjualanModel extends Model
{
    protected $table = "penjualan";
    protected $UserTimestamps = TRUE;
    protected $allowedFields = ['id_member', 'id_pulsa', 'status', 'jumlah_bayar', 'tgl_beli'];

    public function getSUM()
    {
        $querySUM = "SELECT SUM(jumlah_bayar) FROM penjualan";
        return $this->db->query($querySUM)->getRowArray();
    }

    public function getPenjualan()
    {
        $queryPenjualan = "SELECT member.nama, member.no_hp, jenis.id_jenis, jenis.jenis_pelanggan, pulsa.id_pulsa, pulsa.operator, pulsa.nominal, date_format(penjualan.tgl_beli, '%d %b %Y') as tgl,penjualan.status, penjualan.jumlah_bayar, penjualan.id_penjualan 
        FROM member 
        JOIN jenis 
        JOIN pulsa 
        JOIN penjualan 
        WHERE member.id_jenis=jenis.id_jenis 
        AND pulsa.id_pulsa=penjualan.id_pulsa 
        AND member.id=penjualan.id_member 
        ORDER BY penjualan.tgl_beli DESC";
        return $this->db->query($queryPenjualan)->getResultArray();
    }

    public function getPemasukkanPerRange()
    {
        $tanggal_awal = @$_POST['tanggalawal'];
        $tanggal_akhir = @$_POST['tanggalakhir'];
        $queryRange = "SELECT member.nama, member.no_hp, jenis.id_jenis, jenis.jenis_pelanggan, pulsa.id_pulsa, pulsa.operator, pulsa.nominal, date_format(penjualan.tgl_beli, '%d %b %Y') as tgl,penjualan.status, penjualan.jumlah_bayar, penjualan.id_penjualan 
        FROM member 
        JOIN jenis 
        JOIN pulsa 
        JOIN penjualan 
        WHERE member.id_jenis=jenis.id_jenis 
        AND pulsa.id_pulsa=penjualan.id_pulsa 
        AND member.id=penjualan.id_member  AND penjualan.tgl_beli
        BETWEEN '" . $tanggal_awal . "' AND '" . $tanggal_akhir . "'
        ORDER BY penjualan.tgl_beli DESC";
        return $this->db->query($queryRange)->getResultArray();
    }
}
