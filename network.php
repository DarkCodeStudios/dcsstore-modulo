<?php
// Configura qui la tua rete
$rete = "192.168.1.0/24"; 
$router_ip = "192.168.1.1"; // Cambia con il gateway reale

function runCommand($cmd) {
    return "<pre>" . shell_exec("sudo $cmd") . "</pre>";
}

// Controlla se è stato premuto un bottone
$action = $_GET['action'] ?? null;
$target = $_GET['target'] ?? null;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>LAN Scanner Dashboard</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; padding:20px; }
        h1 { color: #333; }
        .box { background:white; padding:15px; margin:15px 0; border-radius:10px; box-shadow:0 0 10px rgba(0,0,0,0.1);}
        a.button { display:inline-block; padding:10px 15px; margin:5px; background:#007BFF; color:white; text-decoration:none; border-radius:5px;}
        a.button:hover { background:#0056b3; }
        table { border-collapse:collapse; width:100%; margin-top:10px; }
        th, td { border:1px solid #ccc; padding:8px; text-align:left; }
        th { background:#eee; }
    </style>
</head>
<body>
    <h1>📡 LAN Scanner Dashboard</h1>

    <div class="box">
        <h2>Dispositivi connessi alla LAN</h2>
        <a class="button" href="?action=scan_lan">Scansiona LAN</a>
        <?php
        if ($action === "scan_lan") {
            echo "<h3>Risultato scansione LAN ($rete)</h3>";
            $output = shell_exec("sudo nmap -sn $rete");
            echo "<pre>$output</pre>";

            // Estrai IP dalla scansione
            preg_match_all('/Nmap scan report for (.*?)\n/', $output, $matches);
            if (!empty($matches[1])) {
                echo "<table><tr><th>Dispositivo</th><th>Azioni</th></tr>";
                foreach ($matches[1] as $host) {
                    echo "<tr><td>$host</td><td><a class='button' href='?action=scan_host&target=$host'>Scansiona porte</a></td></tr>";
                }
                echo "</table>";
            }
        }
        ?>
    </div>

    <div class="box">
        <h2>Porte aperte sul router (<?php echo $router_ip; ?>)</h2>
        <a class="button" href="?action=scan_router">Scansiona Router</a>
        <?php
        if ($action === "scan_router") {
            echo "<h3>Scansione porte su router ($router_ip)</h3>";
            echo runCommand("nmap -Pn $router_ip");
        }
        ?>
    </div>

    <div class="box">
        <h2>Scansione vulnerabilità rete</h2>
        <a class="button" href="?action=scan_vuln">Avvia Vulnerability Scan</a>
        <?php
        if ($action === "scan_vuln") {
            echo "<h3>Vulnerability Scan in corso ($rete)</h3>";
            // richiede nmap con script NSE (vuln)
            echo runCommand("nmap --script vuln $rete");
        }
        ?>
    </div>

    <?php
    if ($action === "scan_host" && $target) {
        echo "<div class='box'><h2>Dettagli host: $target</h2>";
        echo runCommand("nmap -Pn -A $target");
        echo "</div>";
    }
    ?>
</body>
</html>
