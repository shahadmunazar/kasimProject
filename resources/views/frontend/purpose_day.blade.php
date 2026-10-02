<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saima ❤️ Shahad | Purpose to Love</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        window.SAVE_LOCATION_URL = "{{ url('save-location') }}";
        function initMap() { console.log("Majestic Maps Loaded"); }
    </script>
    <link rel="stylesheet" href="{{ asset('assets/purpose-day/style.css') }}">
    <style>
        /* Moments Section (Curved Animated Cards) Styles */
        .moments-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem 1rem;
        }

        .moment-card {
            background-color: transparent;
            height: 350px;
            perspective: 1000px; /* Essential for 3D flip effect */
            border-radius: 30px; /* Curved corners */
            cursor: pointer;
        }

        .card-inner {
            position: relative;
            width: 100%;
            height: 100%;
            text-align: center;
            transition: transform 0.8s cubic-bezier(0.175, 0.885, 0.32, 1.275); /* Bouncy transition */
            transform-style: preserve-3d;
            border-radius: 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        }

        /* Hover Effect: Flip the card */
        .moment-card:hover .card-inner {
            transform: rotateY(180deg);
        }

        .card-front, .card-back {
            position: absolute;
            width: 100%;
            height: 100%;
            -webkit-backface-visibility: hidden; /* Safari */
            backface-visibility: hidden;
            border-radius: 30px; /* Match parent curve */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 2rem;
            box-sizing: border-box;
        }

        /* Front Side */
        .card-front {
            background: linear-gradient(135deg, #ffffff 0%, #fffcf5 100%);
            color: var(--primary-dark);
            border: 2px solid rgba(0,0,0,0.05);
        }

        .card-front h3 {
            font-size: 2.2rem;
            margin-bottom: 1rem;
            color: var(--primary-dark);
        }

        .card-front .card-icon {
            font-size: 4rem;
            margin-bottom: 1rem;
            opacity: 0.8;
            color: var(--primary); /* Gold/Primary color */
            text-shadow: none;
        }

        /* Back Side */
        .card-back {
            background: linear-gradient(135deg, #fffcf5 0%, #ffe6e6 100%);
            color: var(--primary-dark);
            transform: rotateY(180deg);
            border: 4px solid var(--primary); /* Gold border for premium feel */
        }

        .card-back blockquote {
            font-size: 1.4rem;
            line-height: 1.6;
            color: #555;
            font-family: 'Dancing Script', cursive; /* Assuming cursive font is available */
            margin: 0;
            padding: 0 1rem;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .moments-grid {
                grid-template-columns: 1fr; /* 1 card per row on mobile */
                gap: 2rem;
                padding: 1rem;
            }
            .moment-card {
                height: 300px; /* Compact height for mobile */
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
                SAIMA <span class="heart-icon">❤</span> SHAHAD
            </h1>
            <p class="cursive floating-text" style="font-size: 2.8rem; margin-bottom: 3rem; color: var(--text-dark);">Loving you is my soul's only mission.</p>
            <a href="#letter" class="btn-primary" id="celebrateBtn">Celebrate Our Journey</a>
        </div>
    </section>

    <!-- The Floral Love Letter -->
    <section class="love-letter-section" id="letter">
        <div class="love-letter-card">
            <div class="wax-seal"><span>S&S</span></div>
            <div class="love-letter-content">
                <span style="font-size: 2.5rem; color: var(--primary); display: block; margin-bottom: 20px;">❧</span>
                <h3 class="cinzel-dec">Dearest Saima,</h3>
                <p>“In a world full of temporary things, you are my <strong>Forever</strong>. Every petal that falls and every star that shines reminds me of the purpose we share.”</p>
                <p>“I want you to know that I <strong>love you</strong> with a depth that words cannot reach. I haven't forgotten anything—not our first laugh, not the way you say my name, and not the way you complete my world.”</p>
                <p>“You are my sanctuary, my joy, and my <strong>Purpose</strong>. Happy Purpose Day, my love.”</p>
                <p style="text-align: right; margin-top: 60px;" class="cursive">— Always yours, Shahad ❤️</p>
            </div>
        </div>
    </section>

    <!-- Cinematic Memory Museum -->
    <section class="collage-section" id="purpose">
        <h2 class="cinzel-dec" style="margin-bottom: 5rem; font-size: 3.5rem; color: var(--primary-dark);">Captured Memories <span style="font-size: 0.7em;">✿</span></h2>
        
        <div class="collage-container">
            <div class="memory-tile tile-1 anim-left">
                <img src="{{ asset('assets/purpose-day/img1.jpg') }}" alt="Saima">
            </div>
            
            <div class="memory-tile tile-2 anim-top">
                <img src="{{ asset('assets/purpose-day/img2.jpg') }}" alt="Saima">
            </div>
            
            <div class="memory-tile tile-3 anim-right">
                <img src="{{ asset('assets/purpose-day/img3.jpg') }}" alt="Saima">
            </div>
            
            <div class="memory-tile tile-4 anim-bottom">
                <img src="{{ asset('assets/purpose-day/her.jpg') }}" alt="Saima Portrait">
            </div>
        </div>
    </section>

    <!-- Our Beautiful Moments (Curved Animated Cards - Quote Edition) -->
    <section class="moments-section" style="padding: 4rem 2rem; background: #fffcf5;">
        <h2 class="cinzel-dec" style="text-align: center; font-size: 3rem; color: var(--primary-dark); margin-bottom: 4rem;">Reasons I Smile <span style="font-size: 0.7em;">❤</span></h2>
        
        <div class="moments-grid">
            <!-- Card 1 -->
            <div class="moment-card">
                <div class="card-inner">
                    <div class="card-front">
                        <div class="card-icon">✨</div>
                        <h3 class="cinzel-dec">Your Smile</h3>
                    </div>
                    <div class="card-back">
                        <blockquote class="cursive">"It lights up my darkest days and guides me home."</blockquote>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="moment-card">
                <div class="card-inner">
                    <div class="card-front">
                        <div class="card-icon">🌟</div>
                        <h3 class="cinzel-dec">Your Eyes</h3>
                    </div>
                    <div class="card-back">
                        <blockquote class="cursive">"I see my entire future reflected in them."</blockquote>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="moment-card">
                <div class="card-inner">
                    <div class="card-front">
                        <div class="card-icon">💖</div>
                        <h3 class="cinzel-dec">Your Heart</h3>
                    </div>
                    <div class="card-back">
                        <blockquote class="cursive">"Pure as gold, it is the only treasure I need."</blockquote>
                    </div>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="moment-card">
                <div class="card-inner">
                    <div class="card-front">
                        <div class="card-icon">🛡️</div>
                        <h3 class="cinzel-dec">My Safe Place</h3>
                    </div>
                    <div class="card-back">
                        <blockquote class="cursive">"In your arms, the world's noise fades away into silence."</blockquote>
                    </div>
                </div>
            </div>

            <!-- Card 5 -->
            <div class="moment-card">
                <div class="card-inner">
                    <div class="card-front">
                        <div class="card-icon">♾️</div>
                        <h3 class="cinzel-dec">Forever</h3>
                    </div>
                    <div class="card-back">
                        <blockquote class="cursive">"I choose you everyday, and I'll choose you forever."</blockquote>
                    </div>
                </div>
            </div>

            <!-- Card 6 -->
            <div class="moment-card">
                <div class="card-inner">
                    <div class="card-front">
                        <div class="card-icon">🦋</div>
                        <h3 class="cinzel-dec">Us</h3>
                    </div>
                    <div class="card-back">
                        <blockquote class="cursive">"Together is my favorite place to be."</blockquote>
                    </div>
                </div>
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
                <div class="cursive" style="font-size: 2.5rem; margin-top: 30px; color: var(--primary-dark);">Saima & Shahad</div>
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
                     <div class="cursive modal-signature">Saima ❤️ Shahad</div>
                 </div>
             </div>
        </div>
    </div>

    <!-- JS Scripts -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCix326VJYzGXyMzF7_yTD_vbn5DBMHZL4&libraries=places&language=en&callback=initMap&loading=async" async defer></script>
    <script src="{{ asset('assets/purpose-day/script.js') }}"></script>
</body>
</html>
