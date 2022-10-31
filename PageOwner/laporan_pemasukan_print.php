<?php

error_reporting(0);
require_once("../assets/plugins/fpdf/fpdf.php");

class FPDF_AutoWrapTable extends FPDF
{
  private $data = array();
  private $options = array(
    'filename' => '',
    'destinationfile' => '',
    'paper_size' => 'F4',
    'orientation' => 'P'
  );

  function __construct($data = array(), $options = array())
  {
    parent::__construct();
    $this->data = $data;
    $this->options = $options;
  }

  public function rptDetailData()
  {
    //
    $border = 0;
    $this->AddPage();
    $this->SetAutoPageBreak(true, 60);
    $this->AliasNbPages();
    $left = 25;

    //header
    $this->SetFont("", "B", 15);
    $this->SetX($left);
    $this->Cell(0, 20, 'SISTEM INFORMASI KEUANGAN BERBASIS WEB', 0, 1, 'C');
    $this->SetFont("", "", 9);
    $this->SetFont("", "", 15);
    $this->SetX($left);
    $this->Cell(0, 1, '________________________________________________________________', 0, 1, 'C');
    $this->SetX($left);
    $this->Cell(0, 2, '________________________________________________________________', 0, 1, 'C');
    $this->Ln(10);
    $this->Ln(10);
    $this->SetFont("", "B", 12);
    $this->SetX($left);
    $this->Cell(0, 20, 'LAPORAN DATA PEMASUKAN', 0, 1, 'C');
    $this->Ln(14);

    include '../config.php';
    $start = $_GET['start'];
    $end = $_GET['end'];

    $this->SetFont("", "B", 12);
    $this->SetX($left);
    $this->Cell(0, 25, 'Periode Tanggal :   ' . date("d-F-Y", strtotime($start)) . '  s/d  ' . date("d-F-Y", strtotime($end)), 0, 1, 'L');

    $h = 20;
    $left = 40;
    $top = 80;
    #tableheader
    $this->SetFillColor(200, 200, 200);
    $left = $this->GetX();
    $this->SetFont("", "B", 12);
    $this->Cell(25, $h, 'No', 1, 0, 'C', true);
    $this->SetX($left += 25); $this->Cell(120, $h, 'Tanggal', 1, 0, 'C', true);
    $this->SetX($left += 120); $this->Cell(120, $h, 'Produk', 1, 0, 'C', true);
    $this->SetX($left += 120); $this->Cell(110, $h, 'Harga', 1, 0, 'C', true);
    $this->SetX($left += 110); $this->Cell(50, $h, 'Qty', 1, 0, 'C', true);
    $this->SetX($left += 50); $this->Cell(110, $h, 'Subtotal', 1, 1, 'C', true);
    //$this->Ln(20);

    $this->SetFont('Arial', '', 10);
    $this->SetWidths(array(25, 120, 120, 110, 50, 110));
    $this->SetAligns(array('C', 'L', 'L', 'L', 'C','L'));
    $no = 1;
    $this->SetFillColor(255);

    #data dari database
    include '../config.php';

    $sql    = $_GET['sql'];
    $start = $_GET['start'];
    $end = $_GET['end'];
    $query = mysqli_query($con, $sql);
    while ($data = mysqli_fetch_array($query)) {
      $sub = $data['Harga'] * $data['Qty'];
      $this->Row(
        array(
          $no++,
          date("d-F-Y", strtotime($data['Tanggal'])),
          $data['Nama_produk'],
          $data['Harga'],
          'x ' . $data['Qty'],
          number_format($sub, 0, ",", ".")
        )
      );
      $a = $a + $sub;
    }

    $this->SetFillColor(200, 200, 200);
    $left = $this->GetX();
    $this->SetFont("", "B", 12);
    $this->Cell(425, $h, 'TOTAL', 1, 0, 'C', true);
    $this->SetX($left += 425);
    $this->Cell(110, $h, ' ' . number_format($a, 0, ",", "."), 1, 0, 'L', true);
  }

  public function printPDF()
  {

    if ($this->options['paper_size'] == "F4") {
      $a = 8.3 * 72; //1 inch = 72 pt
      $b = 13.0 * 72;
      $this->FPDF($this->options['orientation'], "pt", array($a, $b));
    } else {
      $this->FPDF($this->options['orientation'], "pt", $this->options['paper_size']);
    }

    $this->SetAutoPageBreak(false);
    $this->AliasNbPages();
    $this->SetFont("helvetica", "B", 10);
    //$this->AddPage();

    $this->rptDetailData();

    $this->Output($this->options['filename'], $this->options['destinationfile']);
  }

  private $widths;
  private $aligns;

  function SetWidths($w)
  {
    //Set the array of column widths
    $this->widths = $w;
  }

  function SetAligns($a)
  {
    //Set the array of column alignments
    $this->aligns = $a;
  }

  function Row($data)
  {
    //Calculate the height of the row
    $nb = 0;
    for ($i = 0; $i < count($data); $i++)
      $nb = max($nb, $this->NbLines($this->widths[$i], $data[$i]));
    $h = 15 * $nb;
    //Issue a page break first if needed
    $this->CheckPageBreak($h);
    //Draw the cells of the row
    for ($i = 0; $i < count($data); $i++) {
      $w = $this->widths[$i];
      $a = isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
      //Save the current position
      $x = $this->GetX();
      $y = $this->GetY();
      //Draw the border
      $this->Rect($x, $y, $w, $h);
      //Print the text
      $this->MultiCell($w, 15, $data[$i], 0, $a);
      //Put the position to the right of the cell
      $this->SetXY($x + $w, $y);
    }
    //Go to the next line
    $this->Ln($h);
  }

  function CheckPageBreak($h)
  {
    //If the height h would cause an overflow, add a new page immediately
    if ($this->GetY() + $h > $this->PageBreakTrigger)
      $this->AddPage($this->CurOrientation);
  }

  function NbLines($w, $txt)
  {
    //Computes the number of lines a MultiCell of width w will take
    $cw = &$this->CurrentFont['cw'];
    if ($w == 0)
      $w = $this->w - $this->rMargin - $this->x;
    $wmax = ($w - 2 * $this->cMargin) * 1000 / $this->FontSize;
    $s = str_replace("\r", '', $txt);
    $nb = strlen($s);
    if ($nb > 0 and $s[$nb - 1] == "\n")
      $nb--;
    $sep = -1;
    $i = 0;
    $j = 0;
    $l = 0;
    $nl = 1;
    while ($i < $nb) {
      $c = $s[$i];
      if ($c == "\n") {
        $i++;
        $sep = -1;
        $j = $i;
        $l = 0;
        $nl++;
        continue;
      }
      if ($c == ' ')
        $sep = $i;
      $l += $cw[$c];
      if ($l > $wmax) {
        if ($sep == -1) {
          if ($i == $j)
            $i++;
        } else
          $i = $sep + 1;
        $sep = -1;
        $j = $i;
        $l = 0;
        $nl++;
      } else
        $i++;
    }
    return $nl;
  }
} //end of class

//pilihan
$options = array(
  'filename' => '', //nama file penyimpanan, kosongkan jika output ke browser
  'destinationfile' => '', //I=inline browser (default), F=local file, D=download
  'paper_size' => 'F4',    //paper size: F4, A3, A4, A5, Letter, Legal
  'orientation' => 'P' //orientation: P=portrait, L=landscape
);

$tabel = new FPDF_AutoWrapTable($data, $options);
$tabel->printPDF();
