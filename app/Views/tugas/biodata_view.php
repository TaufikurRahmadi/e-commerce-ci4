<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Biodata</title>
    <style>
       body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    margin: 0;
    padding: 20px;
    background-color: #f8f9fa;
    color: #343a40;
    display: flex;
    flex-direction: column;
    align-items: center;
}

h1 {
    margin-bottom: 20px;
    color: #28a745;
    font-size: 26px;
}

a {
    text-decoration: none;
    padding: 10px 20px;
    background-color: #28a745;
    color: #fff;
    border-radius: 8px;
    display: inline-block;
    margin-bottom: 20px;
    font-size: 14px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

a:hover {
    background-color: #218838;
}

table {
    width: 100%;
    max-width: 800px;
    border-collapse: collapse;
    margin-bottom: 20px;
    background-color: #fff;
    border-radius: 10px;
    overflow: hidden;
    border: 1px solid #dee2e6;
}

th, td {
    padding: 14px;
    text-align: left;
    font-size: 15px;
    color: #495057;
}

th {
    background-color: #28a745;
    color: #fff;
    text-transform: uppercase;
}

tr:nth-child(even) {
    background-color: #e9ecef;
}

tr:hover {
    background-color: #d4edda;
    cursor: pointer;
}

img {
    max-width: 300px;
    height: auto;
    border-radius: 10px;
    border: 2px solid #28a745;
}

@media (max-width: 600px) {
    table {
        font-size: 13px;
    }

    img {
        max-width: 50px;
    }
}

    </style>
</head>
<body>
    <h1>Daftar Biodata</h1>
    <a href="<?= base_url('biodata/create'); ?>">Tambah Biodata</a>
    <table>
        <thead>
            <tr>
                <th>Foto</th>
                <th>Nama Lengkap</th>
                <th>NIM</th>
                <th>Program Studi</th>
                <th>Alamat</th>
                <th>No. Telepon</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($biodata as $bio): ?>
                <tr>
                    <td>
                        <img src="<?= base_url('uploads/foto/' . $bio['foto']); ?>" 
                             alt="Foto <?= $bio['nama_lengkap']; ?>">
                    </td>
                    <td><?= $bio['nama_lengkap']; ?></td>
                    <td><?= $bio['nim']; ?></td>
                    <td><?= $bio['program_studi']; ?></td>
                    <td><?= $bio['alamat']; ?></td>
                    <td><?= $bio['no_telepon']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
