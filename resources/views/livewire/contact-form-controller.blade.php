<div>
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" >

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
                    {{-- Your inputs here --}}
                    <form wire:submit.prevent="submit()" class="no-validated" wire:loading.attr="disabled">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="text" wire:model="name" wire:loading.attr="disabled"
                                    class="form-control" id="name" placeholder="Your Name" required>
                                <div class="valid-tooltip">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <input type="email" class="form-control" wire:model="email" wire:loading.attr='disabled' id="email" placeholder="Your Email" required>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" wire:model="phone" wire:loading.attr='disabled' id="phone" placeholder="Phone Number" required>
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" wire:model="subject1" wire:loading.attr='disabled' id="subject"
                                placeholder="Subject" required>
                        </div>
                        <div class="form-group mt-3">
                            <textarea class="form-control" wire:model="message1" wire:loading.attr='disabled' rows="5" placeholder="Message" required></textarea>
                        </div>

                        <div class="text-left mt-3">
                            <button type="submit" class="g-recaptcha btn btn-primary w-100"
                                data-sitekey="{{ config('services.google_captcha.site_key') }}" data-callback='handle'
                                data-action='submit'
                                wire:loading.attr="disabled">
                                <span wire:loading class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                <span wire:loading class="visually-hidden">Loading...</span>
                                Send
                            </button>
                        </div>
                    </form>
                    <script src="https://www.google.com/recaptcha/api.js?render={{ config('services.google_captcha.site_key') }}"></script>
                    <script>
                        function handle(e) {
                            grecaptcha.ready(function() {
                                grecaptcha.execute('{{ config('services.google_captcha.site_key') }}', {
                                        action: 'submit'
                                    })
                                    .then(function(token) {
                                        @this.set('captchaToken', token);
                                        @this.submit()
                                    });
                            })
                        }
                    </script>
                </div>
            </div>
        </div>
    </section><!-- End Contact Section -->

</div>
