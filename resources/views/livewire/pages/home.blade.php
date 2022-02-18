@section('title','Mimpi Keuangan')

<div>
    <section class="hero">
        <div class="hero-container">
            <div class="hero-box">
                <div class="hero-text">
                    <h6 class="fw-bolder">Holaa, Saya <br> Yoel Gabriel Nainggolan</h6>
                    <p>Datang untuk membantu mimpi Keuangan kamu!</p>
                </div>
                <div class="hero-image">
                    <img src="{{ asset('img/bear-love.gif') }}" width="120px" alt="bear-love">
                </div>
            </div>
        </div>
    </section>

    <section class="feature">
        <h6 class="feature-title fw-bolder">Apa Mimpimu?</h6>
        <div class="feature-menu-grid">
            <a class="feature-menu-item" href="javascript:void(0)">
                <div class="feature-menu-item-container">
                    <div class="feature-menu-item-image">
                        <img src="{{ asset('img/wedding.png') }}" width="60px" alt="wedding">
                    </div>
                    <div class="feature-menu-item-label">
                        Menikah
                    </div>
                </div>
            </a>
            <a class="feature-menu-item" href="javascript:void(0)">
                <div class="feature-menu-item-container">
                    <div class="feature-menu-item-image">
                        <img src="{{ asset('img/property.png') }}" width="60px" alt="properti">
                    </div>
                    <div class="feature-menu-item-label">
                        Properti
                    </div>
                </div>
            </a>
            <a class="feature-menu-item" href="javascript:void(0)">
                <div class="feature-menu-item-container">
                    <div class="feature-menu-item-image">
                        <img src="{{ asset('img/vehicle.png') }}" width="60px" alt="kendaraan">
                    </div>
                    <div class="feature-menu-item-label">
                        Kendaraan
                    </div>
                </div>
            </a>
            <a class="feature-menu-item" href="javascript:void(0)">
                <div class="feature-menu-item-container">
                    <div class="feature-menu-item-image">
                        <img src="{{ asset('img/money.png') }}" width="60px" alt="dana_pensiun">
                    </div>
                    <div class="feature-menu-item-label">
                        Dana Pensiun
                    </div>
                </div>
            </a>
            <a class="feature-menu-item" href="{{ route('barang') }}">
                <div class="feature-menu-item-container">
                    <div class="feature-menu-item-image">
                        <img src="{{ asset('img/gadgets.png') }}" width="60px" alt="barang">
                    </div>
                    <div class="feature-menu-item-label">
                        Barang
                    </div>
                </div>
            </a>
        </div>
    </section>
</div>
