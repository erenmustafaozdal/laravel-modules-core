@extends(config('ezelnet-frontend-module.views.design_management.layout'))

@section('title')
    {!! lmcTrans("ezelnet-frontend-module/admin.dashboard.index") !!}
@endsection

@section('page-title')
    <h1>Eğitim Videoları</h1>
@endsection

@section('css')
    @parent
@endsection

@section('script')
    @parent
@endsection

@section('content')

    {{-- Error Messages --}}
    @include('laravel-modules-core::partials.error_message')
    {{-- /Error Messages --}}

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="portlet light bordered">
                {{-- Title --}}
                <div class="portlet-title">
                    <div class="caption">
                        <span class="caption-subject font-red">Genel Görünüm ve İşlevler</span>
                    </div>
                </div>
                {{-- /Title --}}

                {{-- Body --}}
                <div class="portlet-body">
                    <div class='embed-responsive embed-responsive-16by9'>
                        <iframe class='embed-responsive-item' allowfullscreen src='https://www.youtube.com/embed/ozetf8M-u2g?showinfo=0&rel=0&wmode=opaque'></iframe>
                    </div>
                </div>
                {{-- /Body --}}
            </div>
        </div>
    </div>


    <?php
    $videos = [
        [ 'id' => 'BNwFOZfuFFg', 'name' => 'Tasarım Yönetimi'],
        [ 'id' => 'hrmuP3AunJk', 'name' => 'Genel Ayarlar'],
        [ 'id' => 'avrWCqD9tDQ', 'name' => 'Sayfa Yönetimleri'],
        [ 'id' => 'PABZ1xG2oAM', 'name' => 'Firma Profili'],
        [ 'id' => 'BImVFHgMZyE', 'name' => 'Belgelerimiz'],
        [ 'id' => 'wvIMfzjG2oE', 'name' => 'Referanslarımız'],
        [ 'id' => '5jx70Y9j6os', 'name' => 'Markalar/Bayilikler'],
        [ 'id' => 'EjDv2q5UHhY', 'name' => 'Ekibimiz'],
        [ 'id' => 'FO2fCSsueZM', 'name' => 'Foto Galeri'],
        [ 'id' => 'hgW0mBtOMis', 'name' => 'Video Galeri'],
        [ 'id' => 'F7rOXu8Ohgw', 'name' => 'İlave Sayfalar'],
        [ 'id' => 'JUik9ryxtRE', 'name' => 'Kampanyalar'],
        [ 'id' => 'DipdqZihitY', 'name' => 'Fiyat Listeleri'],
        [ 'id' => 'g2Gg6wO70Mc', 'name' => 'Kataloglar'],
        [ 'id' => 'ufHARFBrePM', 'name' => 'Dokümanlar'],
        [ 'id' => 'bdG-vXnjbIM', 'name' => 'Eğitim Faaliyetleri'],
        [ 'id' => 'eZyzm_XSo8A', 'name' => 'Sorular (SSS)'],
        [ 'id' => 'L-Qu1C328b0', 'name' => 'Faydalı Linkler'],
        [ 'id' => 'uDmiLRB75Iw', 'name' => 'Haberler/Duyurular'],
        [ 'id' => '70APmJ8IqZw', 'name' => 'Ürünler'],
        [ 'id' => '7CTNYOPtD9s', 'name' => 'Bayiler'],
        [ 'id' => 'EFkwA-416O0', 'name' => 'Hizmetlerimiz'],
        [ 'id' => 'wC9H6_yi1r0', 'name' => 'Projelerimiz'],
        [ 'id' => 'lIA04jgFoZM', 'name' => 'İletişim']
    ];
    ?>

    <div class="row">
        @foreach($videos as $video)
        <div class="col-md-3">
            <div class="portlet light bordered">
                {{-- Title --}}
                <div class="portlet-title">
                    <div class="caption">
                        <span class="caption-subject font-red">{{ $video['name'] }}</span>
                    </div>
                </div>
                {{-- /Title --}}

                {{-- Body --}}
                <div class="portlet-body">
                    <div class='embed-responsive embed-responsive-16by9'>
                        <iframe class='embed-responsive-item' allowfullscreen src='https://www.youtube.com/embed/{{ $video['id'] }}?showinfo=0&rel=0&wmode=opaque'></iframe>
                    </div>
                </div>
                {{-- /Body --}}
            </div>
        </div>
        @endforeach
    </div>
@endsection
