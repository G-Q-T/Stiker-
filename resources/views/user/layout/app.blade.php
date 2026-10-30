<!DOCTYPE html>

<html lang="id"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>{{$title ?? 'PPKD | Inovasi Cetak Kekinian | Percetakan Digital Terlengkap &amp; Terpercaya'}}</title>
<!-- Bootstrap 5 CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet"/>
<!-- Google Fonts: Inter & Plus Jakarta Sans -->
<link href="https://fonts.googleapis.com" rel="preconnect"/>
<link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet"/>
<!-- Core Theme & Layout Styles -->
<link href="{{ asset('primagraphia-web/assets/css/style.css') }}" rel="stylesheet"/>
</head>
<body>
<!-- BEGIN: MainHeader -->
@include('user.layout.inc.header')
<!-- END: MainHeader -->


{{--  begin content1 --}}
<main>
<!-- BEGIN: HeroPromoSection -->
<section class="py-3 py-lg-4" data-purpose="hero-promotions">
<div class="container">
<!-- Hero Promotional Slider / Banner Mockup -->
     @yield('content1')
</div>
</section>

<!-- 4 USP Cards Under Banner -->
@include('user.layout.inc.banner')
{{-- bagian under banner --}}

<!-- BEGIN: QuickCategoryGrid -->
<section class="py-4" data-purpose="quick-categories">
<div class="container">
@yield('category')
</div>
</section>
<!-- END: QuickCategoryGrid -->
<!-- BEGIN: FeaturedProductsTabs -->
<section class="py-4 bg-light" data-purpose="featured-products">
<div class="container">
    @yield('product')
<!-- Tab Navigation & Title Header -->
</div>
</section>
<!-- END: FeaturedProductsTabs -->
<!-- BEGIN: ExploreByCategory -->
<section class="py-5" data-purpose="explore-category-catalog">
    <div class="container">
    @yield('findcategory')
</div>
</section>
<!-- END: ExploreByCategory -->
<!-- BEGIN: MachinesAndClientsSection -->
@include('user.layout.inc.client')
<!-- END: MachinesAndClientsSection -->
<!-- BEGIN: BlogAndArticles -->
@include('user.layout.inc.artikel')

<!-- BEGIN: WhatsAppBannerCTA -->
@include('user.layout.inc.chat')
</main>


@include('user.layout.inc.footer')

<!-- END: ComprehensiveFooter -->
<!-- BEGIN: FloatingWhatsApp -->
<a aria-label="Hubungi WhatsApp Kami" class="floating-wa-btn" href="https://wa.me/62811987990" rel="noopener noreferrer" target="_blank">
<i class="bi bi-whatsapp"></i>
</a>
<!-- END: FloatingWhatsApp -->
<!-- Bootstrap 5 Bundle JS (Includes Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body></html>
