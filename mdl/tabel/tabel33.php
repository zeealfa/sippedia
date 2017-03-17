<?php session_start(); //dilarang mbukak langsung
#Hasil Ujian per Kode

error_reporting(E_ALL);
function text($kdUjian, $link)
{
    ini_set('display_errors', '1');
    ini_set('memory_limit', '1024M');
    require_once 'incs/PHPExcel.php';
    require_once 'incs/PHPExcel/IOFactory.php';
    require_once "incs/PHPExcel/Writer/Excel5.php";
#format
    $kotakLuarDalem = array(
        'borders' => array(
            'left'    => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN,
            ),
            'right'   => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN,
            ),
            'inside'  => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN,
            ),
            'outline' => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN,
            ),
        ),
    );
    $formatJudul = array(
        'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER),
        'font'      => array(
            'bold' => true
        ),
    );
    $formatKop = array(
        'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER),
        'font'      => array(
            'bold' => true,
            'size' => 20
        ),
    );
    $formattekstengah = array(
        'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER),
        'borders'   => array(
            'left'    => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN,
            ),
            'right'   => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN,
            ),
            'inside'  => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN,
            ),
            'outline' => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN,
            )
        )
    );
    if (strtoupper(substr(PHP_OS, 0, 3)) != 'WIN') {
        /** Caching to discISAM 1.0*/
        $cacheMethod = PHPExcel_CachedObjectStorageFactory:: cache_to_discISAM;
        $cacheSettings = array('dir' => '/tmp' // If you have a large file you can cache it optional
        );
        if (!PHPExcel_Settings::setCacheStorageMethod($cacheMethod, $cacheSettings)) error_log('CACHE_ERRORxxxxxx');
    }

    $objPHPExcel = new PHPExcel();
    $objPHPExcel->setActiveSheetIndex(0);
    $worksheet = $objPHPExcel->getActiveSheet();
    $objPHPExcel->getDefaultStyle()->getFont()->setSize(12);
    $sql = "SELECT NAMA_UJIAN,NM_MATA_PELAJARAN,TANGGAL_MULAI,TANGGAL_AKHIR,DURASI_UJIAN,JUMLAH_SOAL,NM_SCOPE_SOAL,KODE_TOKEN,KD_UJIAN AS kode FROM smlearning.t_ujian as tabA
INNER JOIN refs.r_mata_pelajaran as tabB ON tabA.ID_MATA_PELAJARAN=tabB.ID_MATA_PELAJARAN
INNER JOIN refs.r_scope_soal as tabC ON tabC.ID_SCOPE_SOAL=tabA.ID_SCOPE_SOAL
WHERE KD_UJIAN='$kdUjian'";
    $data = $link->query_one($sql);
    $peserta_sql = "SELECT KD_PESERTA as kdPeserta, NIS AS noUrut,ID_SIKAD as idSikad,START_AT as mulai,FINISH_AT as selesai FROM smlearning.t_ujian_peserta WHERE KD_UJIAN='$kdUjian' ORDER BY NIS";
    $pesertas = $link->query_all($peserta_sql);
    $kelases = array();
    foreach ($pesertas as $index => $peserta) {
        $detail = $link->getDataSiswa($peserta->noUrut, $link->tahunAjaran);
        @$kelases[$detail->KELAS][] = array(
            'noInduk'   => $detail->NO_INDUK,
            'namaSiswa' => $detail->NAMA_SISWA,
            'kdPeserta' => $peserta->kdPeserta,
        );
    }
