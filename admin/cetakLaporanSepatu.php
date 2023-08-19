<?php
require_once('../tcpdf/examples/tcpdf_include.php');
include './controller/conn.php';

// query database
$tglDari = $_GET['tgl_awal'];
$tglHingga = $_GET['tgl_akhir'];
$tglSaatIni = "";
$totalTransaksi = 0;
if ($tglDari!= null && $tglHingga != null) {
    $tglDari1 = strtotime($tglDari);
    $tglHingga1 = strtotime($tglHingga);
    $tglSaatIni =  date('d F Y', $tglDari1) ." - ". date('d F Y', $tglHingga1);
    $getData = mysqli_query($conn, "SELECT p1.*, service.judul, service.harga
    FROM progress_sepatu p1
    INNER JOIN service ON service.id = p1.jenis_layanan
    WHERE  DATE_FORMAT(p1.updated_at, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND p1.status='finish' AND p1.created_at BETWEEN '$tglDari' AND DATE_ADD('$tglHingga', INTERVAL 1 DAY)");
} else {
    $tglSaatIni = date('F Y');
    $getData = mysqli_query($conn, "SELECT p1.*, service.judul, service.harga
    FROM progress_sepatu p1
    INNER JOIN service ON service.id = p1.jenis_layanan
    WHERE  DATE_FORMAT(p1.updated_at, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m') AND p1.status='finish'");
}

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
<p>Periode</p>";
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
    color:red;
}
</style>
<p>'.$tglSaatIni.'</p>';
// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
$pdf->writeHTMLCell(0, 0, 95, 20, $html2, 0, 1, 0, true, '', true);
if ($tglDari!= null && $tglHingga != null) {
    $pdf->writeHTMLCell(0, 0, 75, 26, $alamat, 0, 1, 0, true, '', true);    
}else {
    $pdf->writeHTMLCell(0, 0, 94, 26, $alamat, 0, 1, 0, true, '', true);
}
// Get the position after writing $html2
$positionY = $pdf->getY();

// Set line width
$pdf->SetLineWidth(0.5); // in millimeters

// Draw a horizontal line 10 pixel below $html2
$pdf->Line(10, $positionY + 3, 200, $positionY + 3);

$htmlTabel = '
<style>
table {
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    border-collapse: collapse; /* Menggabungkan garis tabel */
    width: 100%;
    
}
th {
    background-color: #E4E9FF; /* Menambahkan latar belakang biru pada header */
    color: #000; /* Mengubah warna teks menjadi putih */
    border: 1px solid black;
}
.border {
    border: 1px solid black; /* Menambahkan garis pada sel */
    margin-bottom:10px;
    font-size:10px;
}
.no {
    width: 5%;
    font-weight: bold;
    text-align:center;
}
.nama_pemesan{
    width:16.7%;
    text-align:center;
    font-size:10px;
}
.transaksi{
    margin-top:10px;
}
.badge-custom {
    color: #68CF29;
}

.badge-custom-proses {
    color: #FF4C41;
}

.badge-custom-done {
    background-color: #fff0da;
    color: #FFAB2D;
    padding: 3px 10px;
}
</style>
<table>
<tr>
<th class="no">No</th>
<th class="nama_pemesan">Nama Pemilik</th>
<th class="nama_pemesan">Kode Sepatu</th>
<th class="nama_pemesan">Jenis Layanan</th>
<th class="nama_pemesan">Harga Layanan</th>
<th class="nama_pemesan">Status Sepatu</th>
<th class="nama_pemesan">Tanggal Pecucian</th>
</tr>';
$no = 1;
while ($dataPesanan = mysqli_fetch_array($getData)) {
    $totalTransaksi += $dataPesanan['harga'];
    $created_at_old = strtotime($dataPesanan['created_at']);
    $htmlTabel.='<tr>
    <td class="border" >'.$no++.'</td>
    <td class="border">'.$dataPesanan['pemilik'].'</td>
    <td class="border">'.$dataPesanan['kode_sepatu'].'</td>
    <td class="border">'.$dataPesanan['judul'].'</td>
    <td class="border">Rp.'.number_format($dataPesanan['harga'], 0, ',', '.').'</td>
    <td class="border"><span class="'.($dataPesanan['status_sepatu']=='sudah diambil'? 'badge-custom' : 'badge-custom-proses').'">'.($dataPesanan['status_sepatu']=='sudah diambil'? 'sudah diambil' : 'belum diambil').'</span></td>
    <td class="border">'.date('d F Y', $created_at_old).'</td>
    </tr>';
}
$htmlTabel.='

<tr class="transaksi">
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>
<tr class="transaksi">
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td>Total Transaksi</td>
<td>Rp.'.number_format($totalTransaksi, 0, ',', '.').'</td>
</tr>
</table>
';

$pdf->writeHTMLCell(0, 0, 0, 38, $htmlTabel, 0, 1, 0, true, '', true);

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('example_001.pdf', 'I');