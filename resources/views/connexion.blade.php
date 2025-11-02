<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Afriba — Connexion</title>
  <style>
    :root {
      --bg: #fffaf6;
      --card: #ffffff;
      --muted: #6b7280;
      --accent: #ff7b00;
      --accent-2: #ff9900;
      --radius: 14px;
      --shadow: 0 8px 30px rgba(11, 15, 30, 0.08);
      font-family: 'Inter', ui-sans-serif, system-ui, -apple-system, 'Segoe UI', Roboto, Arial;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box
    }

    body {
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      background: radial-gradient(1200px 600px at 10% 10%, rgba(255, 123, 0, 0.08), transparent 10%),
        radial-gradient(800px 400px at 90% 90%, rgba(255, 153, 0, 0.06), transparent 10%),
        var(--bg);
      color: #0f172a;
      -webkit-font-smoothing: antialiased;
    }

    .auth-wrap {
      width: 100%;
      max-width: 1100px;
      display: grid;
      grid-template-columns: 1fr 460px;
      border-radius: 20px;
      overflow: hidden;
      background: #fff;
      box-shadow: var(--shadow);
    }

    /* HERO */
    .hero {
      position: relative;
      min-height: 520px;
      padding: 48px 40px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      background: url('https://images.unsplash.com/photo-1542831371-d531d36971e6?auto=format&fit=crop&w=1200&q=60') center/cover;
    }

    .hero::after {
      content: "";
      position: absolute;
      inset: 0;
      background: linear-gradient(180deg, rgba(0, 0, 0, 0.55), rgba(0, 0, 0, 0.35));
    }

    .hero-inner {
      position: relative;
      z-index: 2;
      color: #fff;
      max-width: 520px
    }

    .brand {
      display: flex;
      align-items: center;
      gap: 12px;
      margin-bottom: 18px
    }

    .logo {
      width: 48px;
      height: 48px;
      border-radius: 12px;
      background: linear-gradient(135deg, var(--accent), var(--accent-2));
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 700;
      color: #fff;
      font-size: 18px;
      box-shadow: 0 6px 18px rgba(255, 123, 0, 0.25);
    }

    h1 {
      margin: 0 0 10px;
      font-size: 32px;
      font-weight: 700
    }

    p.lead {
      color: rgba(255, 255, 255, 0.95);
      line-height: 1.6;
      font-size: 16px
    }

    .brand-text {
      font-weight: 700;
      font-size: 22px;
      background: linear-gradient(90deg, #ff7b00, #ffb700, #ff7b00);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      animation: gradientMove 3s infinite linear;
      letter-spacing: 0.5px;
    }

    @keyframes gradientMove {
      0% {
        background-position: 0% 50%;
      }

      100% {
        background-position: 200% 50%;
      }
    }

    .brand-text .ak {
      color: transparent;
      background: linear-gradient(90deg, #ff9a00, #ff7b00, #ffc700);
      -webkit-background-clip: text;
      animation: gradientMove 4s infinite linear;
    }

    .brand-text .sur {
      color: rgba(255, 255, 255, 0.9);
      font-weight: 400;
      margin: 0 4px;
    }

    .brand-text .af {
      color: transparent;
      background: linear-gradient(90deg, #fff, #ffd580, #ffae00);
      -webkit-background-clip: text;
      animation: gradientMove 2.5s infinite alternate;
    }


    /* CARD */
    .card {
      background: var(--card);
      padding: 32px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      gap: 16px;
    }

    .card h2 {
      font-size: 22px;
      font-weight: 700;
      margin-bottom: 6px
    }

    .card .small {
      font-size: 13px;
      color: var(--muted)
    }

    form {
      display: flex;
      flex-direction: column;
      gap: 14px
    }

    label {
      font-size: 13px;
      color: var(--muted);
      margin-bottom: 4px;
      display: block
    }

    input {
      padding: 12px 14px;
      border-radius: 12px;
      border: 1px solid #e6e9ef;
      font-size: 15px;
      transition: all .3s ease;
      background: #fff;
    }

    input:focus {
      outline: none;
      border: 1px solid transparent;
      background: linear-gradient(#fff, #fff) padding-box,
        linear-gradient(90deg, var(--accent), var(--accent-2)) border-box;
      box-shadow: 0 6px 18px rgba(255, 123, 0, 0.25);
    }

    .cta {
      margin-top: 8px;
      padding: 14px;
      border-radius: 14px;
      border: 0;
      background: linear-gradient(90deg, var(--accent), var(--accent-2));
      color: #fff;
      font-weight: 700;
      cursor: pointer;
      font-size: 16px;
      box-shadow: 0 8px 28px rgba(255, 123, 0, 0.25);
      transition: all .3s ease;
    }

    .cta:hover {
      transform: scale(1.05);
      box-shadow: 0 10px 32px rgba(255, 123, 0, 0.3)
    }

    .meta {
      display: flex;
      justify-content: space-between;
      align-items: center;
      font-size: 13px
    }

    .meta a {
      color: var(--accent);
      cursor: pointer;
      text-decoration: none;
      font-weight: 600
    }

    .meta a:hover {
      text-decoration: underline;
      color: var(--accent-2)
    }

    /* Social login */
    .social-login {
      display: flex;
      gap: 12px;
      margin: 12px 0;
      flex-wrap: wrap;
    }

    .social-btn {
      flex: 1;
      padding: 12px;
      border-radius: 12px;
      border: 1px solid #e6e9ef;
      cursor: pointer;
      display: flex;
      align-items: center;
      gap: 10px;
      justify-content: center;
      transition: all .3s ease;
      font-weight: 600;
      font-size: 15px;
      background: #fff;
    }

    .social-btn img {
      width: 20px;
      height: 20px;
      object-fit: contain
    }

    .social-btn.checked {
      border-color: var(--accent);
      background: rgba(255, 123, 0, 0.08);
      box-shadow: 0 0 10px rgba(255, 123, 0, 0.25);
      color: var(--accent);
    }

    .toast {
      position: fixed;
      left: 50%;
      top: 40px;
      transform: translateX(-50%);
      background: #0f172a;
      color: #fff;
      padding: 14px 18px;
      border-radius: 12px;
      box-shadow: 0 10px 32px rgba(2, 6, 23, 0.25);
      opacity: 0;
      pointer-events: none;
      transition: .3s;
      z-index: 9999;
    }

    .toast.show {
      opacity: 1;
      pointer-events: auto;
    }

    /* Responsive */
    @media(max-width:980px) {
      .auth-wrap {
        grid-template-columns: 1fr
      }

      .hero {
        display: none
      }
    }
  </style>
</head>

<body>
  <div class="auth-wrap">
    <!-- Hero -->
    <aside class="hero">
      <div class="hero-inner">
        <div class="brand">
          <div class="logo">AF</div>
          <div>
            <div class="brand-text">
              <span class="ak">Akwaba</span> <span class="sur">sur</span> <span class="af">Afriba</span>
            </div>
            <div style="font-size:12px;color:rgba(255,255,255,0.85)">Marketplace Africaine</div>
          </div>
        </div>
        <h1>Vendre et Acheter local, facilement.</h1>
        <p class="lead">Connectez-vous rapidement et sécurisez votre compte.</p>
      </div>
    </aside>

    <!-- Formulaire Connexion -->
    <section class="card">
      <form id="loginForm" method="POST" action="{{ route('connexion.submit') }}">
        @csrf
        <h2>Connexion</h2>
        <span class="small">— rapide & sécurisé</span>

        <label>Nom, Email ou Numéro</label>
        <input name="login" type="text" placeholder="Nom, Email ou Numéro" required>

        <label>Mot de passe</label>
        <input name="password" type="password" placeholder="Mot de passe" required>

        <div class="meta">
          <label><input type="checkbox" name="remember"> Se souvenir de moi</label>
          <a href="#">Mot de passe oublié ?</a>
        </div>

        <p class="small">
          Pas encore de compte ?
          <a href="{{ url('/inscription') }}" class="link-accent">Créer un compte</a>
        </p>

        <button class="cta" type="submit">Se connecter</button>

        <div class="social-login">
          <button type="button" class="social-btn google">
            <img src="https://www.svgrepo.com/show/355037/google.svg" alt="Google" /> Google
          </button>
          <button type="button" class="social-btn facebook">
            <img src="https://upload.wikimedia.org/wikipedia/commons/0/05/Facebook_Logo_%282019%29.png"
              alt="Facebook" /> Facebook
          </button>
          <button type="button" class="social-btn linkedin">
            <img src="https://upload.wikimedia.org/wikipedia/commons/8/81/LinkedIn_icon.svg" alt="LinkedIn" /> LinkedIn
          </button>
        </div>
      </form>
    </section>
  </div>

  <div id="toast" class="toast"></div>
  <script>
  // === TOAST MESSAGE (toujours visible au-dessus) ===
  const toast = document.getElementById('toast');

  function showToast(msg) {
    toast.textContent = msg;
    toast.classList.add('show');
    setTimeout(() => toast.classList.remove('show'), 2500);
  }

  // === Sélection Réseaux sociaux (toggle) ===
  const socialBtns = document.querySelectorAll('.social-btn');
  socialBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      if (btn.classList.contains('checked')) {
        btn.classList.remove('checked');
      } else {
        socialBtns.forEach(b => b.classList.remove('checked'));
        btn.classList.add('checked');
      }
    });
  });

  // === Soumission du formulaire ===
  const loginForm = document.getElementById('loginForm');
  loginForm.addEventListener('submit', async e => {
    e.preventDefault();

    const formData = new FormData(loginForm);
    const login = formData.get('login').trim();
    const password = formData.get('password').trim();

    if (!login || !password) {
      showToast("Merci de remplir tous les champs");
      return;
    }

    try {
      const response = await fetch(loginForm.action, {
        method: 'POST',
        headers: {
          'X-Requested-With': 'XMLHttpRequest',
          'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
        },
        body: formData
      });

      const data = await response.json();

      if (data.success) {
        showToast(data.message);
        setTimeout(() => {
          if (data.redirect) {
            window.location.href = data.redirect;
          }
        }, 1500);
      } else {
        showToast(data.message || "Identifiants incorrects");
      }
    } catch (error) {
      console.error(error);
      showToast("Impossible de se connecter au serveur");
    }
  });
</script>

</body>

</html>