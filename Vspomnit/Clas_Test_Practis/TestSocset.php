<?php

namespace Vspomnit\Clas_Test_Practis;

use PHPUnit\Framework\TestCase;

class TestSocset extends TestCase
{
    public function testUserPost() {
        $UserThree1 = new UserThree(1, 'artur');
        $UserThree2 = new UserThree(2, 'stas');
        $PostThree1 = new PostThree(1, $UserThree1->getId(),'text');

        $res = $UserThree1->getId() === $PostThree1->getUserId();
        $this->assertTrue($res);
    }
    public function testCommPost() {
        $UserThree1 = new UserThree(1, 'artur');

        $PostThree1 = new PostThree(1, $UserThree1->getId(),'text');
        $PostThree2 = new PostThree(2, $UserThree1->getId(),'text');

        $comment1 = new Comment(1,$PostThree1->getId(), $PostThree1->getId(), 'ededed');
        $comment2 = new Comment(2,$PostThree1->getId(), $PostThree2->getId(), 'wwww');

        $res = $PostThree1->getId() === $comment1->getPostId();

        $this->assertTrue($res);
    }
    public function testUserDelete() {
        $UserThree1 = new UserThree(1, 'artur');
        $PostThree1 = new PostThree(1, $UserThree1->getId(),'text');
        $PostThree2 = new PostThree(2, $UserThree1->getId(),'text');
        $comment1 = new Comment(1,$PostThree1->getId(), $PostThree1->getId(), 'ededed');
        $comment2 = new Comment(2,$PostThree1->getId(), $PostThree2->getId(), 'ededed');

        $res = $comment1->getUserId() === $UserThree1->getId();
        $this->assertTrue($res);
    }
    public function testPostComeUser() {

    }
}