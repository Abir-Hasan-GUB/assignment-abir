<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h6 class="fw-bold">Write a new post</h6>
                    @include('pages.home.partials.create_post')
                </div>

                <div class="user-post p-4 bg-light text-center">
                    <h4 class="fw-bold underline">Your All Post</h4>
                    <table class="table table-striped table-info mt-2">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Comments</th>
                                <th scope="col">Category</th>
                                <th class="text-end" scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $index => $post)
                                <tr>
                                    <td>{{ ($posts->currentPage() - 1) * $posts->perPage() + $index + 1 }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->comments->count() }}</td>
                                    <td>{{ $post->category->name }}</td>
                                    <td>
                                        <div class="d-flex align-items-center justify-content-end">
                                            <a href="{{ route('posts.edit', $post->id) }}"
                                                class="btn btn-info btn-sm">Edit</a>

                                            <a target="_blank" href="{{ route('posts.show', $post->id) }}"
                                                class="btn btn-success mx-2 btn-sm">View</a>

                                            <form action="{{ route('posts.destroy', $post) }}" method="POST"
                                                class="mt-2" onsubmit="return confirm('Are you sure?');">
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Pagination -->
                    <div class="mt-4">
                        {{ $posts->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
