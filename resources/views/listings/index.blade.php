<x-layout>

@if (count($listings) == 0)
    <p>No listings</p>
@endif

@foreach ($listings as $listing)            
    <div class="border-bottom w-100 d-flex p-2 rounded-1 align-items-center mb-2">
        <x-tag-color :listing="$listing"/>
        <span class="fw-semibold me-1">{{ $listing->title }} </span>
        <span class="fw-light"> ({{ $listing->created_at }})</span>
        <a class="btn btn-info ms-auto" href="listings/{{ $listing->id }}">
            View
        </a>
    </div>
@endforeach

<div class="d-flex w-100">
    <div class="ms-auto">
        {{ $listings->links() }}
    </div>
</div>

</x-layout>

