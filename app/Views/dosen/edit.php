<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Data Dosen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
      .alert-danger {
        background-color: #343a40; /* Dark gray background */
        color: #fff; /* White text */
        border-color: #343a40;
      }
      .btn-warning {
        background-color: #6c757d; /* Gray background */
        border-color: #6c757d;
      }
      .btn-secondary {
        background-color: #000; /* Black background */
        border-color: #000;
      }
    </style>
  </head>
  <body>
    <div class="container mt-5">
      <h1 class="text-center mb-4">Edit Data Dosen</h1>
      
      <?php if (! empty(session()->getFlashdata('message'))) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <ul class="mb-0">
            <?php foreach (session()->getFlashdata('message') as $error) : ?>
              <li><?= $error ?></li>
            <?php endforeach; ?>
          </ul>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php endif ?>

      <a href="<?= route_to('Dosen::index') ?>" class="btn btn-md btn-warning mb-3">Kembali</a>

      <div class="card">
        <div class="card-body">
          <form method="post" action="<?= route_to('Dosen::update', $dosen['id_dosen']) ?>">
            <input type="hidden" name="_method" value="put">

            <div class="mb-3">
              <label for="nama_dosen" class="form-label">Nama Dosen</label>
              <input type="text" name="nama_dosen" id="nama_dosen" class="form-control" value="<?= $dosen['nama_dosen'] ?>" required>
            </div>

            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" name="email" id="email" class="form-control" value="<?= $dosen['email'] ?>" required>
            </div>

            <div class="mb-3">
              <label for="matakuliah" class="form-label">Mata Kuliah</label>
              <input type="text" name="matakuliah" id="matakuliah" class="form-control" value="<?= $dosen['matakuliah'] ?>">
            </div>

            <button type="submit" class="btn btn-secondary btn-block">Simpan Perubahan</button>
          </form>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
