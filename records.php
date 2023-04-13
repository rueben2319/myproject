<?php
require_once('assests/vendor/autoload.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetTitle('Student Result');
$pdf->SetHeaderData('', 0, '', '', array(0, 0, 0), array(255, 255, 255));
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
$pdf->setFontSubsetting(true);
$pdf->SetFont('dejavusans', '', 12, '', true);

$html = '<div class="container-fluid" id="printable">
	<table width="100%">
		<tr>
			<td width="50%">Student ID #: <b>'.$student_code.'</b></td>
			<td width="50%">Class: <b>'.$class.'</b></td>
		</tr>
		<tr>
			<td width="50%">Student Name: <b>'.ucwords($name).'</b></td>
			<td width="50%">Gender: <b>'.ucwords($gender).'</b></td>
		</tr>
	</table>
	<hr>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Subject Code</th>
				<th>Subject</th>
				<th>Mark</th>
			</tr>
		</thead>
		<tbody>';
    		$items=$conn->query("SELECT r.*,s.subject_code,s.subject FROM result_items r inner join subjects s on s.id = r.subject_id where result_id = $id  order by s.subject_code asc");
    		while($row = $items->fetch_assoc()):
    		$html .= '<tr>
    			<td>'.$row['subject_code'].'</td>
    			<td>'.ucwords($row['subject']).'</td>
    			<td class="text-center">'.number_format($row['mark']).'</td>
    		</tr>';
			endwhile;
		$html .= '</tbody>
		<tfoot>
			<tr>
				<th colspan="2">Average</th>
				<th class="text-center">'.number_format($marks_percentage,2).'</th>
			</tr>
		</tfoot>
	</table>
</div>';

$pdf->AddPage();
$pdf->writeHTML($html, true, false, true, false, '');


?>