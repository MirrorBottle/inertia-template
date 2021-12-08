@extends('visitors.layouts.app')

@section('content')
    <x-visitors.breadcrumb caption="Get in touch" title="Contact" />

    {{-- <section class="section section-sm">
        <div class="container">
            <div class="layout-bordered">
                <div class="layout-bordered-item wow-outer">
                    <div class="layout-bordered-item-inner wow slideInUp">
                        <div class="icon icon-lg mdi mdi-phone text-primary"></div>
                        <ul class="list-0">
                            <li><a class="link-default" href="tel:#">1-800-1234-678</a></li>
                            <li><a class="link-default" href="tel:#">1-800-9876-098</a></li>
                        </ul>
                    </div>
                </div>
                <div class="layout-bordered-item wow-outer">
                    <div class="layout-bordered-item-inner wow slideInUp">
                        <div class="icon icon-lg mdi mdi-email text-primary"></div><a class="link-default"
                            href="mailto:#">info@demolink.org</a>
                    </div>
                </div>
                <div class="layout-bordered-item wow-outer">
                    <div class="layout-bordered-item-inner wow slideInUp">
                        <div class="icon icon-lg mdi mdi-map-marker text-primary"></div><a class="link-default"
                            href="#">2130 Fulton Street San Diego, CA 94117-1080 USA</a>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <section class="section bg-gray-100">
        <div class="range justify-content-xl-between">
            <div class="cell-xl-6 align-self-center container">
                <div class="row">
                    <div class="col-lg-9 cell-inner">
                        <div class="section-lg">
                            <h3 class="wow-outer"><span class="wow slideInDown">Kontak Kami</span></h3>
                            <!-- RD Mailform-->
                            <x-visitors.forms.methods.post action="home.contact.post">
                                <div class="row row-10">
                                    <x-visitors.forms.input
                                        class="col-12"
                                        id="name"
                                        name="name"
                                        label="Nama" />

                                    <x-visitors.forms.input
                                        id="contact-email"
                                        class="col-6"
                                        name="email"
                                        type="email"
                                        label="Email" />

                                    <x-visitors.forms.input
                                        id="contact-phone"
                                        name="phone_number"
                                        class="col-6"
                                        type="tel"
                                        label="No. HP" />

                                    <x-visitors.forms.textarea
                                        id="contact-message"
                                        name="message"
                                        label="Pesan Anda" />
                                </div>

                                <div class="group group-middle">
                                    <div class="wow-outer">
                                        <button class="button button-primary button-winona wow slideInRight"
                                            type="submit">Kirim Pesan</button>
                                    </div>
                                </div>
                            </x-visitors.forms.methods.post>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cell-xl-5 height-fill wow fadeIn">
                <div id="map"></div>
            </div>
        </div>
    </section>
@endsection

@push('after-scripts')
    <script>
        const map = L.map('map').setView([-1.267980787993236, 116.84093083901583], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        marker = new L.marker([-1.267980787993236, 116.84093083901583])
            .addTo(map);
    </script>
@endpush
