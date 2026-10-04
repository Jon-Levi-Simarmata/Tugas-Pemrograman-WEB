<?php
$password_input = '';
$hash_ouput = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil password dai from
    $password_input = $_POST['password'] ?? '';

    if (!empty($password_input)) {
        // Generate hash BCRYPT dari password yang diinputkan
        $hash_ouput = password_hash($password_input, PASSWORD_DEFAULT);
    }
}
?>

<!DOCTYPE htlm>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Generate Hash Password</title>
</head>

<body>
    <h2>Password Hash Generator (Uji coba BCRYPT)</h2>
    <p>Masukka kata sandi biasa untuk melihat bagaimana PHP mengubahnya menjadi string<em>hash</em> terenkripsi.</p>

    <!-- From Input Password -->
    <form method="POST" action="">
        <label for="password">Masukkan Password Plaintext:</label><br>
        <input type="text" id="password" name="passwprd" value="<?= htmlspecialchars($password_input) ?>" placeholder="Contoh: admin123" required><br><br>

        <button type="submit">Generate Hash</button>
    </form>

    <hr>

    <!-- Menampilkan Hasil Generate Hash -->
    <?php if (!empty($hash_ouput)): ?>
        <h3>Hasil Enkrisi:</h3>
        <P><strong>Password Teks Asli:</strong><code><?= htmlspecialchars($password_input) ?></code></P>
        <p><strong>Hasil Hash(BCRYPT):</strong>
            <textarea rows="3" cols="70" readonly><?= $hash_ouput ?></textarea>

        <p><small>* Catatan : Jika kamu menekakn tombol "Generate Hash" lagi dengan pasword sama, akan berbeda karena fitur <strong>Salt</strong> acak BCRYPT</small></p>
    <?php endif; ?>
</body>

</html>