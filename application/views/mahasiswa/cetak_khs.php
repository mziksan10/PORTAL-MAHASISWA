<html><head>
        <title>KHS - <?= $npm; ?> - <?= $nama; ?> - <?= $kelas; ?> - Semester <?= $smt; ?></title>
</head><body>
<img src="<?= base_url('assets/');?>dist/img/kop.jpg" alt="kop piksi" style="width: 100%;">

<h2 style="text-align: center;">TRANSKRIP NILAI AKADEMIK</h2>
<table style="margin-top: 10px;">
    <tr>
        <th style="text-align: left; width: 150px;">NPM</th>
        <td>:</td>
        <td style="text-align: left;"><?= $npm; ?></td>
    </tr>
    <tr>
        <th style="text-align: left; ">Nama Lengkap</th>
        <td>:</td>
        <td style="text-align: left;"><?= $nama; ?></td>
    </tr>    
    <tr>
        <th style="text-align: left;">Kelas</th>
        <td>:</td>
        <td style="text-align: left;"><?= $kelas; ?></td>
    </tr>
    <tr>
        <?php 
        switch ($smt){
            case "1":
                $smt_huruf = '(Satu)';
                break;
            case "2":
            $smt_huruf = '(Dua)';
            break;
            case "3":
            $smt_huruf = '(Tiga)';;
            break;
            case "4":
            $smt_huruf = '(Empat)';;
            break;
            case "5":
            $smt_huruf = '(Lima)';;
            break;
            case "6":
            $smt_huruf = '(Enam)';;
            break;              
            case "7":
            $smt_huruf = '(Tujuh)';;
            break;
            case "8":
            $smt_huruf = '(Delapan)';;
            break;                
              default:
                echo "Semeter tidak di Ketahui!";
        }
        
        ?>
        <th style="text-align: left;">Semester</th>
        <td>:</td>
        <td style="text-align: left;"><?= $smt; ?> <?= $smt_huruf;?></td>
    </tr>
