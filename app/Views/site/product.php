<div class="row">
    <div class="col-lg-4">
        <img src="<?= base_url('assets/images/product').(string)$product['id'].'.png'; ?>" alt="" width=400 heigh=400>
    </div>
    <div class="col-lg-8">
        <div class="row">
            <div class="col-lg-8">
                <div class="product-details-desc">
                    <h2><?php echo $product['name']; ?></h2>
                    <ul>
                        <li><?php echo $product['description']; ?></li>
                       
                    </ul>
                    <div class="product-meta">
                        <ul class="list-none">
                            <li>
                            <?php if($product['sale_price']>0):?>
                                 <span class="price"><del><?php echo $product['price']; ?></del></span>
                                    <span class="price-old"><?php if($product['sale_price']>0) {echo $product['sale_price'];} ?></span>
                                    <?php endif ?>
                                    <span class="price">
                                    <?php if($product['sale_price']==0){ echo $product['price'];} ?></span>
                                    
                            <span>|</span></li>
                            <li>Category:
                                <a href="<?php echo base_url('Home/filter/'.$product["categorie_id"]); ?>"><?php echo $product['categorie_name']; ?></a>
                                
                                <span>|</span>
                            </li>
                           
                        </ul>
                    </div>
                    <div class="social-icons style-5">
                        <span>Share Link:</span>
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-google-plus"></i></a>
                        <a href="#"><i class="fa fa-rss"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>