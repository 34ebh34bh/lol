<?php
namespace Vspomnit\Clas_Test_Practis;

use PHPUnit\Framework\TestCase;

class TestTovarCartUser extends TestCase
{
    public function testProductName()
    {
//        $product = new Product('apple',100);
//        $n = $product->getName();
//        $this->assertEquals('apple',$n);
    }
    public function testProductPrice()
    {
//        $product = new Product('apple',100);
//        $n = $product->getPrice();
//        $this->assertSame(100,$n);
    }
    public function testCartAdd()
    {
        $product1 = new Product('apple',100);
//        $product2 = new Product('pen',12);
        $cart = new Cart();
        $cart->addProduct($product1);// надо допсиать етсты
//        $cart->addProduct($product2);
        $pl = $cart->ProductList();
        $this->assertEquals(2, count($pl)); // получается собрали тут и посчитали количество твоаров в карзине
    }
    public function testCartObject()
    {
        $product1 = new Product('apple',100);
        $product2 = new Product('apple',100);
        $cart = new Cart();
        $cart->addProduct($product1);
//        $cart->addProduct($product2);
        $this->assertSame($product1, $cart->ProductList()[0]);
    }
    public function testCartgetTotal()
    {
        //Если корзина пустая → возвращает 0, тут надо считать количество твоаров через productList и там должно если пусто то 0 дать
        //Если один продукт → сумма равна цене продукта мы тут обращаемся к getprice, и смотри на цену, ЛИБЮО НА ГЕТ ТОТАЛ, И СМОТРИ НА ЦЕНУ
        //Если несколько продуктов → сумма равна сумме цен всех продуктов, вызвать тотал и смотерть скока выйдет
//        $product1 = new Product('apple',100);
        $cart = new Cart();
//        $cart->addProduct();
        $pl = $cart->ProductList();
        $this->assertSame(0, count($pl));
    }               ///Если один продукт → сумма равна цене продукта, эт остановился
    public function testCartgetOne() {
        $cart = new Cart();
        $product1 = new Product('apple',100);
        $cart->addProduct($product1);
        $price = $product1->getPrice();
        $this->assertEquals(100, $product1->getPrice());
    }
    public function testCartgetPriceTotl(){
        $cart = new Cart();
        $product1 = new Product('apple',100);
        $product2 = new Product('pinaple',100);
        $cart->addProduct($product1);
        $cart->addProduct($product2);
        $t = $cart->getTotal();
        $this->assertEquals(200, $cart->getTotal());
    }
    //Метод возвращает массив объектов Product
    //Массив содержит все добавленные продукты
    //Никаких лишних объектов нет
    // Завтра чуть по чуть до тещу карзину а после уже вернёмся к ооп, или под музыку всё сделаю хз посмотрим, сегодня я так чисто на новое день потратил с кайфом разобьрался, но завтра следует всётаки к проге
//    не ну а чо я сегодня по аьлегациям все вопросы закрыл, завтра мб что то куплю ещё и гуд будет, посмотрим кароче
    public function testarrayCatrGet()
    {                       //Метод возвращает массив объектов Product
        $prod1 = new Product('apple',200);
        $prod2 = new Product('bannan',100);
        $cart = new Cart();
        $cart->addProduct($prod1);
        $cart->addProduct($prod2);
        $productsArray = $cart->ProductList();// тут суть в том что это просто масив в котором в нашем случае лежат пролукты, и через [] по инлексу мы найдём чо надо
        $this->assertCount(100, $productsArray[1]->getPrice());
    }
    public function testArrayCatrGet2(){
        $prod1 = new Product('apple',200);
        $prod2 = new Product('apple',200);
        $prod3 = new Product('apple',200);
        $cart = new Cart();
        $cart->addProduct($prod1);
        $cart->addProduct($prod2);
        $cart->addProduct($prod3);
        $productsArray = $cart->ProductList();
        $this->assertCount(3, $productsArray);
//        $this->assertEquals($prod2, $productsArray[1]);
//        $this->assertEquals($prod3, $productsArray[2]);
    }
 // ну норм про еттсил, остаётся до тестить User
    public function testUserName()
    {
        $cart1 = new Cart();
        $user1 = new User('artur',$cart1);
        $this->assertSame('artur', $user1->getName());
    }
    public function testUserCart() {
        $cart1 = new Cart();
        $user1 = new User('artur',$cart1);
        $this->assertEquals($cart1, $user1->getCart());
    }
    public function testGetCart() {
        $cart = new Cart();
        $user = new User('artur',$cart);
//        $user1 = new User('artur',$cart);
        $this->assertSame($cart,$user->getCart());
    }
    public function testGetCart3() {
        $cart1 = new Cart();
        $user = new User('artur',$cart1);
        $this->assertSame($cart1,$user->getCart());
    }
    public function testUserCart2() {
        $cart = new Cart();
        $user1 = new User('artur',new Cart());
        $user2 = new User('artur1',new Cart());

        $product = new Product('apple',100);
        $product1 = new Product('apple',100);

        $user1->getCart()->addProduct($product);
        $user2->getCart()->addProduct($product1);

        $this->assertEquals(100, $user1->getCart()->getTotal());
    }
    // Завтра разобраться $user->getCart()->addProduct($product) разобраться Завтра
    public function testUserCart3() {
        $user1 = new User('artur', new Cart());
        $user2 = new User('vasua', new Cart());

        $product = new Product('apple',111);
        $product1 = new Product('apple',111);

        $user1->getCart()->addProduct($product);
        $user2->getCart()->addProduct($product1);

        $this->assertEquals(111, $user1->getCart()->getTotal());
    }
}