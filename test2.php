<?php

class Nilai{
    public $mapel;
    public $nilai;

    function __construct($mapel, $nilai){
        $this->mapel = $mapel;
        $this->nilai = $nilai;
    }
    }
    class Siswa{
        public $nrp;
        public $nama;
        public $daftarNilai = array();

        function __construct($nrp, $nama){
            $this->nrp = $nrp;
            $this->nama = $nama;
        }
        function tambahNilai($nilai_obj){
            if(count($this->daftarNilai) < 3 ){
                array_push($this->daftarNilai, $nilai_obj);
            }
        }
    }
    function generateRandomString($length = 10){
        $characters = 'abcdefghijklmnopqrstuvwxyz';
        $randomString = '';
        for($i = 0; $i < $length; $i++){
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }
    function generateRandomMapel(){
        $mapel_list = ['inggris', 'indonesia', 'jepang'];
        return $mapel_list[array_rand($mapel_list)];
    }
    function generateRandomNilai(){
        return rand(0, 100);
    }
    $daftar_siswa = array();
    $siswa_baru = new Siswa('NRP123', 'Siswa Baru');
    $nilai_siswa_baru = new Nilai('inggris', 100);
    $siswa_baru->tambahNilai($nilai_siswa_baru);

    for($i = 0; $i < 10; $i++){
        $nama_siswa = generateRandomString(10);
        $nrp_siswa = 'NRP' . ($i + 1);
        $siswa = new Siswa($nrp_siswa, $nama_siswa);
        $nilai = new Nilai(generateRandomMapel(), generateRandomNilai());
        $siswa->tambahNilai($nilai);
        array_push($daftar_siswa, $siswa);
    }
    foreach($daftar_siswa as $siswa){
        echo "NRP: ".$siswa->nrp."<br/>";
        echo "Nama: ".$siswa->nama."<br/>";
        echo "Daftar Nilai: "."<br/>";
        foreach($siswa->daftarNilai as $nilai){
            echo "- Mapel: ".$nilai->mapel.", Nilai:" . $nilai->nilai . "<br>";
        } 
        echo "<br/>";
    }
    ?>
