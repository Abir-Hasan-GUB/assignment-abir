<!-- Search Bar with Category Filter -->
<section id="filter">
    <div class="container">
        <form action="{{ route('posts.filter') }}" method="GET" class="my-4 shadow p-4 rounded">
            <h6 class="fw-medium text-start pb-3">Filter Post By Category</h6>
            <div class="input-group">
                <!-- Category Dropdown -->
                <select class="form-select w-25" id="categorySelect" name="category">
                    <option value="">All Categories</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
                <button class="btn btn-primary" style="width: 150px" type="submit">
                    Filter
                </button>
            </div>
        </form>
    </div>
</section>
