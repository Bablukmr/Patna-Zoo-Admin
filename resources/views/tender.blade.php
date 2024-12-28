@extends('layout.main')
@section('main-section')

<div class="mt-[100px] mx-auto p-8">
    <h1 class="text-2xl font-bold mb-4">Tenders</h1>
    <div class="container w-full overflow-scroll h-full">
        <table class="table-auto w-full bg-white shadow-md rounded-lg overflow-hidden">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="px-4 py-2">SN.</th>
                    <th class="px-4 py-2">Tender Name</th>
                    <th class="px-4 py-2">Tender Notice No</th>
                    <th class="px-4 py-2">Tender Date</th>
                    <th class="px-4 py-2">PDF</th>
                    <th class="px-4 py-2">Status</th>
                </tr>
            </thead>
            <tbody>
                @php $x = 1; @endphp
                @forelse($tenders as $tender)

                <tr class="{{ $loop->even ? 'bg-gray-100' : 'bg-white' }} hover:bg-gray-200">
                    <td class="border px-4 py-2">{{ $x++ }}</td>
                    <td class="border px-4 py-2">{{ $tender->tender_name }}</td>
                    <td class="border px-4 py-2">{{ $tender->tender_notice_no }}</td>
                    <td class="border px-4 py-2">{{ \Carbon\Carbon::parse($tender->tender_date)->format('d M Y') }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ asset('storage/' . $tender->pdf) }}" target="_blank" class="text-blue-500 hover:underline">Download</a>
                    </td>
                    <td class="border px-4 py-2">
                        @if($tender->active)
                        <span class="bg-green-500 text-white px-2 py-1 rounded-full">Active</span>
                        @else
                        <span class="bg-red-500 text-white px-2 py-1 rounded-full">Inactive</span>
                        @endif
                    </td>
                </tr>

                @empty
                <tr>
                    <td colspan="6" class="text-center p-4">No tenders available</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection