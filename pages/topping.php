<section class="products" id="topping">
    <h2 class="heading">Các loại <span class="highlight">topping</span></h2>
    <div class="box-container">
        <?php 
            foreach ($toppings as $topping) {
        ?>
            <div class="box box-topping">
                <img class="image" src="<?php echo substr($topping['image'], 6) ?>" alt="Hình Ảnh">
                <span><?php echo number_format($topping['price'], 0, '', '.')."đ" ?></span>
                <div class="topping">
                    <h3><?php echo $topping['name'] ?></h3>
                </div>
                <?php 
                     if (isset($_SESSION['email'])) {
                ?>
                    <a href="cart.php?items=<?php echo $topping['id'] ?>" name="add" class="btn btn-topping">topping</a>
                <?php
                    } else {
                ?>
                    <a href="#order" class="btn btn-topping">Topping</a>
                <?php
                    } 
                ?>
            </div>
        <?php
            }
        ?>
        <!-- <div class="box box-topping">
            <img class="image" src="images/top1.png" alt="Hình Ảnh">
            <span>10k - 30k</span>
            <div class="topping">
                <h3>delish</h3>
            </div>
            <a href="#order" class="btn btn-topping">Topping now</a>
        </div>
        <div class="box box-topping">
            <img class="image" src="images/top2.png" alt="Hình Ảnh">
            <span>10k - 30k</span>
            <div class="topping">
                <h3>noodle</h3>
            </div>
            <a href="#order" class="btn btn-topping">Topping now</a>
        </div>
        <div class="box box-topping">
            <img class="image" src="images/thit.jpg" alt="Hình Ảnh">
            <span>10k - 30k</span>
            <div class="topping">
                <h3>beep</h3>
            </div>
            <a href="#order" class="btn btn-topping">Topping now</a>
        </div>
        <div class="box box-topping">
            <img class="image" src="images/peach.jpg" alt="Hình Ảnh">
            <span>10k - 30k</span>
            <div class="topping">
                <h3>peach</h3>
            </div>
            <a href="#order" class="btn btn-topping">Topping now</a>
        </div>
        <div class="box box-topping">
            <img class="image" src="images/top5.png" alt="Hình Ảnh">
            <span>10k - 30k</span>
            <div class="topping">
                <h3>kem</h3>
            </div>
            <a href="#order" class="btn btn-topping">Topping now</a>
        </div>
        <div class="box box-topping">
            <img class="image" src="images/top6.jpg" alt="Hình Ảnh">
            <span>10k - 30k</span>
            <div class="topping">
                <h3>mushroom</h3>
            </div>
            <a href="#order" class="btn btn-topping">Topping now</a>
        </div>
        <div class="box box-topping">
            <img class="image" src="images/top7.jpg" alt="Hình Ảnh">
            <span>10k - 30k</span>
            <div class="topping">
                <h3>Cheese</h3>
            </div>
            <a href="#order" class="btn btn-topping">Topping now</a>
        </div>
        <div class="box box-topping">
            <img class="image" src="images/top8.jpg" alt="Hình Ảnh">
            <span>10k - 30k</span>
            <div class="topping">
                <h3>Bacon</h3>
            </div>
            <a href="#order" class="btn btn-topping">Topping now</a>
        </div> -->
    </div>
</section>
