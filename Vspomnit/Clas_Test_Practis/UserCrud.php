<?php

namespace Vspomnit\Clas_Test_Practis;

class UserCrud
{
    private UserService $userService;
    public function __construct(UserService $userService) {
        $this->userService = $userService;
    }
    public function craeteService(string $name, string $email): void {

        $this->userService->create($name, $email);
    }
    public function deleteService($id): void
    {
        $this->userService->delete($id);
    }
    public function getUserService($id): void
    {
        $this->userService->getUserfindById($id);
    }public function delete($id): void
    {
        $this->userService->delete($id);
    }
    public function updateService($id, string $name, string $email): void {
        $this->userService->update($id, $name, $email);
    }
}