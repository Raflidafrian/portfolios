<?php
session_start();
if (!isset($_SESSION['visited'])) {
    $_SESSION['visited'] = true;
    header("Location: welcome.php");
    exit();
}

// Data Proyek (Dipindahkan ke atas agar bisa dibaca oleh HTML di bawah)
$projects = [
    [
        "title" => "GitHub Profile & Portfolio",
        "desc" => "Portofolio personal dinamis dan profil GitHub yang dikustomisasi dengan animasi snake kontribusi interaktif.",
        "tech" => "HTML, CSS, GitHub Actions, YAML",
        "link" => "https://github.com/Raflidafrian/Raflidafrian"
    ],
    [
        "title" => "Academic & Financial System (PKM)",
        "desc" => "Sistem terintegrasi berbasis web untuk manajemen data akademik dan pelacakan keuangan.",
        "tech" => "PHP, MySQL, JavaScript",
        "link" => "https://github.com/Raflidafrian"
    ],
    [
        "title" => "Web Dashboard & Inventory",
        "desc" => "Aplikasi web untuk manajemen inventaris perusahaan, menggunakan framework frontend modern dan database relasional.",
        "tech" => "React, Node.js, SQL",
        "link" => "https://github.com/Raflidafrian"
    ],
    [
        "title" => "Housing Price Prediction Model",
        "desc" => "Model machine learning untuk memprediksi harga rumah menggunakan analisis regresi dan visualisasi data.",
        "tech" => "Python, Scikit-Learn",
        "link" => "https://github.com/Raflidafrian"
    ],
    [
        "title" => "Cybersecurity Assessment Toolkit",
        "desc" => "Kumpulan skrip dan tools untuk melakukan security audit dan penetration testing jaringan.",
        "tech" => "Kali Linux, Nmap, Bash",
        "link" => "https://github.com/Raflidafrian"
    ]
];