//    asort($kelases);
//echo json_encode($kelases);
    $ujian_soal = "SELECT KD_SOAL_INDUK as kode FROM smlearning.t_ujian_soal where KD_UJIAN='$kdUjian'";
    $ujianSoals = $link->query_all($ujian_soal);


    $baris = 1;
    $worksheet->setCellValueByColumnAndRow(0, 1, 'Hasil Ujian: ' . $data->NAMA_UJIAN);
    $baris++;
    $baris++;
    $baris_judul = $baris;
    $worksheet->setCellValueByColumnAndRow(0, $baris, 'Nomor');
    $worksheet->mergeCellsbyColumnAndRow(0, ($baris), 0, ($baris + 1));
    $worksheet->setCellValueByColumnAndRow(1, $baris, 'Kelas');
    $worksheet->mergeCellsbyColumnAndRow(1, ($baris), 1, ($baris + 1));
    $worksheet->setCellValueByColumnAndRow(2, $baris, 'NIS');
    $worksheet->mergeCellsbyColumnAndRow(2, ($baris), 2, ($baris + 1));
    $worksheet->setCellValueByColumnAndRow(3, $baris, 'Nama Siswa');
    $worksheet->mergeCellsbyColumnAndRow(3, ($baris), 3, ($baris + 1));
    $worksheet->setCellValueByColumnAndRow(4, $baris, 'Nomor Soal');
    $kolom = 4;
    $kolom_huruf = 'C';
    for ($i = 1; $i <= count($ujianSoals); $i++) {
        $worksheet->setCellValueByColumnAndRow($kolom, ($baris + 1), $i);
        $kolom++;
        $kolom_huruf++;
    }
    $worksheet->setCellValueByColumnAndRow($kolom, $baris, 'Terjawab');
    $worksheet->mergeCellsbyColumnAndRow($kolom, ($baris), $kolom, ($baris + 1));
    $kolom++;
    $kolom_huruf++;
    $worksheet->setCellValueByColumnAndRow($kolom, $baris, 'Tidak Terjawab');
    $worksheet->mergeCellsbyColumnAndRow($kolom, ($baris), $kolom, ($baris + 1));
    $kolom++;
    $kolom_huruf++;
    $worksheet->setCellValueByColumnAndRow($kolom, $baris, 'Benar');
    $worksheet->mergeCellsbyColumnAndRow($kolom, ($baris), $kolom, ($baris + 1));
    $kolom++;
    $kolom_huruf++;
    $worksheet->setCellValueByColumnAndRow($kolom, $baris, 'Salah');
    $worksheet->mergeCellsbyColumnAndRow($kolom, ($baris), $kolom, ($baris + 1));
    $kolom++;
    $kolom_huruf++;
    $worksheet->setCellValueByColumnAndRow($kolom, $baris, 'Nilai');
    $worksheet->mergeCellsbyColumnAndRow($kolom, ($baris), $kolom, ($baris + 1));
    $kolom++;

    $kolom_huruf++;
    $kolom_huruf++;
    $baris++;
    $baris++;
    if ($kelases) {
        foreach ($kelases as $index => $kelase) {
            $no = 1;
            foreach ($kelase as $idx => $item) {
                $worksheet->setCellValueByColumnAndRow(0, $baris, $no);
                $worksheet->setCellValueByColumnAndRow(1, $baris, $index);
                $worksheet->setCellValueByColumnAndRow(2, $baris, $item['noInduk']);
                $worksheet->setCellValueByColumnAndRow(3, $baris, $item['namaSiswa']);
                $kolom = 4;
                $benar = 0;
                $salah = 0;
                $jawab = 0;
                $noJawab = 0;
                foreach ($ujianSoals as $idxSoal => $ujianSoal) {
                    $kdPeserta = $item['kdPeserta'];
                    $kdSoal = $ujianSoal->kode;
                    $jawab_sql = "SELECT tSoal.NO_URUT_JAWABAN AS jawab,kunci FROM smlearning.t_peserta_soal as tSoal
INNER JOIN (SELECT KD_SOAL AS kdSoal,NO_URUT_JAWABAN AS kunci FROM smlearning.t_soal_jawaban_multiple WHERE IS_BENAR=1) AS tKunci
ON tKunci.kdSoal=tSoal.`KD_SOAL` WHERE tSoal.KD_PESERTA='$kdPeserta' AND KD_SOAL_INDUK='$kdSoal'";
                    $jawab_data = $link->query_one($jawab_sql);
                    if ($jawab_data) {
                        if ($jawab_data->jawab > 0) {
                            if ($jawab_data->jawab == $jawab_data->kunci) {
                                $tampil = 'B';
                                $benar++;
                            }
                            else {
                                $tampil = 'S';
                                $salah++;
                            }
                            $jawab++;
                        }
                        else {
                            $tampil = '-';
                            $noJawab++;
                        }
                    } else {
                        $tampil = '-';
                        $noJawab++;
                    }
                    $worksheet->setCellValueByColumnAndRow($kolom, $baris, $tampil);
                    $kolom++;
                    set_time_limit(0);
                }
                $kolomAkhir = $kolom - 1;
                $worksheet->setCellValueByColumnAndRow($kolom, $baris, $jawab);
                $kolom++;
                $worksheet->setCellValueByColumnAndRow($kolom, $baris, $noJawab);
                $kolom++;
                $worksheet->setCellValueByColumnAndRow($kolom, $baris, $benar);
                $kolom++;
                $worksheet->setCellValueByColumnAndRow($kolom, $baris, $salah);
                $kolom++;
                $nilai = ($benar / count($ujianSoals)) * 100;
                $worksheet->setCellValueByColumnAndRow($kolom, $baris, number_format($nilai, 2));
                $baris++;
                $no++;
            }
            $baris++;
        }
    }
    $worksheet->mergeCellsbyColumnAndRow(4, ($baris_judul), $kolomAkhir, $baris_judul);
    $worksheet->getStyle('A' . ($baris_judul) . ':' . $kolom_huruf . ($baris))->applyFromArray($kotakLuarDalem);
    $worksheet->getStyle('A' . ($baris_judul) . ':' . $kolom_huruf . ($baris_judul + 1))->applyFromArray($formatJudul);


    $objPHPExcel->getActiveSheet()->getStyle('B1:B' . $objPHPExcel->getActiveSheet()->getHighestRow())->getAlignment()->setWrapText(true);
    $objPHPExcel->getActiveSheet()->getStyle('E1:E' . $objPHPExcel->getActiveSheet()->getHighestRow())->getAlignment()->setWrapText(true);
    $objPHPExcel->getActiveSheet()->getStyle('G1:G' . $objPHPExcel->getActiveSheet()->getHighestRow())->getAlignment()->setWrapText(true);
    $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(11);
    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(11);
    $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(11);
    $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(25);

