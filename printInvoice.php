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
$getDataPesanan = mysqli_query($conn, "SELECT pemesanan.id AS id_pesanan, pemesanan.layanan_harga AS harga_layanan, pemesanan.merk_sepatu AS merk_sepatu,pemesanan.jenis_sepatu AS jenis_sepatu,pemesanan.warna_sepatu AS warna_sepatu,pemesanan.status_pembayaran AS status_pembayaran,pemesanan.status AS status_pemesanan, pemesanan.created_at AS tgl_pemesanan, pemesanan.nama_pengirim AS nama_pengirim,pemesanan.jumlah_bayar AS jumlah_bayar,pemesanan.asal_bank AS asal_bank,bank.nama_bank AS nama_bank,bank.nama_pemilik AS nama_pemilik,bank.no_rek AS no_rek,service.judul AS jenis_layanan FROM pemesanan INNER JOIN bank ON bank.id = pemesanan.via_bank INNER JOIN service ON service.id = pemesanan.layana_id WHERE pemesanan.id = '$id_pemesanan'");
$dataPesanan = mysqli_fetch_array($getDataPesanan);

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
$html = '<style>
    table {
        background-image: url(' . $img_file . ');
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        border-collapse: collapse; /* Menggabungkan garis tabel */
        width: 100%;
    }
    th, td {
        border: 1px solid black; /* Menambahkan garis pada sel */
        padding: 5px; /* Menambahkan ruang di dalam sel */
    }
    .d-flex {
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
    }
    .col-md-6 {
        float: left;
        width: 50%;
        background-color: blue;
        color: white;
        padding: 10px;
        box-sizing: border-box;
    }
</style>
<h1 style="text-align:center; margin-bottom:10px;">Shoeslab Shoes Treatment</h1>';
$html2 = "<p style='text-align:center;'>Invoice</p>";
// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, 95, 20, $html2, 0, 1, 0, true, '', true);
// Get the position after writing $html2
$positionY = $pdf->getY();

// Set line width
$pdf->SetLineWidth(0.5); // in millimeters

// Draw a horizontal line 10 pixel below $html2
$pdf->Line(10, $positionY + 5, 200, $positionY + 5);

// conten
$html3 = '<style>
table{
    width:100%;
}
td {
    
}

tr {
    margin-bottom: 30px;
}
.repaint{
    color:#4FB5B7;
}
.sp-pembayaran{
    background-color: #ecfae4;
    color: #68CF29;
    padding: 3px 10px;
}
.s-pemesanan{
    padding: 3px 10px;
    background-color: #fff0da;
color: #FFAB2D;
}
</style>
<table>
<tr>
<td>Merk Sepatu</td>
<td>:</td>
<td>'.$dataPesanan['merk_sepatu'].'</td>
</tr>
<tr>
<td>Jenis Sepatu</td>
<td>:</td>
<td>'.$dataPesanan['jenis_sepatu'].'</td>
</tr>
<tr>
<td>Warna Sepatu</td>
<td>:</td>
<td>'.$dataPesanan['warna_sepatu'].'</td>
</tr>
<tr>
<td>Jenis Layanan</td>
<td>:</td>
<td><span class="repaint">'.$dataPesanan['jenis_layanan'].'</span></td>
</tr>
<tr>
<td>Harga Layanan</td>
<td>:</td>
<td>Rp. '.number_format($dataPesanan['harga_layanan'], 0, ',', '.').'</td>
</tr>
<tr>
<td>Status Pembayaran</td>
<td>:</td>
<td><span class="sp-pembayaran">'. ($dataPesanan['status_pembayaran'] == 'L' ? 'Lunas' : '') .'</span></td>
</tr>
<tr>
<td>Akun Bank Tujuan</td>
<td>:</td>
<td>'.$dataPesanan['nama_bank'].'|'.$dataPesanan['no_rek'].'|'.$dataPesanan['nama_pemilik'].'</td>
</tr>
<tr>
<td>Asal Bank</td>
<td>:</td>
<td>'.$dataPesanan['asal_bank'].'</td>
</tr>
<tr>
<td>Jumlah Bayar</td>
<td>:</td>
<td>Rp.'.number_format($dataPesanan['jumlah_bayar'], 0, ',', '.').'</td>
</tr>
<tr>
<td>Nama Pengirim</td>
<td>:</td>
<td>'.$dataPesanan['nama_pengirim'].'</td>
</tr>
<tr>
<td>Status Pemesanan</td>
<td>:</td>
<td class="s-pemesanan">'.($dataPesanan['status_pemesanan'] == 'P' ? 'Menunggu Penyerahan Sepatu' : '').'</td>
</tr>
<tr>
<td>Tanggal Pemesanan</td>
<td>:</td>
<td>'.date('F d Y',strtotime($dataPesanan['tgl_pemesanan'])).'</td>
</tr>
</table>';
// end conten
$pdf->writeHTMLCell(0, 0, 10, 40, $html3, 0, 1, 0, true, '', true);
// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('example_001.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+ x