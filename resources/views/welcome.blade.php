<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nightreign API - The Shadow Between Worlds</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&family=Crimson+Text:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
</head>
<body>
<header>
    <h1>NIGHTREIGN API</h1>
    <p class="subtitle">Desvende os segredos do reino noturno com nossa poderosa interface de dados</p>
</header>

<nav>
    <a href="#about">Sobre</a>
    <a href="#documentation">Documentação</a>
    <a href="#examples">Exemplos</a>
    <a href="#pricing">Planos</a>
    <a href="#contact">Contato</a>
</nav>

<div class="container">
    <section class="hero">
        <div class="hero-content">
            <h2>Domine a Noite</h2>
            <p>A API Nightreign oferece acesso completo ao vasto mundo de Elden Ring: Nightreign. Obtenha dados detalhados sobre personagens, locais, itens, habilidades e a rica lore deste reino sombrio.</p>
            <div style="margin-top: 2rem;">
                <a href="#signup" class="btn">Comece Agora</a>
                <a href="#documentation" class="btn btn-secondary">Documentação</a>
            </div>
        </div>
    </section>

    <section id="features">
        <h2>Recursos Poderosos</h2>
        <div class="features">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-dungeon"></i>
                </div>
                <h3>Dados Completos</h3>
                <p>Acesso a todos os personagens, locais, itens e criaturas do Nightreign com atualizações em tempo real.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-scroll"></i>
                </div>
                <h3>Lore Profunda</h3>
                <p>Explore a rica narrativa do Nightreign com nosso banco de dados de fragmentos de lore interconectados.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-bolt"></i>
                </div>
                <h3>Performance Imbatível</h3>
                <p>Respostas em menos de 50ms com 99.9% de uptime. Suporte para WebSockets e SSE.</p>
            </div>
        </div>
    </section>

    <section id="documentation" class="api-section">
        <h2>Documentação da API</h2>
        <p>Integre facilmente os dados do Nightreign em seus aplicativos com nossa API RESTful.</p>

        <div class="endpoint">
            <h3><span class="method get">GET</span> /v1/characters</h3>
            <p>Retorna todos os personagens do Nightreign com filtros opcionais.</p>
            <code class="code-block">https://api.nightreign.com/v1/characters?faction=nightborn&limit=10</code>

            <div class="response-example">
                <h4>Exemplo de Resposta:</h4>
                <code>
                    {
                    "data": [
                    {
                    "id": "chr_nb_001",
                    "name": "Velkan, o Espectral",
                    "title": "Lorde da Corte Noturna",
                    "faction": "Nightborn",
                    "location": "Torre das Lamentações",
                    "lore": "Uma vez humano, Velkan sacrificou..."
                    }
                    ],
                    "meta": {...}
                    }
                </code>
            </div>
        </div>

        <div class="endpoint">
            <h3><span class="method get">GET</span> /v1/locations/{id}</h3>
            <p>Obtenha informações detalhadas sobre um local específico.</p>
            <code class="code-block">https://api.nightreign.com/v1/locations/moonkeep_catacombs</code>
        </div>

        <div class="endpoint">
            <h3><span class="method post">POST</span> /v1/simulate/battle</h3>
            <p>Simule batalhas entre personagens ou criaturas.</p>
            <code class="code-block">
                {
                "combatants": ["chr_nb_001", "mob_shadowbeast_003"],
                "environment": "moonkeep_catacombs",
                "conditions": ["new_moon", "blood_taint"]
                }
            </code>
        </div>
    </section>

    <section id="signup" class="api-section" style="text-align: center;">
        <h2>Pronto para Começar?</h2>
        <p style="margin-bottom: 2rem;">Registre-se agora e obtenha sua chave de API gratuita com 1,000 requisições/mês.</p>
        <a href="#" class="btn" style="padding: 1rem 3rem; font-size: 1.2rem;">Cadastre-se Gratuitamente</a>
        <p style="margin-top: 1rem; font-size: 0.9rem;">Precisa de mais? <a href="#pricing" style="color: var(--ghost-gold);">Confira nossos planos</a></p>
    </section>
</div>

<footer>
    <div class="footer-content">
        <h3 style="color: var(--ghost-gold); margin-bottom: 1rem;">NIGHTREIGN API</h3>
        <p>O poder do reino noturno em suas mãos</p>

        <div class="social-links">
            <a href="#"><i class="fab fa-discord"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-github"></i></a>
            <a href="#"><i class="fab fa-youtube"></i></a>
        </div>

        <div class="copyright">
            <p>Nightreign API não é afiliada à Bandai Namco ou FromSoftware</p>
            <p>© 2023 Nightreign Project. Todos os direitos reservados.</p>
        </div>
    </div>
</footer>

<div class="theme-toggle">
    <i class="fas fa-moon"></i>
</div>

<script>
    // Simple theme toggle functionality
    const toggle = document.querySelector('.theme-toggle');
    toggle.addEventListener('click', () => {
        document.body.classList.toggle('light-theme');
        const icon = toggle.querySelector('i');
        if (document.body.classList.contains('light-theme')) {
            icon.classList.remove('fa-moon');
            icon.classList.add('fa-sun');
        } else {
            icon.classList.remove('fa-sun');
            icon.classList.add('fa-moon');
        }
    });

    // Smooth scrolling for navigation links
    document.querySelectorAll('nav a').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            const targetElement = document.querySelector(targetId);

            window.scrollTo({
                top: targetElement.offsetTop - 100,
                behavior: 'smooth'
            });
        });
    });
</script>
</body>
</html>
