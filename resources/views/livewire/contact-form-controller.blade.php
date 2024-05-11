<div>
    <!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Contact</h2>
        </div>

        <div class="row mt-1">

            <div class="col-lg-4">
                <div class="info">
                    <div class="address">
                        <i class="bi bi-geo-alt"></i>
                        <h4>Location:</h4>
                        <p>Toronto,Canada</p>
                    </div>

                    <div class="email">
                        <i class="bi bi-envelope"></i>
                        <h4>Email:</h4>
                        <p>admin@mamuza.site</p>
                        <p>abbasi.mahmoudreza@gmail.com</p>
                    </div>

                    <div class="phone">
                        <i class="bi bi-phone"></i>
                        <h4>Call:</h4>
                        <p>+1 416-953-5152</p>
                    </div>

                </div>

            </div>

            <div class="col-lg-8 mt-5 mt-lg-0">
                @include('FrontPages.Errors.frontPageErrors')
                <form action="{{ route('contact.me.store') }}" method="post" role="form" class="no-validated"
                    id="contactUSForm">
                    @csrf
                    {!! RecaptchaV3::field('register') !!}
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <input type="text" name="name" class="form-control" id="name"
                                placeholder="Your Name" required>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-6 form-group mt-3 mt-md-0">
                            <input type="email" class="form-control" name="email" id="email"
                                placeholder="Your Email" required>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <input type="text" class="form-control" name="phone" id="phone"
                            placeholder="Phone Number" required>
                    </div>
                    <div class="form-group mt-3">
                        <input type="text" class="form-control" name="subject1" id="subject" placeholder="Subject"
                            required>
                    </div>
                    <div class="form-group mt-3">
                        <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                    </div>

                    <div class="text-left mt-3">
                        <input class="btn btn-primary btn-lg w-100" type="submit" value='Send'></input>
                    </div>
                </form>
                {{-- <div class="my-3">
                    <div class="loading">Loading</div>
                    <div class="error-message"></div>
                    <div class="sent-message">Your message has been sent. Thank you!</div>
                  </div> --}}
            </div>
        </div>
    </div>
</section><!-- End Contact Section -->

</div>
