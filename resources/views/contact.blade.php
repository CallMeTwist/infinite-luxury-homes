@extends('layouts.master', [
    $title = 'Contact Us',
    $tags = "data-page='contacts2' data-page-parent='contacts'"
])

@section('css')

    <link rel="stylesheet" href="/assets/css/contacts2.min.css">

@endsection

@section('header')

    <header class="page primary-bg">
        <div class="container">
            <div class="section_header">
                <span class="subtitle subtitle--extended">Building communities</span>
                <h1 class="title">Contact Us</h1>
                <ul class="breadcrumbs">
                    <li class="breadcrumbs_item"><a href="/">Home</a></li>
                    <li class="breadcrumbs_item breadcrumbs_item--current"><span>Contact Us</span></li>
                </ul>
            </div>
        </div>
        <div class="media">
            <picture>
                <img class="lazy" data-src="/assets/img/plan.png" src="/assets/img/plan.png" alt="media">
            </picture>
        </div>
    </header>

@endsection

@section('content')

    <section class="contact section">
        <div class=container>
            <div class=main>
                <div class="contact_header section_header"><span class=subtitle>Contact us</span>
                    <h2 class=title>Get <span class=highlight>In Touch</span></h2>
                    <p class=text>Whether you're looking to buy, sell, or invest in property, we're here to help. Reach out to our team for personalized real estate services and expert advice. We're committed to finding the perfect solution for your needs.</p>
                </div>
                <form action="{{ route('contact.send') }}" class="contact_form contact-form d-flex flex-wrap justify-content-between" method=POST name=feedbackForm data-type=feedback>

                    <input class="contact-form_field contact-form_field--half field required" name="firstname" id=feedbackName type=text placeholder="First name">

                    <input class="contact-form_field contact-form_field--half field required" name="lastname" id=feedbackName type=text placeholder="Last name">

                    <input class="contact-form_field field required" data-type=email type=text name="email" id=feedbackEmail placeholder="Email Address">

                    <input class="contact-form_field field required" type=text name="subject" id=feedbackEmail placeholder="Subject">

                    <textarea class="contact-form_field field required" data-type=message name="message" id=feedbackMessage placeholder=Message></textarea>

                    <button type="submit" class="contact-form_btn btn">Send message</button>

                </form>
            </div>
            <div class=secondary>
                <ul class="contact_info contact-info">
                    <li class=contact-info_group><span class=name>Address</span> <span class=content>{{ get_settings()->address }}</span></li>
                    <li class=contact-info_group><span class=name>Email</span> <span class="content d-inline-flex flex-column"><a class=link href=mailto:{{ get_settings()->email }}>{{ get_settings()->email }}</a></span></li>
                    <li class=contact-info_group><span class=name>Phone</span> <span class="content d-inline-flex flex-column"><a class=link href=tel:{{ get_settings()->phone }}>{{ get_settings()->phone }}</a> <a class=link href=tel:{{ get_settings()->help_line }}>{{ get_settings()->help_line }}</a></span></li>
                </ul>
                <ul class=socials>
                    <li class=socials_item><a class=socials_item-link href=# target=_blank rel="noopener noreferrer" aria-label=Facebook><i class=icon-facebook></i></a></li>
                    <li class=socials_item><a class=socials_item-link href=# target=_blank rel="noopener noreferrer" aria-label=Instagram><i class=icon-instagram></i></a></li>
                    <li class=socials_item><a class=socials_item-link href=# target=_blank rel="noopener noreferrer" aria-label=Twitter><i class=icon-twitter></i></a></li>
                    <li class=socials_item><a class=socials_item-link href=# target=_blank rel="noopener noreferrer" aria-label=WhatsApp><i class=icon-whatsapp></i></a></li>
                </ul>
            </div>
        </div>
    </section>

    <div class=contacts_map>
        <div id=map></div>
    </div>

@endsection

@section('js')
    <script src="/assets/js/map.min.js"></script>
@endsection
