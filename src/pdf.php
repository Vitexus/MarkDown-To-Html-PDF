<?php
/**
 * MarkDown2HtmlPDF - get PDF
 *
 * @author     Vitex <vitex@hippy.cz>
 * @copyright  2018 Vitex@hippy.cz (G)
 */

namespace chp;

use League\CommonMark\CommonMarkConverter;

require_once '../vendor/autoload.php';




$fileToShow = '../README.md';

// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();


if (file_exists($fileToShow)) {
    $converter = new CommonMarkConverter();
    $dompdf->loadHtml($converter->convertToHtml(file_get_contents($fileToShow)));
}



// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream();
