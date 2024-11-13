<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Simple Dashboard</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Custom styling for sidebar */
    .sidebar {
      height: 100vh;
      position: fixed;
      top: 0;
      left: 0;
      width: 250px;
      background-color: #f8f9fa;
      padding-top: 20px;
    }

    .sidebar a {
      color: #000;
      text-decoration: none;
      padding: 10px 15px;
      display: block;
      font-size: 16px;
    }

    .sidebar a:hover {
      background-color: #007bff;
      color: white;
    }

    /* Content area */
    .content {
      margin-left: 260px;
      padding: 20px;
    }
    .img-tbl{
        
        height: 10px;
    }
  </style>
</head>
<body>

  <!-- Sidebar -->
  <div class="sidebar">
    <h3 class="text-center">Logo</h3>
    <a href="#">Item 1</a>
    <a href="#">Item 2</a>
    <a href="#">Item 3</a>
  </div>

  <!-- Main content area -->
  <div class="content">
    <!-- Top bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="bi bi-house-door"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="bi bi-person"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="bi bi-gear"></i></a>
          </li>
        </ul>
      </div>
    </nav>

    <!-- Table with CRUD Operations -->
    <h4 class="mb-4">Data Table</h4>
    <button class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#addModal">Add Data</button>
    <!-- Modal -->
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Description</th>
          <th>Image</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
         @foreach($posts as $post)
        
        <tr>
          <td>{{$post->id}}</td>
          <td>{{$post->name}}</td>
          <td>{{$post->description}}</td>
          <td><img class="img-tbl" src="{{ asset('images/'. $post->image) }}" alt="image" /></td>
          <td>
            <a href="{{route('edit', $post->id)}}" class="btn btn-warning btn-sm">Update</a>
            <a href="{{route('delete', $post->id)}}" class="btn btn-danger btn-sm">Delete</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>

    <!-- Display pagination links -->

    

  </div>
  <!-- Modal for Adding Data -->
  <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addModalLabel">Add New Data</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="POST" action="{{ route('create') }}"  enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
              <label for="description" class="form-label">Description</label>
              <textarea class="form-control" id="description" name="description"  required></textarea>
            </div>
            <div class="mb-3">
              <label for="image" class="form-label">Image</label>
              <input type="file" class="form-control" name="image" id="image">
            </div>
            <input type="submit" class="btn btn-primary">
          </form>
        </div>
      </div>
    </div>
  </div>


    @if (session('success'))
        <div class="alert alert-success">
            <h2>{{ session('success') }}</h2>
        </div>
    @endif


  <!-- Bootstrap JS and Icons -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.js"></script>

</body>
</html>
