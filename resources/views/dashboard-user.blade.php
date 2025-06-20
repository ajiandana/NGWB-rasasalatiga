<!DOCTYPE html>
@extends('layouts.app')
@section('title','SalatigaRasa - Discover Best Restaurants')
@section('content')
<section id="home" class="py-5">
    <div class="container">
        <div class="mb-5">
        <div class="mb-5">
        <div id="mainSlider" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner rounded"> 
            @foreach($sliders as $key=>$slider)
            <div class="carousel-item {{$key===0?'active':}}"> 
                <img src="{{ asset('storage/'.$slider->image) }}" class="d-block w-100"style="heigh:400px;object-fit:cover";
                alt="{{ $slider->title}}">
            <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded"> 
                <h5>{$slider->title}</h5></div></div>@endforeach</div><
                <button class="carousel-control prev"type="button"data-bs-target="#mainSlider"data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span></button>
                    <button class="carousel-control-next"type="button"data-bs-target "#mainSlider"data-bs-slide="prev"><span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span></button></div></div></div>
                <div class="mb-5"><h2 class="text-center mb-4">Top Restaurants</h2>
                    <div class="row">@foreach($topRestaurants as $restaurant)<div class="col-md-4 mb-4">
                        <div class="card h-100"><img src="'{{ asset('storage/resto/images/'.$restaurant->image) }}"class="card img-top"style="height=200px;object-fit:cover;"alt="{{ $restaurant->name }}">
                        <div class="card-body"><h5 class="card-title">{{$restaurant->name}}</h5>
                            <p class="card-text">{{Str::limit($restaurant->bio,100)}}</p>
                            <div class="d-flex justify-content-between align-items-center"><span class="badge bg-primary">{{$restaurant->category}}</span>
                                <span class="text-warning"><i class="fas fa-heart"></i>{{$restaurant->total_likes}}Likes</span></div></div>
                                <div class="card-footer bg-white"><a href="{{ route('restaurant.show',$restaurant->id) }}"class="btn btn-sm btn-outline-primary">View Menu</a></div></div></div>
                                @endforeach</div></div><div class="mb-5"><h2 class="text-center mb-4">Our Signature Dishes</h2>
                                    <div class="row"><div class="col-md-3 md-4"><div class="card h-100"><img src="https://via.placeholder.com/300x200?text=Nasi+Goreng"class="card-img-top" alt="Nasi Goreng">
                                        <div class="card-body"><h5 class="card-title">Nasi Goreng Special</h5><p class="card-text">Nasi Goreng dengan bumbu rahasia dan toping lengkap</p></div></div></div>
                                        <div class="col-md-3 mb-4"><div class="card h-100"><img src="https://via.placeholder.com/300x200?text=Sate+Ayam" class="card-img-top" alt="SateAyam">
                                            <div class="card-body"><h5 class="card-title">Sate Ayam Madura</h5><p class="Card-text">Sate ayam dengan bumbu kacang khas Madura</p></div></div></div>
                                            <div class="col md-3 mb-4"><div class="card h-100"><img src="https://via.placeholder.com/300x200?text=Soto+Ayam"class="card-img-top" alt="Soto Ayam">
                                                <div class="card-body"><h5 class="card-title">Soto Lamongan</h5><p class="card-text">soto ayam denga koya khas lamongan</p></div></div></div>
                                                <div class="col md-3 mb-4"><div class="card h-100"><img src="https://via.placeholder.com/300x200?text=Es+Cendol"class="card-img-top" alt="Es Cendol">
                                                    <div class="card-body"><h5 class="card-title">Es Cendol Dawet</h5><p class="card-text">Minuman segar dengan cendol homemade</p></div></div></div></div></div></div></section>
                                                 <section id="menu" class="py-5 bg-light"><div class="container"><h2 class="text-center mb-4">Find Restaurant</h2><div class="row mb-4"><div class="col-md-8">
                                                    <div class="input-group"><input type="text" class="form-control"placeholder="Search restaurants..."id="searchInput"><button class="btn btn-primary"type="button"id="searchButton">
                                                        <i class="fas fa-search"></i></button></div></div>
                                                        <div class="col-md-4"><select class="form-select"id="categoryFilter"><option value="">All Categories</option><option value="Restoran">Restoran</option>
                                                            <option value="Kafe & Kedai Kopi">Kafe & Kedai Kopi</option><option value="Jajanan & Warung Kaki Lima">Jajanan & Warung Kaki Lima</option>
                                                            <option value="Toko Roti & Kue">Toko Roti & Kue</option><option value="Minuman & Es">Minuman & Es</option></select></div></div>
                                                            <diV class="row"id="restaurantsContainer"> 
                                                                @foreach($restaurants as restaurant)<div class="col-md-4-mb-4 restaurant-card"data-category="{{$restaurant->categoty}}">
                                                                    <div class="card h-100"><img src="{{asset('storage/resto/images/'.$restaurant->image)}}"class="card-img-top"style="height:200px;object-fit:cover;"alt="{{$restaurant->name}}">
                                                                        <div class="card-body"><h5 class="card-title">{{ $restaurant->name }}</h5><p class="card-text">{{ Str::limit(restaurant->,100) }}</p>
                                                                            <div class="d-flex justify-content-between align-items-center"><span class="badge bg-primay">{{ $restaurant->catrgory }}</span>
                                                                                <span class="text-warning"><i class="fas fa-star="></i>{{ $reataurant->likes_count }}Likes</span></div></div>
                                                                                <div class="card-footer bg-white"><a href="#" class="btn btn-sm btn-outline-primary">View Menu</a>
                                                                                    <button class="btn btn-sm btn-outline-danger like-btn"data-resto-id="{{ $restaurant->id }}"><i class="far fa-heart"></i></button></div></div></div>@endforeach</diV></div></section>
                                                                                    <section id="about" class="py-5"><div class="container"><div class="row"><div class="col-md-6"><h2>About Rasa Salatiga</h2>
                                                                                        <p>Rasa Saltiga adalah platform yang menghubungkan pecinta kuliner dengan restoran terbaik di Salatiga. Kami menyediakan informasi lengkap tentang berbagai tempat makan, menu unggulan, dan ulasan dari pelanggan</p>
                                                                                        <p>Dengan Rasa Salatiga anda dapat menemukan tempat makan sesuai selera Anda, mulai dari restoran mewah hingga warung kaki limayang menyajikan makanan autentik.</p></div>
                                                                                        <div class="card"><div class="card-header bg-primaly text-white"><h5 class="mb-0">Join Us as Restaurant Owner</h5></div>
                                                                                        <div class="card-body"><form id="joinForm"><div class="mb-3">
                                                                                            <label for="name"class="form-label">RestaurantName</label><input type="text" class="form-control" id="name" required>
                                                                                            <div class="mb-3"><label for="email" class="form-label">Email Address</label>
                                                                                                <input type="email" class="form-control" id="email" required></div>
                                                                                                <div class="mb-3"><label for="phone" class="form-label">Phone Number</label>
                                                                                                    <input type="tel" class="form-control" id="phone" required></div><button type="submit" class="btn btn-primary">Submit Application</button></form></div></div></div></div></section>
                                                                                                    @push('scripts')<script>document.querySelectorAll('a[href^="#"]').forEach(anchor=>{anchor.addEventListener('click',function(e){e.preventDefault();document.querySelector(this.getAttribute('href')).scrollIntoView({behavior:'smooth'});
                                                                                                    document.querySelectorAll('.nav-link')forEach(link=>{limk.classList.remove('active');});}); 
                                                                                                document.getElementById('searchButton').addEventListener('click', filterRestaurants);
                                                                                                document.getElementById('searchInput').addEventListener('keyup', filterRestaurants);
                                                                                                document.getElementById('categoryFilter').addEventListener('change', filterRestaurants);
                                                                                                function filterRestaurants(){const searchTerm=document.getElementById('seacrhInput').value.toLowerCase(); const category=document.getElementById('categoryFilter').value; 
                                                                                                document.querySelectorAll('.restaurant-card').forEach(card=>{const name=card.querySelector('.card-title').textContent.toLowerCase(); 
                                                                                                const desc=card.querySelector('.card-text').textContent.toLowerCase();
                                                                                                const cardCategory=card.getAttribute('data-category');
                                                                                                const matchesSearch=name.include(searchTerm)||desc.include(searchTerm);
                                                                                                const matchesCategory=category===''||cardCategory===category; 
                                                                                                if(matchesSearch&&matchesCategory)
                                                                                                {card.style.display='block';
                                                                                            }
                                                                                                else{
                                                                                                    card.style.display='none';
                                                                                                }
                                                                                            });
                                                                                            }document.querySelectorAll ('.like-btn')forEach(button.addEventListener('click', function(){
                                                                                                const restoId=this.getAttribute('data-resto-id');this.innerHTML='<i class= "fas fa-heart"></i>Liked';
                                                                                                this.classList.remove('btn-outline-danger');this.classList.add('btn-danger'); this.disabled=true;
                                                                                                document.getElementById('joinForm').addEventListener('submit',function(e){e.preventDefault();alert('Thank you for your interest! we will contact you soon'); 
                                                                                            this.reset();}); </script> @endpush @endsection
                                                                                            }))

                                                                                            })
                                                                                        
                                                                                    
                                                                                    
                                                       

                    
