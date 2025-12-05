<?php
session_start();
if(!($_SESSION['admin'] ?? false)){
    header("Location: adminlogin.php");
    exit;
}

$searchFile = __DIR__ . '/data/search.json';
$compareFile = __DIR__ . '/data/compare.json';
$backupDir = __DIR__ . '/backups';

if(!is_dir($backupDir)) mkdir($backupDir);

$msg = "";

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $type = $_POST['type'];
    $content = $_POST['content'];

    json_decode($content);
    if(json_last_error() !== JSON_ERROR_NONE){
        $msg = "❌ Invalid JSON. Not saved.";
    } else {
        $file = ($type === 'search') ? $searchFile : $compareFile;

        $backupName = $backupDir . '/' . basename($file) . '.' . date("Ymd_His") . '.bak';
        copy($file, $backupName);

        file_put_contents($file, $content);
        $msg = "✔ Saved successfully + backup created.";
    }
}

$searchContent = file_exists($searchFile) ? file_get_contents($searchFile) : '';
$compareContent = file_exists($compareFile) ? file_get_contents($compareFile) : '';
$backups = glob($backupDir . "/*.bak");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>MSIC Admin Panel</title>
<script src="https://cdn.tailwindcss.com"></script>

<!-- MONACO EDITOR CDN -->
<script>
var require = { paths: { vs: "https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.45.0/min/vs" } };
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.45.0/min/vs/loader.min.js"></script>

<style>
.editor-box { height: 600px; border: 1px solid #333; border-radius: 10px; overflow: hidden; }
.dark-bg { background:#0f172a; color:white; }
</style>
</head>

<body class="dark-bg min-h-screen">

<header class="p-4 bg-gray-900 text-white flex justify-between items-center border-b border-gray-700">
    <h2 class="text-xl font-bold">MSIC Admin Panel (Monaco Edition)</h2>
    <a href="adminlogout.php" class="underline">Logout</a>
</header>

<div class="container mx-auto p-6">

<?php if($msg): ?>
<div class="p-3 mb-4 bg-green-700 text-green-200 rounded"><?php echo $msg; ?></div>
<?php endif; ?>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

    <!-- SEARCH.JSON PANEL -->
    <div class="bg-gray-800 p-5 rounded-xl shadow-xl">
        <h3 class="text-lg font-bold text-white mb-2">search.json</h3>
        <p class="text-gray-400 text-sm mb-3">Last updated: <?php echo date("d M Y H:i", filemtime($searchFile)); ?></p>

        <div id="editorSearch" class="editor-box"></div>

        <div class="flex gap-3 mt-4">
            <button onclick="formatEditor(searchEditor)"
                class="px-4 py-2 rounded bg-gray-700 text-white hover:bg-gray-600">
                Format JSON
            </button>

            <form method="post" onsubmit="return saveSearch();">
                <input type="hidden" name="type" value="search">
                <input type="hidden" id="searchContent" name="content">
                <button class="px-4 py-2 rounded bg-blue-600 text-white hover:bg-blue-500">
                    Save File
                </button>
            </form>
        </div>
    </div>

    <!-- COMPARE.JSON PANEL -->
    <div class="bg-gray-800 p-5 rounded-xl shadow-xl">
        <h3 class="text-lg font-bold text-white mb-2">compare.json</h3>
        <p class="text-gray-400 text-sm mb-3">Last updated: <?php echo date("d M Y H:i", filemtime($compareFile)); ?></p>

        <div id="editorCompare" class="editor-box"></div>

        <div class="flex gap-3 mt-4">
            <button onclick="formatEditor(compareEditor)"
                class="px-4 py-2 rounded bg-gray-700 text-white hover:bg-gray-600">
                Format JSON
            </button>

            <form method="post" onsubmit="return saveCompare();">
                <input type="hidden" name="type" value="compare">
                <input type="hidden" id="compareContent" name="content">
                <button class="px-4 py-2 rounded bg-blue-600 text-white hover:bg-blue-500">
                    Save File
                </button>
            </form>
        </div>
    </div>

</div>

<!-- BACKUP LIST -->
<div class="bg-gray-800 p-5 rounded-xl shadow-xl mt-10">
    <h3 class="text-lg font-bold text-white mb-3">Backup History</h3>
    <ul class="text-blue-300 text-sm list-disc pl-5">
        <?php foreach($backups as $b): ?>
            <li class="mb-1">
                <a href="<?php echo 'backups/' . basename($b); ?>" download class="underline">
                    <?php echo basename($b); ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>

</div>

<script>
let searchEditor, compareEditor;

require(["vs/editor/editor.main"], function () {

    searchEditor = monaco.editor.create(document.getElementById('editorSearch'), {
        value: <?php echo json_encode($searchContent); ?>,
        language: "json",
        theme: "vs-dark",
        automaticLayout: true
    });

    compareEditor = monaco.editor.create(document.getElementById('editorCompare'), {
        value: <?php echo json_encode($compareContent); ?>,
        language: "json",
        theme: "vs-dark",
        automaticLayout: true
    });
});

// Format JSON using Monaco API
function formatEditor(editor){
    editor.getAction('editor.action.formatDocument').run();
}

// Save handlers
function saveSearch(){
    document.getElementById('searchContent').value = searchEditor.getValue();
    return true;
}

function saveCompare(){
    document.getElementById('compareContent').value = compareEditor.getValue();
    return true;
}
</script>

</body>
</html>
