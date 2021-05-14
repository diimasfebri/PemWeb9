<?php
	//membuka koneksi ke database
	include "koneksi.php";
	//memanggil library
	require 'vendor/autoload.php';
	use PhpOffice\PhpSpreadsheet\Spreadsheet;
	use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

	//menuliskan nama kolom
	$spreadsheet=new spreadsheet();
	$sheet=$spreadsheet->getActiveSheet();
	$sheet->setCellValue('A1','No');
	$sheet->setCellValue('B1','Nama');
	$sheet->setCellValue('C1','Kelas');
	$sheet->setCellValue('D1','Alamat');

	//mengambil data pada database dan menuliskan di excel
	$query=mysqli_query($conn,"select * from tb_siswa");
	$i=2;
	$no=1;
	while($row=mysqli_fetch_array($query)){
		$sheet->setCellValue('A'.$i,$no++);
		$sheet->setCellValue('B'.$i,$row['NAMA']);
		$sheet->setCellValue('C'.$i,$row['KELAS']);
		$sheet->setCellValue('D'.$i,$row['ALAMAT']);
		$i++;
	}

	//style
	$styleArray=[
				'borders'=>[
					'allBorders'=>[
						'borderStyle'=>PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
					],
				],
	];

	//memunculkan file excel
	$i=$i-1;
	$sheet->getStyle('A1:D'.$i)->applyFromArray($styleArray);
	$writer=new Xlsx($spreadsheet);
	$writer->save('Report Data Siswa.xlsx');
?>