<section class="order" id="order">
    <h2><span class="highlight">Đặt món </span>ngay</h2>
    <div class="row">
        <div class="image">
            <img src="images/order-img.jpg" alt="">
        </div>
        <form action=""method="post">
            <div class="inputBox">
                <input type="text" placeholder="Họ Tên" required>
                <input type="tel" id="phone" name="phone" placeholder="Số điện thoại" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" required>
            </div>
            <div class="inputBox">
                <input type="text" placeholder="Địa chỉ" required>
                <input type="text" placeholder="Tên Pizza" list="list-pizza" required>
                <datalist id="list-pizza">
                    <option value="Flammkuchen"></option>
                    <option value="Lamacun"></option>
                    <option value="Tarte Flambee"></option>
                    <option value="Okonomiyaki"></option>
                    <option value="Lángos"></option>
                    <option value="Sfiha"></option>
                    <option value="Zapiekanka"></option>
                    <option value="Bulgogi"></option>
                    <option value="Deep-Dish"></option>
                </datalist>
            </div>
            <div class="inputBox"> 
                <input type="text" placeholder="Kích cỡ" list="size" required>
                <datalist id="size">
                    <option value="Size L"></option>
                    <option value="Size M"></option>
                    <option value="Size S"></option>
                </datalist>
                <input type="number" min="0" placeholder="Số lượng" required>
            </div> 
            <div class="inputBox">
                <input type="number" placeholder="Tổng giá" disabled>
                <textarea placeholder="Ghi chú" name="" id="" cols="15" rows="5"></textarea>
            </div>
            <button type="submit" class="btn" name="submit">Đặt Món</button>
        </form>
    </div>
</section>
