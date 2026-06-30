<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Soundscape Mixer - Kelompok 3</title>
<style>
  * { margin: 0; padding: 0; box-sizing: border-box; }
  body {
    font-family: 'Segoe UI', sans-serif;
    background: linear-gradient(135deg, #1e1e2f, #2d2d44);
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    color: white;
    padding: 30px;
    overflow: hidden;
  }
  header { text-align: center; margin-bottom: 40px; }
  header h1 { font-size: 28px; margin-bottom: 8px; }
  header p { color: #aaa; font-size: 14px; }

  .mixer {
    display: flex;
    gap: 25px;
    flex-wrap: wrap;
    justify-content: center;
    max-width: 1100px;
  }

  .channel {
    background: rgba(255,255,255,0.05);
    border-radius: 20px;
    padding: 25px;
    width: 160px;
    text-align: center;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255,255,255,0.1);
    position: relative;
    overflow: hidden;
    transition: transform 0.2s;
  }
  .channel:hover { transform: translateY(-5px); }

  .icon { font-size: 38px; margin-bottom: 10px; }
  .label { font-size: 14px; margin-bottom: 15px; color: #ddd; }

  input[type=range] {
    -webkit-appearance: none;
    width: 100%;
    height: 6px;
    border-radius: 5px;
    background: #444;
    outline: none;
  }
  input[type=range]::-webkit-slider-thumb {
    -webkit-appearance: none;
    width: 18px;
    height: 18px;
    border-radius: 50%;
    background: #8e7cff;
    cursor: pointer;
    box-shadow: 0 0 10px #8e7cff;
  }

  .value { margin-top: 10px; font-size: 12px; color: #999; }

  .visual {
    position: absolute;
    inset: 0;
    pointer-events: none;
    opacity: 0;
    transition: opacity 0.3s;
  }

  .rain .visual span {
    position: absolute;
    width: 2px; height: 15px;
    background: rgba(140,180,255,0.6);
    top: -20px;
    animation: fall linear infinite;
  }
  @keyframes fall { to { transform: translateY(220px); } }

  .cafe .visual span {
    position: absolute;
    width: 8px; height: 8px;
    border-radius: 50%;
    background: rgba(210,160,100,0.4);
    bottom: -10px;
    animation: rise ease-in infinite;
  }
  @keyframes rise { to { transform: translateY(-200px) scale(1.5); opacity: 0; } }

  .ocean .visual .wave {
    position: absolute;
    bottom: 0; left: -50%;
    width: 200%; height: 60px;
    background: rgba(80,180,220,0.3);
    border-radius: 50%;
    animation: wave 3s ease-in-out infinite;
  }
  @keyframes wave {
    0%, 100% { transform: translateY(0) scaleY(1); }
    50% { transform: translateY(-10px) scaleY(1.3); }
  }

  .fire .visual span {
    position: absolute;
    width: 6px; height: 16px;
    border-radius: 50% 50% 50% 50% / 60% 60% 40% 40%;
    background: linear-gradient(to top, #ff6a00, #ffcf00);
    bottom: 10px;
    animation: flicker ease-in-out infinite;
    filter: blur(0.5px);
  }
  @keyframes flicker {
    0%, 100% { transform: translateY(0) scale(1); opacity: 0.9; }
    50% { transform: translateY(-15px) scale(0.8); opacity: 0.5; }
  }

  .wind .visual span {
    position: absolute;
    width: 40px; height: 2px;
    background: rgba(200,220,255,0.5);
    border-radius: 5px;
    animation: blow linear infinite;
  }
  @keyframes blow {
    from { transform: translateX(-60px); opacity: 0; }
    20% { opacity: 0.8; }
    to { transform: translateX(200px); opacity: 0; }
  }

  footer {
    margin-top: 50px;
    font-size: 12px;
    color: #777;
    text-align: center;
  }
  .badge {
    display: inline-block;
    background: #8e7cff;
    color: white;
    padding: 5px 14px;
    border-radius: 20px;
    font-size: 12px;
    margin-top: 10px;
  }
  .hint {
    font-size: 12px;
    color: #888;
    margin-top: 10px;
    max-width: 400px;
    text-align: center;
  }
</style>
</head>
<body>

<header>
  <h1>🎧 Soundscape Mixer</h1>
  <p>Atur suasana sesuai mood belajar/kerja kamu — Kelompok 3</p>
</header>

<div class="mixer">

  <div class="channel rain" id="rainChannel">
    <div class="visual" id="rainVisual"></div>
    <div class="icon">🌧️</div>
    <div class="label">Hujan</div>
    <input type="range" min="0" max="100" value="0" oninput="updateChannel('rain', this.value)">
    <div class="value" id="rainValue">0%</div>
  </div>

  <div class="channel cafe" id="cafeChannel">
    <div class="visual" id="cafeVisual"></div>
    <div class="icon">☕</div>
    <div class="label">Kafe</div>
    <input type="range" min="0" max="100" value="0" oninput="updateChannel('cafe', this.value)">
    <div class="value" id="cafeValue">0%</div>
  </div>

  <div class="channel ocean" id="oceanChannel">
    <div class="visual" id="oceanVisual"><div class="wave"></div></div>
    <div class="icon">🌊</div>
    <div class="label">Ombak</div>
    <input type="range" min="0" max="100" value="0" oninput="updateChannel('ocean', this.value)">
    <div class="value" id="oceanValue">0%</div>
  </div>

  <div class="channel fire" id="fireChannel">
    <div class="visual" id="fireVisual"></div>
    <div class="icon">🔥</div>
    <div class="label">Api Unggun</div>
    <input type="range" min="0" max="100" value="0" oninput="updateChannel('fire', this.value)">
    <div class="value" id="fireValue">0%</div>
  </div>

  <div class="channel wind" id="windChannel">
    <div class="visual" id="windVisual"></div>
    <div class="icon">🌬️</div>
    <div class="label">Angin</div>
    <input type="range" min="0" max="100" value="0" oninput="updateChannel('wind', this.value)">
    <div class="value" id="windValue">0%</div>
  </div>

</div>

<p class="hint">Geser slider untuk memutar suara. Browser memerlukan interaksi pertama sebelum audio bisa diputar otomatis.</p>

<footer>
  <p>Update terakhir: <?php echo date("Y-m-d H:i:s"); ?></p>
  <span class="badge">🚀 CI/CD Aktif</span>
</footer>

<audio id="audioRain" src="sounds/rain.mp3" loop preload="none"></audio>
<audio id="audioCafe" src="sounds/cafe.mp3" loop preload="none"></audio>
<audio id="audioOcean" src="sounds/ocean.mp3" loop preload="none"></audio>
<audio id="audioFire" src="sounds/fire.mp3" loop preload="none"></audio>
<audio id="audioWind" src="sounds/wind.mp3" loop preload="none"></audio>

<script>
function updateChannel(type, value) {
  document.getElementById(type + 'Value').textContent = value + '%';
  const visual = document.getElementById(type + 'Visual');
  visual.style.opacity = value / 100;

  const audioId = 'audio' + type.charAt(0).toUpperCase() + type.slice(1);
  const audio = document.getElementById(audioId);
  if (audio) {
    audio.volume = value / 100;
    if (value > 0 && audio.paused) {
      audio.play().catch(function(err) {
        console.log('Audio play blocked:', err);
      });
    } else if (value == 0) {
      audio.pause();
    }
  }

  if (visual.dataset.built) return;

  if (type === 'rain' && value > 0) {
    for (let i = 0; i < 20; i++) {
      const drop = document.createElement('span');
      drop.style.left = Math.random() * 100 + '%';
      drop.style.animationDuration = (0.5 + Math.random()) + 's';
      drop.style.animationDelay = Math.random() + 's';
      visual.appendChild(drop);
    }
    visual.dataset.built = "1";
  }

  if (type === 'cafe' && value > 0) {
    for (let i = 0; i < 12; i++) {
      const bubble = document.createElement('span');
      bubble.style.left = (20 + Math.random() * 60) + '%';
      bubble.style.animationDuration = (2 + Math.random() * 2) + 's';
      bubble.style.animationDelay = Math.random() * 2 + 's';
      visual.appendChild(bubble);
    }
    visual.dataset.built = "1";
  }

  if (type === 'fire' && value > 0) {
    for (let i = 0; i < 15; i++) {
      const flame = document.createElement('span');
      flame.style.left = (30 + Math.random() * 40) + '%';
      flame.style.animationDuration = (0.6 + Math.random() * 0.6) + 's';
      flame.style.animationDelay = Math.random() * 0.5 + 's';
      visual.appendChild(flame);
    }
    visual.dataset.built = "1";
  }

  if (type === 'wind' && value > 0) {
    for (let i = 0; i < 8; i++) {
      const gust = document.createElement('span');
      gust.style.top = (10 + Math.random() * 80) + '%';
      gust.style.animationDuration = (1.5 + Math.random() * 1.5) + 's';
      gust.style.animationDelay = Math.random() * 2 + 's';
      visual.appendChild(gust);
    }
    visual.dataset.built = "1";
  }
}
</script>

</body>
</html>
