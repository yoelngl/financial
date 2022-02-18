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
                    <input type="text" wire:model="inflation_year" class="custom-group-input year count" id="count-c">
                    <b>%/Tahun</b>
                </div>
            </li>
            <li class="step-4 {{ $step_4 ? 'hide' : '' }}">
                <label for="count-d">Total uang yang kamu perlukan {{ $month }} bulan lagi untuk bayar DP sebesar</label>
                <div class="group-rupiah">
                    <b class="rupiah">Rp {{ number_format($inflation_show) }}</b>
                </div>
            </li>
        </ul>
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
