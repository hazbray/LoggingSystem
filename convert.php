<?php
/**
 * PHPExcel
 *
 * Copyright (C) 2006 - 2014 PHPExcel
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPExcel
 * @package    PHPExcel
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version    ##VERSION##, ##DATE##
 */

/** Error reporting */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Europe/London');


if (PHP_SAPI == 'cli')
	die('This example should only be run from a Web Browser');



/** Include PHPExcel */
require_once dirname(__FILE__) . '/Classes/PHPExcel.php';
require_once dirname(__FILE__) . '/config.php';



// Create new PHPExcel object
$objPHPExcel = new PHPExcel();


// Set document properties
$objPHPExcel->getProperties()->setCreator("DOTC-MRT3 Support Division")
							 ->setLastModifiedBy("DOTC-MRT3 Support Division")
							 ->setTitle("Log Record for Researchers")
							 ->setSubject("Log Record for Researchers")
							 ->setDescription("Log")
							 ->setKeywords("log record php logging system")
							 ->setCategory("log record");

/* the above code is also same with 
	$objPHPExcel->getProperties()->setCreator("DOTC-MRT3 Support Division");
	$objPHPExcel->getProperties()->setLastModifiedBy("DOTC-MRT3 Support Division");
	$objPHPExcel->getProperties()->setTitle("Log Record for Researchers");
	etc
*/

// Transfer records from database
//objPHPExcel getActive variable
$sheet = $objPHPExcel->getActiveSheet();
$objPHPExcel->setActiveSheetIndex(0);
// Header cell values
$sheet->getStyle("A1:Z1")->getFont()->setBold(true);
////////////$objPHPExcel->getActiveSheet()->getStyle("A:F")->get
// Set Header and Footer
$sheet->getHeaderFooter()->setOddHeader("DOTC-MRT3 \n Visitors' Records".'&S');

$objDrawing = new PHPExcel_Worksheet_HeaderFooterDrawing();
$objDrawing->setName('Logo');
$objDrawing->setDescription('Logo');
$objDrawing->setPath('train.png');
$objDrawing->setHeight('20px');
$sheet->getHeaderFooter()->addImage($objDrawing, PHPExcel_Worksheet_HeaderFooter::IMAGE_HEADER_CENTER);

//$currentHeader = $objPHPExcel->getActiveSheet()->getHeaderFooter()->getOddHeader();
//$objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddHeader($currentHeader.'&C&G');

$objPHPExcel->setActiveSheetIndex(0)
		   ->setCellValue('A1',"Last Name")
			->setCellValue('B1',"First Name")
			->setCellValue('C1',"Occupation")
			->setCellValue('D1',"Institution")
			->setCellValue('E1',"Contact Number")
			->setCellValue('F1',"Date of Visit")
			->setCellValue('G1',"Purpose of Visit")
			->setCellValue('H1',"No.of Visitors")
			->setCellValue('I1',"Status");

// Add some data
$query = "SELECT person.lname, person.fname, person.occupation, institution.instaname, person.contact_num, visit.date, visit.purpose, visit.num_visit, visit.status FROM  person,institution, visit WHERE visit.person_id = person.pid AND person.institution_id = institution.iid ORDER BY visit.date DESC";
//$connection = mysqli_connect("localhost","root","","loggingsystem");
$result = mysqli_query($connection,$query);
	$row = 2;
//add border design
	$styleArray = array(
      'font' => array(
        'name' => 'Arial',
        'size' => '9',
      ),
      'borders' => array(
        'vertical' => array(
          'style' => PHPExcel_Style_Border::BORDER_THICK,
        ),
		 'outline' => array(
           'style' => PHPExcel_Style_Border::BORDER_THICK,
           'color' => array('argb' => '000'),
        ),
      ),
      'fill' => array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
          'argb' => '626262',
        ),
      ),
    );
	$styleArray2 = array(
      'font' => array(
        'name' => 'Arial',
        'size' => '9',
      ),
      'borders' => array(
        'vertical' => array(
          'style' => PHPExcel_Style_Border::BORDER_THIN,
        ),
		 'outline' => array(
           'style' => PHPExcel_Style_Border::BORDER_THIN,
           'color' => array('argb' => '000'),
        ),
      ),
    );
	$sheet->getStyle('A1:I1')->applyFromArray($styleArray);

	

	while ($res = mysqli_fetch_array($result,  MYSQLI_ASSOC)){
		$col = 0;
		foreach( $res as $value) {
			if($value == $res['lname'] | $value ==$res['fname']) 
				$sheet->setCellValueByColumnAndRow($col, $row, ucwords($value));
			else if($value == $res['instaname'])
				$sheet->setCellValueByColumnAndRow($col, $row, strtoupper($value));
			else if ($value == $res['purpose']) 
				$sheet->setCellValueByColumnAndRow($col, $row, ucfirst($value));
			else
				$sheet->setCellValueByColumnAndRow($col, $row, strtolower($value));
				
			
				
			$sheet->getStyleByColumnAndRow($col, $row)->applyFromArray($styleArray2);
				
				
		//		$objPHPExcel->getActiveSheet()->getStyleByColumnAndRow($col, $row)->applyFromArray($styleArray2);

		 $col++;
		}
    $row++;
	}
	// Enable text wrap and width of columns
		//column width
	$sheet->getColumnDimension('A')->setWidth('17.26');	
	$sheet->getColumnDimension('B')->setWidth('15.93');	
	$sheet->getColumnDimension('C')->setWidth('12.61');	
	$sheet->getColumnDimension('D')->setWidth('23.89');	
	$sheet->getColumnDimension('E')->setWidth('12.61');	
	$sheet->getColumnDimension('F')->setWidth('10.62');	
	$sheet->getColumnDimension('G')->setWidth('19.91');
	$sheet->getColumnDimension('H')->setWidth('6.64');	
	$sheet->getColumnDimension('I')->setWidth('9.29');	
		//text wrap
	$sheet->getStyle('A1:I'.$row)->getAlignment()->setWrapText(true);
	


// Rename worksheet
$sheet->setTitle('Log Records for Visitors');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);

// Set the page layout view as page layout
$sheet->getSheetView()->setView(PHPExcel_Worksheet_SheetView::SHEETVIEW_PAGE_LAYOUT);
// Set the orientation of the excel page
$sheet->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
// Set page size to A4
$sheet->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);

// Redirect output to a client’s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Log Records for Visitors.xlsx"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');

?>