<?php
const API_URL = "https://whenisthenextmcufilm.com/api";

$ch = curl_init(API_URL);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
curl_close($ch);

$data = json_decode($result, true);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <link rel="icon" type="image/png" href="spider.jpg"/>
    <!-- Primary Meta Tags -->
<title>Next Marvel Movie</title>
<meta name="title" content="Next Marvel Movie" />
<meta name="description" content="Next Marvel Movie" />

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website" />
<meta property="og:url" content="https://juanignaciovera-first-php-app.zeabur.app/" />
<meta property="og:title" content="Next Marvel Movie" />
<meta property="og:description" content="Next Marvel Movie" />
<meta property="og:image" content="https://metatags.io/images/spider.jpg" />

<!-- X (Twitter) -->
<meta property="twitter:card" content="summary_large_image" />
<meta property="twitter:url" content="https://juanignaciovera-first-php-app.zeabur.app/" />
<meta property="twitter:title" content="Next Marvel Movie" />
<meta property="twitter:description" content="Next Marvel Movie" />
<meta property="twitter:image" content="https://metatags.io/images/spider.jpg" />

<!-- Meta Tags Generated with https://metatags.io -->
    <style>
        :root {
            color-scheme: light dark;
            background-image: url("https://images8.alphacoders.com/578/578182.jpg");
            background-size: cover;
            font-weight: bold;
        }

        body {
            display: grid;
            place-content: center;
            margin: 0;
            min-height: 100vh;
        }

        main {
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 16px;
            padding: 16px;
            width: 100%;
            max-width: 480px;
        }

        h2, h3 {
            text-align: center;
            color: #000;
            margin: 0.5rem 0;
        }

        img {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 0.5rem auto;
            border-radius: 16px;
        }

        section, .movies {
            display: block;
            text-align: center;
            margin: 1rem 0;
        }

        .movie-card {
            margin-bottom: 1.5rem;
        }

        .movie-card hgroup {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        /* Aquí ya no definimos estilos en fila; todo se queda en columna */
    </style>
</head>
<body>
<main>
    <h2>The next Marvel movie</h2>
    <div class="movies">
        <div class="movie-card">
            <section>
                <img src="<?= htmlspecialchars($data['poster_url'] ?? '') ?>"
                     alt="Poster de <?= htmlspecialchars($data['title'] ?? 'Desconocido') ?>">
            </section>
            <hgroup>
                <h3><?= htmlspecialchars($data['title'] ?? 'Título desconocido') ?></h3>
                <p>Releases in <strong><?= htmlspecialchars($data['days_until'] ?? '-') ?> days</strong></p>
                <p>Release date: <?= htmlspecialchars($data['release_date'] ?? '-') ?></p>
            </hgroup>
        </div>

        <?php if (!empty($data['following_production'])): ?>
                <h1>And the following one is:</h1>

            <div class="movie-card">
                <section>
                    <img src="<?= htmlspecialchars($data['following_production']['poster_url'] ?? '') ?>"
                         alt="Poster siguiente: <?= htmlspecialchars($data['following_production']['title'] ?? '') ?>">
                </section>
                <hgroup>
                    <h3><?= htmlspecialchars($data['following_production']['title'] ?? '—') ?></h3>
                    <p>Releases in <strong><?= htmlspecialchars($data['following_production']['days_until'] ?? '-') ?> days</strong></p>
                    <p>Release date: <?= htmlspecialchars($data['following_production']['release_date'] ?? '-') ?></p>
                </hgroup>
            </div>
        <?php endif; ?>
    </div>
</main>
</body>
</html>
