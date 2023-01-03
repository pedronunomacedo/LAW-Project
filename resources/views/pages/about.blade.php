@extends('layouts.app')

@section('title', 'Tech4You')

@section('content')

<main>
    <div class="mt-5 container">
        <div class="row" style="border-left: 0.5rem solid red; margin-bottom: 2rem;"><h2>About us</h2></div>
        <div class="section-container about">
            <p>
                We are a group of students from the University of Porto of Engeneering Faculty.
                We developed this project during the course of Laboratory Databases and Web Applications (LBAW).
                <br>This project is developed in Laravel.
                <br><strong>We hope you enjoy exploring our site!</strong>
            </p>
        </div>
        <div id="image_container">
            <img src="{{ url('/images/about_us_page.png') }}" id="about_us_image"/>
        </div>
    </div>
</main>

@endsection