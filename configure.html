<?php
// configure.php – MSIC advanced settings panel

$configFile = __DIR__ . "/data/config.json";

if (!file_exists($configFile)) {
    // Default config if file not present
    $defaultConfig = [
        "minSearchChars" => 2,
        "caseSensitive" => false,
        "enableFuzzySearch" => true,
        "itemsPerPage" => 25,
        "theme" => "light",
        "defaultExport" => "csv"
    ];
    file_put_contents($configFile, json_encode($defaultConfig, JSON_PRETTY_PRINT));
}

$config = json_decode(file_get_contents($configFile), true);

// Save form
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $config["minSearchChars"] = intval($_POST["minSearchChars"]);
    $config["caseSensitive"] = isset($_POST["caseSensitive"]);
    $config["enableFuzzySearch"] = isset($_POST["enableFuzzySearch"]);
    $config["itemsPerPage"] = intval($_POST["itemsPerPage"]);
    $config["theme"] = $_POST["theme"];
    $config["defaultExport"] = $_POST["defaultExport"];

    file_put_contents($configFile, json_encode($config, JSON_PRETTY_PRINT));
    $saved = true;
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>MSIC - Configure Settings</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background: #f2f6f9;
        margin: 0;
        padding: 0;
    }
    .wrapper {
        max-width: 850px;
        margin: 30px auto;
        background: white;
        padding: 25px;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.08);
    }
    h2 {
        margin-bottom: 10px;
    }
    .msg {
        padding: 10px 15px;
        background: #c8ffd0;
        border-left: 5px solid #2ecc71;
        margin-bottom: 15px;
        border-radius: 6px;
    }
    .section {
        margin-bottom: 25px;
        padding-bottom: 15px;
        border-bottom: 1px solid #ddd;
    }
    label {
        font-weight: bold;
        display: block;
        margin-bottom: 6px;
    }
    input[type="number"], select {
        padding: 10px;
        width: 100%;
        border-radius: 6px;
        border: 1px solid #aaa;
        margin-bottom: 15px;
        font-size: 14px;
    }
    .checkbox-group {
        margin-bottom: 15px;
    }
    .checkbox-group label {
        display: flex;
        align-items: center;
        gap: 10px;
        font-weight: normal;
        cursor: pointer;
    }
    .btn-save {
        background: #0fa3a3;
        border: none;
        padding: 12px 20px;
        border-radius: 8px;
        color: white;
        cursor: pointer;
        font-size: 15px;
        transition: 0.2s;
    }
    .btn-save:hover {
        background: #0c7c7c;
    }
    .back {
        text-decoration: none;
        margin-left: 15px;
        color: #333;
    }
</style>
</head>
<body>

<div class="wrapper">
    <h2>⚙ Advanced Settings</h2>
    <p>Configure search behavior, export defaults, and UI preferences for your MSIC system.</p>

    <?php if(isset($saved)): ?>
    <div class="msg">Settings saved successfully!</div>
    <?php endif; ?>

    <form method="post">

        <!-- SEARCH SETTINGS -->
        <div class="section">
            <h3>🔍 Search Settings</h3>

            <label>Minimum characters before search starts</label>
            <input type="number" name="minSearchChars" value="<?= $config['minSearchChars'] ?>" min="1">

            <div class="checkbox-group">
                <label>
                    <input type="checkbox" name="caseSensitive" <?= $config['caseSensitive'] ? "checked" : "" ?>>
                    Case-sensitive search
                </label>
            </div>

            <div class="checkbox-group">
                <label>
                    <input type="checkbox" name="enableFuzzySearch" <?= $config['enableFuzzySearch'] ? "checked" : "" ?>>
                    Enable fuzzy search (better results for typos)
                </label>
            </div>
        </div>

        <!-- DISPLAY SETTINGS -->
        <div class="section">
            <h3>🖥 Display Settings</h3>

            <label>Items per page</label>
            <input type="number" name="itemsPerPage" value="<?= $config['itemsPerPage'] ?>" min="5" max="200">

            <label>Default Theme</label>
            <select name="theme">
                <option value="light" <?= $config['theme']=="light"?"selected":"" ?>>Light</option>
                <option value="dark" <?= $config['theme']=="dark"?"selected":"" ?>>Dark</option>
            </select>
        </div>

        <!-- EXPORT SETTINGS -->
        <div class="section">
            <h3>📁 Export Options</h3>

            <label>Default export format</label>
            <select name="defaultExport">
                <option value="csv" <?= $config['defaultExport']=="csv"?"selected":"" ?>>CSV</option>
                <option value="json" <?= $config['defaultExport']=="json"?"selected":"" ?>>JSON</option>
            </select>
        </div>

        <button class="btn-save">Save Settings</button>
        <a class="back" href="index.php">← Back to Admin</a>
    </form>

</div>

</body>
</html>
