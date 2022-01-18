
        <!-- Slider-->
        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="swiper-full-width swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide" data-hash="slide1">
                            <img src="./assets/images/sample_product1.png" width=1400 heigh=580>
                        </div>
                        <div class="swiper-slide" data-hash="slide2">
                            <img src="./assets/images/sample_product4.png" width=1400 heigh=580>
                        </div>
                        <div class="swiper-slide" data-hash="slide3">
                            <img src="./assets/images/sample_product3.png" width=1400 heigh=580>
                        </div>

                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="row h-100 align-content-between">
                    <div class="col-12">
                        <img src="./assets/images/sample_product2.png" class="w-100" width=1400 heigh=580>
                    </div>
                    <div class="col-12">
                        <img src="./assets/images/sample_product3.png" class="w-100" width=1400 heigh=580>
                    </div>
                </div>
            </div>
        </div>
        <!-- Content -->
        <div class="row mt-5">
            <div class="col-12 mb-4">
                <div class="section-title">
                    <h3>NEW ARRIVALS</h3>
                </div>
            </div>
            <div class="col-12">
                <div class="swiper-cards swiper-container pb-5 pt-3 px-2">
                    <div class="swiper-wrapper">
                    <?php foreach ($new_products as $product):?>
                        <div class="swiper-slide">
                            <div class="product-card card">
                                <div class="card-body">
                                <h5 class="card-title font-weight-medium"><?php echo $product['name']; ?></h5>
                                <p class="card-text" ><?php echo $product['description']; ?></p>
                                </div>
                                <img  src="<?= base_url('assets/images/product').(string)$product['id'].'.png'; ?>" class="" alt="">
                                <div class="card-body product-price text-center pb-0">
                                    <span class="<?php if ($product['sale_price']>0){echo "price-old";}else{"price";} ?>  "><?php echo $product['price']; ?></span>
                                    <span class="price"><?php if($product['sale_price']>0) {echo $product['sale_price'];} ?></span>
                                </div>
                                <div class="card-footer bg-white text-center border-0 pt-0">
                                    <hr>
                                    <a href="<?php echo base_url('Home/product/' . $product['id']); ?>" class="btn btn-pink px-4 py-2"><i class="fas fa-shopping-cart"></i> View Product</a>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                       
                    <!-- Add Pagination -->
                    
                    
                    <div class="swiper-pagination"></div>
                    
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12 mb-4">
                <div class="section-title">
                    <h3>SPECIAL OFFERS</h3>
                </div>
            </div>
            <div class="col-12">
                <div class="swiper-cards swiper-container pb-5 pt-3 px-2">
                    <div class="swiper-wrapper">
                    <?php foreach ($special_offers as $product):?>
                        <div class="swiper-slide">
                            <div class="product-card card">
                                <div class="card-body">
                                <h5 class="card-title font-weight-medium"><?php echo $product['name']; ?></h5>
                                <p class="card-text" ><?php echo $product['description']; ?></p>
                                </div>
                                <img  src="<?= base_url('assets/images/product').(string)$product['id'].'.png'; ?>" class="" alt="">
                                <div class="card-body product-price text-center pb-0">
                                    <span class="price-old"><?php echo $product['price']; ?></span>
                                    <span class="price"><?php if($product['sale_price']!=""||$product['sale_price']!=null) {echo $product['sale_price'];} ?></span>
                                </div>
                                <div class="card-footer bg-white text-center border-0 pt-0">
                                    <hr>
                                    <a href="<?php echo base_url('Home/product/' . $product['id']); ?>" class="btn btn-pink px-4 py-2"><i class="fas fa-shopping-cart"></i> View Product</a>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>