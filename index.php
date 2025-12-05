<?php
// Main UI
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MSIC 2025 - Malaysian Standard Industrial Classification</title>
    <link rel="stylesheet" href="styles.css" />

    <style>
      /* Smooth slide toggle animation */
      #advancedFilters {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.4s ease;
        background: #0F97A3;
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 0 20px;
        margin-top: 10px;
      }
      #advancedFilters.open {
        max-height: 800px;
        padding: 20px;
      }

/* ===========================
   Advanced Filters
=========================== */
.filters-section {
  background: #fff;
  padding: 20px;
  margin-top: 15px;
  border-radius: 10px;
  box-shadow: 0 2px 6px rgba(0,0,0,0.08);
}

.filters-section.hidden {
  display: none;
}

.filters-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 18px;
  margin-top: 15px;
}

.filter-item label {
  font-weight: 600;
  margin-bottom: 5px;
  display: block;
}

.filter-item input,
.filter-item select {
  width: 100%;
  padding: 8px 10px;
  border: 1px solid #ccc;
  border-radius: 6px;
  font-size: 14px;
}

.filters-actions {
  margin-top: 20px;
  display: flex;
  gap: 10px;
  justify-content: flex-end;
}

.btn {
  padding: 8px 15px;
  border-radius: 6px;
  border: none;
  cursor: pointer;
  background: #ccc;
}

.btn.primary {
  background: #0072ce;
  color: white;
}

/* Toggle Button */
#toggleFilters {
  padding: 10px 15px;
  background: #0072ce;
  color: white;
  border: none;
  border-radius: 6px;
  cursor: pointer;
  margin-bottom: 15px;
}
    </style>

  </head>

<body>

<!-- Navbar -->
<header>
  <div class="logo">
    <div class="logo-icon">
  <svg width="55" height="55" viewBox="0 0 24 24" fill="white" xmlns="http://www.w3.org/2000/svg">
  <path d="M12 2L3 7V9H21V7L12 2Z" fill="white"/>
  <path d="M5 10H7V19H5V10Z" fill="white"/>
  <path d="M9 10H11V19H9V10Z" fill="white"/>
  <path d="M13 10H15V19H13V10Z" fill="white"/>
  <path d="M17 10H19V19H17V10Z" fill="white"/>
  <path d="M3 20H21V22H3V20Z" fill="white"/>
</svg>
</div>
    <div>
      <h1 style="color: white;">Ministry of Economy</h1>
      <small style="color: white;">Department of Statistics Malaysia</small>
    </div>
  </div>
  <nav>
    <ul>
      <li><a href="#">Home</a></li>
      <li><a href="#">About MSIC</a></li>
      <li><a href="#searchTool">Search</a></li>
      <li><a href="compare.php">Compare</a></li>
    </ul>
  </nav>
  <div class="lang-toggle">
    <button id="btnEN" class="active">EN</button>
    <button id="btnBM">BM</button>
  </div>
</header>

<!-- Hero -->
<div class="hero">
  <div class="container">
  <div class="badge">Official Malaysian Standard</div>
  <h1 id="heroTitle">MSIC 2025</h1>
  <p id="heroDesc">
    Malaysian Standard Industrial Classification – The official classification system for economic activities in Malaysia.
  </p>
  <div class="stats">
    <div class="stat-box"><h2>21</h2><p2>Main Sections</p2></div>
    <div class="stat-box"><h2>1352+</h2><p2>Industry Classes</p2></div>
    <div class="stat-box"><h2>2025</h2><p2>Latest Version</p2></div>
  </div><br>
</div>
</div>


<!-- Features -->
<br>
<main class="container"><br>
<section class="features"><br>
  <h2>Explore MSIC Database</h2>
  <p>Access comprehensive industrial classification data with our advanced search and comparison tools.</p><br>

  <div class="cards">
    <div class="card">
      <div class="icon">🔍</div>
      <h3>Search MSIC Codes</h3>
      <p>Find industry classifications using keywords, codes or descriptions.</p>
      <button id="startSearch" class="btn">Start Search</button>
    </div>

    <div class="card">
      <div class="icon">📊</div>
      <h3>Compare Classifications</h3>
      <p>Compare MSIC 2008 ↔ MSIC 2025 mappings</p>
      <button class="btn" onclick="window.location.href='compare.php'">Compare Now</button>
    </div>

    <div class="card">
      <div class="icon">⚙️</div>
      <h3>Advanced Settings</h3>
      <p>Customize search parameters</p>
      <button id="configure" class="btn">Configure</button>
    </div>
  </div>
</section>

