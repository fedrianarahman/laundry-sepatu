<?php
require_once('../tcpdf/examples/tcpdf_include.php');
include './controller/conn.php';


$id = $_GET['id'];
$getDataPesanan = mysqli_query($conn, "SELECT * FROM progress_sepatu WHERE kode_sepatu = '$id' GROUP BY kode_sepatu ASC");
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
<p>17Agustus2023</p>';
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

$html4 = '
<style>
</style>
<p>Nama Pemesan</p>';
$html5 = '
<style>
</style>
<p>Email</p>';
$html6 = '
<style>
</style>
<p>NO HP</p>';
$html7 = '
<style>
</style>
<p>Kode Sepatu</p>';
$html8 = '
<style>
</style>
<p>Jenis Sepatu</p>';
$html9 = '
<style>
</style>
<p>Merk Sepatu</p>';
$html10 = '
<style>
</style>
<p>Warna Sepatu</p>';
$html11 = '
<style>
</style>
<p>Jenis Layanan</p>';
$html12 = '
<style>
</style>
<p>Harga Layanan</p>';
$html13 = '
<style>
</style>
<p>Total Bayar</p>';

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

// -----------------------------titik-----------------------
$titik = ':';
$pdf->writeHTMLCell(0, 0, 50, 45, $titik, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, 50, 52, $titik, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, 50, 59, $titik, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, 50, 66, $titik, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, 50, 73, $titik, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, 50, 80, $titik, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, 50, 87, $titik, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, 50, 94, $titik, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, 50, 101, $titik, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, 50, 108, $titik, 0, 1, 0, true, '', true);
// -----------------------------titik-----------------------

$nama = '
<style></style>
<p>'.$dataPesanan['pemilik'].'</p>';
$kodeSepatu = '
<style></style>
<p>'.$dataPesanan['emai'].'</p>';
$jenisSepatu = '
<style></style>
<p>'.$dataPesanan['kode_sepatu'].'</p>';
$merkSepatu = '
<style></style>
<p>'.$dataPesanan['no_hp_pemilik'].'</p>';
$warnaSepatu = '
<style></style>
<p>'.$dataPesanan['jenis_sepatu'].'</p>';
$jenisLayanan = '
<style></style>
<p>'.$dataPesanan['merk_sepatu'].'</p>';
$hargaLayanan = '
<style></style>
<p>'.$dataPesanan['warna'].'</p>';
$totalBayar = '
<style></style>
<p>'.$dataPesanan['nama_layanan'].'</p>';
$tambahan1 = '
<style></style>
<p>Rp. '.(number_format($dataPesanan['harga_layanan'], 0, ',', '.')).'</p>';
$tambahan2 = '
<style></style>
<p>Rp. '.(number_format($dataPesanan['harga_layanan'], 0, ',', '.')).'</p>';
$pdf->writeHTMLCell(0, 0, 55, 45, $nama, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, 55, 52, $kodeSepatu, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, 55, 59, $merkSepatu, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, 55, 66, $jenisSepatu, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, 55, 73, $warnaSepatu, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, 55, 80, $jenisLayanan, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, 55, 87, $hargaLayanan, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, 55, 94, $totalBayar, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, 55, 101, $tambahan1, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, 55, 108, $tambahan2, 0, 1, 0, true, '', true);

$note = '
<style>
p{
    font-weight:bold;
}
</style>
<p>
note :
</p>
';
$note1 = '<style>
p{
    
}
</style>
<p>
- Simpan Invoice ini untuk mengambil sepatu Kembali.
</p>';
$note2 = '<style>
p{
    
}
span{
    color:blue;
}
</style>
<p>
- Untuk Mengetahui Progress Sepatu, Anda Dapat Mengunjungi <span>shoeslab.co.id</span> Dengan Memasukan Kode Sepatu.
</p>';
$note3 = '<style>
p{
    
}
</style>
<p>
- Terimakasih Telah Mempercayai Shoeslab Sebagai Layanan Treatment Sepatu Anda.
</p>';
$pdf->writeHTMLCell(0, 0, 10, 117, $note, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, 10, 124, $note1, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, 10, 131, $note2, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, 10, 144, $note3, 0, 1, 0, true, '', true);

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('example_001.pdf', 'I');