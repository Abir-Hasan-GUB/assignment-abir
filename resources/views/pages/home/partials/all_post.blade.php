<section id="blog-main">
    <div class="container">
        <div class="blog-cards">
            <div class="row row-cols-md-2 row-cols-1 g-4 mt-4">

                @foreach ($posts as $post)
                    @include('pages.home.partials.post')
                @endforeach

            </div>

            <!-- Pagination -->
            <div class="mt-4">
                {{ $posts->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</section>
