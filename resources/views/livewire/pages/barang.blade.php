@section('title','Beli Barang')

<div>
    <header class="feature-header">
        <div class="header-container">
            <a href="{{ route('home') }}" class="text-white">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
            <b class="text-center">Beli Barang</b>
        </div>
    </header>
    <section class="feature-hero">
        <div class="feature-hero-container">
            <div class="feature-hero-box">
                <i class="fa-solid fa-laptop"></i>
                <div class="feature-hero-desc">
                    <b>Usahakan beli barang yang Produktif ya dibanding barang Konsumtif.</b> 
                </div>
            </div>
        </div>
    </section>

    <section class="details">
        <div class="details-title">Yuk, ceritain Mimpimu.</div>
        <ul class="details-content">
            <li>
                <label for="count-a">Kamu ingin mencapai mimpi kamu</label>
                <div class="custom-group-input">
                    <input type="text" wire:model="month" class="custom-group-input year count" id="count-a">
                    <b>Bulan lagi</b>
                </div>
            </li>
            <li class="step-2 {{ $step_2 ? 'hide' : '' }}">
                <label for="count-b">Harga Barang impianmu saat ini</label>
                <div class="custom-group-input">
                    <b class="rupiah">Rp</b>
                    <input type="text" wire:model="price_input" class="custom-group-input price price_rupiah count" id="count-b">
                </div>
            </li>
            <li class="step-3 {{ $step_3 ? 'hide' : '' }}">
                <label for="count-c">% DP (Down Payment) yang ingin kamu bayarkan sebesar</label>
                <div class="custom-group-input">
                    <input type="text" wire:model="down_payment" class="custom-group-input year count" id="count-c">
                    <b>%</b>
                </div>
                @error('down_payment')
                    <small class="errors">{{ $message }}</small>
                @enderror
            </li>
            <li class="step-4 {{ $step_4 ? 'hide' : '' }}">
                <label for="count-d">DP kamu setara dengan</label>
                <div class="group-rupiah">
                    <b class="rupiah">Rp {{ number_format($dp_number) }}</b>
                </div>
            </li>
            <li class="step-4 {{ $step_4 ? 'hide' : '' }}">
                <label for="count-d">% Pinjaman Kamu</label>
                <div class="group-rupiah">
                    <b class="rupiah">{{ number_format($loan_percent) }}%</b>
                </div>
            </li>
            <li class="step-4 {{ $step_4 ? 'hide' : '' }}">
                <label for="count-d">Pokok utang kamu setara dengan</label>
                <div class="group-rupiah">
                    <b class="rupiah">Rp {{ number_format($loan_number) }}</b>
                </div>
            </li>
            <li class="step-3 {{ $step_4 ? 'hide' : '' }}">
                <label for="count-c">Asumsi Inflasi barang adalah</label>
                <div class="custom-group-input">
                    <input type="text" wire:model="inflation_year" class="custom-group-input year count" id="count-d">
                    <b>% / Tahun</b>
                </div>
            </li>
            <li class="step-4 {{ $step_4 ? 'hide' : '' }}">
                <label for="count-d">Total uang yang kamu perlukan {{ $month }} bulan lagi untuk bayar DP sebesar</label>
                <div class="group-rupiah">
                    <b class="rupiah">Rp {{ number_format($inflation_show) }}</b>
                </div>
            </li>
        </ul>
        <b class="form-end {{ $step_4 ? 'hide' : '' }} thanks">Thank You!!</b>
        <hr class="divider-line divider-title {{ $step_4 ? 'hide' : '' }}">
    </section>
    <section class="details form-end {{ $step_4 ? 'hide' : '' }}">
        <div class="details-title">Next, ayo atur strategi investasi kamu!</div>
        <ul class="details-content">
            <li>
                <label for="count-a">Uang yang kamu miliki saat ini untuk beli barang sebesar</label>
                <div class="custom-group-input">
                    <b class="rupiah">Rp</b>
                    <input type="text" wire:model="money_input" class="custom-group-input money_rupiah price count">
                </div>
            </li>
            <li class="{{ $step_5 ? 'hide' : '' }}">
                <label for="count-a">Target investasimu tiap bulan</label>
                <div class="custom-group-input">
                    <b class="rupiah">Rp</b>
                    <input type="text" wire:model="invest_input" class="custom-group-input invest_target price count">
                </div>
            </li>
            <li class="{{ $step_6 ? 'hide' : '' }}">
                <label for="count-a">Kamu akan investasi di produk yang returnnya</label>
                <div class="custom-group-input">
                    <input type="text" wire:model="invest_return" class="custom-group-input year count" id="count-d">
                    <b>% / Tahun</b>
                </div>
            </li>
            <li class="step-4 {{ $step_7 ? 'hide' : '' }}">
                <label for="count-d">Kamu akan rutin berinvestasi selama</label>
                <div class="group-rupiah">
                    <b class="rupiah">{{ $month }} Bulan</b>
                </div>
            </li>
        </ul>
        <div class="last-greetings form-end {{ $step_7 ? 'hide' : '' }}">
            <div class="text-greetings">
                <p class="dream-come">Yeahh, mimpimu sudah jauh lebih nyata</p>
                <p class="strategy-title">Ayo lihat hasil Strategi Kamu</p>
            </div>

            <div class="form-end-button">
                <button class="btn btn-green btn-icon">
                    <i class="fa-solid fa-arrow-right"></i>
                </button>
            </div>

        </div>
    </section>
</div>

@push('scripts')
    <script>
        (function($) {
            $.fn.inputFilter = function(inputFilter) {
                return this.on("input keydown keyup mousedown mouseup select contextmenu drop", function() {
                if (inputFilter(this.value)) {
                    this.oldValue = this.value;
                    this.oldSelectionStart = this.selectionStart;
                    this.oldSelectionEnd = this.selectionEnd;
                } else if (this.hasOwnProperty("oldValue")) {
                    this.value = this.oldValue;
                    this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
                } else {
                    this.value = "";
                }
                });
            };
        }(jQuery));
        $(document).ready(function() {
            $(".count").inputFilter(function(value) {
                return /^\d*$/.test(value);    // Allow digits only, using a RegExp
            });

            $('.price_rupiah').on('keyup',function(){
                let number = Number(formatRupiah(this.value).replace(/[^0-9.-]+/g,""));
                $('.price_rupiah').val(formatRupiah(this.value)); 
                Livewire.emit('price_show',number);
            })

            $('.money_rupiah').on('keyup',function(){
                let number = Number(formatRupiah(this.value).replace(/[^0-9.-]+/g,""));
                $('.money_rupiah').val(formatRupiah(this.value)); 
                Livewire.emit('money_show',number);
            })

            $('.invest_target').on('keyup',function(){
                let number = Number(formatRupiah(this.value).replace(/[^0-9.-]+/g,""));
                $('.invest_target').val(formatRupiah(this.value)); 
                Livewire.emit('invest_show',number);
            })

            function formatRupiah(angka, prefix){
                var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split   		= number_string.split(','),
                sisa     		= split[0].length % 3,
                rupiah     		= split[0].substr(0, sisa),
                ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

                // tambahkan titik jika yang di input sudah menjadi angka ribuan
                if(ribuan){
                    separator = sisa ? ',' : '';
                    rupiah += separator + ribuan.join(',');
                }

                rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
            }
        });

        
    </script>
@endpush
