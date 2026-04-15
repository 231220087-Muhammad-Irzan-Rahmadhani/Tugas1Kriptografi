<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator FPB Modern - Euclidean</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; font-family: 'Poppins', sans-serif; }
        
        body { 
            /* Ganti ke kombinasi Biru Navy dan Biru Muda/Cyan */
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 50%, #2193b0 100%);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            color: #333;
        }

        .container { 
            background: rgba(255, 255, 255, 0.98);
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.3);
            width: 100%;
            max-width: 450px;
            transition: transform 0.3s ease;
            border-top: 5px solid #00d2ff; /* Aksen biru di atas */
        }

        .container:hover { transform: translateY(-8px); }

        h2 { 
            text-align: center; 
            color: #1e3c72;
            margin-bottom: 30px;
            font-weight: 600;
            letter-spacing: -0.5px;
        }

        label { font-size: 0.85rem; font-weight: 600; color: #555; text-transform: uppercase; }

        input[type="number"] { 
            width: 100%; 
            padding: 12px; 
            margin: 8px 0 20px 0; 
            border: 2px solid #e1e8ed; 
            border-radius: 10px; 
            outline: none;
            transition: all 0.3s;
            font-size: 1rem;
        }

        input[type="number"]:focus { border-color: #2193b0; box-shadow: 0 0 8px rgba(33, 147, 176, 0.2); }

        input[type="submit"] { 
            background: linear-gradient(to right, #00d2ff, #3a7bd5);
            color: white; 
            padding: 14px; 
            border: none; 
            border-radius: 10px; 
            cursor: pointer; 
            width: 100%; 
            font-size: 1rem;
            font-weight: 600;
            box-shadow: 0 4px 15px rgba(58, 123, 213, 0.4);
            transition: all 0.3s;
        }

        input[type="submit"]:hover { 
            box-shadow: 0 6px 20px rgba(58, 123, 213, 0.6);
            filter: brightness(1.1);
        }

        .result-box { 
            margin-top: 30px; 
            padding: 20px; 
            border-radius: 15px; 
            text-align: center;
            animation: fadeIn 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .prima { background-color: #e3f9e5; border: 1px solid #a8e6b1; color: #1b5e20; }
        .tidak-prima { background-color: #fff1f0; border: 1px solid #ffa39e; color: #a8071a; }

        .fpb-value { font-size: 2.5rem; display: block; margin: 5px 0; font-weight: 600; }
        .status-text { font-size: 0.9rem; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Kalkulator FPB</h2>
    
    <form method="POST" action="">
        <label>Angka 1 (Nilai A)</label>
        <input type="number" name="angka1" placeholder="Masukkan angka..." required>
        
        <label>Angka 2 (Nilai B)</label>
        <input type="number" name="angka2" placeholder="Masukkan angka..." required>
        
        <input type="submit" name="hitung" value="PROSES HITUNG">
    </form>

    <?php
    if (isset($_POST['hitung'])) {
        $a = intval($_POST['angka1']);
        $b = intval($_POST['angka2']);

        function hitungFPB($a, $b) {
            $a = abs($a);
            $b = abs($b);
            while ($b != 0) {
                $temp = $a % $b;
                $a = $b;
                $b = $temp;
            }
            return $a;
        }

        $hasil = hitungFPB($a, $b);
        $isRelatifPrima = ($hasil == 1);
        $class = $isRelatifPrima ? 'prima' : 'tidak-prima';
        $status = $isRelatifPrima ? 'RELATIF PRIMA' : 'TIDAK RELATIF PRIMA';

        echo "<div class='result-box $class'>";
        echo "FPB dari $a & $b adalah:";
        echo "<span class='fpb-value'>$hasil</span>";
        echo "<span class='status-text'>$status</span>";
        echo "</div>";
    }
    ?>
</div>

</body>
</html>