<?php
//============================================================+
// File name   : example_001.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 001 for TCPDF class
//               Default Header and Footer
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Default Header and Footer
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
require_once('./tcpdf/examples/tcpdf_include.php');
include './controller/conn.php';
$id_pemesanan = $_GET['id_pesanan'];
$getDataPesanan = mysqli_query($conn, "SELECT pemesanan.id AS id_pesanan,pemesanan.nama_pemesan AS nama_pemesan, pemesanan.layanan_harga AS harga_layanan, pemesanan.merk_sepatu AS merk_sepatu,pemesanan.jenis_sepatu AS jenis_sepatu,pemesanan.warna_sepatu AS warna_sepatu,pemesanan.status_pembayaran AS status_pembayaran,pemesanan.status AS status_pemesanan, pemesanan.created_at AS tgl_pemesanan, pemesanan.nama_pengirim AS nama_pengirim,pemesanan.jumlah_bayar AS jumlah_bayar,pemesanan.asal_bank AS asal_bank,bank.nama_bank AS nama_bank,bank.nama_pemilik AS nama_pemilik,bank.no_rek AS no_rek,service.judul AS jenis_layanan FROM pemesanan INNER JOIN bank ON bank.id = pemesanan.via_bank INNER JOIN service ON service.id = pemesanan.layana_id WHERE pemesanan.id = '$id_pemesanan'");
$dataPesanan = mysqli_fetch_array($getDataPesanan);
$created_at = strtotime($dataPesanan['tgl_pemesanan']);
$tglPemesanan = date('d F Y', $created_at);

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->setPrintHeader(false);
$pdf->AddPage();

// get the current page break margin
$bMargin = $pdf->getBreakMargin();
// get current auto-page-break mode
$auto_page_break = $pdf->getAutoPageBreak();
// disable auto-page-break
$pdf->SetAutoPageBreak(false, 0);
// set bacground image
$img_file = K_PATH_IMAGES . '';
$pdf->Image($img_file, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
// restore auto-page-break status
$pdf->SetAutoPageBreak($auto_page_break, $bMargin);
// set the starting point for the page content
$pdf->setPageMark();
// Set some content to print
$html = '
<h1 style="text-align:center; margin-bottom:10px;">Shoeslab Shoes Treatment</h1>';
$html2 = "
<style>
p{
    font-weight:bold;
}
</style>
<p>Invoice</p>";
$html3 = '
<style>
p{
    font-size : 12px;
}
</style>
<p>'.$tglPemesanan.'</p>';
$alamat = '
<style>
p{
    font-size : 10px;
}
</style>
<p>Jl. Ciheulang No.27, RT.04/RW.11, Sekeloa, Kecamatan Coblong, Kota Bandung, Jawa Barat 40134</p>';
// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, 95, 20, $html2, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, 25, 26, $alamat, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, 166.5,32, $html3, 0, 1, 0, true, '', true);
// Get the position after writing $html2
$positionY = $pdf->getY();

// Set line width
$pdf->SetLineWidth(0.5); // in millimeters

// Draw a horizontal line 10 pixel below $html2
$pdf->Line(10, $positionY + 2, 200, $positionY + 2);

// conten

// end conten
$html4 = '
<style>
</style>
<p>Nama Pemesan</p>';
$html5 = '
<style>
</style>
<p>Jenis Sepatu</p>';
$html6 = '
<style>
</style>
<p>Merk Sepatu</p>';
$html7 = '
<style>
</style>
<p>Warna Sepatu</p>';
$html8 = '
<style>
</style>
<p>Jenis Layanan</p>';
$html9 = '
<style>
</style>
<p>Harga Layanan</p>';
$html10 = '
<style>
</style>
<p>status Pembayaran</p>';
$html11 = '
<style>
</style>
<p>Akun Bank Yang Dituju</p>';
$html12 = '
<style>
</style>
<p>Asal Bank</p>';
$html13 = '
<style>
</style>
<p>Jumlah Bayar</p>';
$html14 = '
<style>
</style>
<p>Nama Pengirim</p>';
$html15 = '
<style>
</style>
<p>Status Pemesanan</p>';
$pdf->writeHTMLCell(0, 0, 10, 45, $html4, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, 10, 52, $html5, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, 10, 59, $html6, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, 10, 66, $html7, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, 10, 73, $html8, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, 10, 80, $html9, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, 10, 87, $html10, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, 10, 94, $html11, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, 10, 101, $html12, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, 10, 108, $html13, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, 10, 115, $html14, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, 10, 122, $html15, 0, 1, 0, true, '', true);
// ---------------------------------------------------------
// -----------------------------titik-----------------------
$titik = ':';
$pdf->writeHTMLCell(0, 0, 70, 45, $titik, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, 70, 52, $titik, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, 70, 59, $titik, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, 70, 66, $titik, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, 70, 73, $titik, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, 70, 80, $titik, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, 70, 87, $titik, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, 70, 94, $titik, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, 70, 101, $titik, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, 70,108, $titik, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, 70, 115, $titik, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, 70, 122, $titik, 0, 1, 0, true, '', true);
// -----------------------------titik-----------------------

// ---------------------Data-----------------------
$namaPemesan = '<p>'.(ucwords($dataPesanan['nama_pemesan'])).'</p>';
$jenisSepatu = '<p>'.$dataPesanan['jenis_sepatu'].'</p>';
$merkSepatu = '<p>'.$dataPesanan['merk_sepatu'].'</p>';
$warnaSepatu = '<p>'.$dataPesanan['warna_sepatu'].'</p>';
$jenisLayanan = '<p>'.$dataPesanan['jenis_layanan'].'</p>';
$hargaLayanan = '<p>Rp.'.(number_format($dataPesanan['harga_layanan'], 0, ',', '.')).'</p>';
$statusPembayaran = '
<style>
p {
    color: #68CF29;
}
</style>
<p>Lunas</p>';
$akunBankYangDituju = '<p>'.$dataPesanan['nama_bank'].' | '.$dataPesanan['no_rek'].' | '.$dataPesanan['nama_pemilik'].'</p>';
$asalBank = '<p>'.$dataPesanan['asal_bank'].'</p>';
$jumlahBayar = '<p>Rp.'. number_format($dataPesanan['jumlah_bayar'], 0, ',', '.').'</p>';
$namaPengirim = '<p>'.$dataPesanan['nama_pengirim'].'</p>';
if ($dataPesanan['status_pemesanan']=='P') {
    $statusPemesanan = '
<style>
p{
    color: #FFAB2D;
}
</style>
<p>Menunggu Penyerahan Sepatu</p>';
} else {
    $statusPemesanan = '
    <style>
    p{
        color: #68CF29;
    }
    </style>
    <p>Terkonfirmasi</p>';
}

$pdf->writeHTMLCell(0, 0, 75, 45, $namaPemesan, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, 75, 52, $jenisSepatu, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, 75, 59, $merkSepatu, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, 75, 66, $warnaSepatu, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, 75, 73, $jenisLayanan, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, 75, 80, $hargaLayanan, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, 75, 87, $statusPembayaran, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, 75, 94, $akunBankYangDituju, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, 75, 101, $asalBank, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, 75, 108, $jumlahBayar, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, 75, 115, $namaPengirim, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, 75, 122, $statusPemesanan, 0, 1, 0, true, '', true);
// ---------------------Data-----------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('example_001.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+ x