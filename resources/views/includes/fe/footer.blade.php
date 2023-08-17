<footer>
    @foreach ($configs as $config)
        <div class="footer-top text-left">
            <div class="container">
                <div class=" row justify-content-left">
                    <div class="col-lg-5 text-left ">
                        <div class="col-md-4 d-flex">
                            <a href="#">
                                <img src="{{ asset('storage/' . $config->logo) }}" alt="" class="mb-3 d-block">
                            </a>
                            <h4 class=" navbar-brand"><span class="dot">Kemenag Lampung Barat</span></h4>
                        </div>

                        <p>{{ $config->footer_text }}</p>
                        <div class="col-auto social-icons">
                            <a href="https://www.facebook.com/kemenag.lambar"><i class='bx bxl-facebook'></i></a>
                            <a href="https://twitter.com/KemenagLambar"><i class='bx bxl-twitter'></i></a>
                            <a href="https://www.instagram.com/kemenag_lambar/"><i class='bx bxl-instagram'></i></a>
                            <a href="https://www.youtube.com/@humaskantorkementerianagam4506/featured"><i
                                    class='bx bxl-youtube'></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom text-left">
            <div class="container">
                <p class="mb-0">{{ $config->copyright }}</p>
            </div>
        </div>
    @endforeach

</footer>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="container-fluid">
                    <div class="row gy-4">
                        <div class="col-lg-5 col-sm-12 bg-cover">
                            <iframe
                                src="https://www.google.com/maps/place/Kantor+Kementerian+Agama+Lampung+Barat/@-5.0188321,104.0544143,17z/data=!3m1!4b1!4m5!3m4!1s0x2e40da4b44aab3cd:0x2a8162d5049d7aa6!8m2!3d-5.0188303!4d104.058642"
                                width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                            <div>

                            </div>
                        </div>
                        <div class="col-lg-7">
                            <form class="p-lg-5 col-12 row g-3">
                                <div>
                                    <h1>Hubungi Kami</h1>
                                    <p>Fell free to contact us and we will get back to you as soon as possible</p>
                                </div>
                                <div class="col-lg-6">
                                    <label for="userName" class="form-label">First name</label>
                                    <input type="text" class="form-control" placeholder="Jon" id="userName"
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="col-lg-6">
                                    <label for="userName" class="form-label">Last name</label>
                                    <input type="text" class="form-control" placeholder="Doe" id="userName"
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="col-12">
                                    <label for="userName" class="form-label">Email address</label>
                                    <input type="email" class="form-control" placeholder="Johndoe@example.com"
                                        id="userName" aria-describedby="emailHelp">
                                </div>
                                <div class="col-12">
                                    <label for="exampleInputEmail1" class="form-label">Enter Message</label>
                                    <textarea name="" placeholder="This is looking great and nice." class="form-control" id=""
                                        rows="4"></textarea>
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="btn btn-brand">Send Message</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/app.js"></script>


<!-- Slick JS -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<!-- Our Script -->
<script>
    $(document).ready(function() {
        $('.slider').slick({
            autoplay: true,
            autoplaySpeed: 2500,
            dots: true
        });
    });
</script>
</body>

</html>
