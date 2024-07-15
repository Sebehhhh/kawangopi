@extends('template.dashboard')

@section('title', 'Blog')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Blog /</span> ...</h4>

        <!-- Error Handling -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Create Blog Post Button -->
        <div class="d-flex justify-content-end mb-3">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addBlogModal">
                Add
            </button>
        </div>

        <!-- Blog Posts Table -->
        <div class="card">
            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Content</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($blogPosts as $post)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $post->judul }}</td>
                                <td>{{ $post->user->name }}</td>
                                <td>
                                    <span data-bs-toggle="tooltip" title="{{ $post->konten }}">
                                        {{ \Illuminate\Support\Str::limit($post->konten, 50) }}
                                    </span>
                                </td>
                                <td>
                                    @if ($post->gambar)
                                        <img src="{{ asset('storage/' . $post->gambar) }}" alt="Blog Image"
                                            style="width: 50px; height: 50px;">
                                    @else
                                        No Image
                                    @endif
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal"
                                                data-bs-target="#editBlogModal" data-id="{{ $post->id }}"
                                                data-judul="{{ $post->judul }}" data-konten="{{ $post->konten }}"><i
                                                    class="mdi mdi-pencil-outline me-1"></i> Edit</a>
                                            <a class="dropdown-item" href="javascript:void(0);"
                                                onclick="confirmDeleteBlog(event, '{{ route('dashboard.blog.destroy', $post->id) }}')"><i
                                                    class="mdi mdi-trash-can-outline me-1"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Pagination Links -->
                <nav aria-label="Page navigation" class="mt-3 mx-3">
                    {{ $blogPosts->links('pagination::bootstrap-5') }}
                </nav>
            </div>
        </div>
        <!--/ Blog Posts Table -->
    </div>

    <!-- Modal Add Blog Post -->
    <div class="modal fade" id="addBlogModal" tabindex="-1" aria-labelledby="addBlogModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('dashboard.blog.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addBlogModalLabel">Add Blog Post</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Form Fields -->
                        <div class="mb-3">
                            <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="judul" name="judul"
                                placeholder="Enter Title" required>
                        </div>
                        <div class="mb-3">
                            <label for="content" class="form-label">Content <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="konten" name="konten" rows="5" placeholder="Enter Content" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" class="form-control" id="gambar" name="gambar">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <!-- Modal Edit Blog Post -->
    <div class="modal fade" id="editBlogModal" tabindex="-1" aria-labelledby="editBlogModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('dashboard.blog.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editBlogModalLabel">Edit Blog Post</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Form Fields -->
                        <input type="hidden" id="edit-blog-id" name="id">
                        <div class="mb-3">
                            <label for="edit-judul" class="form-label">Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="edit-judul" name="judul"
                                placeholder="Enter judul" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit-konten" class="form-label">Content <span
                                    class="text-danger">*</span></label>
                            <textarea class="form-control" id="edit-konten" name="konten" rows="5" placeholder="Enter konten" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="edit-gambar" class="form-label">Image</label>
                            <input type="file" class="form-control" id="edit-gambar" name="gambar">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <!-- Form Delete Blog Post -->
    <form id="delete-blog-form" action="" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>
@endsection
