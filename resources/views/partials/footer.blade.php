<footer class="bg-dark text-white pt-5 pb-4 mt-auto">
    <div class="container text-center text-md-start">
        <div class="row text-center text-md-start">
            
            <!-- About Section -->
            <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                <h5 class="text-uppercase mb-4 fw-bold text-primary">JobPortal</h5>
                <p>
                    Connecting talent with opportunity. We are the leading platform for finding your next career move or the perfect candidate for your company.
                </p>
            </div>

            <!-- Quick Links -->
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                <h5 class="text-uppercase mb-4 fw-bold text-warning">Products</h5>
                <p>
                    <a href="{{ route('home') }}" class="text-white text-decoration-none hover-underline">Job Search</a>
                </p>
                <p>
                    <a href="#" class="text-white text-decoration-none hover-underline">Talent Hunt</a>
                </p>
                <p>
                    <a href="#" class="text-white text-decoration-none hover-underline">Salary Est.</a>
                </p>
                <p>
                    <a href="#" class="text-white text-decoration-none hover-underline">Success Stories</a>
                </p>
            </div>

            <!-- Useful Links -->
            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                <h5 class="text-uppercase mb-4 fw-bold text-warning">Useful links</h5>
                <p>
                    <a href="#" class="text-white text-decoration-none hover-underline">Your Account</a>
                </p>
                <p>
                    <a href="#" class="text-white text-decoration-none hover-underline">Become an Affiliate</a>
                </p>
                <p>
                    <a href="#" class="text-white text-decoration-none hover-underline">Shipping Rates</a>
                </p>
                <p>
                    <a href="#" class="text-white text-decoration-none hover-underline">Help</a>
                </p>
            </div>

            <!-- Contact Section -->
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                <h5 class="text-uppercase mb-4 fw-bold text-warning">Contact</h5>
                <p><i class="bi bi-house-door me-3"></i> Lahore, Pakistan</p>
                <p><i class="bi bi-envelope me-3"></i> info@jobportal.com</p>
                <p><i class="bi bi-phone me-3"></i> + 92 123 456 789</p>
                <p><i class="bi bi-printer me-3"></i> + 92 123 456 789</p>
            </div>
        </div>

        <hr class="mb-4 text-white-50">

        <div class="row align-items-center">
            <!-- Copyright -->
            <div class="col-md-7 col-lg-8">
                <p>
                    Copyright © {{ date('Y') }} All rights reserved by:
                    <a href="#" class="text-warning text-decoration-none"><strong>JobPortal Inc.</strong></a>
                </p>
            </div>

            <!-- Social Media -->
            <div class="col-md-5 col-lg-4">
                <div class="text-center text-md-end">
                    <ul class="list-unstyled list-inline">
                        <li class="list-inline-item">
                            <a href="#" class="btn-floating btn-sm text-white fs-4"><i class="bi bi-facebook"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" class="btn-floating btn-sm text-white fs-4"><i class="bi bi-twitter"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" class="btn-floating btn-sm text-white fs-4"><i class="bi bi-google"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" class="btn-floating btn-sm text-white fs-4"><i class="bi bi-linkedin"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

<style>
    .hover-underline:hover {
        text-decoration: underline !important;
        color: #ffc107 !important; /* Bootstrap warning color */
        transition: color 0.3s ease;
    }
</style>
