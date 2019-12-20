<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Entri Kode Gender</title>
</head>
<body>
    <h2>Form Kode Gender!</h2>
    <form action="<?= site_url("c_gender/savedb"); ?>" method="post">
        Kode Gender : <input type="text" name="kodegender" value="<?= $kodegender; ?>">
        <br/>
        Nama Gender : <input type="text" name="namagender" value="<?= $namagender; ?>">
        <br/>
        <button type="submit">Simpan</button>
        <button type="reset">Reset</button>
    </form>
</body>
</html>