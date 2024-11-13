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
    
    
    <!-- Data table -->
    <form class="w-50" method="POST" action="{{ route('update', $ourpost->id) }}">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" value="{{ $ourpost->name }}"  name="name"> 
    </div>
    <br/>
    <div class="form-group">
        <label for="description">description</label>
        <input type="text" class="form-control" id="description" value="{{ $ourpost->description }}" name="description"> 
    </div>
    <br/>
    <div class="form-group">
        <label for="image">Image</label>
        <input type="file" class="form-control" id="name" value="{{ $ourpost->image }}" name="image"> 
    </div>

    <br>
    <input type="submit" class="btn btn-primary">
    </form>
    
  <!-- Bootstrap JS and Icons -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.js"></script>

</body>
</html>
