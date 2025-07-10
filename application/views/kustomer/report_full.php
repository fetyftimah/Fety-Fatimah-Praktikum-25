<?php
// Skrip ini dirancang untuk dijalankan sebagai View oleh Controller CodeIgniter.
// Pastikan pustaka FPDF sudah dimuat di controller.

// 1. Inisialisasi PDF
$pdf = new FPDF('P', 'mm', 'A4');
$pdf->AddPage();

// 2. KOP SURAT (HEADER)
// =================================================================
$pdf->SetFont('Times', 'B', 18);
// Path ke gambar logo, pastikan path ini benar dari root direktori Anda
// Contoh: $pdf->Image(FCPATH . 'assets/img/cart.png', 30, 5, 27, 24); 
$pdf->Cell(25);
$pdf->SetFont('Times', 'B', 20);
$pdf->Cell(0, 7, 'KOPERASI HARUM MANIS BERSATU', 0, 1, 'C');
$pdf->Cell(25);
$pdf->SetFont('Times', '', 10);
$pdf->Cell(0, 5, 'Website : www.HARUMBERSATU.COM / E-Mail : admin@harumbersatu.com', 0, 1, 'C');
$pdf->Cell(25);
$pdf->SetFont('Times', '', 10);
$pdf->Cell(0, 5, 'Banjarmasin Utara. Telp./Fax : 081349685149', 0, 1, 'C');

// Garis Kop Surat
$pdf->SetLineWidth(1);
$pdf->Line(10, 36, 200, 36);
$pdf->SetLineWidth(0);
$pdf->Line(10, 37, 200, 37);
$pdf->Cell(0, 15, '', 0, 1); // Spasi setelah kop surat

// 3. JUDUL LAPORAN
// =================================================================
$pdf->SetFont('Times', 'B', 14);
$pdf->Cell(0, 7, 'LAPORAN DATA KUSTOMER', 0, 1, 'C');
$pdf->Cell(10, 7, '', 0, 1); // Spasi

// 4. ISI LAPORAN (TABEL DATA)
// =================================================================
// Header Tabel
$pdf->SetFont('Times', 'B', 10);
$pdf->Cell(10, 6, 'NO', 1, 0, 'C');
$pdf->Cell(40, 6, 'NIK', 1, 0, 'C');
$pdf->Cell(50, 6, 'NAMA CUSTOMER', 1, 0, 'C');
$pdf->Cell(30, 6, 'TELEPON', 1, 0, 'C');
$pdf->Cell(60, 6, 'ALAMAT', 1, 1, 'C');

// Isi Tabel
$pdf->SetFont('Times', '', 10);
$i = 1;
// Mengambil data dari database menggunakan instance CodeIgniter ($this)
$data = $this->db->get('kustomer')->result_array();
foreach ($data as $d) {
    $pdf->Cell(10, 6, $i++, 1, 0, 'C');
    $pdf->Cell(40, 6, $d['nik'], 1, 0);
    $pdf->Cell(50, 6, $d['name'], 1, 0);
    $pdf->Cell(30, 6, $d['telp'], 1, 0);
    $pdf->Cell(60, 6, $d['alamat'], 1, 1);
}

// 5. OUTPUT PDF
// =================================================================
$pdf->Output('laporan_kustomer_lengkap.pdf', 'I');

?>
