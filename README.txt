MSIC 2025 Explorer - XAMPP-ready project
---------------------------------------
Files:
- index.php       : Main frontend
- api.php         : Backend API (reads data/search.json & data/compare.json)
- compare.php     : Compare UI
- admin.php       : Simple local editor (for development only)
- styles.css      : CSS
- data/search.json   : Your uploaded search dataset (copied)
- data/compare.json  : Your uploaded compare dataset (copied)


Notes:
- admin.php allows editing the JSON files locally. Do NOT enable on a public server.
- api.php supports:
   ?action=search&q=...&page=...
   ?action=get_by_code&code=...
   ?action=export&q=...
   ?action=compare&code=...
