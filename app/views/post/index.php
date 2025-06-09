<div class="content-wrapper">
    <section class="content-header">
        <h1>Daftar Post</h1>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Judul</th>
                            <th>Konten</th>
                            <th>Author</th>
                            <th>Dibuat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($data as $post): ?>
                        <tr>
                            <td><?= $post['id'] ?></td>
                            <td><?= $post['title'] ?></td>
                            <td><?= $post['content'] ?></td>
                            <td><?= $post['author'] ?></td>
                            <td><?= $post['created_at'] ?></td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
