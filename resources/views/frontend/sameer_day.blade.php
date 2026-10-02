<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rozey ❤️ Sameer | Purpose to Love</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        window.SAVE_LOCATION_URL = "{{ url('save-location') }}";
        function initMap() { console.log("Majestic Maps Loaded"); }
    </script>
    <link rel="stylesheet" href="{{ asset('assets/purpose-day/style.css') }}">
    <style>
        /* Narrative Section Styles */
        .narrative-section {
            padding: 4rem 2rem;
            background: linear-gradient(to bottom, #fffcf5, #fff);
        }
        
        .narrative-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .narrative-card {
            padding: 3rem 2rem;
            border: 1px solid rgba(0,0,0,0.05);
            border-radius: 20px;
            text-align: center;
            background: #fff;
            box-shadow: 0 10px 30px rgba(0,0,0,0.03);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .narrative-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.08);
        }

        .narrative-icon {
            font-size: 3.5rem;
            margin-bottom: 1.5rem;
            opacity: 0.8;
            display: inline-block;
        }

        .narrative-title {
            font-size: 1.8rem;
            color: var(--primary-dark);
            margin-bottom: 1rem;
        }

        .narrative-text {
            font-size: 1.3rem;
            color: #555;
            line-height: 1.6;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .narrative-section {
                padding: 3rem 1.5rem;
            }
            
            .narrative-grid {
                grid-template-columns: 1fr; /* Stack cards on mobile */
                gap: 1.5rem;
            }

            .narrative-card {
                padding: 2rem 1.5rem;
            }

            .narrative-title {
                font-size: 1.5rem;
            }

            .narrative-text {
                font-size: 1.1rem;
            }
        }
    </style>
</head>
<body>
    <!-- Floating Petal Container (Dynamic JS) -->
    
    <!-- Majestic Hero -->
    <section class="hero" id="home">
        <div class="floral-container" style="position: relative;">
            <p class="cinzel-dec floating-text" style="color: var(--primary-dark); font-size: 1.5rem; text-transform: uppercase;">✿ The Purpose of Our Hearts ✿</p>
            <h1 class="names cinzel-dec floating-text">
                SAMEER <span class="heart-icon">❤</span> ROZEY
            </h1>
            <p class="cursive floating-text" style="font-size: 2.8rem; margin-bottom: 3rem; color: var(--text-dark);">Loving you is my soul's only mission.</p>
            <a href="#letter" class="btn-primary" id="celebrateBtn">Celebrate Our Journey</a>
        </div>
    </section>

    <!-- The Floral Love Letter -->
    <section class="love-letter-section" id="letter">
        <div class="love-letter-card">
            <div class="wax-seal"><span>S&R</span></div>
            <div class="love-letter-content">
                <span style="font-size: 2.5rem; color: var(--primary); display: block; margin-bottom: 20px;">❧</span>
                <h3 class="cinzel-dec">Dearest Sameer,</h3>
                <p>“In a world full of temporary things, you are my <strong>Forever</strong>. Every petal that falls and every star that shines reminds me of the purpose we share.”</p>
                <p>“I want you to know that I <strong>love you</strong> with a depth that words cannot reach. I haven't forgotten anything—not our first laugh, not the way you say my name, and not the way you complete my world.”</p>
                <p>“You are my sanctuary, my joy, and my <strong>Purpose</strong>. Happy Purpose Day, my love.”</p>
                <p style="text-align: right; margin-top: 60px;" class="cursive">— Always yours, Rozey ❤️</p>
            </div>
        </div>
    </section>

    <!-- Cinematic Memory Museum -->
    <!-- Narrative of Love (Replaces Captured Memories) -->
    <section class="narrative-section" id="purpose">
        <h2 class="cinzel-dec" style="text-align: center; font-size: 3rem; color: var(--primary-dark); margin-bottom: 4rem;">Why My Heart Chose You <span style="font-size: 0.7em; color: var(--primary);">✿</span></h2>
        
        <div class="narrative-grid">
            
            <div class="narrative-card">
                <div class="narrative-icon">🛡️</div>
                <h3 class="cinzel-dec narrative-title">Your Gentle Strength</h3>
                <p class="cursive narrative-text">
                    "In your arms, I have found my safest haven. You protect my heart with a gentleness that whispers peace to my soul."
                </p>
            </div>

            <div class="narrative-card">
                <div class="narrative-icon">✨</div>
                <h3 class="cinzel-dec narrative-title">The Way You See Me</h3>
                <p class="cursive narrative-text">
                    "You look at me and I feel seen, truly seen. You love my imperfections and celebrate my light like no one else."
                </p>
            </div>

            <div class="narrative-card">
                <div class="narrative-icon">♾️</div>
                <h3 class="cinzel-dec narrative-title">Our Future</h3>
                <p class="cursive narrative-text">
                    "I don't just want a joyous moment, I want a lifetime. I want the quiet mornings, the chaotic days, and a forever of 'us'."
                </p>
            </div>
            
        </div>
    </section>

    <!-- The Final Deep Vow -->
    <section class="final-vow-section">
        <div class="vow-floral-ornament top-left">🌸</div>
        <div class="vow-floral-ornament top-right">🌸</div>
        <div class="vow-floral-ornament bottom-left">🌸</div>
        <div class="vow-floral-ornament bottom-right">🌸</div>
        
        <div class="vow-container">
            <div class="vow-inner-frame">
                <h2 class="cinzel-dec" style="font-size: 3rem; color: var(--primary-dark); margin-bottom: 2rem;">My Purest Soul</h2>
                <div class="vow-heart">❤️</div>
                <p class="cursive anim-glow" style="font-size: 3.5rem; color: var(--royal-red); margin: 30px 0;">
                    “It is the greatest blessing to have you in my life.”
                </p>
                <div style="font-size: 2rem; color: var(--primary); margin: 20px 0;">❧ ━━━━━━━━━ ❦</div>
                <p class="cinzel-dec" style="letter-spacing: 10px; margin-top: 50px; opacity: 0.6;">FOREVER & ALWAYS</p>
                <div class="cursive" style="font-size: 2.5rem; margin-top: 30px; color: var(--primary-dark);">Sameer & Rozey</div>
            </div>
        </div>
    </section>

    <!-- Gift Surprise 3D Modal -->
    <div class="gift-modal" id="giftModal">
        <div class="modal-content">
             <button class="close-modal" id="closeModal">&times;</button>
             <div class="modal-inner-frame">
                 <div class="gift-message visible">
                     <span class="vow-heart-icon">💝</span>
                     <h2 class="cinzel-dec modal-title">My Constant Vow</h2>
                     <p class="cursive modal-vow">
                        “I love you... and I didn't forget anything. Each heartbeat is a reminder that you are my only purpose.”
                     </p>
                     <div class="modal-divider">✧ ━━━━━━━━━━━━ ✧</div>
                     <div class="cursive modal-signature">Sameer ❤️ Rozey</div>
                 </div>
             </div>
        </div>
    </div>

    <!-- JS Scripts -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCix326VJYzGXyMzF7_yTD_vbn5DBMHZL4&libraries=places&language=en&callback=initMap&loading=async" async defer></script>
    <script src="{{ asset('assets/purpose-day/script.js') }}"></script>
</body>
</html>
