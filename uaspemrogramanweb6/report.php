<?php
session_start();
include 'db.php';
require('fpdf/fpdf.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$result = $conn->query("SELECT s.id, g.name as group_name, c.name as country_name, s.win, s.draw, s.loss, s.points
                        FROM standings s
                        JOIN groups g ON s.group_id = g.id
                        JOIN countries c ON s.country_id = c.id
                        WHERE g.name = 'Group C'");

class PDF extends FPDF
{
    function Header()
    {
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'Data Group C', 0, 1, 'C');
        $this->Cell(0, 10, 'Per 02 Juli 2024 20:32:16', 0, 1, 'C');
        $this->Ln(10);
        $this->Cell(40, 10, 'Negara', 1);
        $this->Cell(20, 10, 'Menang', 1);
        $this->Cell(20, 10, 'Seri', 1);
        $this->Cell(20, 10, 'Kalah', 1);
        $this->Cell(20, 10, 'Poin', 1);
        $this->Ln();
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Page ' . $this->PageNo(), 0, 0, 'C');
    }
}

$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 12);

while ($row = $result->fetch_assoc()) {
    $pdf->Cell(40, 10, $row['country_name'], 1);
    $pdf->Cell(20, 10, $row['win'], 1);
    $pdf->Cell(20, 10, $row['draw'], 1);
    $pdf->Cell(20, 10, $row['loss'], 1);
    $pdf->Cell(20, 10, $row['points'], 1);
    $pdf->Ln();
}

$pdf->Output();
?>
