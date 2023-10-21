@extends('layouts.frontend')
@section('title','About Us')
@section('style')
<style>
      .team-list {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .team-member {
        width: 100%;
        margin-bottom: 40px;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    .team-member img {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        object-fit: cover;
        margin-bottom: 10px;
    }

    .team-member h3 {
        font-size: 18px;
        margin-bottom: 8px;
    }

    .team-member p {
        font-size: 14px;
        color: #666;
    }
    
@media (min-width: 768px) {
    .team-member {
        width: calc(25% - 20px);
    }
}
   
</style>
@endsection
@section('content')

    <!-- Page Title -->
    <section class="page-title bg-dark-overlay text-center" style="background-image: url({{ asset('themes/frontend/img/page-title/about.jpg') }});">
        <div class="container">
            <div class="page-title__holder">
                <h1 class="page-title__title">About Us</h1>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="title-row">
                <h2 class="section-title">Team Members</h2>
            </div>
        <div class="row">
            
             <div class="team-list">
                @foreach($teams as $team)        
                <div class="team-member">
                    <img src="{{ asset($team->image) }}" alt="Team Member 1">
                    <h3>{{ $team->name }}</h3>
                    <p>{{ $team->designation }}</p>
                </div>
                @endforeach
     
    </div>
        </div>
       
    </div>



@endsection
