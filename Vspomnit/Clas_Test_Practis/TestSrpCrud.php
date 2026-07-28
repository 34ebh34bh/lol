<?php

namespace Vspomnit\Clas_Test_Practis;

use PHPUnit\Framework\TestCase;

class TestSrpCrud extends TestCase // дописать
{
    public function testCreate() {
        $UserRepository = new UserRepository();
        $UserService = new UserService($UserRepository);
        $UserService->create('swsw','wsws');
        $this->assertCount(1, $UserRepository->getUsers());
    }
    public function testfindid() {
        $repo = new UserRepository();
        $service = new UserService($repo);

        $service->create('swsw','wsws');

        $users = $repo->getUsers();

        $user = $service->getUserfindById(1);

        $this->assertEquals('swsw', $user->getName());
    }
    public function testDelete() {
        $repo = new UserRepository();
        $service = new UserService($repo);
        $service->create('swsw','wsws');
        $service->delete(1);
        $this->assertCount(0, $repo->getUsers());
    }
    public function testUpdate() {
        $repo = new UserRepository();
        $service = new UserService($repo);
        $service->create('swsw','wsws');
        $service->update(1,'lol','lolmail');
        $users = $repo->getUsers();
        $user = $service->getUserfindById(1);
        $this->assertEquals('swsw', $user->getName());
    }
}