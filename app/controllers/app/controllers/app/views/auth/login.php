<div class="container mt-5">
    <h2>Login</h2>
    <form action="/cms_sederhana/public/auth/login" method="POST">
        <div>
            <label>Username:</label>
            <input type="text" name="username" required>
        </div>
        <div>
            <label>Password:</label>
            <input type="password" name="password" required>
        </div>
        <button type="submit">Login</button>
    </form>
</div>
