<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AHE CIAMPEL - Backend API & Web Portal</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-color: #0b0f19;
            --card-bg: rgba(18, 24, 38, 0.85);
            --border-color: rgba(255, 255, 255, 0.08);
            --text-main: #f8fafc;
            --text-muted: #94a3b8;
            --primary: #6366f1;
            --primary-gradient: linear-gradient(135deg, #6366f1 0%, #a855f7 100%);
            --accent-green: #10b981;
            --accent-blue: #0ea5e9;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, sans-serif;
        }

        body {
            background-color: var(--bg-color);
            color: var(--text-main);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 2rem 1.5rem;
            background-image: 
                radial-gradient(circle at 15% 15%, rgba(99, 102, 241, 0.18) 0%, transparent 40%),
                radial-gradient(circle at 85% 85%, rgba(168, 85, 247, 0.15) 0%, transparent 40%);
        }

        .container {
            max-width: 900px;
            width: 100%;
        }

        .header {
            text-align: center;
            margin-bottom: 2.5rem;
        }

        .badge-online {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 6px 14px;
            border-radius: 9999px;
            background: rgba(16, 185, 129, 0.12);
            border: 1px solid rgba(16, 185, 129, 0.3);
            color: var(--accent-green);
            font-size: 0.875rem;
            font-weight: 600;
            margin-bottom: 1.25rem;
        }

        .badge-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background-color: var(--accent-green);
            box-shadow: 0 0 10px var(--accent-green);
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.4; transform: scale(1.2); }
        }

        h1 {
            font-size: 2.75rem;
            font-weight: 800;
            letter-spacing: -0.03em;
            margin-bottom: 0.75rem;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .subtitle {
            color: var(--text-muted);
            font-size: 1.125rem;
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.6;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .card {
            background: var(--card-bg);
            border: 1px solid var(--border-color);
            backdrop-filter: blur(16px);
            border-radius: 16px;
            padding: 1.75rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.35);
            transition: transform 0.2s ease, border-color 0.2s ease;
        }

        .card:hover {
            transform: translateY(-3px);
            border-color: rgba(99, 102, 241, 0.4);
        }

        .card-icon {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.25rem;
            font-size: 1.3rem;
            background: rgba(99, 102, 241, 0.15);
            color: #818cf8;
            border: 1px solid rgba(99, 102, 241, 0.25);
        }

        .card-title {
            font-size: 1.2rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .card-desc {
            color: var(--text-muted);
            font-size: 0.925rem;
            line-height: 1.55;
            margin-bottom: 1.25rem;
        }

        .endpoint-pill {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 14px;
            background: rgba(0, 0, 0, 0.35);
            border-radius: 10px;
            border: 1px solid var(--border-color);
            font-family: ui-monospace, SFMono-Regular, monospace;
            font-size: 0.85rem;
            color: #38bdf8;
            word-break: break-all;
        }

        .endpoint-pill a {
            color: inherit;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .endpoint-pill a:hover {
            text-decoration: underline;
        }

        .status-box {
            background: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 16px;
            padding: 1.5rem 2rem;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            gap: 1.5rem;
        }

        .info-col {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .info-label {
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: var(--text-muted);
        }

        .info-val {
            font-weight: 700;
            font-size: 1.05rem;
            color: var(--text-main);
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 0.925rem;
            text-decoration: none;
            color: #fff;
            background: var(--primary-gradient);
            box-shadow: 0 4px 14px rgba(99, 102, 241, 0.4);
            transition: opacity 0.2s ease;
        }

        .btn:hover {
            opacity: 0.9;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="badge-online">
                <span class="badge-dot"></span>
                API Server Active
            </div>
            <h1>AHE CIAMPEL</h1>
            <p class="subtitle">Struktur Modern 2 Folder: <strong>Backend (Laravel 10 API & Web)</strong> + <strong>Frontend (Flutter Multi-platform)</strong></p>
        </div>

        <div class="grid">
            <div class="card">
                <div class="card-icon">⚡</div>
                <h2 class="card-title">Backend REST API</h2>
                <p class="card-desc">Jalur API JSON untuk aplikasi mobile Flutter. Sudah siap dengan middleware Sanctum dan CORS.</p>
                <div class="endpoint-pill">
                    <a href="/api/health" target="_blank">GET /api/health ↗</a>
                    <span style="color: var(--accent-green); font-size: 0.75rem;">JSON</span>
                </div>
            </div>

            <div class="card">
                <div class="card-icon">📱</div>
                <h2 class="card-title">Frontend Flutter</h2>
                <p class="card-desc">Terletak di folder <code>frontend/</code>. Siap dijalankan di Android, iOS, Windows, atau Web.</p>
                <div class="endpoint-pill">
                    <span>flutter run</span>
                    <span style="color: var(--accent-blue); font-size: 0.75rem;">Multi-OS</span>
                </div>
            </div>
        </div>

        <div class="status-box">
            <div class="info-col">
                <span class="info-label">Framework</span>
                <span class="info-val">Laravel {{ app()->version() }}</span>
            </div>
            <div class="info-col">
                <span class="info-label">Environment</span>
                <span class="info-val">{{ config('app.env') }}</span>
            </div>
            <div class="info-col">
                <span class="info-label">PHP Version</span>
                <span class="info-val">PHP {{ phpversion() }}</span>
            </div>
            <a href="/api/health" target="_blank" class="btn">
                Test JSON Response &rarr;
            </a>
        </div>
    </div>
</body>
</html>
