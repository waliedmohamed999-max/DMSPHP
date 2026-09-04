<?php
$page_title = 'Database Playground — بيئة SQL تفاعلية';
$base = '..';
include __DIR__ . '/../includes/header.php';
?>

<h1>🗄️ Database Playground</h1>
<p class="subtitle">نفّذ استعلامات SQL حقيقية على قاعدة بيانات SQLite تعليمية معزولة — بتتبني من جديد في كل مرة تفتح فيها الصفحة، فمينفعش تكسرها ولا تأثر على أي حد تاني.</p>

<div class="bi-block">
    <div class="ar">🇪🇬 القاعدة فيها 3 جداول: <code>users</code>، <code>posts</code>، <code>comments</code> — كل بوست ليه صاحب (<code>user_id</code>)، وكل تعليق مرتبط ببوست ومستخدم. جرب أي SQL: <code>SELECT</code>, <code>INSERT</code>, <code>UPDATE</code>, <code>DELETE</code>, حتى <code>DROP TABLE</code> — القاعدة معزولة تمامًا وبترجع لحالتها الأصلية مع كل طلب جديد.</div>
    <div class="en">🇬🇧 The database has 3 tables: <code>users</code>, <code>posts</code>, <code>comments</code> — every post has an owner (<code>user_id</code>), and every comment links to a post and a user. Try any SQL: <code>SELECT</code>, <code>INSERT</code>, <code>UPDATE</code>, <code>DELETE</code>, even <code>DROP TABLE</code> — the database is fully isolated and resets to its original state with every new request.</div>
</div>

<div class="sql-schema-box">users     (id, name, email, role, created_at)
posts     (id, user_id, title, body, views, created_at)
comments  (id, post_id, user_id, body, created_at)</div>

<div class="sql-playground">
    <textarea spellcheck="false" rows="4">SELECT posts.title, users.name AS author, posts.views
FROM posts
JOIN users ON posts.user_id = users.id
ORDER BY posts.views DESC;</textarea>
    <div>
        <button class="sql-run-btn">▶ نفّذ / Run Query</button>
        <span class="sql-status"></span>
    </div>
    <div class="sql-result-wrap"></div>
</div>

<div class="recap-box">
    <h3>💡 أفكار لتجربتها / Ideas to try</h3>
    <ul>
        <li><code>SELECT * FROM users WHERE role = 'admin';</code></li>
        <li><code>SELECT posts.title, COUNT(comments.id) AS comment_count FROM posts LEFT JOIN comments ON comments.post_id = posts.id GROUP BY posts.id ORDER BY comment_count DESC;</code></li>
        <li><code>UPDATE posts SET views = views + 1 WHERE id = 1;</code></li>
        <li><code>DELETE FROM comments WHERE post_id = 3;</code></li>
        <li><code>SELECT SELCT * FROM users;</code> — جرب استعلام غلط عمدًا وشوف رسالة الخطأ الحقيقية.</li>
    </ul>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
