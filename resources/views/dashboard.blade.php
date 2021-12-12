<x-app-layout>
  <x-slot name="header">
    <h2 class="font-bold text-xl text-green-800 leading-tight">
      Uniabuja Event-Center
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="my-3 ">{{ $tickets->links() }}</div>
      <table class="table-auto  w-full border">
        <thead>
          <tr class="p-3 bg-pink-500 ">
            <th class="p-2 text-white capitalize text-left">No</th>
            <th class="p-2 text-white capitalize text-left">Ticket Name</th>
            <th class="p-2 text-white capitalize text-left">Ticket Time</th>
            <th class="p-2 text-white capitalize text-left">Price</th>
            <th class="p-2 text-white capitalize text-left">Total</th>
            <th class="p-2 text-white capitalize text-left">Ticket Sold</th>
            <th class="p-2 text-white capitalize text-left">Amount Sold</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($tickets as $ticket)
          <tr class="border-b-2 border-gray-200 hover:bg-white">
            <td class="p-2 text-gray-500 capitalize"> <input type="checkbox" class="rounded-full focus:text-pink-500 text-pink-500 focus:ring-pink-500 focus:outline-none"> </td>
            <td class="p-2 text-gray-500 capitalize">{{ $ticket->name }}</td>
            <td class="p-2 text-gray-500 capitalize">{{ returnDateTime($ticket->date)  }}</td>
            <td class="p-2 text-gray-500 capitalize">{{ moneyFormat($ticket->amount) }}</td>
            <td class="p-2 text-gray-500 capitalize">{{ $ticket->total }}</td>
            <td class="p-2 text-gray-500 capitalize">{{ $ticket->sales->count() }}</td>
            <td class="p-2 text-gray-500 capitalize">{{ moneyFormat($ticket->sales->count() * $ticket->amount) }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>

    </div>
  </div>
</x-app-layout>