<!-- Search Tool -->
<section id="searchTool" class="search-section">
  <h2>Search MSIC Database</h2>
  <p class="muted">Enter MSIC code, industry name, or business description</p>

  <div class="search-panel">
    <input id="q" type="search" placeholder="Type MSIC code or description" />

    <div class="search-actions">
      <button id="searchBtn" class="btn primary">Search Database</button>
      <button id="filtersBtn" class="btn">Advanced Filters</button>
      <button id="exportBtn" class="btn">Export CSV</button>
    </div>
  </div>
</section>

<!-- Advanced Filters (Hidden by default) -->
<section id="advancedFilters">
  <h3>Advanced Filters</h3>
  <p class="muted">Refine your MSIC search using structured filters</p>

  <div class="filters-grid">

    <div class="filter-item">
      <label>Section</label>
      <select id="filterSection">
        <option value="">All Sections</option>
        <option value="A">A – Agriculture</option>
        <option value="B">B – Mining</option>
        <option value="C">C – Manufacturing</option>
        <option value="D">D – Utilities</option>
        <option value="E">E – Waste Management</option>
        <option value="F">F – Construction</option>
        <option value="G">G – Retail & Wholesale</option>
        <option value="H">H – Transport</option>
        <option value="I">I – Accommodation & Food</option>
        <option value="J">J – ICT</option>
        <option value="K">K – Finance</option>
        <option value="L">L – Real Estate</option>
        <option value="M">M – Professional Services</option>
        <option value="N">N – Support Services</option>
        <option value="O">O – Public Admin</option>
        <option value="P">P – Education</option>
        <option value="Q">Q – Health</option>
        <option value="R">R – Arts</option>
        <option value="S">S – Other Services</option>
      </select>
    </div>

    <div class="filter-item">
      <label>Division (2-digit)</label>
      <input id="filterDivision" type="text" maxlength="2" placeholder="01, 10, 47">
    </div>

    <div class="filter-item">
      <label>Group (3-digit)</label>
      <input id="filterGroup" type="text" maxlength="3" placeholder="011, 110, 471">
    </div>

    <div class="filter-item">
      <label>Class (4-digit)</label>
      <input id="filterClass" type="text" maxlength="4" placeholder="0111, 4711">
    </div>

    <div class="filter-item">
      <label>Keyword</label>
      <input id="filterKeyword" type="text" placeholder="transport, medical, repair">
    </div>

    <div class="filter-item">
      <label>Description Type</label>
      <select id="filterDescType">
        <option value="">Any</option>
        <option value="main">Main Activity</option>
        <option value="includes">Includes</option>
        <option value="excludes">Excludes</option>
      </select>
    </div>

    <div class="filter-item">
      <label>Sort By</label>
      <select id="filterSort">
        <option value="code">MSIC Code</option>
        <option value="name">Industry Name</option>
      </select>
    </div>
  </div>

  <div class="filters-actions">
    <button id="resetFilters" class="btn secondary">Reset</button>
    <button id="applyFilters" class="btn primary">Apply Filters</button>
  </div>
</section>

<!-- Results Table -->
<section class="results">
  <div class="results-header">
    <h3>MSIC 2025 Classifications</h3>
    <button class="btn ghost" onclick="window.location.href='compare.php'">Open Compare</button>
  </div>

  <div class="table-wrap" id="tableWrap">
    <table class="msic-table">
      <thead>
        <tr>
          <th>Section</th>
          <th>Section Description</th>
          <th>MSIC 2025</th>
          <th>Description</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody id="resultsBody"></tbody>
    </table>

    <div id="pager" class="pager"></div>
    <div id="resultInfo" class="muted" style="margin-top:10px"></div>
  </div>
</section>
</main>

<!-- Footer -->
<footer>
  <div class="footer-container">
    <div>
      <h4>MSIC 2025</h4>
        <p>The official classification system for economic activities in Malaysia, maintained by the Department of Statistics Malaysia.</p>
        <p style="margin-top:20px; font-size:13px;">© 2025 Department of Statistics Malaysia | Bahagian Perangkaan Pengeluaran Industri Dan Binaan | Malaysia Madani</p>
    <p style="font-size:12px;">Terms of Service | Privacy Policy | Accessibility</p>
    </div>
    <div>
      <h4>Quick Links</h4>
      <a href="#">About MSIC</a><br>
      <a href="admin.php">Updates</a>
    </div>
    <div>
      <h4>Support</h4>
      <a href="#">Help Center</a><br>
      <a href="#">Contact Us</a>
    </div>
  </div>
</footer>

<!-- FULL JAVASCRIPT -->
<script>
const api = "api.php";

/* Smooth scroll to search */
document.getElementById("startSearch").onclick = () => {
  document.getElementById("searchTool").scrollIntoView({ behavior: "smooth" });
};

