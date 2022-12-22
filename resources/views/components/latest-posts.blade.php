@props(['latest_posts'])
<div class="card mt-3 shadow-sm">
    <div class="card-header">
        <h4 class="font-bold"> Latest Post(s)</h4>
    </div>
    <div class="card-body">
        @foreach ($latest_posts as $latest_post)
            <a href="{{ url('category/' . $latest_post->category->id . '/' . $latest_post->slug) }}"
                class="text-decoration-none ">
                <h6 class="text-sm text-orange-800 font-bold text-transform: capitalize"> <span class="text-sm font-bold no-underline">>></span> <span class="underline underline-offset-1"> {{ $latest_post->name }}</span></h6>
            </a>
        @endforeach
    </div>
</div>