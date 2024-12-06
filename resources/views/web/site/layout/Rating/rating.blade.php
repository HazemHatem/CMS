@php
$rating = round($article->ratings()->avg('rating'));
@endphp
@for($i=1; $i<=5; $i++)
    @if($i <=$rating)
    <i class="fas fa-star text-warning"></i>
    @else
    <i class="fas fa-star"></i>
    @endif
    @endfor