/* Toggle Filters Panel */
document.getElementById("filtersBtn").addEventListener("click", () => {
  const panel = document.getElementById("advancedFilters");
  panel.classList.toggle("open");
});

/* Reset Filters */
document.getElementById("resetFilters").addEventListener("click", () => {
  document.querySelectorAll("#advancedFilters input, #advancedFilters select")
    .forEach(el => el.value = "");
});

function getFilters() {
  return {
    q: document.getElementById("q").value.trim(),
    section: document.getElementById("filterSection").value,
    division: document.getElementById("filterDivision").value,
    group: document.getElementById("filterGroup").value,
    class: document.getElementById("filterClass").value,
    keyword: document.getElementById("filterKeyword").value,
    descType: document.getElementById("filterDescType").value,
    sort: document.getElementById("filterSort").value,
  };
}

/* Search Function */
async function doSearch(page = 1) {
  const f = getFilters();
  let url = `${api}?action=search&page=${page}`;

  Object.keys(f).forEach(k => {
    url += `&${k}=${encodeURIComponent(f[k])}`;
  });

  document.getElementById("resultInfo").innerText = "Searching…";

  const res = await fetch(url);
  const data = await res.json();

  const items = data.items || [];
  renderRows(items);
  renderPager(data.total_pages || 1, data.page || page);

  document.getElementById("resultInfo").innerText =
    `Showing ${items.length} of ${data.total||0} results`;
}

/* Buttons */
document.getElementById("applyFilters").onclick = () => doSearch(1);
document.getElementById("searchBtn").onclick = () => doSearch(1);
document.getElementById("q").addEventListener("keypress", e => {
  if (e.key === "Enter") doSearch(1);
});

/* Export CSV */
document.getElementById("exportBtn").onclick = () => {
  const f = getFilters();
  let url = `${api}?action=export`;
  Object.keys(f).forEach(k => url += `&${k}=${encodeURIComponent(f[k])}`);
  window.location = url;
};

/* Render Rows */
function escapeHtml(s){
  return (s||"").toString().replace(/[&<>"']/g, m =>
    ({ "&":"&amp;","<":"&lt;",">":"&gt;","\"":"&quot;","'":"&#39;" }[m])
  );
}

function renderRows(items) {
  const body = document.getElementById("resultsBody");
  body.innerHTML = "";

  if (!items || items.length === 0) {
    body.innerHTML = '<tr><td colspan="5">No results found.</td></tr>';
    return;
  }

  items.forEach(r => {
    const sec = escapeHtml(r.section || r["SECTION MSIC 2025"] || "");
    const secDesc = escapeHtml(r.section_desc || r["DESCRIPTION MSIC 2025 "] || "");
    const code = escapeHtml(r.msic_code || r["MSIC 2025"] || "");
    const desc = escapeHtml(r.description || r["DESCRIPTION 2025"] || "");

    const tr = document.createElement("tr");
    tr.innerHTML = `
      <td><span class="section-pill">${sec}</span></td>
      <td>${secDesc}</td>
      <td><span class="code">${code}</span></td>
      <td>${desc}</td>
      <td>
        <button class="tiny-btn" onclick="openCompareWith('${code}')">🔁</button>
      </td>
    `;
    body.appendChild(tr);
  });
}

/* Pagination */
function renderPager(totalPages, current) {
  const pager = document.getElementById("pager");
  pager.innerHTML = "";

  // Previous button
  if (current > 1) {
    const prevBtn = document.createElement("button");
    prevBtn.textContent = "←";
    prevBtn.classList.add("nav");
    prevBtn.onclick = () => doSearch(current - 1);
    pager.appendChild(prevBtn);
  }

  // Show only first 10 pages
  const maxPagesToShow = 10;
  const limit = Math.min(maxPagesToShow, totalPages);

  for (let i = 1; i <= limit; i++) {
    const btn = document.createElement("button");
    btn.textContent = i;
    if (i === current) btn.classList.add("active");
    btn.onclick = () => doSearch(i);
    pager.appendChild(btn);
  }

  // Next button
  if (current < totalPages) {
    const nextBtn = document.createElement("button");
    nextBtn.textContent = "→";
    nextBtn.classList.add("nav");
    nextBtn.onclick = () => doSearch(current + 1);
    pager.appendChild(nextBtn);
  }
}


/* View & Compare */
async function view(code) {
  const res = await fetch(`${api}?action=get_by_code&code=${code}`);
  const item = await res.json();
  alert(`${item.msic_code}\n${item.description}`);
}

function openCompareWith(code) {
  window.location = "compare.php?code=" + code;
}

doSearch(1);
</script>

</body>
</html>
