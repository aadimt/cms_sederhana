<div class="container mt-5">
    <h2>Login</h2>
    <?php if (isset($data['error'])): ?>
        <div class="alert alert-danger"><?= $data['error']; ?></div>
    <?php endif; ?>
    <form method="POST" action="">
        <input type="email" name="email" class="form-control mb-2" placeholder="Email" required>
        <input type="password" name="password" class="form-control mb-2" placeholder="Password" required>
        <button type="submit" class="btn btn-primary">Login</button>
        <a href="/cms_sederhana/auth/register" class="btn btn-link">Register</a>
    </form>
</div>
