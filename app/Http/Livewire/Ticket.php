<?php

namespace App\Http\Livewire;

use App\Models\Sale;
use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Ticket as ModelTicket;
use Illuminate\Support\Facades\Redirect;
use Unicodeveloper\Paystack\Facades\Paystack;

class Ticket extends Component
{
    public ModelTicket $event;
    public $ticket_id, $reference, $buyer, $seat_number;

    public function redirectToGateway()
    {
        $data = $this->validate(
            [
                'buyer' => 'required',
                'reference' => 'nullable',
                'ticket_id' => 'nullable',
                'seat_number' => 'nullable'
            ],
            ['buyer.required' => 'Name cannot be empty']
        );
        $data['ticket_id'] = $this->event->id;
        $data['reference'] = Paystack::genTranxRef();
        $data['seat_number'] = Sale::latest()->first()->id + 1;
        

        $true = Sale::create($data);
        if ($true) {
        //    session()->flash('success', 'Ticket Bought Sucessfully, You seat number is' . $data['seat_number']);
           $this->dispatchBrowserEvent('swal:success', [
            'icon' => 'success',
            // 'text' => 'Ticket Bought Sucessfully, Your Ticket reference and set number are ' . $data['reference']. ' and '. $data['seat_number'] . ' respectively',
            'html' => '<p class="font-bold">Ticket Bought Sucessfully, Your Ticket reference and Seat Number are ' . Str::upper($data['reference']) . ' and '. $data['seat_number'] . ' respectively</p>',
            'title' => 'Ticket Bought',
            // 'timer' => 3000,
        ]);
        }

        // try {
        //     return Paystack::getAuthorizationUrl()->redirectNow();
        // } catch (\Exception $e) {
        //     return Redirect::back()->withMessage(['msg' => 'The paystack token has expired. Please refresh the page and try again.', 'type' => 'error']);
        // }
    }

    public function render()
    {
        return view('livewire.ticket')->layout('layouts.guest');
    }
}
