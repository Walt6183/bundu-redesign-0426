<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $headline }} — B&U BundU</title>
    <meta name="robots" content="noindex, nofollow">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:wght@400;600;700&family=Instrument+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --navy: #0F2040;
            --teal: #079BB8;
            --light: #F5F6F8;
            --ink: #1A1A2E;
        }

        body {
            font-family: 'Instrument Sans', sans-serif;
            color: var(--light);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .bg {
            position: fixed;
            inset: 0;
            background: url('/images/maintenance-bg.jpg') center/cover no-repeat;
            z-index: 0;
        }

        .bg::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(
                135deg,
                rgba(15, 32, 64, 0.88) 0%,
                rgba(15, 32, 64, 0.72) 40%,
                rgba(7, 155, 184, 0.45) 100%
            );
        }

        .container {
            position: relative;
            z-index: 1;
            text-align: center;
            padding: 2rem;
            max-width: 700px;
            width: 100%;
        }

        .logo {
            width: 120px;
            height: auto;
            margin-bottom: 2rem;
            opacity: 0.95;
        }

        .icon {
            font-size: 3rem;
            margin-bottom: 1.5rem;
            display: block;
        }

        h1 {
            font-family: 'Bricolage Grotesque', sans-serif;
            font-size: clamp(1.75rem, 5vw, 2.75rem);
            font-weight: 700;
            margin-bottom: 1rem;
            line-height: 1.2;
            text-shadow: 0 2px 12px rgba(0, 0, 0, 0.3);
        }

        .message {
            font-size: 1.1rem;
            line-height: 1.7;
            opacity: 0.9;
            max-width: 520px;
            margin: 0 auto 2.5rem;
        }

        /* Countdown */
        .countdown {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-bottom: 2.5rem;
            flex-wrap: wrap;
        }

        .countdown-unit {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 12px;
            padding: 1.25rem 1rem;
            min-width: 90px;
            transition: transform 0.2s;
        }

        .countdown-unit:hover {
            transform: translateY(-2px);
        }

        .countdown-number {
            font-family: 'Bricolage Grotesque', sans-serif;
            font-size: 2.5rem;
            font-weight: 700;
            line-height: 1;
            color: var(--teal);
            text-shadow: 0 0 20px rgba(7, 155, 184, 0.4);
        }

        .countdown-label {
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            opacity: 0.7;
            margin-top: 0.4rem;
        }

        /* Maintenance icon animation */
        .gear {
            display: inline-block;
            animation: spin 8s linear infinite;
        }

        @keyframes spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        .divider {
            width: 60px;
            height: 3px;
            background: var(--teal);
            border-radius: 2px;
            margin: 0 auto 2rem;
            opacity: 0.8;
        }

        .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            text-align: center;
            padding: 1.25rem;
            font-size: 0.8rem;
            opacity: 0.5;
            z-index: 1;
        }

        @media (max-width: 480px) {
            .countdown-unit { min-width: 72px; padding: 1rem 0.75rem; }
            .countdown-number { font-size: 2rem; }
        }
    </style>
</head>
<body>
    <div class="bg"></div>

    <div class="container">
        @if(file_exists(public_path('images/logo_2026K.png')))
            <img src="/images/logo_2026K.png" alt="B&U BundU" class="logo">
        @endif

        @if($mode === 'maintenance')
            <span class="icon"><span class="gear">⚙️</span></span>
        @else
            <span class="icon">🚀</span>
        @endif

        <h1>{{ $headline }}</h1>
        <div class="divider"></div>

        @if($message)
            <p class="message">{{ $message }}</p>
        @endif

        @if($mode === 'countdown' && $countdownTarget)
            <div class="countdown" x-data="countdown('{{ $countdownTarget }}')" x-init="start()">
                <div class="countdown-unit">
                    <div class="countdown-number" x-text="days">00</div>
                    <div class="countdown-label">Tage</div>
                </div>
                <div class="countdown-unit">
                    <div class="countdown-number" x-text="hours">00</div>
                    <div class="countdown-label">Stunden</div>
                </div>
                <div class="countdown-unit">
                    <div class="countdown-number" x-text="minutes">00</div>
                    <div class="countdown-label">Minuten</div>
                </div>
                <div class="countdown-unit">
                    <div class="countdown-number" x-text="seconds">00</div>
                    <div class="countdown-label">Sekunden</div>
                </div>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/alpinejs@3/dist/cdn.min.js" defer></script>
            <script>
                function countdown(target) {
                    return {
                        days: '00', hours: '00', minutes: '00', seconds: '00',
                        interval: null,
                        start() {
                            const targetDate = new Date(target).getTime();
                            this.update(targetDate);
                            this.interval = setInterval(() => this.update(targetDate), 1000);
                        },
                        update(targetDate) {
                            const now = Date.now();
                            const diff = Math.max(0, targetDate - now);

                            if (diff === 0) {
                                clearInterval(this.interval);
                                window.location.reload();
                                return;
                            }

                            this.days = String(Math.floor(diff / 86400000)).padStart(2, '0');
                            this.hours = String(Math.floor((diff % 86400000) / 3600000)).padStart(2, '0');
                            this.minutes = String(Math.floor((diff % 3600000) / 60000)).padStart(2, '0');
                            this.seconds = String(Math.floor((diff % 60000) / 1000)).padStart(2, '0');
                        }
                    };
                }
            </script>
        @endif
    </div>

    <div class="footer">
        &copy; {{ date('Y') }} B&U BundU — Beratung und Unterstützung
    </div>
</body>
</html>
