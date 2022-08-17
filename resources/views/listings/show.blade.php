<x-layout>

    <!-- Modal Delete -->
    <div class="modal fade" id="delete-list-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form class="modal-dialog" method="POST" action="/listings/{{ $listing->id }}">
            @csrf
            @method('delete')
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete todo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Body -->
            <div class="modal-body d-flex">
                <p class="mx-auto">Do you want to delete this list?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <input class="btn btn-primary" type="submit" value="Submit" name="submit" />
            </div>
            </div>
        </form>
    </div>

    <!-- Modal Update -->
    <div class="modal fade" id="update-list-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form class="modal-dialog" method="POST" action="/listings/{{ $listing->id }}">
            @csrf
            @method('put')
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update todo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                <div class="mb-3">
                    <label for="todo-title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="todo-title" name="title" value="{{ $listing->title }}">

                    @error('title')
                        <p class="text-danger">Please fill the input field.</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="todo-desc" class="form-label">Description</label>
                    <textarea class="form-control" id="todo-desc" name="description" style="resize: none;">{{ $listing->description }}</textarea>
                    
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
                       
    <div class="border-bottom  w-100 d-flex p-2 rounded-1 align-items-center mb-2">
        <x-tag-color :listing="$listing"/>
        <span class="fw-semibold">{{ $listing->title }}</span>
        <button class="btn btn-danger ms-auto" data-bs-toggle="modal" data-bs-target="#delete-list-modal">
            Delete
        </button>
        <button class="btn btn-secondary ms-1" data-bs-toggle="modal" data-bs-target="#update-list-modal">
            Update
        </button>
    </div>

    <section class="w-100 bg-white rounded-1 p-2">
        {{ $listing->description }}
    </section>
    
</x-layout>