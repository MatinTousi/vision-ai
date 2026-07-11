    <div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary min-vh-100">
    <div class="offcanvas-md offcanvas-start bg-body-tertiary" tabindex="-1" id="sidebarMenu">
        <div class="offcanvas-header">
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu"></button>
        </div>

        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">


                <ul class="nav flex-column pe-3 gap-2">


                    <li class="nav-item">
                        <a class="nav-link  text-decoration-none d-flex align-items-center gap-2 {{ Route::currentRouteName() == 'upload-images.index' ? 'active' : '' }} "
                            href="{{ route('upload-images.index') }}">
                            <!-- <i class="bi bi-house-fill fs-4 text-secondary"></i> -->
                             <i class="bi bi-cloud-arrow-up-fill me-2"></i> آپلود عکس
                        </a>
                    </li>

                    
                    <li class="nav-item">
                        <a class="nav-link link text-decoration-none d-flex align-items-center gap-2 {{ Route::currentRouteName() == 'write-images.index' ? 'active' : '' }} "
                            href="{{ route('write-images.index') }}">
                            <!-- <i class="bi bi-house-fill fs-4 text-secondary"></i> -->
                            <i class="bi bi-file-earmark-text-fill me-2"></i> وارد کردن متن مورد نظر
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link  text-decoration-none d-flex align-items-center gap-2 {{ Route::currentRouteName() == 'compare-images.index' ? 'active' : '' }} "
                            href="{{ route('compare-images.index') }}">
                            <!-- <i class="bi bi-house-fill fs-4 text-secondary"></i> -->
                            <i class="bi bi-images me-2"></i> مقایسه تصاویر
                        </a>
                    </li>

                    
                    <li class="nav-item">
                        <a class="nav-link  text-decoration-none d-flex align-items-center gap-2 {{ Route::currentRouteName() == 'history.index' || Route::currentRouteName() == 'history.single.object' || Route::currentRouteName() == 'history.single.comparison'  ? 'active' : '' }} "
                            href="{{ route('history.index') }}">
                            <!-- <i class="bi bi-house-fill fs-4 text-secondary"></i> -->
                            <i class="bi bi-clock-history me-2"></i> تاریخچه
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-decoration-none d-flex align-items-center gap-2"
                            href="{{ route('logout') }}">
                            <!-- <i class="bi bi-box-arrow-right fs-4 text-secondary"></i> -->

                             <i class="bi bi-box-arrow-right me-2"></i> خروج
                        </a>
                    </li>
                </ul>
            </div>
            
        </div>
    </div>
    @if(Route::currentRouteName() == 'dashboard')
     <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <section class="hero-section  d-flex align-items-center justify-content-center">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            
            <div class="col-12 col-md-10 col-lg-8 text-center">
                
                <h1 class="hero-title mb-3">
                    به <span class="text-cyan">Vision AI</span> خوش آمدید
                </h1>
                
                <h4 class="text-cyan mb-4 fw-normal">
                    چشم هوشمند شما برای کشف دنیای اطراف
                </h4>

                <p class="hero-subtitle mb-3">
                    تصویر خود را آپلود کنید و در چند ثانیه اشیاء موجود در آن را با دقت بالا شناسایی کنید.
                    <br>
                    سریع، دقیق و هوشمند.
                </p>

                <p class="hero-subtitle mb-0 fw-bold text-white-50">
                    همراه با تاریخچه
                </p>

            </div>

        </div>
    </div>
</section>
</main>
@endif
</body>
</html>