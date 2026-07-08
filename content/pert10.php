<h3 style="text-align: center;">Ini adalah halaman untuk pertemuan ke 10</h3>         
    <hr>         
        <h3 style="text-align: center;">Array sederhana tentang Buah</h3>         
    <?php        

    // Array sederhana         
    $buah = array("Apel", "Jeruk", "Mangga");         
    ?>       

    <!-- Loop untuk menampilkan array -->         
    <h3>Daftar Buah:</h3>         
    <ul class='list-utama'>   
    <!-- foreach digunakan untuk pengulangan kumpulan data (array) -->             
        <?php foreach ($buah as $item): ?>                 
            <li><?= $item; ?></li>             
        <?php endforeach; ?>         
    </ul>         
    <hr>         
    <?php         
    // Array data mahasiswa         
    $mahasiswa = array(             
        ["Nama" => "Ali", "NIM" => "12345", "Nilai" => 85],             
        ["Nama" => "Budi", "NIM" => "12346", "Nilai" => 90],             
        ["Nama" => "Cici", "NIM" => "12347", "Nilai" => 78]         
    );         
    
    echo "<h3>Data Mahasiswa</h3>";         
    ?>         
    <div>             
        <table class="table table-striped">                 
            <tr>                     
                <th>Nama</th>                     
                <th>NIM</th>                     
                <th>Nilai</th>                     
                <th>Status</th>                 
            </tr>                 
    <?php                 
    foreach ($mahasiswa as $mhs):                     
        if ($mhs['Nilai'] >= 80) {                         
            $status = "Lulus";                     
        } else {                         
            $status = "Tidak Lulus";                     
        }                 
    ?>                     
        <tr>                         
            <td><?= $mhs['Nama']; ?></td>                         
            <td><?= $mhs['NIM']; ?></td>                         
            <td><?= $mhs['Nilai']; ?></td>                         
            <td><?= $status; ?></td>                     
            </tr>           
        <?php endforeach; ?>             
        </table>         
    </div>         
    <hr>         
    <?php         
    $mahasiswa = array(         
        ["Nama" => "Ali", "NIM" => "12345", "Nilai" => [85, 90, 88]],         
        ["Nama" => "Budi", "NIM" => "12346", "Nilai" => [78, 82, 80]],         
        ["Nama" => "Cici", "NIM" => "12347", "Nilai" => [92, 95, 93]]         
    );         
    ?>         
    <div>             
        <table class="table table-striped">                 
            <thead>                     
                <tr>                         
                    <th>Nama</th>                         
                    <th>Nim</th>                         
                    <th>Nilai-1</th>                         
                    <th>Nilai-2</th>                         
                    <th>Nilai-3</th>                         
                    <th>Rata-rata</th>                     
                </tr>                 
            </thead>                 
            <?php foreach ($mahasiswa as $mhs): ?>                     
            <tr>                         
                <td><?= $mhs['Nama']; ?></td>                         
                <td><?= $mhs['NIM']; ?></td>                         
                <?php foreach ($mhs['Nilai'] as $nilai): ?>                             
                    <td><?= $nilai; ?></td>                         
                <?php endforeach; ?>                         
                    <?php $rata = array_sum($mhs['Nilai']) / 
count($mhs['Nilai']); ?>                         
                <td><?= $rata; ?></td> 
                <?php endforeach; ?> 
                </tr> 
        </table> 
</div> 