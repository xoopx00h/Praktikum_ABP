<!DOCTYPE html>
<html>
<head>
    <title>Sistem Penilaian Mahasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        table {
            border-collapse: collapse;
            width: 80%;
        }

        th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2>Sistem Penilaian Mahasiswa</h2>

<?php

// Array Asosiatif Data Mahasiswa
$mahasiswa = [
    [
        "nama" => "Laila ",
        "nim" => "2311102283",
        "tugas" => 85,
        "uts" => 80,
        "uas" => 90
    ],
    [
        "nama" => "Dinda",
        "nim" => "2311102271",
        "tugas" => 75,
        "uts" => 70,
        "uas" => 78
    ],
    [
        "nama" => "Nadia",
        "nim" => "2311102298",
        "tugas" => 60,
        "uts" => 65,
        "uas" => 70
    ]
];

// Function hitung nilai akhir
function hitungNilaiAkhir($tugas, $uts, $uas) {
    return ($tugas * 0.3) + ($uts * 0.3) + ($uas * 0.4);
}

// Function menentukan grade
function tentukanGrade($nilaiAkhir) {
    if ($nilaiAkhir >= 85) {
        return "A";
    } elseif ($nilaiAkhir >= 75) {
        return "B";
    } elseif ($nilaiAkhir >= 65) {
        return "C";
    } elseif ($nilaiAkhir >= 50) {
        return "D";
    } else {
        return "E";
    }
}

$totalNilai = 0;
$nilaiTertinggi = 0;

echo "<table>";
echo "
<tr>
    <th>Nama</th>
    <th>NIM</th>
    <th>Nilai Akhir</th>
    <th>Grade</th>
    <th>Status</th>
</tr>
";

// Loop menampilkan data mahasiswa
foreach ($mahasiswa as $mhs) {

    $nilaiAkhir = hitungNilaiAkhir(
        $mhs['tugas'],
        $mhs['uts'],
        $mhs['uas']
    );

    $grade = tentukanGrade($nilaiAkhir);

    // Operator Perbandingan
    if ($nilaiAkhir >= 75) {
        $status = "Lulus";
    } else {
        $status = "Tidak Lulus";
    }

    echo "<tr>
            <td>{$mhs['nama']}</td>
            <td>{$mhs['nim']}</td>
            <td>" . round($nilaiAkhir, 2) . "</td>
            <td>$grade</td>
            <td>$status</td>
          </tr>";

    $totalNilai += $nilaiAkhir;

    if ($nilaiAkhir > $nilaiTertinggi) {
        $nilaiTertinggi = $nilaiAkhir;
    }
}

echo "</table>";

// Rata-rata kelas
$rataRata = $totalNilai / count($mahasiswa);

echo "<br>";
echo "<b>Rata-rata Kelas:</b> " . round($rataRata, 2);
echo "<br>";
echo "<b>Nilai Tertinggi:</b> " . round($nilaiTertinggi, 2);

?>

</body>
</html>