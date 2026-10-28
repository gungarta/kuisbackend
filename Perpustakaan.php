
<?php

class Buku {
    public $judul;
    public $penulis;
    private $tersedia = true;

    public function __construct($judul, $penulis) {
        $this->judul = $judul;
        $this->penulis = $penulis;
    }

    public function getStatus() {
        return $this->tersedia;
    }

    public function setStatus($status) {
        $this->tersedia = $status;
    }

    public function tampilkanInfo() {
        echo "Judul: " . $this->judul . "<br>";
        echo "Penulis: " . $this->penulis . "<br>";
    }
}

class Anggota {
    public $nama;
    public $idAnggota;

    public function __construct($nama, $idAnggota) {
        $this->nama = $nama;
        $this->idAnggota = $idAnggota;
    }

    public function tampilkanInfo() {
        echo "Nama Anggota: " . $this->nama . "<br>";
        echo "ID Anggota: " . $this->idAnggota . "<br>";
    }
}

class Peminjaman extends Anggota {
    public $buku;

    public function __construct($nama, $idAnggota, $buku) {
        parent::__construct($nama, $idAnggota);
        $this->buku = $buku;
    }

    // Polimorfisme
    public function tampilkanInfo() {
        echo "Peminjaman oleh: " . $this->nama . "<br>";
        echo "ID Anggota: " . $this->idAnggota . "<br>";
        echo "Buku: " . $this->buku->judul . "<br>";
    }

    public function pinjamBuku() {
        if ($this->buku->getStatus()) {
            $this->buku->setStatus(false);
            echo "Buku berhasil dipinjam.<br>";
        } else {
            echo "Maaf, buku sedang dipinjam.<br>";
        }
    }

    public function kembalikanBuku() {
        $this->buku->setStatus(true);
        echo "Buku berhasil dikembalikan.<br>";
    }
}

// Membuat objek
$buku1 = new Buku("Laskar Pelangi", "Andrea Hirata");
$anggota1 = new Anggota("Arta", "A001");
$peminjaman1 = new Peminjaman("Arta", "A001", $buku1);

// Menampilkan informasi
echo "<h3>DATA BUKU</h3>";
$buku1->tampilkanInfo();

echo "<h3>DATA ANGGOTA</h3>";
$anggota1->tampilkanInfo();

echo "<h3>PROSES PEMINJAMAN</h3>";
$peminjaman1->tampilkanInfo();
$peminjaman1->pinjamBuku();

echo "<h3>STATUS BUKU</h3>";
echo "Tersedia: " .
    ($buku1->getStatus() ? "Ya" : "Tidak") . "<br>";

echo "<h3>PROSES PENGEMBALIAN</h3>";
$peminjaman1->kembalikanBuku();
echo "Tersedia: " .
    ($buku1->getStatus() ? "Ya" : "Tidak") . "<br>";

?>
