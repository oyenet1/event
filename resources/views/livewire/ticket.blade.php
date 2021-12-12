<div class="py-8">
  <div class="grid grid-cols-1 md:grid-cols-2 max-w-6xl mx-auto gap-4 md:gap-8">
    <div class="rounded bg-white overflow-hidden relative transform transition duration-500 hover:scale-110">
      <img src="/img/event2.jpg" alt="" class="w-full">
      <div class="m-0 py-3 px-4 ">
        <p class="text-xl capitalize flex justify-between events-center">
          <span class="">{{ $event->name }}</span>
          <span class="font-semibold text-pink-600">&#8358;{{ moneyFormat($event->amount) }}</span>
        </p>
        <p class="absolute top-0 right-0 m-3 p-1 px-3 font-medium font-mono rounded-3xl text-xs bg-yellow-500 text-white">{{ returnDateTime($event->date) }}</p>
      </div>
    </div>
    <div class="w-full">

      <form method="POST" wire:submit.prevent="redirectToGateway()" accept-charset="UTF-8" class="form-horizontal" role="form">
        @csrf
        <div class="w-full space-y-3">
          <div>
            <label for="name" class="font-semibold text-lg text-gray-500">Your Name</label>
            <input type="text" wire:model="buyer" placeholder="Favour Mind" value="" class="w-full rounded-lg border-2 border-pink-600">
            @error('buyer')
            <span class="text-sm text-semibold text-red-600">{{ $message }}</span>
            @enderror
          </div>
          {{-- <input type="hidden" name="email" value="info@bowofade.com"> required --}}
          <input type="hidden" name="orderID" value="345">
          <input type="hidden" wire:model="ticket_id" value="{{ $event->id }}">
          <input type="hidden" name="amount" value="{{ $event->amount * 100 }}"> {{-- required in kobo --}}
          <input type="hidden" name="quantity" value="1">
          <input type="hidden" name="currency" value="NGN">
          <input type="hidden" name="metadata" value="{{ json_encode($array = ['ticket_id' => $event->id]) }}"> {{-- For other necessary things you want to add to your payload. it is optional though --}}
          <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}

          {{-- <input type="hidden" name="split_code" value="SPL_EgunGUnBeCareful">
              <input type="hidden" name="split" value="{{ json_encode($split) }}"> --}}
          <button class="w-full max-w-xs block mx-auto p-3 hover:bg-pink-500 transform transition duration-500 clear-both   rounded bg-green-500 text-white" type="submit" value="Pay Now!">
            <i class="fa fa-plus-circle fa-lg"></i> Pay Now!
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
