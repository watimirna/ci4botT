<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tambah Data Dosen</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
    .btn-black {
      background-color: #000;
      color: #fff;
      border: 1px solid #000;
    }
    .btn-black:hover {
      background-color: #333;
      border-color: #333;
    }
    .card {
      border: 1px solid #ccc;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
  </style>
</head>
<body>
  <div class="container mt-5">
    <h1 class="text-center mb-4">Tambah Data Dosen</h1>
    
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

    <a href="<?= route_to('Dosen::list') ?>" class="btn btn-md btn-black mb-3">Kembali</a>

    <div class="card">
      <div class="card-body">
        <form method="post" action="<?= route_to('Dosen::simpan') ?>">
          <div class="mb-3">
            <label for="nama_dosen" class="form-label">Nama Dosen</label>
            <input type="text" name="nama_dosen" id="nama_dosen" class="form-control">
          </div>

          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control">
          </div>

          <div class="mb-3">
            <label for="matakuliah" class="form-label">Mata Kuliah</label>
            <input type="text" name="matakuliah" id="matakuliah" class="form-control">
          </div>

          <button type="submit" class="btn btn-black btn-block">Simpan</button>
        </form>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
