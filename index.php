<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Kelompok 3 - CI/CD Project</title>
<style>
  * { margin: 0; padding: 0; box-sizing: border-box; }
  body {
    font-family: 'Segoe UI', sans-serif;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
  }
  .card {
    background: white;
    border-radius: 20px;
    padding: 50px 60px;
    box-shadow: 0 20px 60px rgba(0,0,0,0.3);
    text-align: center;
    max-width: 500px;
  }
  h1 {
    color: #333;
    font-size: 28px;
    margin-bottom: 10px;
  }
  p {
    color: #666;
    font-size: 16px;
    margin-bottom: 20px;
  }
  .badge {
    display: inline-block;
    background: #667eea;
    color: white;
    padding: 8px 20px;
    border-radius: 30px;
    font-size: 14px;
    margin-top: 10px;
  }
  .time {
    color: #999;
    font-size: 13px;
    margin-top: 20px;
  }
</style>
</head>
<body>
  <div class="card">
    <h1>🚀 Kelompok 3</h1>
    <p>Website ini dideploy otomatis menggunakan CI/CD pipeline (GitHub Actions).</p>
    <span class="badge">CI/CD Aktif</span>
    <p class="time">Update terakhir: <?php echo date("Y-m-d H:i:s"); ?></p>
  </div>
</body>
</html>
