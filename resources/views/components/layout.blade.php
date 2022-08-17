<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Laravel</title>
</head>
<body>
    <!-- Modal -->
    <div class="modal fade" id="add-list-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form class="modal-dialog" method="POST" action="/listings">
            @csrf
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add todo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                <div class="mb-3">
                    <label for="todo-title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="todo-title" name="title">

                    @error('title')
                        <p class="text-danger">Please fill the input field.</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="todo-desc" class="form-label">Description</label>
                    <textarea class="form-control" id="todo-desc" name="description" style="resize: none;"></textarea>
                    
                    @error('description')
                        <p class="text-danger">Please fill the input field.</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="todo-prio" class="form-label">Priority</label>
                    <div id="todo-prio">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="tags" value="top" id="top-chkbox">
                            <label class="form-check-label" for="top-chkbox">
                                Top priority
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="tags" value="middle" id="med-chkbox">
                            <label class="form-check-label" for="med-chkbox">
                                Medium priority
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="tags" value="least" id="least-chkbox" checked>
                            <label class="form-check-label" for="least-chkbox">
                                Least priority
                            </label>
                        </div>

                        @error('tags')
                            <p class="text-danger">Please select an input field.</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <input class="btn btn-primary" type="submit" value="Submit" name="submit" />
            </div>
            </div>
        </form>
    </div>

    {{-- Todo Body --}}
    <div class="bg-light mx-auto mt-sm-3 rounded-1 p-2 container-sm h-sm-100">

        <header class="d-flex container w-100 align-items-center">
            <h1 class="fw-bold">To Do</h1>
            <button class="btn btn-primary ms-auto" data-bs-toggle="modal" data-bs-target="#add-list-modal">Add list</button>
        </header>

        <nav class="container mt-2">
            <form class="input-group w-100" action="/" method="GET">
                <input type="text" class="form-control" name="search" placeholder="Search todo list ...">
                <input class="btn btn-secondary" type="submit" value="Search">
            </form>
        </nav>

        <form class="btn-group mt-2 container" action="/" method ="GET">
            <a class="btn btn-primary" href="/">All</a>
            <button type="input" name="tags" value="top" class="btn btn-danger">Top</button>
            <button type="input" name="tags" value="middle" class="btn btn-warning">Middle</button>
            <button type="input" name="tags" value="least" class="btn btn-info">Least</button>
        </form>

        <main class="container mt-2">

            {{ $slot }}
    
        </main>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>