</table>

    <table style="border: 1px solid black; width: 100%; border-collapse: collapse; margin-top: 10px;">
        <tr>
        <th style="border: 1px solid black;">No</th>
        <th style="border: 1px solid black;">Kode</th>
        <th style="border: 1px solid black;">Matakuliah</th>
        <th style="border: 1px solid black;">SKS</th>
        <th style="border: 1px solid black;">Nilai Mutu</th>
        <th style="border: 1px solid black;">Nilai Angka</th>
        <th style="border: 1px solid black;">Total</th>
        </tr>
        <?php
        $tsks = 0;
        $tindex = 0;
        $no = 1;
        foreach($khs->result() as $row):
        $sks = $row->SKS;
        if(!is_numeric($sks)){ $sks = 0;}
        $total = $sks * $row->asss;
        if($row->KodeMatkul){?>
        <tr style="text-align: center;">
        <td style="border: 1px solid black;"><?= $no++; ?></td>
        <td style="border: 1px solid black;"><?= $row->KodeMatkul; ?></td>
        <td style="border: 1px solid black; text-align: left;"><?= $row->namamatkul; ?></td>
        <td style="border: 1px solid black;"><?php if(is_numeric($row->SKS)){ echo $row->SKS; }?></td>
        <td style="border: 1px solid black;"><?= $row->nilaiakhir; ?></td>
        <td style="border: 1px solid black;"><?= $row->asss; ?></td>
        <td style="border: 1px solid black;"><?= $total; ?></td>
        </tr>
        <?php
        $sks = $row->SKS;
        $index = $row->asss;
        if(!is_numeric($sks)){ $sks = 0;}
        if(!is_numeric($index)){ $index = 0;}
        $tsks += $sks;
                            $tindex += ($index * $sks);
        if($tindex > 0 | $tsks >0){
        $ip = round($tindex / $tsks, 2);
        }
                        }
                    endforeach; ?>
        <tr style="text-align: right;">
        <th colspan="5" style="border: 1px solid black;">Total SKS</th>
        <td colspan="2" style="text-align: center; border: 1px solid black;"><?= $tsks; ?></td>
        </tr>
        <tr>
        <th colspan="5" style="border: 1px solid black;">Index Prestasi Semester (IPS)</th>
        <td colspan="2" style="text-align: center; border: 1px solid black;"><?= $ip; ?></td>
        </tr>
    </table>
    <p><small><i>Ket. Dokumen ini SAH apabila ada validasi sbb :</i></small></p>

    <table style="width: 100%;">
        <tr>
            <td style="width: 70%;">
            <table style="border: 1px solid black; width: 60%; border-collapse: collapse; margin-top: 10px;">
            <tr>
                <th style="font-size: 12px;">VALIDASI/VALIDATION<br></th>
            </tr>
            <tr>
                <td style="text-align: center;"><p style="font-size: 10px; margin-top: 0px;">Dokumen ini dinyatakan benar<br><i>This document is declared true</i><br><p style="font-size: 10px; text-align: left; margin-left: 5px;">Tanggal/<i>Date</i> :</p></p></td>
            </tr>
            <tr>
                <td style="text-align: left;"></td>
            </tr>
            <tr>
                <th style="font-size: 12px; font-family: cooper;">POLITEKNIK PIKSI GANESHA<br><br><br><br><br></th>
            </tr>

            <tr>
            <td style="text-align: center;"><p style="font-size: 10px; margin-bottom: 0px;"><b><u>Ai Susi Susanti, S.ST., M.M., MOS.</u></b><br><i>Wadir 1 Bid. Akademik</i></p></td>
            </tr>
            </table>
				<p style="font-size: 10px;">
					Keterangan : <br><br>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1. KHS ini hanya dicetak 1 (satu) kali dan dianggap sah jika ada tanda tangan dan cap lembaga<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2. Jika KHS ini belum lengkap silahkan ke bagian Akademik untuk proses perbaikan dan validasi<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3. KHS ini agar difotocopy untuk arsip dan disimpan dengan baik sebagai syarat mengikuti ujian<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;akhir semester berikutnya dan syarat ujian sidang
				</p>
            </td>  
            <td style="width: 30%;">
            <table>
                <tr>
                <?php
                    $bulan = date('F');
                    switch ($bulan){
                        case "January":
                            $bulan_ind = 'Januari';
                            break;
                        case "February":
                        $bulan_ind = 'Februari';
                        break;
                        case "March":
                        $bulan_ind = 'Maret';;
                        break;
                        case "April":
                        $bulan_ind = 'April';;
                        break;
                        case "May":
                        $bulan_ind = 'Mei';;
                        break;
                        case "June":
                        $bulan_ind = 'Juni';;
                        break;              
                        case "July":
                        $bulan_ind = 'Juli';;
                        break;
                        case "August":
                        $bulan_ind = 'Agustus';;
                        break;
                        case "September":
                        $bulan_ind = 'September';;
                        break;
                        case "October":
                        $bulan_ind = 'Oktober';;
                        break; 
                        case "November":
                        $bulan_ind = 'November';;
                        break;
                        case "Desember":
                        $bulan_ind = 'November';;
                        break;                    
                        default:
                            echo "Semeter tidak di Ketahui!";
                    }
                    
                    ?>
                    <td><p style="font-size: 10px; text-align: center;">Bandung, <?= date('d')?> <?= $bulan_ind; ?> <?= date('Y')?></p></td>
                </tr>
                <tr>
                    <td>
                    <img src="<?= base_url('assets/');?>dist/img/ttd_buai.jpg" alt="ttd buai" style="width: 150px;">
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;"><p style="font-size: 10px; margin-top: 0px;"><b><u>Ai Susi Susanti, S.ST., M.M., MOS.</u></b><br><i>Wadir 1 Bid. Akademik</i></p></td>
                </tr>
            </table>
            </td>  
        </tr>
    </table>
</body></html>