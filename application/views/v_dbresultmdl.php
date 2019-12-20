<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tampil Data Gender yang Disimpan Dengan Model</title>
</head>
<body>
    <h2>Data Kode Gender yang disimpan:</h2>
    <br>
    Kode Gender : <?= $kodegender; ?>
    <br>
    Nama Gender : <?= $namagender; ?>
    <br>
    <?= anchor("c_gender/inputdbmdl", "Tambah Gender!"); ?>
</body>
</html>