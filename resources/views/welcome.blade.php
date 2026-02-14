<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Task Manager</title>
    <style>
        /* Card hover effect */
        .card {
            transition: all 0.3s ease-in-out;
            cursor: pointer;
        }

        .card:hover {
            transform: translateY(-8px) scale(1.03);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
        }

        /* Heart icon smooth hover */
        .card i.bi-heart,
        .card i.bi-heart-fill {
            transition: transform 0.3s ease;
        }

        .card:hover i.bi-heart,
        .card:hover i.bi-heart-fill {
            transform: scale(1.15);
        }

        /* Buttons inside cards */
        .card .btn,
        .card a i {
            transition: all 0.25s ease-in-out;
        }

        /* Button hover effect */
        .card .btn:hover {
            transform: scale(1.08);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        /* Icon buttons (edit/delete) hover */
        .card a:hover i {
            transform: scale(1.25);
            filter: drop-shadow(0 4px 6px rgba(0, 0, 0, 0.25));
        }

        /* Prevent disabled button hover */
        .card .btn:disabled {
            transform: none;
            box-shadow: none;
            cursor: not-allowed;
        }

        .icon-btn {
            background: transparent !important;
            border: none !important;
            padding: 0;
        }

        .icon-btn:focus,
        .icon-btn:active,
        .icon-btn:focus-visible {
            outline: none !important;
            box-shadow: none !important;
        }
    </style>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container my-5">

        @session('success')
            <div class="alert alert-success alert-dismissible fade show shadow-lg custom-alert" role="alert">
                <strong>✅ Success!</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endsession

        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold">📝 Task Manager</h2>
            <a href="{{ route('create') }}" class="btn btn-light btn-lg shadow">
                ➕ New Task
            </a>
        </div>

        <!-- ================= INCOMPLETE TASKS ================= -->
        <h4 class="mb-3 text-warning">⏳ Incomplete Tasks</h4>

        <div class="row g-4 mb-5">
            @foreach ($data as $temp)
                @if ($temp->status == 0)
                    <!-- Task Card -->
                    <div class="col-md-4">
                        <div class="card shadow-sm position-relative">

                            <!-- Fav -->
                            @if ($temp->fav == 0)
                                <a href="{{ route('fav', $temp->id) }}">
                                    <span class="position-absolute top-0 end-0 p-2">
                                        <i class="bi bi-heart text-secondary fs-4"></i>
                                    </span>
                                </a>
                            @else
                                <a href="{{ route('fav', $temp->id) }}">
                                    <span class="position-absolute top-0 end-0 p-2">
                                        <i class="bi bi-heart-fill text-danger fs-4"></i>
                                    </span>
                                </a>
                            @endif


                            <div class="card-body">
                                <h5 class="fw-bold">{{ $temp->task }}</h5>

                                <p class="text-muted">
                                    {{ $temp->des }}
                                </p>

                                <span class="badge bg-warning fs-6 mb-3">Pending</span>

                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <a href="{{ route('status', $temp->id) }}" class="btn btn-success btn-sm">✔
                                        Complete</a>


                                    <div>
                                        <form method="post" action="{{ route('delete', $temp->id) }}">
                                            @csrf
                                            @method('delete')
                                            <a href="{{ route('edit', $temp->id) }}" class="text-primary fs-5 me-2">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <button style="border: none;  background: none" type="submit"
                                                class="text-danger fs-5">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
            <!-- ================= COMPLETED TASKS ================= -->
            <h4 class="mb-3 text-success">✅ Completed Tasks</h4>

            <div class="row g-4">

                @foreach ($data as $temp)
                    @if ($temp->status == 1)
                        <!-- Task Card -->
                        <div class="col-md-4">
                            <div class="card shadow-sm position-relative">

                                <!-- Fav -->
                                @if ($temp->fav == 0)
                                    <a href="{{ route('fav', $temp->id) }}">
                                        <span class="position-absolute top-0 end-0 p-2">
                                            <i class="bi bi-heart text-secondary fs-4"></i>
                                        </span>
                                    </a>
                                @else
                                    <a href="{{ route('fav', $temp->id) }}">
                                        <span class="position-absolute top-0 end-0 p-2">
                                            <i class="bi bi-heart-fill text-danger fs-4"></i>
                                        </span>
                                    </a>
                                @endif


                                <div class="card-body">
                                    <h5 class="fw-bold">{{ $temp->task }}</h5>

                                    <p class="text-muted">
                                        {{ $temp->des }}
                                    </p>

                                    <span class="badge bg-success">Completed</span>

                                    <div class="d-flex justify-content-between align-items-center mt-3">
                                        <button class="btn btn-secondary btn-sm" disabled>
                                            ✔ Done
                                        </button>
                                        <div>
                                            <form method="post" action="{{ route('delete', $temp->id) }}">
                                                @csrf
                                                @method('delete')
                                                <a href="{{ route('edit', $temp->id) }}"
                                                    class="text-primary fs-5 me-2">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                                <button style="border: none;  background: none" type="submit"
                                                    class="text-danger fs-5">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach

                {{-- Loop Card end --}}



            </div>

        </div>

</body>

</html>
