<div class="table-responsive cart_info">
    <table class="table table-condensed">
        <thead>
        <tr>
            <td>Название</td>
            <td>Цена</td>
            <td>Колличество</td>
            <td>Стоимость</td>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($session['cart'] as $id => $product): ?>
            <tr>
                <td> <?= $product['name'] ?> </td>
                <td>$ <?= $product['price'] ?></p></td>
                <td> <?= $product['qty'] ?> </td>
                <td> $<?= $product['price'] * $product['qty'] ?> </td>
            </tr>

        <?php endforeach; ?>
        <tr>
            <td colspan="3"> Итого:</td>
            <td><?= $session['cart.qty'] ?></td>
        </tr>
        <tr>
            <td colspan="3"> На сумму:</td>
            <td><?= $session['cart.sum'] ?></td>
        </tr>

        </tbody>
    </table>

</div>