// Data Keahlian
$skills = ["PHP & MySQL", "JavaScript & React", "Web3 Development", "Python & Machine Learning", "Cybersecurity", "Git & GitHub Actions"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Portfolios</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <style>
    html {
        scroll-behavior: smooth;
    }

    body {
        margin: 0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f8f9fa;
        color: #333;
        line-height: 1.6;
    }

    /* Header Styling */
    header {
        background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);
        color: white;
        padding: 6rem 2rem;
        text-align: center;
        border-bottom: 4px solid #3b82f6;
    }

    header h1 {
        margin: 0;
        font-size: 3.5rem;
        letter-spacing: 1px;
    }

    .typing-text {
        margin-top: 0.5rem;
        font-size: 1.3rem;
        color: #94a3b8;
        min-height: 30px;
    }

    /* Container */
    .container {
        max-width: 1000px;
        margin: 3rem auto;
        padding: 0 1.5rem;
    }

    /* Section Headings */
    .section-title {
        text-align: center;
        margin-bottom: 2rem;
        font-size: 2.2rem;
        color: #1e293b;
        position: relative;
    }

    .section-title::after {
        content: '';
        display: block;
        width: 60px;
        height: 4px;
        background: #3b82f6;
        margin: 10px auto 0;
        border-radius: 2px;
    }

    /* Info Sections (About & Experience) */
    .info-section {
        background: white;
        padding: 2rem;
        border-radius: 12px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        margin-bottom: 3rem;
        border: 1px solid #e2e8f0;
        text-align: center;
    }

    /* Skills Tags */
    .skills-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 10px;
        margin-top: 1.5rem;
    }

    .skill-tag {
        background: #eff6ff;
        color: #2563eb;
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-weight: 600;
        font-size: 0.9rem;
        border: 1px solid #bfdbfe;
    }

    /* Projects Grid */
    .projects {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 1.5rem;
    }

    .project {
        background: white;
        padding: 1.5rem;
        border-radius: 12px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border: 1px solid #e2e8f0;
        display: flex;
        flex-direction: column;
    }

    .project:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 20px rgba(0, 0, 0, 0.1);
    }

    .project h3 {
        margin-top: 0;
        color: #0f172a;
    }

    .project p {
        flex-grow: 1;
    }

    .tech-stack {
        font-size: 0.9rem;
        color: #64748b;
        margin-bottom: 1rem;
        font-weight: bold;
    }

    .project a {
        display: inline-block;
        text-align: center;
        margin-top: auto;
        padding: 0.6rem 1rem;
        background-color: #3b82f6;
        color: white;
        text-decoration: none;
        border-radius: 6px;
        transition: background-color 0.3s ease;
    }

    .project a:hover {
        background-color: #2563eb;
    }

    /* Contact Section */
    .contact {
        text-align: center;
        margin-top: 4rem;
        padding-top: 2rem;
        border-top: 1px solid #e2e8f0;
    }

    .contact-links a {
        display: inline-block;
        margin: 10px;
        padding: 0.8rem 1.5rem;
        color: #1e293b;
        text-decoration: none;
        font-weight: bold;
        border: 2px solid #cbd5e1;
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .contact-links a:hover {
        background-color: #1e293b;
        color: white;
        border-color: #1e293b;
    }

    /* Footer */
    footer {
        text-align: center;
        padding: 2rem;
        margin-top: 2rem;
        background: #0f172a;
        color: #64748b;
        font-size: 0.9rem;
    }

    /* Animation Classes */
    .fade-in {
        opacity: 0;
        transform: translateY(30px);
        transition: opacity 0.8s ease-out, transform 0.8s ease-out;
    }

    .fade-in.visible {
        opacity: 1;
        transform: translateY(0);
    }
    </style>
</head>

<body>

    <header>
        <h1>Rafli Dafrian</h1>
        <div class="typing-text" id="typing-text"></div>
    </header>

    <div class="container">
        <section class="info-section fade-in">
            <h2 class="section-title">Profile & Experience</h2>
            <p>
                Saya adalah seorang Web2 & Web3 Developer dan mahasiswa Teknik Informatika (Kelas 05TPLE005) di
                Universitas Pamulang yang berdomisili di Tangerang. Saya memiliki minat yang kuat dalam pengembangan
                aplikasi web, machine learning, serta keamanan siber (cybersecurity).
            </p>
            <p>
                <strong>Pengalaman Profesional:</strong><br>
                PT Sages Informatika &mdash; <em>IT Infrastructure / Developer</em>
            </p>

            <div class="skills-container">
                <?php foreach($skills as $skill): ?>
                <span class="skill-tag"><?php echo htmlspecialchars($skill); ?></span>
                <?php endforeach; ?>
            </div>
        </section>

        <h2 class="section-title fade-in">My Projects</h2>
        <section class="projects">
            <?php foreach($projects as $index => $project): ?>
            <div class="project fade-in" <?php echo 'style="transition-delay: ' . ($index * 0.1) . 's;"'; ?>>
                <h3><?php echo htmlspecialchars($project['title']); ?></h3>
                <p><?php echo htmlspecialchars($project['desc']); ?></p>
                <p class="tech-stack">⚙️ <?php echo htmlspecialchars($project['tech']); ?></p>
                <a href="<?php echo htmlspecialchars($project['link']); ?>" target="_blank"
                    rel="noopener noreferrer">View on GitHub</a>
            </div>
            <?php endforeach; ?>
        </section>

        <section class="contact fade-in">
            <h2 class="section-title">Let's Connect</h2>
            <p>Tertarik untuk berkolaborasi atau berdiskusi seputar teknologi?</p>
            <div class="contact-links">
                <a href="mailto:raflidafrian220@gmail.com">Email Me</a>
                <a href="https://github.com/Raflidafrian" target="_blank" rel="noopener noreferrer">GitHub</a>
                <a href="https://www.linkedin.com/in/rafli-dafrian-65131b278/" target="_blank"
                    rel="noopener noreferrer">LinkedIn</a>
            </div>
        </section>
    </div>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Rafli Dafrian. All rights reserved.</p>
    </footer>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        // 1. Intersection Observer untuk memicu efek Fade-In pas Scroll
        const faders = document.querySelectorAll('.fade-in');
        const appearOptions = {
            threshold: 0.1,
            rootMargin: "0px 0px -50px 0px"
        };

        const appearOnScroll = new IntersectionObserver(function(entries, appearOnScroll) {
            entries.forEach(entry => {
                if (!entry.isIntersecting) return;
                entry.target.classList.add('visible');
                appearOnScroll.unobserve(entry.target);
            });
        }, appearOptions);

        faders.forEach(fader => {
            appearOnScroll.observe(fader);
        });

        // 2. Animasi Mengetik (Typing Effect) Dinamis di Header
        const words = ["Web2 & Web3 Developer", "IT Infrastructure", "Cybersecurity Enthusiast"];
        let i = 0;
        let timer;

        function typingEffect() {
            let word = words[i].split("");
            var loopTyping = function() {
                if (word.length > 0) {
                    document.getElementById('typing-text').innerHTML += word.shift();
                } else {
                    setTimeout(deletingEffect, 2000);
                    return false;
                }
                timer = setTimeout(loopTyping, 100);
            };
            loopTyping();
        }

        function deletingEffect() {
            let word = words[i].split("");
            var loopDeleting = function() {
                if (word.length > 0) {
                    word.pop();
                    document.getElementById('typing-text').innerHTML = word.join("");
                } else {
                    if (words.length > (i + 1)) {
                        i++;
                    } else {
                        i = 0;
                    }
                    setTimeout(typingEffect, 500);
                    return false;
                }
                timer = setTimeout(loopDeleting, 50);
            };
            loopDeleting();
        }

        typingEffect();
    });
    </script>
</body>

</html>