@props(['listing'])

@if ($listing->tags == "top")
<div class="circle bg-danger rounded-circle me-3" style="height: 20px; width: 20px; min-width: 20px;"></div>
@elseif ($listing->tags == "middle")
<div class="circle bg-warning rounded-circle me-3" style="height: 20px; width: 20px; min-width: 20px;"></div>
@elseif ($listing->tags == "least")
<div class="circle bg-info rounded-circle me-3" style="height: 20px; width: 20px; min-width: 20px;"></div>
@endif