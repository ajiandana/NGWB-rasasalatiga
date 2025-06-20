@extends('layouts.app')

@section('title', $restaurant->name . ' - RasaLatiga')

@section('content')
<div class="container py-5">
    @if($restaurant->r_sliders && $restaurant->r_sliders->count() > 0)
    <div class="mb-5">
        <div id="restaurantSlider" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner rounded">
                @foreach($restaurant->r_sliders as $key => $slider)
                    <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                        <img src="{{ asset('storage/' . $slider->image) }}" 
                             class="d-block w-100" 
                             style="height: 300px; object-fit: cover;" 
                             alt="{{ $slider->title ?? $restaurant->name }}">
                        @if($slider->title)
                        <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded">
                            <h5>{{ $slider->title }}</h5>
                        </div>
                        @endif
                    </div>
                @endforeach
            </div>
            @if($restaurant->r_sliders->count() > 1)
            <button class="carousel-control-prev" type="button" data-bs-target="#restaurantSlider" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#restaurantSlider" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            @endif
        </div>
    </div>
    @endif

    <div class="row">
        <div class="col-md-4">
            <div class="card mb-4">
                <img src="{{ asset('storage/resto/images/' . $restaurant->image) }}" 
                     class="card-img-top" 
                     alt="{{ $restaurant->name }}">
                <div class="card-body">
                    <h1 class="h4 card-title">{{ $restaurant->name }}</h1>
                    <p class="card-text">{{ $restaurant->bio }}</p>
                    
                    <div class="restaurant-info mb-3">
                        <h6 class="fw-bold mb-2">Restaurant Information</h6>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item px-0">
                                <i class="fas fa-map-marker-alt text-primary"></i> 
                                <span>{{ $restaurant->address }}</span>
                                @if($restaurant->location_link)
                                <a href="{{ $restaurant->location_link }}" 
                                   target="_blank" 
                                   class="btn btn-sm btn-outline-primary ms-2">
                                    <i class="fas fa-directions"></i> Get Directions
                                </a>
                                @endif
                            </li>
                            <li class="list-group-item px-0">
                                <i class="fas fa-phone text-primary"></i> 
                                <a href="tel:{{ $restaurant->contact }}" class="text-decoration-none">
                                    {{ $restaurant->contact }}
                                </a>
                            </li>
                            <li class="list-group-item px-0">
                                <i class="fas fa-heart text-danger"></i> 
                                <span>{{ $restaurant->total_likes }} Total Likes</span>
                            </li>
                            @if($restaurant->category)
                            <li class="list-group-item px-0">
                                <i class="fas fa-utensils text-primary"></i> 
                                <span>{{ $restaurant->category }}</span>
                            </li>
                            @endif
                            @if($restaurant->price_range)
                            <li class="list-group-item px-0">
                                <i class="fas fa-dollar-sign text-success"></i> 
                                <span>{{ $restaurant->price_range }}</span>
                            </li>
                            @endif
                        </ul>
                    </div>

                    @if($restaurant->operational_hours && $restaurant->operational_hours->count() > 0)
                    <div class="operational-hours">
                        <h6 class="fw-bold mb-2">
                            <i class="fas fa-clock text-primary"></i> Operational Hours
                        </h6>
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <tbody>
                                    @php
                                        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
                                        $today = date('l');
                                    @endphp
                                    @foreach($days as $day)
                                        @php
                                            $dayHours = $restaurant->operational_hours->where('day', $day)->first();
                                        @endphp
                                        <tr class="{{ $day === $today ? 'table-primary' : '' }}">
                                            <td class="fw-bold">
                                                {{ $day }}
                                                @if($day === $today)
                                                    <small class="badge bg-primary">Today</small>
                                                @endif
                                            </td>
                                            <td>
                                                @if($dayHours)
                                                    @if($dayHours->is_closed)
                                                        <span class="text-danger">Closed</span>
                                                    @else
                                                        <span>{{ $dayHours->open_time }} - {{ $dayHours->close_time }}</span>
                                                    @endif
                                                @else
                                                    <span class="text-muted">Not set</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h2 class="h5 mb-0">
                        <i class="fas fa-utensils"></i> Menu
                    </h2>
                </div>
                <div class="card-body">
                    @if($restaurant->menus && $restaurant->menus->count() > 0)
                        <div class="row">
                            @foreach($restaurant->menus as $menu)
                                <div class="col-md-6 mb-4">
                                    <div class="card h-100">
                                        <img src="{{ asset('storage/menus/' . $menu->image) }}" 
                                             class="card-img-top" 
                                             style="height: 180px; object-fit: cover;" 
                                             alt="{{ $menu->name }}">
                                        <div class="card-body">
                                            <h3 class="h5 card-title">{{ $menu->name }}</h3>
                                            <p class="card-text">{{ $menu->description }}</p>
                                            @if($menu->price)
                                                <p class="text-success fw-bold">Rp {{ number_format($menu->price, 0, ',', '.') }}</p>
                                            @endif
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span class="badge bg-secondary">{{ $menu->category }}</span>
                                                <div class="d-flex align-items-center">
                                                    <button class="btn btn-sm btn-outline-danger like-btn me-2" 
                                                            data-menu-id="{{ $menu->id }}">
                                                        <i class="far fa-heart"></i> 
                                                        <span class="like-count">{{ $menu->likes_count }}</span>
                                                    </button>
                                                    <span class="text-warning">
                                                        <i class="fas fa-heart"></i> {{ $menu->likes_count }} Likes
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-5">
                            <i class="fas fa-utensils fa-3x text-muted mb-3"></i>
                            <p class="text-muted">No menu items available yet.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.querySelectorAll('.like-btn').forEach(button => {
    button.addEventListener('click', function() {
        const menuId = this.dataset.menuId;
        
        fetch(`/menus/${menuId}/like`, {
            method: 'POST',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            }
        })
        .then(response => response.json())
        .then(data => {
            const likeCountElement = this.querySelector('.like-count');
            if (likeCountElement) {
                likeCountElement.textContent = data.count;
            }
            
            const displayCount = this.parentElement.querySelector('.text-warning');
            if (displayCount) {
                displayCount.innerHTML = `<i class="fas fa-heart"></i> ${data.count} Likes`;
            }
            
            if (data.liked) {
                this.classList.remove('btn-outline-danger');
                this.classList.add('btn-danger');
                this.querySelector('i').classList.remove('far');
                this.querySelector('i').classList.add('fas');
            } else {
                this.classList.remove('btn-danger');
                this.classList.add('btn-outline-danger');
                this.querySelector('i').classList.remove('fas');
                this.querySelector('i').classList.add('far');
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
});
</script>
@endpush
@endsection