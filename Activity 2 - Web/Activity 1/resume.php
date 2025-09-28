<?php

$person = [
    'name' => 'JAYCEE F. ANDAL',
    'title' => 'Computer Science Student',
    'email' => 'jayceeja12@gmail.com',
    'phone' => '0970-865-3711',
    'address' => 'San Felipe, Padre Garcia, Batangas',
    'age' => '20 y.o.',
    'dob' => 'September 12, 2005',
    'pob' => 'Padre Garcia',
    'citizenship' => 'Filipino',
    'religion' => 'Roman Catholic',
    'languages' => 'English / Tagalog'
];

$education = [
    [
        'school' => 'San Felipe Elementary School',
        'degree' => 'Primary School',
        'start' => '2016',
        'end' => '2017',
        'description' => ''
    ],
    [
        'school' => 'Padre Garcia Integrated National High School',
        'degree' => 'Secondary School',
        'start' => '2022',
        'end' => '2023',
        'description' => ''
    ],
    [
        'school' => 'Batangas State University – Alangilan Campus',
        'degree' => 'Tertiary School',
        'start' => '2023',
        'end' => 'Present',
        'description' => ''
    ]
];

$skills = [
    'Computer Literate',
    'Basic Computer Skills',
    'Basic Arithmetic Skills',
    'Customer Service Basic Skills',
    'Ability to Work Under Pressure',
    'Teamwork and Adaptability'
];

$projects = [
    [
        'name' => 'FLASH-Q: Flashcard Quiz System',
        'description' => 'The Flashcard Quiz System is a console-based Java application designed to aid users in learning and self-assessment by creating, managing, and taking quizzes with flashcards.',
        'languages' => 'Java, SQL',
        'link' => 'https://github.com/Andaljc1218/FLASH-Q.git'
    ],
    [
        'name' => 'EcoMap - Smart Waste Management System',
        'description' => 'EcoMap is a web-based platform designed to make waste management smarter and more efficient for communities.',
        'languages' => 'HTML5, CSS3, JavaScript, PHP, MySQL',
        'link' => 'https://github.com/Andaljc1218/ECO-MAP.git'
    ]
];
// Simple escape helper
$e = fn($v) => htmlspecialchars((string)$v, ENT_QUOTES, 'UTF-8');

