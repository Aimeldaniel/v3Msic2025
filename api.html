<?php
// api.php - lightweight API that reads JSON files
header('Content-Type: application/json; charset=utf-8');

$root = __DIR__;
$searchFile = $root . '/data/search.json';
$compareFile = $root . '/data/compare.json';

$action = $_GET['action'] ?? 'search';

function load_json($path){
    if(!file_exists($path)) return [];
    $txt = file_get_contents($path);
    $data = json_decode($txt, true);
    return is_array($data) ? $data : [];
}

if($action === 'search'){
    $q = trim($_GET['q'] ?? '');
    
    // Advanced filters
    $section   = trim($_GET['section'] ?? '');
    $division  = trim($_GET['division'] ?? '');
    $group     = trim($_GET['group'] ?? '');
    $classCode = trim($_GET['classCode'] ?? '');
    $keyword   = trim($_GET['keyword'] ?? '');
    $descType  = trim($_GET['descType'] ?? '');
    $sort      = trim($_GET['sort'] ?? 'code');

    $page    = max(1, (int)($_GET['page'] ?? 1));
    $perPage = 15;

    $data = load_json($searchFile);

    // FILTERING FUNCTION
    $filtered = array_values(array_filter($data, function($r) use (
        $q, $section, $division, $group, $classCode, $keyword, $descType
    ){
        $code = $r['MSIC 2025'] ?? ($r['msic_code'] ?? '');
        $desc = $r['DESCRIPTION 2025'] ?? ($r['description'] ?? '');
        $sec  = $r['SECTION MSIC 2025'] ?? ($r['section'] ?? '');
        $descMain     = $r['DESCRIPTION 2025'] ?? '';
        $descIncludes = $r['INCLUDES'] ?? '';
        $descExcludes = $r['EXCLUDES'] ?? '';

        // 1. Basic query (q)
        if($q !== ''){
            $found = false;
            foreach($r as $v){
                if($v && mb_stripos((string)$v, $q) !== false){
                    $found = true;
                    break;
                }
            }
            if(!$found) return false;
        }

        // 2. Section filter
        if($section !== '' && stripos($sec, $section) !== 0) return false;

        // 3. Division (first 2 digits)
        if($division !== '' && substr($code, 0, 2) !== $division) return false;

        // 4. Group (first 3 digits)
        if($group !== '' && substr($code, 0, 3) !== $group) return false;

        // 5. Class (first 4 digits)
        if($classCode !== '' && substr($code, 0, 4) !== $classCode) return false;

        // 6. Keyword filter
        if($keyword !== ''){
            if(
                mb_stripos($descMain, $keyword) === false &&
                mb_stripos($descIncludes, $keyword) === false &&
                mb_stripos($descExcludes, $keyword) === false
            ) return false;
        }

        // 7. Description type filter
        if($descType === 'main'     && $descMain     === '') return false;
        if($descType === 'includes' && $descIncludes === '') return false;
        if($descType === 'excludes' && $descExcludes === '') return false;

        return true;
    }));

    // 8. Sorting
    usort($filtered, function($a, $b) use ($sort){
        $codeA = $a['MSIC 2025'] ?? ($a['msic_code'] ?? '');
        $codeB = $b['MSIC 2025'] ?? ($b['msic_code'] ?? '');

        $nameA = $a['DESCRIPTION 2025'] ?? ($a['description'] ?? '');
        $nameB = $b['DESCRIPTION 2025'] ?? ($b['description'] ?? '');

        if($sort === 'name')
            return strcasecmp($nameA, $nameB);
        return strcmp($codeA, $codeB);
    });

    // Pagination
    $total = count($filtered);
    $totalPages = max(1, (int)ceil($total / $perPage));
    $offset = ($page - 1) * $perPage;
    $items = array_slice($filtered, $offset, $perPage);

    echo json_encode([
        'items' => $items,
        'total' => $total,
        'page' => $page,
        'per_page' => $perPage,
        'total_pages' => $totalPages
    ]);
    exit;
}


if($action === 'get_by_code'){
    $code = $_GET['code'] ?? '';
    $data = load_json($searchFile);
    foreach($data as $r){
        if((isset($r['MSIC 2025']) && $r['MSIC 2025'] === $code) || (isset($r['msic_code']) && $r['msic_code'] === $code)){
            echo json_encode($r); exit;
        }
    }
    http_response_code(404);
    echo json_encode(['error'=>'not found']);
    exit;
}

if($action === 'export'){
    $q = trim($_GET['q'] ?? '');
    $data = load_json($searchFile);
    if($q !== ''){
        $filtered = array_values(array_filter($data, function($r) use ($q){
            foreach($r as $v){ if($v && mb_stripos((string)$v,$q)!==false) return true; }
            return false;
        }));
    } else {
        $filtered = $data;
    }

    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename="msic_export.csv"');
    $out = fopen('php://output','w');
    // Attempt to extract columns from first row
    $headers = ['SECTION','SECTION_DESC','MSIC_2025','DESCRIPTION_2025'];
    fputcsv($out, $headers);
    foreach($filtered as $r){
        $row = [
            $r['SECTION MSIC 2025'] ?? ($r['section'] ?? ''),
            $r['DESCRIPTION MSIC 2025 '] ?? ($r['section_desc'] ?? ''),
            $r['MSIC 2025'] ?? ($r['msic_code'] ?? ''),
            $r['DESCRIPTION 2025'] ?? ($r['description'] ?? ''),
        ];
        fputcsv($out, $row);
    }
    fclose($out);
    exit;
}

if($action === 'compare'){
    $code = $_GET['code'] ?? '';
    $data = load_json($compareFile);
    $out = [];
    foreach($data as $r){
        if($code === '') { $out[] = $r; continue; }
        if(in_array($code, [$r['MSIC 2008'] ?? '', $r['MSIC 2025'] ?? ''])) $out[] = $r;
    }
    echo json_encode(['items'=>$out,'total'=>count($out)]);
    exit;
}

http_response_code(400);
echo json_encode(['error'=>'unknown action']);
