<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Task Details</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }

        .task-card {
            max-width: 700px;
            margin: auto;
            margin-top: 60px;
            transition: all 0.3s ease-in-out;
        }

        .task-card:hover {
            transform: translateY(-5px) scale(1.02);
            box-shadow: 0 15px 35px rgba(0,0,0,0.15);
        }

        .fav-heart {
            transition: transform 0.3s ease;
        }

        .fav-heart:hover {
            transform: scale(1.2);
        }

        .btn-back {
            transition: all 0.25s ease-in-out;
        }

        .btn-back:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
        }
    </style>
</head>
<body>

<div class="container">

    <!-- Back Button -->
    <div class="my-4">
        <a href="index.html" class="btn btn-secondary btn-back">
            ← Back to Tasks
        </a>
    </div>

    <!-- Task Card -->
    <div class="card shadow-sm task-card position-relative">

        <!-- Fav Heart -->
        <span class="position-absolute top-0 end-0 p-3">
            <i class="bi bi-heart-fill text-danger fav-heart fs-3"></i>
        </span>

        <div class="card-body p-5">

            <!-- Task Title -->
            <h2 class="card-title fw-bold mb-3">
                Learn Laravel
            </h2>

            <!-- Task Description -->
            <p class="card-text fs-5 text-muted mb-4">
                Complete the CRUD task app using Laravel & Bootstrap 5. Build separate sections for incomplete and completed tasks with card UI. Add hover and zoom effects on cards and buttons for better UX.
            </p>

            <!-- Status -->
            <span class="badge bg-warning fs-6 mb-3">Pending</span>

            <!-- Task Metadata -->
            <div class="mt-4 d-flex gap-3">
                <button class="btn btn-success btn-sm">✔ Mark Complete</button>
                <button class="btn btn-primary btn-sm">✏ Edit Task</button>
                <button class="btn btn-danger btn-sm">🗑 Delete Task</button>
            </div>

        </div>

    </div>

</div>

</body>
</html>