$avatarPath = __DIR__ . '/avatar.jpg';
$avatarUrl = file_exists($avatarPath) ? 'avatar.jpg' : null; // drop an image named avatar.jpg beside this file
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= htmlspecialchars($person['name']) ?> — Resume</title>
    <style>
        :root {
            --text: #1a1a1a;
            --muted: #626262;
            --border: #e3e3e3;
            --border-strong: #d7d7d7;
            --accent: #1f2937;
            --link: #0a58ca;
        }
        * { box-sizing: border-box; }
        body { font-family: Arial, sans-serif; color: var(--text); background: #fafafa; margin: 0; line-height: 1.6; font-size: 15px; }
        .page { max-width: 900px; margin: 32px auto 56px; background: #fff; padding: 30px; border: 1px solid var(--border); }

        /* Header */
        .header { display: grid; grid-template-columns: 110px 1fr; gap: 18px; align-items: center; }
        .avatar { width: 110px; height: 110px; border-radius: 50%; background: #f0f0f0; object-fit: cover; display: block; border: 1px solid var(--border); }
        .name { font-size: 28px; letter-spacing: .8px; font-weight: 800; margin: 0 0 6px; color: var(--accent); }
        .title { margin: 0 0 6px; font-weight: 700; color: var(--text); }
        .contact { display: flex; gap: 14px; flex-wrap: wrap; font-size: 13px; color: var(--muted); }
        .divider { height: 1px; background: var(--border-strong); margin: 16px 0 22px; }

        /* Single column layout */
        .section { margin-bottom: 22px; }
        .section-title { font-size: 14px; letter-spacing: .6px; font-weight: 800; margin: 0 0 10px; color: var(--accent); }
        .muted { color: var(--muted); font-size: 13px; }

        /* Boxed/table look */
        .section-box { border: 1px solid var(--border); border-radius: 8px; padding: 16px; background: #fff; }
        .table { border: 1px solid var(--border); border-radius: 6px; overflow: hidden; background: #fff; }
        .table-row { display: grid; grid-template-columns: 220px 1fr; gap: 10px 16px; padding: 10px 12px; border-top: 1px solid var(--border); }
        .table-row:first-child { border-top: none; }
        .info-label { font-weight: 700; font-size: 12px; color: #222; }
        .align-right { text-align: right; color: var(--muted); white-space: nowrap; }

        .table-list { border: 1px solid var(--border); border-radius: 6px; list-style: none; padding: 0; margin: 0; overflow: hidden; }
        .table-list li { padding: 12px 14px; border-top: 1px solid var(--border); }
        .table-list li:first-child { border-top: none; }

        /* Projects layout */
        .project-table { border: 1px solid var(--border); border-radius: 6px; overflow: hidden; background: #fff; }
        .project-row { display: grid; grid-template-columns: 1fr auto; gap: 16px; padding: 12px 14px; border-top: 1px solid var(--border); align-items: center; }
        .project-row:first-child { border-top: none; }
        .project-link { display: inline-block; padding: 6px 10px; border: 1px solid var(--border-strong); border-radius: 6px; color: #0a58ca; text-decoration: none; font-weight: 600; font-size: 13px; }
        .project-link:hover { background: #f5f7ff; text-decoration: none; }

        @media (max-width: 640px) {
            .header { grid-template-columns: 80px 1fr; }
            .name { font-size: 24px; }
            .table-row { grid-template-columns: 1fr; }
            .align-right { text-align: left; margin-top: 6px; }
            .project-row { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>
    <div class="page">
        <div class="header">
            <?php if ($avatarUrl): ?>
                <img src="<?= $e($avatarUrl) ?>" alt="Avatar" class="avatar">
            <?php else: ?>
                <div class="avatar"></div>
            <?php endif; ?>
            <div>
                <h1 class="name"><?= htmlspecialchars(strtoupper($person['name'])) ?></h1>
                <p class="title"><?= htmlspecialchars($person['title']) ?></p>
                <div class="contact">
                    <span><?= htmlspecialchars($person['phone']) ?></span>
                    <span><?= htmlspecialchars($person['email']) ?></span>
                    <span><strong>Address:</strong> <?= htmlspecialchars($person['address']) ?></span>
                </div>
            </div>
        </div>

        <div class="divider"></div>

        <section class="section section-box">
            <h3 class="section-title">PROFILE</h3>
            <p class="muted">A student of Batangas State University pursuing a degree in Bachelor of Science Major in Computer Science, seeking practical experiences and application opportunities. To enhance my learnings and skills at a stable workplace. To gain new experiences. To learn new skills and practical knowledge.</p>
        </section>

        <section class="section section-box">
            <h3 class="section-title">PERSONAL INFORMATION</h3>
            <div class="table">
                <div class="table-row"><div class="info-label">AGE</div><div><?= $e($person['age']) ?></div></div>
                <div class="table-row"><div class="info-label">DATE OF BIRTH</div><div><?= $e($person['dob']) ?></div></div>
                <div class="table-row"><div class="info-label">PLACE OF BIRTH</div><div><?= $e($person['pob']) ?></div></div>
                <div class="table-row"><div class="info-label">CITIZENSHIP</div><div><?= $e($person['citizenship']) ?></div></div>
                <div class="table-row"><div class="info-label">RELIGION</div><div><?= $e($person['religion']) ?></div></div>
                <div class="table-row"><div class="info-label">LANGUAGES</div><div><?= $e($person['languages']) ?></div></div>
                <div class="table-row"><div class="info-label">ADDRESS</div><div><?= htmlspecialchars($person['address']) ?></div></div>
            </div>
        </section>

        <section class="section section-box">
            <h3 class="section-title">SKILLS</h3>
            <ul class="table-list">
                <?php foreach ($skills as $skill): ?>
                    <li><?= $e($skill) ?></li>
                <?php endforeach; ?>
            </ul>
        </section>

        <section class="section section-box">
            <h3 class="section-title">EDUCATION</h3>
            <div class="table">
                <?php foreach ($education as $edu): ?>
                    <div class="table-row">
                        <div>
                            <strong><?= $e($edu['degree']) ?></strong><br>
                            <span class="muted"><?= $e($edu['school']) ?></span>
                        </div>
                        <div class="align-right"><?= $e($edu['start']) ?> – <?= $e($edu['end']) ?></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

        <section class="section section-box">
            <h3 class="section-title">PROJECTS</h3>
            <div class="project-table">
                <?php foreach ($projects as $proj): ?>
                    <div class="project-row">
                        <div>
                            <strong><?= $e($proj['name']) ?></strong><br>
                            <span class="muted"><?= $e($proj['description']) ?></span><br>
                            <span><strong>Languages:</strong> <?= $e($proj['languages']) ?></span>
                        </div>
                        <div>
                            <a class="project-link" href="<?= $e($proj['link']) ?>" target="_blank" rel="noopener noreferrer">View Project</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
    </div>
</body>
</html>


