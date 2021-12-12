<div>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="my-3 flex justify-between">
          <div class="div">
              <input wire:model="search" type="text" class="p-2 bg-white shadow rounded-full w-60 px-3 border-0 focus:ring-pink-500" placeholder="search by reference">
          </div>
          <div class="div">{{ $sales->links() }}</div>
      </div>
      <table class="table-auto  w-full border bg-white">
        <thead>
          <tr class="p-3 bg-pink-500 ">
            <th class="p-2 text-white capitalize text-left">No</th>
            <th class="p-2 text-white capitalize text-left">Buyer</th>
            <th class="p-2 text-white capitalize text-left">Ticket Name</th>
            <th class="p-2 text-white capitalize text-left">Event Time</th>
            <th class="p-2 text-white capitalize text-left">Reference</th>
            <th class="p-2 text-white capitalize text-left">Seat Number</th>
            <th class="p-2 text-white capitalize text-left">Time Bought</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($sales as $sale)
          <tr class="border-b-2 border-gray-200 hover:bg-white">
            <td class="p-2 text-gray-500 capitalize"> <input type="checkbox" class="rounded-full focus:text-pink-500 text-pink-500 focus:ring-pink-500 focus:outline-none"> </td>
            <td class="p-2 text-gray-500 capitalize">{{ $sale->buyer }}</td>
            <td class="p-2 text-gray-500 capitalize">{{ $sale->ticket->name }}</td>
            <td class="p-2 text-gray-500 capitalize">{{ returnDateTime($sale->ticket->date) }}</td>
            <td class="p-2 text-gray-500 uppercase ">{{ $sale->reference }}</td>
            <td class="p-2 text-gray-500 uppercase ">{{ $sale->seat_number }}</td>
            <td class="p-2 text-gray-500 uppercase ">{{ returnTime($sale->created_at) }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>

    </div>
  </div>
</div>
