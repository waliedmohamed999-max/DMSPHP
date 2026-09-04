<?php
// Shared seed schema for the Database Playground — a fresh, isolated, in-memory
// SQLite database built fresh on every request. Nothing here ever touches the
// real MySQL database this platform uses elsewhere; this is a throwaway sandbox
// that exists only for the lifetime of one request, so any SQL a learner runs
// (including DROP/DELETE/UPDATE) is 100% safe and has zero effect on anyone else.
//
// SQLite's SQL dialect is intentionally close to MySQL's for the statements taught
// in this track (SELECT/INSERT/UPDATE/DELETE/JOIN/WHERE/ORDER BY/GROUP BY), so
// what a learner practices here transfers directly. Lessons note the few places
// syntax diverges (e.g. AUTO_INCREMENT vs AUTOINCREMENT) where it matters.

function build_sandbox_pdo(): PDO
{
    $pdo = new PDO('sqlite::memory:');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $pdo->exec('
        CREATE TABLE users (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            name TEXT NOT NULL,
            email TEXT NOT NULL UNIQUE,
            role TEXT NOT NULL DEFAULT "user",
            created_at TEXT NOT NULL
        )
    ');
    $pdo->exec('
        CREATE TABLE posts (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            user_id INTEGER NOT NULL,
            title TEXT NOT NULL,
            body TEXT NOT NULL,
            views INTEGER NOT NULL DEFAULT 0,
            created_at TEXT NOT NULL,
            FOREIGN KEY (user_id) REFERENCES users(id)
        )
    ');
    $pdo->exec('
        CREATE TABLE comments (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            post_id INTEGER NOT NULL,
            user_id INTEGER NOT NULL,
            body TEXT NOT NULL,
            created_at TEXT NOT NULL,
            FOREIGN KEY (post_id) REFERENCES posts(id),
            FOREIGN KEY (user_id) REFERENCES users(id)
        )
    ');

    $users = [
        [1, 'Ahmed Hassan', 'ahmed@example.com', 'admin', '2024-01-10'],
        [2, 'Sara Ali', 'sara@example.com', 'user', '2024-01-15'],
        [3, 'Omar Khaled', 'omar@example.com', 'user', '2024-02-02'],
        [4, 'Laila Mostafa', 'laila@example.com', 'editor', '2024-02-20'],
        [5, 'Youssef Adel', 'youssef@example.com', 'user', '2024-03-05'],
    ];
    $stmt = $pdo->prepare('INSERT INTO users (id, name, email, role, created_at) VALUES (?, ?, ?, ?, ?)');
    foreach ($users as $u) {
        $stmt->execute($u);
    }

    $posts = [
        [1, 1, 'Getting Started with PDO', 'PDO gives PHP a single, consistent way to talk to any database.', 120, '2024-01-12'],
        [2, 1, 'Why Prepared Statements Matter', 'Prepared statements are the real fix for SQL injection.', 340, '2024-01-20'],
        [3, 2, 'My First REST API', 'Building a small products API taught me a lot about status codes.', 85, '2024-02-01'],
        [4, 4, 'Database Design 101', 'Normalizing a schema early saves you from painful migrations later.', 210, '2024-02-22'],
        [5, 2, 'Debugging a Tricky Bug', 'It turned out to be an off-by-one error in a loop.', 60, '2024-03-01'],
        [6, 3, 'Understanding JOINs', 'INNER JOIN vs LEFT JOIN finally clicked after this example.', 175, '2024-03-10'],
        [7, 5, 'Sessions vs Cookies', 'One lives on the server, one lives in the browser.', 95, '2024-03-15'],
        [8, 4, 'Indexing for Performance', 'Adding one index turned a 4-second query into 40 milliseconds.', 300, '2024-03-22'],
    ];
    $stmt = $pdo->prepare('INSERT INTO posts (id, user_id, title, body, views, created_at) VALUES (?, ?, ?, ?, ?, ?)');
    foreach ($posts as $p) {
        $stmt->execute($p);
    }

    $comments = [
        [1, 1, 2, 'This finally made PDO click for me, thanks!', '2024-01-13'],
        [2, 1, 3, 'Great intro, looking forward to more.', '2024-01-14'],
        [3, 2, 4, 'Wish I had read this before my last project.', '2024-01-21'],
        [4, 3, 1, 'Nice first API, the pagination section helped.', '2024-02-03'],
        [5, 4, 2, 'Normalization examples were super clear.', '2024-02-23'],
        [6, 4, 5, 'Do you have a follow-up on many-to-many?', '2024-02-24'],
        [7, 6, 5, 'The diagram made INNER vs LEFT JOIN obvious.', '2024-03-11'],
        [8, 6, 1, 'Bookmarking this one.', '2024-03-12'],
        [9, 7, 4, 'Short and to the point, exactly what I needed.', '2024-03-16'],
        [10, 8, 3, 'Which column did you index?', '2024-03-23'],
        [11, 8, 2, 'Indexes are underrated, good writeup.', '2024-03-23'],
        [12, 5, 1, 'Off-by-one bugs get everyone eventually.', '2024-03-02'],
    ];
    $stmt = $pdo->prepare('INSERT INTO comments (id, post_id, user_id, body, created_at) VALUES (?, ?, ?, ?, ?)');
    foreach ($comments as $c) {
        $stmt->execute($c);
    }

    return $pdo;
}