//header
//logo kiri

//KOP

#JUDUL

    $objPHPExcel->getActiveSheet()->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
    $objPHPExcel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

    $objPHPExcel->getActiveSheet()->getPageSetup()->setFitToPage(true);
    $objPHPExcel->getActiveSheet()->getPageSetup()->setFitToWidth(1);
    $objPHPExcel->getActiveSheet()->getPageSetup()->setFitToHeight(0);
    $objPHPExcel->getActiveSheet()->getPageSetup()->setHorizontalCentered(true);
    $objPHPExcel->getActiveSheet()->getPageSetup()->setVerticalCentered(false);

    $objPHPExcel->getActiveSheet()->getPageMargins();
    $margin = 0.5 / 2.54;
    $objPHPExcel->getActiveSheet()->getPageMargins()->setTop(0.5);
    $objPHPExcel->getActiveSheet()->getPageMargins()->setBottom($margin);
    $objPHPExcel->getActiveSheet()->getPageMargins()->setLeft($margin * 3);
    $objPHPExcel->getActiveSheet()->getPageMargins()->setRight($margin * 3);

    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

    $namafile = 'Hasil Ujian -' . $data->NAMA_UJIAN . rand(0000, 9999);
    $response['namafile'] = 'http://stock.schoolmedia.id/downloads/' . $namafile . '.xlsx';
//    unlink($response['namafile']);
    $objWriter->save('/var/www/html/project/poncab/stock/downloads/' . $namafile . '.xlsx');

    return $response;
}

?>
