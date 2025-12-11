<?php

require('../libreria/pdf/fpdf.php');

class Reporte extends FPDF {
    public $nombre = '';
    public $fecha = '';
    public $total = '';
    public $data = array();

    function Header() {
        $this->setY(12);
        $this->setX(10);

        $this->SetFont('times', 'B', 13);
        $this->Text(80, 14, utf8_decode('BOLETA DE VENTA'));

        // Cliente
        $this->SetFont('Arial', 'B', 10);
        $this->Text(17, 34, utf8_decode('CLIENTE:'));
        $this->SetFont('Arial', '', 10);
        $this->Text(35, 34, utf8_decode($this->nombre));

        // Fecha de Venta
        $this->SetFont('Arial', 'B', 10);
        $this->Text(17, 44, utf8_decode('FECHA VENTA:'));
        $this->SetFont('Arial', '', 10);
        $this->Text(45, 44, utf8_decode($this->fecha));

        // Total
        $this->SetFont('Arial', 'B', 10);
        $this->Text(17, 54, utf8_decode('TOTAL:'));
        $this->SetFont('Arial', '', 10);
        $this->Text(35, 54, utf8_decode($this->total));

        $this->Ln(60);

        $this->SetFont('Arial', 'B', 11);
        $this->SetFillColor(100, 100, 255);
        $this->SetTextColor(255, 255, 255);
        $this->Cell(50, 10, utf8_decode('PRODUCTO'), 1, 0, 'C', 1);
        $this->Cell(45, 10, utf8_decode('CANTIDAD'), 1, 0, 'C', 1);
        $this->Cell(45, 10, utf8_decode('PRECIO'), 1, 0, 'C', 1);
        $this->Cell(45, 10, utf8_decode('SUBTOTAL'), 1, 1, 'C', 1);
    }

    function CrearTabla() {
        foreach ($this->data as $index => $item) {
            $this->Cell(50, 10, utf8_decode($item['NOMBRE']), 1, 0, "C", 0);
            $this->Cell(45, 10, utf8_decode($item['CANTIDAD']), 1, 0, "C", 0);
            $this->Cell(45, 10, utf8_decode($item['PRECIO']), 1, 0, "C", 0);
            $this->Cell(45, 10, utf8_decode($item['SUBTOTAL']), 1, 1, "C", 0);
        }
    }

    function Footer() {
        $this->SetFont('helvetica', 'B', 8);
        $this->SetY(-15);
        $this->Cell(95, 5, utf8_decode('Página ') . $this->PageNo() . ' / {nb}', 0, 0, 'L');
        $this->Cell(95, 5, date('d/m/Y | g:i:a'), 0, 1, 'R');
        $this->Line(10, 287, 200, 287);
        $this->Cell(0, 5, utf8_decode("© Todos los derechos reservados."), 0, 0, "C");
    }

}

?>