<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Afriba — Inscription / Connexion</title>
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
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html,
        body {
            height: 100%;
        }

        body {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 32px;
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
            box-shadow: var(--shadow);
            background: linear-gradient(180deg, rgba(255, 255, 255, 0.85), rgba(255, 255, 255, 0.95));
        }

        /* HERO */
        .hero {
            position: relative;
            padding: 48px 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background: url('https://images.unsplash.com/photo-1542831371-d531d36971e6?auto=format&fit=crop&w=1200&q=60') center/cover no-repeat;
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
            max-width: 520px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 18px;
        }

        .logo {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            background: linear-gradient(135deg, var(--accent), var(--accent-2));
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-weight: 700;
            font-size: 18px;
            box-shadow: 0 6px 18px rgba(255, 123, 0, 0.25);
        }

        h1 {
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        p.lead {
            font-size: 16px;
            font-weight: 500;
            line-height: 1.6;
            color: rgba(255, 255, 255, 0.95);
        }

        /* CARD */
        .card {
            background: var(--card);
            display: flex;
            flex-direction: column;
            border-radius: 0 20px 20px 0;
            overflow: hidden;
            height: 85vh;
            max-height: 560px;
        }

        .card-header {
            padding: 24px 32px;
            border-bottom: 1px solid #e6e9ef;
            background: #fff;
            z-index: 2;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .role-switch {
            display: flex;
            gap: 12px;
            margin-top: 8px;
        }

        .role-btn {
            flex: 1;
            padding: 12px 16px;
            border-radius: 12px;
            border: 1px solid rgba(15, 23, 42, 0.08);
            background: transparent;
            cursor: pointer;
            font-weight: 600;
            font-size: 14px;
            display: flex;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .role-btn.active {
            background: linear-gradient(90deg, rgba(255, 123, 0, 0.15), rgba(255, 153, 0, 0.08));
            border-color: transparent;
            color: var(--accent);
            box-shadow: 0 6px 18px rgba(255, 123, 0, 0.25);
        }

        .role-btn.ghost:active {
            background: linear-gradient(90deg, var(--accent), var(--accent-2));
            color: #fff;
        }

        .card-body {
            padding: 16px 32px;
            overflow-y: auto;
            flex: 1;
            scrollbar-width: thin;
            scrollbar-color: var(--accent) #f0f0f0;
        }

        .card-body::-webkit-scrollbar {
            width: 8px;
        }

        .card-body::-webkit-scrollbar-track {
            background: #f0f0f0;
            border-radius: 8px;
        }

        .card-body::-webkit-scrollbar-thumb {
            background-color: var(--accent);
            border-radius: 8px;
        }

        label {
            font-size: 13px;
            color: var(--muted);
            font-weight: 500;
            margin-bottom: 6px;
            display: block;
        }

        input,
        select {
            padding: 14px 16px;
            border-radius: 12px;
            border: 1px solid #e6e9ef;
            font-size: 15px;
            transition: 0.3s;
            width: 100%;
        }

        input:focus,
        select:focus {
            outline: none;
            border: 1px solid transparent;
            background: linear-gradient(#fff, #fff) padding-box, linear-gradient(90deg, var(--accent), var(--accent-2)) border-box;
            box-shadow: 0 6px 18px rgba(255, 123, 0, 0.25);
        }

        .row {
            display: flex;
            gap: 12px;
        }

        .row .col {
            flex: 1;
        }

        .cta {
            margin-top: 12px;
            padding: 14px;
            border: none;
            border-radius: 14px;
            background: linear-gradient(90deg, var(--accent), var(--accent-2));
            color: #fff;
            font-weight: 700;
            cursor: pointer;
            font-size: 16px;
            box-shadow: 0 8px 28px rgba(255, 123, 0, 0.25);
            transition: 0.3s;
        }

        .cta:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 32px rgba(255, 123, 0, 0.3);
        }

        .vendor-only {
            display: none;
        }

        .vendor-only.show {
            display: block;
        }

        .social-login {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            margin-top: 12px;
        }

        .social-btn {
            flex: 1;
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px;
            border-radius: 12px;
            border: 1px solid #e6e9ef;
            cursor: pointer;
            background: #fff;
            font-weight: 600;
            transition: 0.3s;
        }

        .social-btn.checked {
            border-color: var(--accent);
            box-shadow: 0 0 10px rgba(255, 123, 0, 0.25);
            background: rgba(255, 123, 0, 0.08);
            color: var(--accent);
        }

        .social-btn img {
            width: 18px;
            height: 18px;
            object-fit: contain;
        }

        .toast {
            position: fixed;
            right: 20px;
            top: 20px;
            background: #0f172a;
            color: #fff;
            padding: 14px 16px;
            border-radius: 12px;
            box-shadow: 0 10px 32px rgba(2, 6, 23, 0.25);
            opacity: 0;
            transform: translateY(-6px) scale(.98);
            pointer-events: none;
            transition: 0.28s;
            z-index: 9999;
        }

        .toast.show {
            opacity: 1;
            transform: translateY(0) scale(1);
            pointer-events: auto;
        }

        #successMessage {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: linear-gradient(90deg, #ff7b00, #ff9900);
            color: #fff;
            padding: 20px 30px;
            font-size: 18px;
            border-radius: 14px;
            box-shadow: 0 10px 32px rgba(255, 123, 0, 0.3);
            z-index: 9999;
            display: none;
        }

        .custom-select-wrapper {
            position: relative;
            margin-top: 12px;
        }

        .custom-select {
            position: relative;
            border: 1px solid #e6e9ef;
            border-radius: 12px;
            padding: 12px 16px;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #fff;
        }

        .custom-select::after {
            content: "▾";
            color: var(--accent);
            font-size: 16px;
        }

        .custom-select ul.options {
            position: absolute;
            top: calc(100% + 6px);
            left: 0;
            right: 0;
            background: #fff;
            border-radius: 12px;
            max-height: 180px;
            overflow-y: auto;
            display: none;
            list-style: none;
            padding: 8px 0;
            margin: 0;
            box-shadow: 0 10px 28px rgba(255, 123, 0, 0.2);
            z-index: 10;
        }

        .custom-select ul.options li {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 10px 16px;
            cursor: pointer;
        }

        .custom-select ul.options li img {
            width: 20px;
            height: 14px;
            object-fit: cover;
            border-radius: 2px;
        }

        .custom-select ul.options li:hover {
            background: rgba(255, 123, 0, 0.1);
            color: var(--accent);
        }

        .custom-select .selected {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .custom-select .selected img {
            width: 20px;
            height: 14px;
            border-radius: 2px;
            object-fit: cover;
        }

        @media(max-width:980px) {
            .auth-wrap {
                grid-template-columns: 1fr;
                max-width: 780px;
            }

            .hero {
                display: none;
            }

            .card {
                border-radius: 20px;
            }
        }

        @media(max-width:420px) {
            body {
                padding: 18px;
            }
        }
    </style>
</head>

<body>
    <div class="auth-wrap">
        <aside class="hero" aria-hidden="true">
            <div class="hero-inner">
                <div class="brand">
                    <div class="logo">AF</div>
                    <div>
                        <div style="font-weight:700">Afriba</div>
                        <div style="font-size:12px;color:rgba(255,255,255,0.85)">Marketplace Africaine</div>
                    </div>
                </div>
                <h1>Vendre et Acheter local, facilement.</h1>
                <p class="lead">Inscris-toi en quelques secondes. Que tu sois client ou vendeur, Afriba t'accompagne.
                </p>
            </div>
        </aside>

        <section class="card">
            <div class="card-header">
                <div style="display:flex;justify-content:space-between;align-items:center;">
                    <div>
                        <strong>Création de compte</strong>
                        <span style="font-size:13px;color:var(--muted)">— rapide & sécurisé</span>
                    </div>
                    <button id="switchLogin" class="role-btn ghost">Connexion</button>
                </div>
                <div class="role-switch">
                    <button class="role-btn active" data-role="client">👤 Client</button>
                    <button class="role-btn" data-role="vendor">🏪 Vendeur</button>
                </div>
            </div>

            <div class="card-body">
                <form id="authForm" method="POST" action="{{ route('inscription.submit') }}">
                    @csrf

                    <div class="row">
                        <div class="col">
                            <label>Nom complet</label>
                            <input name="fullname" type="text" required>
                        </div>
                        <div class="col">
                            <label>Téléphone</label>
                            <input name="phone" type="tel" required>
                        </div>
                    </div>

                    <!-- EMAIL pour TOUS les rôles -->
                    <div class="email-field">
                        <label>Email</label>
                        <input type="email" name="email" placeholder="ex: email@gmail.com" required>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label>Ville</label>
                            <input name="ville" placeholder="Ex: Abidjan" required>
                        </div>
                        <div class="col">
                            <label>Commune</label>
                            <input name="commune" placeholder="Ex: Cocody" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label>Mot de passe</label>
                            <input name="password" type="password" minlength="8" required>
                        </div>
                        <div class="col">
                            <label>Confirmer</label>
                            <input name="password_confirmation" type="password" minlength="8" required>
                        </div>
                    </div>

                    <label>Pays</label>
                    <div class="custom-select-wrapper">
                        <div class="custom-select">
                            <span class="selected">Sélectionner un pays</span>
                            <ul class="options">
                                <li data-code="+225"><img src="https://flagcdn.com/ci.svg"> (+225) Côte d'Ivoire</li>
                                <li data-code="+221"><img src="https://flagcdn.com/sn.svg"> (+221) Sénégal</li>
                                <li data-code="+233"><img src="https://flagcdn.com/gh.svg"> (+233) Ghana</li>
                                <li data-code="+234"><img src="https://flagcdn.com/ng.svg"> (+234) Nigeria</li>
                                <li data-code="+000"><img src="https://flagcdn.com/blank.svg"> Autre</li>
                            </ul>
                        </div>
                        <input type="hidden" name="pays" value="">
                    </div>

                    <div class="vendor-only">
                        <label>Nom de la boutique</label>
                        <input name="shop" placeholder="Nom de la boutique">
                        <label>Localisation</label>
                        <input name="location" placeholder="Adresse ou repère">
                    </div>

                    <div style="font-size:13px;color:var(--muted);margin-top:12px;">
                        Veuillez cocher au moins un mode de connexion sociale :
                    </div>

                    <div class="social-login">
                        <button type="button" class="social-btn google">
                            <img src="https://www.google.com/images/branding/googleg/1x/googleg_standard_color_128dp.png"
                                alt="Google"> Google
                        </button>
                        <button type="button" class="social-btn facebook">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/0/05/Facebook_Logo_%282019%29.png"
                                alt="Facebook"> Facebook
                        </button>
                        <button type="button" class="social-btn linkedin">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/8/81/LinkedIn_icon.svg"
                                alt="LinkedIn"> LinkedIn
                        </button>
                    </div>

                    <div style="display:flex;justify-content:space-between;align-items:center;margin-top:12px;">
                        <label><input type="checkbox"> Recevoir des promos</label>
                        <div style="font-size:13px;color:var(--muted)">
                            Déjà inscrit ? <a href="#" id="toLogin" style="color:var(--accent)">Se connecter</a>
                        </div>
                    </div>

                    <input type="hidden" name="role" value="client">

                    <button type="submit" class="cta">S'inscrire</button>
                </form>
            </div>
        </section>
    </div>

    <div id="toast" class="toast"></div>
    <div id="successMessage"></div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const roleBtns = document.querySelectorAll(".role-btn[data-role]");
            const roleInput = document.querySelector("input[name='role']");
            const vendorFields = document.querySelectorAll(".vendor-only");
            const emailField = document.querySelector(".email-field");
            const switchLogin = document.getElementById('switchLogin');

            // Gestion des rôles
            roleBtns.forEach(btn => {
                btn.addEventListener("click", () => {
                    roleBtns.forEach(b => b.classList.remove("active"));
                    btn.classList.add("active");
                    const role = btn.dataset.role;
                    roleInput.value = role === "vendor" ? "vendeur" : "client";
                    vendorFields.forEach(f => f.style.display = (role === "vendor") ? "block" : "none");
                    emailField.style.display = "block"; // visible toujours
                });
            });

            // Bouton Connexion en haut
            switchLogin.addEventListener("click", () => {
                switchLogin.classList.add('active');
                setTimeout(() => {
                    window.location.href = "/login";
                }, 500);
            });

            // Social login
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

            // Custom select pays
            const customSelect = document.querySelector('.custom-select');
            const selected = customSelect.querySelector('.selected');
            const optionsList = customSelect.querySelector('.options');
            let paysSelected = "";

            customSelect.addEventListener('click', (e) => {
                e.stopPropagation();
                const isOpen = optionsList.style.display === 'block';
                document.querySelectorAll('.options').forEach(opt => opt.style.display = 'none');
                optionsList.style.display = isOpen ? 'none' : 'block';
            });

            optionsList.querySelectorAll('li').forEach(option => {
                option.addEventListener('click', (e) => {
                    e.stopPropagation();
                    const flag = option.querySelector("img").src;
                    const text = option.textContent.trim();
                    selected.innerHTML = `<img src="${flag}" alt="flag"/> ${text}`;
                    paysSelected = option.dataset.code;
                    optionsList.style.display = 'none';
                });
            });

            document.addEventListener('click', () => {
                optionsList.style.display = 'none';
            });

            // Form submit avec toast et success message
            const authForm = document.getElementById('authForm');
            const toast = document.getElementById('toast');
            const successMessage = document.getElementById('successMessage');

            function showToast(msg) {
                toast.textContent = msg;
                toast.classList.add('show');
                setTimeout(() => toast.classList.remove('show'), 2500);
            }

            authForm.addEventListener('submit', async function(e) {
                e.preventDefault();
                const formData = new FormData(authForm);
                const fullname = formData.get('fullname').trim();
                const phone = formData.get('phone').trim();
                const ville = formData.get('ville').trim();
                const commune = formData.get('commune').trim();
                const password = formData.get('password');
                const confirm = formData.get('password_confirmation');
                const socialSelected = document.querySelector('.social-btn.checked');

                if (!fullname || !phone || !ville || !commune || !password) {
                    showToast("Merci de remplir tous les champs");
                    return;
                }
                if (password !== confirm) {
                    showToast("Mots de passe différents");
                    return;
                }
                if (!paysSelected) {
                    showToast("Veuillez sélectionner un pays");
                    return;
                }
                if (!socialSelected) {
                    showToast("Veuillez sélectionner un mode de connexion sociale");
                    return;
                }

                formData.append('pays', paysSelected);
                formData.append('social',
                    socialSelected.classList.contains('google') ? 'google' :
                    socialSelected.classList.contains('facebook') ? 'facebook' :
                    'linkedin'
                );

                try {
                    const response = await fetch(authForm.action, {
                        method: 'POST',
                        body: formData,
                        headers: { 'X-Requested-With': 'XMLHttpRequest' }
                    });

                    const data = await response.json();

                    if (data.success) {
                        successMessage.textContent = "🎉 Inscription réussie !";
                        successMessage.style.display = 'block';
                        setTimeout(() => {
                            window.location.href = '/login';
                        }, 2500);
                    } else {
                        showToast(data.message || "Une erreur est survenue");
                    }
                } catch (err) {
                    showToast("Impossible de se connecter au serveur");
                }
            });
        });
    </script>
</body>

</html>
