<?php

namespace Vspomnit\Clas_Test_Practis;

class BookingService
{
    private array $bookings = [];
    public function addBooking(Room $room, int $nights): void {
        $booking = new Booking(1, $room->getId(),$nights);
        $this->bookings[] = $booking;
    }
//    public function totalPrice() {
//
//        foreach ($this->bookings as $booking) {
//            echo $booking;
//        }
//    }
    public function getBookings(): array
    {
        return $this->bookings;
    }
}