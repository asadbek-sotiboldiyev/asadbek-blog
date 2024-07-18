@extends('base')

@section('content')

	<section id="home" class="flex align-items-center">
        <div class="container">
            <div class="row justify-between">
                <div class="col-xl-8 col-lg-10 col-12 stagger-animation">
                    <div class="about flex align-items-center">
                        <img class="anim-item profile-picture
                        align-self-start" src="{{ asset('images/asadbek.png') }}" alt="Asadbek Sotiboldiyev" style="transform: matrix(1, 0, 0, 1, 0, 0); opacity: 1;">
                        <div class="about-detail anim-item" style="transform: matrix(1, 0, 0, 1, 0, 0); opacity: 1;">
                            <h1 class="title">Asadbek Sotiboldiyev</h1>
                            <h3 class="desc">Backend Developer</h3>
                            <div class="social-links flex
                                align-items-center">
                                <a class="" target="_blank" href="https://github.com/asadbek-sotiboldiyev">
                                    <img src="{{ asset('images/github.svg') }}" width="28">
                                </a>
                                <a class="icon-linkedin" target="_blank" href="https://www.linkedin.com/in/asadbek-sotiboldiyev/">
                                    <img src="{{ asset('images/linkedin.svg') }}" width="22">
                                </a>
                                <a class="icon-telegram" target="_blank" href="https://t.me/sotiboldiyev_asadbek">
                                    <img src="{{ asset('images/telegram.svg') }}" width="22">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="detail">
                        <p class="size-big anim-item" style="transform: matrix(1, 0, 0, 1, 0, 0); opacity: 1;">Bu mening blog saytim.</p>
                        <div class="btns-wrapper anim-item" style="transform: matrix(1, 0, 0, 1, 0, 0); opacity: 1;">
                            <a href="{{ route('blogIndex') }}" class="btn btn-primary">Read Blog</a>
                            <!-- <a href="https://azimjon.com/about/" class="btn btn-secondary">About Me</a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection